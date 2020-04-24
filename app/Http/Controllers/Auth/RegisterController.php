<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\IpController;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Country;
use App\Contactos;
use App\Mail\ValidarCorreo;
use App\Mail\ValidarCorreo2;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'postregister';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
     
        return Validator::make($data, [
            'nombre' => 'required|string|max:255|min:2',
            'apellido'=>'required|string|max:255|min:2',
            'correo' => 'required|string|email|max:255|unique:usuario',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       // $ip  = new IpController();  
        //$n =$ip->ip();
        //$codigo = Country::select('id_country')->where('name_country',$n)->first();
        
        //print_r($data['pais']);exit();
        $codigo = $data['pais'];
        $combito = $data['combo'];


        if($combito == 1)
        {

          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
 
          $nombre1 = explode(" ", $nombre);
 
          $apellido1 = explode(" ", $apellido);
 



        $token = str_random(15).$data['nombre'].$data['apellido'].str_random(15);


          $objDemo = new \stdClass();
          $objDemo->nombres = $data['nombre'];
          $objDemo->token = $token;

        Mail::to($data['correo'])->send(new ValidarCorreo2($objDemo));   



            $variable = User::create([

            'usuario'=>$nombre1[0].' '. $apellido1[0],
            'nombres' => $data['nombre'],
            'apellidos'=>$data['apellido'],
            'correo' => $data['correo'],
            'pass' => bcrypt($data['password']),
            //'pass_simple'=> $data['password'],
            'estado'=>'1',
            'pais'=>$codigo,
            'perfil'=>'',
            'enviar'=>'1',
            'tipo'=>'N',
            'fecha'=>date('Y-m-d'),
            'flag'=>$data['flag'],
            'email_verified_at'=>$token,
            'tpu'=>'E',
        ]);
        // print_r($variable."");exit();
        if ($variable) {
          $id_usuario = $variable->id;
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
        return $variable;

        }
        else
        {

          $nombre = $data['nombre'];
          $apellido = $data['apellido'];
 
          $nombre1 = explode(" ", $nombre);
 
          $apellido1 = explode(" ", $apellido);

 
        $token = str_random(15).$data['nombre'].$data['apellido'].str_random(15);


          $objDemo = new \stdClass();
          $objDemo->nombres = $data['nombre'];
          $objDemo->token = $token;

        Mail::to($data['correo'])->send(new ValidarCorreo($objDemo));   


        $variable = User::create([
            'usuario'=>$nombre1[0].' '. $apellido1[0],
            'nombres' => $data['nombre'],
            'apellidos'=>$data['apellido'],
            'correo' => $data['correo'],
            'pass' => bcrypt($data['password']),
            //'pass_simple'=> $data['password'],
            'estado'=>'1',
            'pais'=>$codigo,
            'perfil'=>'',
            'enviar'=>'1',
            'tipo'=>'N',
            'fecha'=>date('Y-m-d'),
            'flag'=>$data['flag'],
            'email_verified_at'=>$token,
            'tpu'=>'T'
        ]);
        
        if ($variable) {
          $id_usuario = $variable->id;
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
        return $variable;

        
        }


    }
}
