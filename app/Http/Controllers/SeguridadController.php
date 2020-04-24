<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Applied_Jobs;
use App\User_History;
use Auth;
use Validate;
use App\Country;
use App\Mail\CambioPass;
use App\Mail\CambioCorreo;
use App\Mail\RecuperarPass;
use App\Mail\SolicitaInformacion;
use App\Mail\SolicitaInformacion2;
use App\Mail\InformaLabora;
use App\Mail\CorreoBaja;
use Illuminate\Support\Facades\Mail;
use DateTime;
header('Content-Type: text/html; charset=UTF-8');


class SeguridadController extends Controller
{
	public function index()
	{
		$actual = Auth::user()->id;

		return view('seguridad')->with('actual',$actual);
	}

	 public function enviomail(Request $request)
	 {

			$pass_ant = $request->pass_ant;
			$new_pass = $request->new_pass;
			$new_pass_con = $request->new_pass_con;
			$actual = Auth::user()->pass;
			$idact = Auth::user()->id;
			$cod = strtoupper(str_random(8));
			$correo=Auth::user()->correo;


			if($new_pass == $new_pass_con)
			{

			}
			else
			{
				return response()->json(['message'=>1]);
			}


			if(password_verify($pass_ant, $actual))
			{
				$actualizar = User::where('id',$idact)
								->update([
									"token_pass"=> $cod,
								]);

          $objDemo = new \stdClass();
          $objDemo->token = $cod;


    	  Mail::to($correo)->send(new CambioPass($objDemo));


				return response()->json(['message' => 2]);


			}
			else
			{

				return response()->json(['message'=>0]);
			}


	 }

	 public function baja()
	 {
	 	$xd = date('d-m-Y');

	 	$usu = Auth::user()->id;
		$correousu = Auth::user()->correo;
		$nombreusu = Auth::user()->nombres." ".Auth::user()->apellidos;
		$tok_baja = str_random(15).$usu.str_random(15);

	 			$actualizar = User::where('id',$usu)
	 					  		  ->update([
	 					  	  			"baja"=>0,
												"fe_baja"=>date('Y-m-d'),
												"tok_baja"=>$tok_baja,
	 					  		  		  ]);

	 			$actualizar2 = Applied_Jobs::where('id_user_employee',$usu)->delete();

	 			$s = new User_History();
	 			$s->id_user = $usu;
	 			$s->descripcion = 'Usuario se ha dado de baja';
	 			$s->date = $xd;
	 			$s->save();


				          $objDemo = new \stdClass();
				          $objDemo->nombreusu = $nombreusu;
									$objDemo->tok_baja =$tok_baja;


				    	  Mail::to($correousu)->send(new CorreoBaja($objDemo));

	 		    return response()->json(['message'=>0]);
	 }


	 public function confirmation($token)
	 {

		 $rest = substr($token,15,-15);
		 $consultar = User::where('id',$rest)->get();

		 $fecha_entrada = new DateTime($consultar[0]->fe_baja);

		 $fecha_actual = new DateTime(date("Y-m-d"));

		 $interval = $fecha_entrada->diff($fecha_actual);
		 //echo $interval->format('%d%');

		 if ($interval->format('%d%') > 4) {

			 		$actualizar = User::where('id',$rest)
														->update([
																		'baja'=>1
																		]);
		 		return redirect(route('login'))->with('status','Su cuenta se ha activado. Inicie Sesion./success');
		 } else {
		 	return redirect(route('login'))->with('status','No puede reactivar su cuenta hasta transcurrido 4 días después de haberse dado de baja./danger');
		 }



	 }
	 

	 public function confirmacion(Request $request)
	 {
	 	$new_pass = $request->new_pass;
	 	$codigo = $request->codigo;
	 	$codact = Auth::user()->token_pass;
	 	$actual = Auth::user()->id;

	 	if($codigo == $codact)
	 	{
	 				$actualizar = User::where('id',$actual)
								->update([
									"pass"=>bcrypt(trim($new_pass)),
									
										]);
	 		return response()->json(['message'=>0]);
	 	}
	 	else
	 	{
	 		return response()->json(['message'=>1]);
	 	}
	 }

	 public function enviomailcor(Request $request)
	 {
	 	$new_correo = $request->new_correo;
	 	$actual = Auth::user()->id;
	 	$token_correo = strtoupper(str_random(8));




	 	$actualizar = User::where('id',$actual)
	 				->update([
	 					"token_correo"=>$token_correo,
	 				]);

          $objDemo = new \stdClass();
          $objDemo->token_correo = $token_correo;

          Mail::to($new_correo)->send(new CambioCorreo($objDemo));

	 	return response()->json(['message'=>1]);
	 }

	 public function confirmcorreo(Request $request)
	 {
	 	$new_correo = $request->new_correo;
	 	$codigo_correo = $request->codigo_correo;
	 	$codact = Auth::user()->token_correo;
	 	$coract = Auth::user()->correo;
	 	$idact = Auth::user()->id;

	 	if($codigo_correo == $codact)
	 	{
	 		$actualizar = User::where('id',$idact)
						->update([
								"correo_history"=>$coract,
								"correo"=>$new_correo,
								]);

		    return response()->json(['message'=>0]);
	 	}
	 	else
	 	{
	 		return response()->json(['message'=>1]);
	 	}


	 }


	 public function recuperarC(Request $request)
	 {
	 	$email = $request->email;

	 	$token = strtoupper(str_random(8));

	 	$verificar = User::where('correo',$email)->get();


	 	if(count($verificar) !=0)
	 	{
	 		$a = User::where('correo',$email)
	 				->update([
	 						'token_recuperar'=>$token,
	 						]);

			$objDemo = new \stdClass;
			$objDemo->token = $token;

			Mail::to($email)->send(new RecuperarPass($objDemo));

			return response()->json(['message'=>1]);
	 	}
	 	else
	 	{
	 		return response()->json(['message'=>0]);
	 	}
	 }

	 public function confirmartoken(Request $request)
	 {
	 	$token = $request->token;
	 	$correo = $request->correo;

	 	$usuario = User::where('correo',$correo)->select('token_recuperar')->get();


	 	$tokenusu = $usuario[0]->token_recuperar;


	 	if($tokenusu == $token)
	 	{
	 		return response()->json(['confir'=>1]);
	 	}
	 	else
	 	{
	 		return response()->json(['confir'=>0]);
	 	}

	 }

	 public function update_recuperar(Request $request)
	 {

	 	$correousu = $request->correousu;
	 	$new_pass = $request->new_pass;
	 	$new_pass_con = $request->new_pass_con;

	 	$up = User::where('correo',$correousu)
	 			  ->update([
	 			  		'pass'=>bcrypt($new_pass),
	 			  		  ]);

	 			$objDemo = new \stdClass;
	 			$objDemo->correo = $correousu;
	 			$objDemo->variable = '';
	 			Mail::to($correousu)->send(new InformaLabora($objDemo));

	 	return redirect(route('login'))->with('status','Contrase���a modificada');
	 }

	public  function envioemail(Request $request)
	 {

	 	$email = $request->email;

	 	$u = User::where('correo',$email)->select('token_recuperar')->get();

	 	$t = $u[0]->token_recuperar;

			$objDemo = new \stdClass;
			$objDemo->token = $t;

			Mail::to($email)->send(new RecuperarPass($objDemo));

		return response()->json(['message'=>1]);
	 }

 public function correo_solicita(Request $request)
	 {
	 		$detalle = $request->detalle;
	 		$nombres = $request->nombres;
	 		$apellidos = $request->apellidos;
	 		$correo = $request->correo;
	 		$numero = $request->numero;
	 		$nacionalidad = $request->nacionalidad;

	 		$xd = Country::where('id_country',$nacionalidad)->get();

	 		$pais = $xd[0]->name_country;


	 			$objDemo = new \stdClass;
	 			$objDemo->nombres = $nombres;
	 			$objDemo->apellidos = $apellidos;
	 			$objDemo->correo = $correo;
	 			$objDemo->numero = $numero;
	 			$objDemo->detalle = $detalle;
	 			$objDemo->pais = $pais;

	 		Mail::to('proyectosp@laboraplanet.com')->send(new SolicitaInformacion($objDemo));


	 			 return response()->json(['message'=>1]);

	 }

	 public function contactof (Request $request)
	 {

			$nombre = $request->inombre;
			$email = $request->iemail;
			$asunto = $request->iasunto;
			$mensaje = $request->imensaje;

			 $objDemo = new \stdClass;
			 $objDemo->nombre = $nombre;
			 $objDemo->email = $email;
			 $objDemo->asunto = $asunto;
			 $objDemo->mensaje = $mensaje;

			 Mail::to('contacto@laboraplanet.com')->send(new SolicitaInformacion2($objDemo));

			 return response()->json(['message'=>1]);
	}


}
