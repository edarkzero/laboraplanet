<?php

namespace App\Http\Controllers;


use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IpController;
use App\Country;
use Mail;

class LoginController extends Controller
{
    public function login()
    {
    	require "init.php";

    	// $linkedin = new LinkedIn($app_id,$app_secret,$app_callback,$app_scopes,$ssl);
    	return view('auth.login')->with('linkedin',$linkedin);
    }

    public function callback()
    {
    	require "init.php";

    	if($_GET['state']!= $_SESSION['linkedincsrf']) {
    		DIE('ALGO HAY INVALIDO');
    	}

    	$accessToken = $linkedin->getAccessToken($_GET['code']);
    	if(!$accessToken) {

    		die("EL TOKEN DE SESSION NO SE HA ENCONTRADO. INICIA SESION NUEVAMENTE");

    	}


    	$_SESSION['linkedInAccessToken'] = $accessToken;

    	

    	$profile = $linkedin->getPerson($_SESSION['linkedInAccessToken']);

    	$profile2 = $linkedin->getEmail($_SESSION['linkedInAccessToken']);

    	// var_dump($profile);
    	//  die();

		$raro = "handle~";

		$email = $profile2->elements[0]->$raro->emailAddress; 


    	$id =  $profile->id;

    	$nombre = $profile->firstName->localized->es_ES;

    	$apellido = $profile->lastName->localized->es_ES;






    	 if(isset($profile->profilePicture))
    	 {
    	 	$imagen = $profile->profilePicture->{"displayImage~"}->elements[0]->identifiers[0]->identifier;
    	 }
    	 else
    	 {
    	 	$imagen = "img/none.png";
    	 }


    	


    	if($user = User::where('correo',$email)->first()) {
    		return $this->authAndRedirect($user);
    	} else {



    	$ip = new IpController();
    	$n = $ip->ip();
    	$codigo = Country::select('id_country')->where('name_country',$n)->first();
    	$var = str_random(8);
    	$user = User::create([
    		'usuario'=>$nombre." ".$apellido,
    		'nombres'=>$nombre,
    		'apellidos'=>$apellido,
    		'correo'=>$email,
    		'pass'=>bcrypt($var),
    		'pass_simple'=>$var,
    		'estado'=>'1',
    		'pais'=>$codigo->id_country,
    		'perfil'=>'',
    		'enviar'=>'0',
    		'imagen'=>$imagen,
    		'tipo'=>'L',
    		'email_verified_at'=>'1'	
    		]);

    		$data = [
    				  'correo'=>$email,
    				  'pass'=>$var,
    				];

    		Mail::send('mail.envio_usugmail',$data,function($message) use ($data) {
    		$message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
    		$message->to($data['correo']);
    		$message->subject('BIENVENIDO A LABORAPLANET - REESTABLECER CONTRASEÑA');	
    		});

    		return  $this->authAndRedirect($user);
		



    	}


	
    }

    public function authAndRedirect($user)
    {
    	Auth::login($user);

    	return redirect()->to('perfil')->with('mensaje','Te hemos enviando un mensaje muy importante a tu correo electronico.');
    }
  public function datosl(){
        

        require 'init1.php';
        if (!isset($_GET['code']) || !isset($_GET['state'])) {
            return redirect()->route('perfil');
        }
        if($_GET['state']!= $_SESSION['linkedincsrf']) {
             // return redirect()->route('perfil');
            DIE('ALGO HAY INVALIDO');
        }

        $accessToken = $linkedin->getAccessToken($_GET['code']);
        if(!$accessToken) {
             // return redirect()->route('perfil');
            die("EL TOKEN DE SESSION NO SE HA ENCONTRADO. INICIA SESION NUEVAMENTE");

        }


        $_SESSION['linkedInAccessToken'] = $accessToken;        

        $profile = $linkedin->getPerson($_SESSION['linkedInAccessToken']);

        // var_dump($profile);
        //  die();

        $id =  $profile->id;

        $nombre = $profile->firstName->localized->es_ES;

        $apellido = $profile->lastName->localized->es_ES;

        if (Auth::user()->imagen!=null) {
            $imagen = Auth::user()->imagen;
        }else{
        $imagen = "img/none.png";
        }

        if(isset($profile->profilePicture)){
            $imagen = $profile->profilePicture->{"displayImage~"}->elements[0]->identifiers[0]->identifier;
        }
        
        $u = User::find(Auth::user()->id);
        $u->nombres = $nombre;
        $u->apellidos = $apellido;

        $u->imagen =$imagen; 
        $u->save();
        return redirect()->route('perfil');
        
    }


}
