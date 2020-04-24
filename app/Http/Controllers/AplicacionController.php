<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Applied_Jobs;
use App\Notifications;
use App\User;
use App\Chat;
use App\Contactos;
use Auth;
use Validator;
use Redirect;
use App\Mail\UsuarioAplicado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
header('Content-Type: text/html; charset=UTF-8');
 



Class AplicacionController extends Controller{
	 	

	 public function aplicar(Proyecto $proyecto)
	 {

	  	$imp =$proyecto['usuario'];
	 	
	 	//PARA OBTENER EL NOMBRE DE USUARIO
	 	$ususaludo = User::where('id',$imp)->get();
	 	
	 	
	 	//PARA OBTENER  EL NOMBRE Y APELLIDO DEL USUARIO
	 	$nombreusu = User::where('id',$imp)->get();

	 	return view('aplicar')->with('proyecto',$proyecto)->with('ususaludo',$ususaludo)->with('nombreusu',$nombreusu);


 	 }

	 public function savepostu(Request $request)
	 {
	 
       set_time_limit(9999999);
      ini_set('memory_limit','15000M');	

	 	$docx = $request->file('file');
	 	$nom_file = $request->uploader1;
	 	$proyect = $request->codigo;
	 	$employee = Auth::user()->id;
	 	$present = $request->present;
	 	$money = $request->money;
	 	$time = $request->time;
	 	$type = $request->type_time;

	 	$rules = array(
			'time' => 'required|numeric',
			'money' => 'required|numeric',
			'type_time' => 'required',
			'file' => 'mimes:doc,docx,pdf,xlsx,png',
			'present'=>'max:3455|required'
		);

		$validation = Validator::make($request->all(),$rules);

		if($validation->fails())
		{
			return Redirect::to('aplicar/'.$proyect)->withErrors($validation);
		}
		
	 	$dato = Proyecto::where('id',$proyect)->get();
	 	$employer = null;
	 	foreach ($dato as $x) {
	 		$employer = $x->usuario;
	 	}

	 	if($employee == $employer)
	 	{
	 		//no puede postular a su mismo proyecto creado
	 		return redirect('aplicar/'.$proyect)->with('creador','Usted ya es el creador');
	 	}

	 	$esta = Applied_Jobs::where('id_user_employee',Trim($employee))->
	  			where('id_project',Trim($proyect))->get();
	 	if(count($esta) > 0)
	  	{
	  	//usted ya postulo a este proyecto  
	  	return redirect('aplicar/'.$proyect)->with('yapostulo','Usted ya postulo a este proyecto');	  		
	  	}


	 	$aplipro = new Applied_Jobs;
	 	$aplipro->id_project = trim($proyect); 
		if($nom_file !='')
		{
	 		$xd = $request->file('file')->store('document');
	 		$aplipro->document = trim($xd);
		}


		$calcula =$money + ($money * 0.09);

		$aplipro->id_user_employee = Trim($employee);
		$aplipro->id_user_employer = Trim($employer);
		$aplipro->state_aplication = '1';
		$aplipro->presentation = Trim($present);
		$aplipro->economic_proposal = round(Trim($calcula),2);
		$aplipro->sinnueve = round(Trim($money),2);
		$aplipro->time_finish = Trim($time);
		$aplipro->type_time = Trim($type);
		$aplipro->date_contract  = Trim(date('Y-m-d'));
		$imprimir = $request->file('file');
		if($imprimir != null)
		{
			$enviar = Trim($request->file('file')->getClientOriginalName());
		}
		else
		{
			$enviar = Trim($request->file('file'));
		}
	
		$aplipro->file_name = $enviar;
		$aplipro->save();
        
        //notificacion quitar
		$mostra = Notifications::where('destination',Auth::user()->id)
								->where('author',$employer)
								->where('url','aplicar/'.trim($proyect))
								->update(['viewed'=>1]);
		//
	

//PARA NOTIFICAR LA APLICACION

$nomproyect = Proyecto::where('id',$request->codigo)->select('titulo')->get();


		$noti = new Notifications;
		$noti->destination = $employer;
		$noti->type_notification = utf8_decode("Postulacion");
		$noti->author = $employee;
		$noti->viewed = 0;
		$noti->description = Trim("El colaborador ".Auth::user()->usuario." ha aplicado al requerimiento, ".$nomproyect[0]->titulo);
		$noti->date_done = date('Y-m-d');
		$noti->url = Trim("aspirantes/".$request->codigo);
		$noti->save();

//FIN



		//PARA AGREGAR A LA TABLA CONTACTOS PARA EL CHAT
		$id_usuario = Auth::user()->id;
		$id_contacto = $request->idusuarioproyecto;

		$validar = Contactos::where('id_usuario',$id_usuario)->where('id_contacto',$id_contacto)->first();
        $validar1 = Contactos::where('id_contacto',$id_usuario)->where('id_usuario',$id_contacto)->first();

		if(!$validar){
		$contacto = new Contactos;
		$contacto->id_usuario = $id_usuario;
		$contacto->id_contacto = $id_contacto;
		$contacto->save();	
		}

		if(!$validar1){
		$contacto = new Contactos;
		$contacto->id_usuario = $id_contacto;
		$contacto->id_contacto = $id_usuario;
		$contacto->save();
		}
		
        $c = User::find($id_contacto);
        
		//$present = "Estimado ".$c->nombres." ".$c->apellidos." reciban cordiales saludos, he leido la convocatoria que realizaron y estoy muy interesado(a) en formar parte de su requerimiento.";
		
			$f = date('Y-m-d H:i:s');
		$f2 = strtotime('-5 hour',strtotime($f));
		$d = date('Y-m-d H:i:s',$f2);
			        Chat::create([
			          'id_usuario'=>$id_usuario,
			          'id_contacto'=>$id_contacto,
			          'chat'=>$present,
			          'v'=>'1',
			          'fecha'=>$d,
			          'file'=>'notificacion',
			          'file_name'=>$noti->id_notification
			        ]);
		//FIN DE LA TABLA CONTACTOS


		//PARA CAPTURAR PARA EL ENVIO DE CORREOS
		$nombreproyectousu = $request->nombredeproyectousu;
		$idproyectousu = $request->idproyectousu;
		$nombreusupro = $request->usudeproyecto;
		$correousuproyecto = $request->correousuproyecto;
		$nombreusuaa = Auth::user()->id;
	

		$nombreusuaplicado = User::where('id',$nombreusuaa)->get();

		$enviaruwu = $nombreusuaplicado[0]['nombres'] . " " .  $nombreusuaplicado[0]['apellidos'];

			

			// $data = [
			// 		  'nombreusupro' => $nombreusupro,
			// 		  'enviaruwu'=> $enviaruwu,
			// 		  'nombreproyectousu' =>$nombreproyectousu,
			// 		  'correousuproyecto' =>$correousuproyecto,
			// 		  'idproyectousu' =>$idproyectousu,

			// 		];

					$objDemo  = new \stdClass;
					$objDemo->nombreusupro = $nombreusupro;
					$objDemo->enviaruwu = $enviaruwu;
					$objDemo->nombreproyectousu = $nombreproyectousu;
					// $objDemo->correousuproyecto = $correousuproyecto;
					$objDemo->idproyectousu = $idproyectousu;


		Mail::to($correousuproyecto)->send(new UsuarioAplicado($objDemo));
		
		 // Mail::send('mail.usuario_aplicado', $data, function($message) use ($data) {
   //              $message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
   //              $message->to($data['correousuproyecto']);
   //              $message->subject('¡ HAY USUARIOS INTERESADOS EN TU PROYECTO !');
   //            });




		 return redirect(route('buscar_trabajo',['cu'=>$id_contacto]))->with('status','Has aplicado con exito al requerimiento.');


	 }

	 public function upnotifi(Request $request)
	 {
	 	$codigo  = $request->codigo;

	 	Notifications::where('id_notification',$codigo)
	 				  ->update(['viewed'=> 1]);



	 	$noti = Notifications::where('id_notification',Trim($codigo))->get();

	 	return response()->json(['data' => $noti]);

	 }


	 public function proyectoDetalle(Request $request)
	 {

	 	$dato = Proyecto::where('id',$request->proyecto)->get();
	 	return view('proyectoDetalle')->with('dato',$dato);
	 }

}


 ?>