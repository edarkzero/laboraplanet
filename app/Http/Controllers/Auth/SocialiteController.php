<?php
namespace App\Http\Controllers\Auth;

use Auth;
use App\User;
use App\Contactos;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\IpController;
use App\Country;
use App\Mail\UsuarioSocial;
use Illuminate\Support\Facades\Mail;



class SocialiteController extends Controller
{
    
    //Metodo encargado de la redireccion a Facebook
	 public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

       // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->stateless()->user();
         
        // dd($social_user);
        
        $token = $social_user->token;
       
     
        // Comprobamos si el usuario ya existe
        if ($user = User::where('correo', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            
           if ($provider=='google') {$tipo ="G";}
            if ($provider=='facebook') {$tipo ="F";}
             if ($provider=='linkedin') {$tipo ="L";}


                $xd = $social_user->name;
                
         
        $ip  = new IpController();  
        $n =$ip->ip();
        $codigo = Country::select('id_country')->where('name_country',$n)->first();
            $var = str_random(8);
                            
                     $objDemo = new \stdClass;
                     $objDemo->correo = $social_user->email;
                     $objDemo->pass=$var;   

                Mail::to($social_user->email)->send(new UsuarioSocial($objDemo));    
            
            $user = User::create([
            'usuario'=>$social_user->name,
            'nombres' => '',
            'apellidos'=>'',
            'correo' => $social_user->email,
            'pass' => bcrypt($var),
            //'pass_simple'=>$var,
            'estado'=>'1',
            'pais'=>$codigo->id_country,
            'perfil'=>'',
            'enviar'=>'1',
            'fecha'=>date('Y-m-d'),
            'imagen' => $social_user->avatar_original,
            'tipo'=>$tipo,
            'email_verified_at'=>'1',
            'flag'=>1,
            'fecha'=>date('Y-m-d')
            ]);

              if ($user) {
          $id_usuario = $user->id;
          $id_labochat = "380"; 
          $contacto = new Contactos();
          $contacto->id_usuario = $id_usuario;
          $contacto->id_contacto = $id_labochat;
          $contacto->save();
          $contacto = new Contactos();
          $contacto->id_usuario = $id_labochat;
          $contacto->id_contacto = $id_usuario;
          $contacto->save();
        }






         

            return $this->authAndRedirect($user); // Login y redirección
        }
    }

      // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);


           $m = User::find(Auth::user()->id);
            $m->activo =1;
            $m->save();
        
        
        return redirect()->to('perfil')->with('mensaje','Te hemos enviado un mensaje muy importante a tu correo electronico.');

       
    }
}
