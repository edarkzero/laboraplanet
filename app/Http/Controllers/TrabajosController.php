<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Applied_Jobs;
use App\Proyecto;
use App\Abilities;
use App\Agreements;
use App\Notifications;
use Auth;
use Storage;
use Validator;
use Redirect;
// 'proyecto.tiempo_entrega','proyecto.tipo_trabajo','proyecto.titulo','proyecto.habilidades','proyecto.usuario','applied_jobs.presentation','applied_jobs.id_trabajo_aplicado','applied_jobs.id_user_employer','applied_jobs.time_finish','applied_jobs.state_aplication','applied_jobs.economic_proposal','usuario.usuario','usuario.correo','usuario.perfil'asd
header('Content-Type: text/html; charset=UTF-8');



Class trabajosController extends Controller{
	 public function index(Request $request){

		$id = Auth::user()->id;
	 	$trabajos=Proyecto::select()
	 	->join('applied_jobs',function($proy){
	 		$proy->on('proyecto.id','=','applied_jobs.id_project');
	 	})
	 	->join('usuario',function($usu){
	 		$usu->on('usuario.id','=','applied_jobs.id_user_employer');
	 	})
	 	->orderBy('applied_jobs.date_contract', 'desc')
	 	->where('applied_jobs.id_user_employee',$id)
	 	->get();
	 	


	 	$notif=Agreements::where('id_user_get',$id)
    	// ->where('id_apply_job',23)
    	->get();



	 		// print_r($trabajos."");exit();
	 	return View('trabajos',compact('trabajos','notif'));
	 }

	 public function usuario_detalle(Request $request){

	 	$usuario=Applied_Jobs::select()
	 	->join('usuario',function($usu){
	 		$usu->on('usuario.id','=','applied_jobs.id_user_employer');
	    })
		->leftJoin('countries',function($cont){
		    $cont->on('countries.id_country','=','usuario.pais_empresa');
		})
	 	->where('usuario.id',$request->id)
	 	->get();

	 	$usuario2=Applied_Jobs::select()
	 	->join('usuario',function($usu){
	 		$usu->on('usuario.id','=','applied_jobs.id_user_employer');
	    })
		->leftJoin('countries',function($cont){
		    $cont->on('countries.id_country','=','usuario.pais');
		})
	 	->where('usuario.id',$request->id)
	 	->get();	 	
	 	

	 	$proyecto=Proyecto::where('proyecto.usuario',$request->id)
	 	->count();
	 	

	 	return response()->json(compact('usuario','proyecto','usuario2'));

	 }

	 public function proyecto_detalle(Request $request){


	 	$codigo = $request->codigo;
	 	$usuario = Auth::user()->id;

	 	$existencia = Applied_Jobs::where('id_user_employee',$usuario)
	 	                            ->where('id_project',$codigo)->get();
        


	 	if(count($existencia)> 0)
	 	{
	 		$enviar =Proyecto::select('proyecto.*','u.nombre_empresa','u.nombres','u.apellidos')
	 		                    ->join('usuario as u','u.id','=','proyecto.usuario')
	 		                    ->where('proyecto.id',$codigo)
	 		                    ->get();
	 	    //print_r($enviar."");exit();
	 		return response()->json(['tabla'=>$enviar]);
	 	}
	 	else
	 	{
	 		return response()->json(['tabla'=>0]);
	 	}



	 }


	 public function agregar_publicacion(Request $request ){

	 	$pro=$request->id31;

    	$archivo = $request->file('file');
    	// print_r($archivo);exit();
    	// $input  = array('file' => $archivo) ;
        $reglas = array('file' => 'mimes:doc,docx,pdf|max:50000');

        $validation = Validator::make($request->all(),$reglas);

		if($validation->fails())
		{
			//return Redirect::to('trabajos')->withErrors($validation);
			return response()->json(['xd' => 1]);
		}


        $ldate = date('Y-m-d H:i:s');
	    $publicacion= new Agreements;
	    $publicacion->affair =$request->input('asunto');
	 	$publicacion->agreement=$request->acuerdo;
	 	$publicacion->id_user_get=$request->id1;
	 	$publicacion->id_apply_job=$request->id2;
	 	$publicacion->id_user_set=Auth::user()->id; //usuario logeado
	 	$publicacion->date_agreement=$ldate;
	 	$publicacion->state_agreement=0;
	 	$publicacion->file_name=$request->file('file')->getClientOriginalName();

		$xd=$request->file('file')->store('doc');
		$publicacion->doc=trim($xd);
		$ver=$publicacion->save();


		$noti = new Notifications;
		$noti->destination = Trim($request->id1);
		$noti->type_notification = Trim("Acuerdo de Proyecto");
		$noti->author = Trim(Auth::user()->id);
		$noti->viewed = Trim(0);
		$noti->description = Trim("El freelancer ".Auth::user()->usuario." quiere llegar a un acuerdo para el proyecto ".$pro);
		$noti->date_done = Trim(date('Y-m-d'));
		$noti->url = Trim("trabajos");
		$noti->save();

//El freelancer Sediel30 modificÃ³ acuerdo para el proyecto Analista datascience
		$agreements=Agreements::select()
    	->where('agreements.id_apply_job',$request->id2)
    	->distinct()
    	->get();
		return response()->json(compact('ver','agreements'));
    }



    public function Modificar(Request $request){

    	// print_r($request->all());exit();
    	$id=$request->input('ide');
    	$asunto=$request->input('asunto');
    	$acuerdo=$request->input('acuerdo');
    	$nombre_file = $request->input('nombre');
    	$file=$request->file('file');

    	$reglas=array('file'=>'mimes:doc,docx,pdf|max:50000');
    	$validation=Validator::make($request->all(),$reglas);
    	if ($validation->fails())
    	 {
    		return response()->json(['xd2'=>1]);
    	}
    	// $file_ori=$request->file('file')->getClientOriginalName();

    	// print_r($file);exit();

    	$actual = Agreements::where('id_agreement',$id)
    	->get();
    	$doc = $actual[0]->doc;
    	// print($doc);exit();
    	if($file != null)
    	{
    	Storage::delete($doc);
    	$origi=$request->file('file')->getClientOriginalName();
    	$xd=$request->file('file')->store('doc');
		$nombre=$xd;

    	$modif=Agreements::where('id_agreement',$id)
    	->update(['affair'=>$asunto,
    			'agreement'=>$acuerdo,
    			'doc'=>$nombre,
    			'file_name'=>$origi]);
    	}
    	else{
    		$modif=Agreements::where('id_agreement',$id)
    	->update(['affair'=>$asunto,
    			'agreement'=>$acuerdo]);
    	}

    	///////////////------------	MOSTRAR EN LA TABLA -----------------///////////////////////

    	$agreements=Agreements::where('agreements.id_apply_job',$request->id2)
    	->distinct()
    	->get();


    	return response()->json(compact('agreements'));
    }


    public function Notif(Request $request){
    	// print_r("adsas");exit();
    	$var=1;
    	// $apli=$request->apli;
    	$id_agre=$request->id_agre;
    	// print_r($apli." ".$id_agre);exit();
    	$notif=Agreements::where('id_user_get',Auth::user()->id)
    	// ->where('id_apply_job',$apli)
    	->where('id_agreement',$id_agre)
    	->where('state_agreement','!=',1)
    	->update(['state_agreement'=>$var]);
          $notif2=Agreements::where('id_user_get',Auth::user()->id)
        ->select('id_user_set','a.id_project')
        ->join('applied_jobs as a','a.id_trabajo_aplicado','=','agreements.id_apply_job')
        ->where('id_agreement',$id_agre)
        ->first();
    	$u = $notif2->id_user_set;
        $ua = $notif2->id_project;
    	// print_r($notif2."");exit();
    	// print(Auth::user()->id);
    	// exit();
    	$noti = new Notifications;
                    $noti->destination = Trim($u);
                    $noti->type_notification = Trim("Acuerdo");
                    $noti->author = Trim(Auth::user()->id);
                    $noti->viewed = Trim(0);
                    $noti->description = Trim(Auth::user()->nommbres ." ".Auth::user()->apellidos." ha aceptado el acuerdo registrado");
                    //  [Nom_empleador]
                    $noti->date_done = Trim(date('Y-m-d'));
                    $noti->url = Trim("aspirantes/".$ua);
                    $noti->save();
    	// ->get();
    	return response()->json(['message'=>'Actualizo']);
    }





     public function Editar(Request $request){
	 	$es=$request->es;
	 	$prec=$request->prec;
        $tiem = trim($request->tiem);
        $tipo = trim($request->tipo);
	 	$formula = $prec + ($prec * 0.09);
         //print_r($prec);exit();
                     $u = Auth::user()->usuario==null || Auth::user()->usuario==""?Auth::user()->nombres." ".Auth::user()->apellidos:Auth::user()->usuario;

	 	$select1=Applied_Jobs::where('id_trabajo_aplicado',$es)->get();
	 	$me = "El colaborador ". $u.", ha actualizado";
	 	$v =0;
	 	if($prec!=$select1[0]->sinnueve){
	 	    $v+=1;
	 	}
	 	if($tiem!=$select1[0]->time_finish ||$tipo!=$select1[0]->type_time){
	 	    $v+=2;    
	 	}
	 	//print_r($v);exit();
	 	$edit=Applied_Jobs::where('id_trabajo_aplicado',$es)
	 	->update(['economic_proposal'=>round($formula,2),
	 	          'sinnueve'=>round($prec,2),
	 	          'time_finish'=>$tiem,
	 	          'type_time'=>$tipo
	 	          ]);
	    $select=Applied_Jobs::where('id_trabajo_aplicado',$es)->get();

        $usuario = $select[0]->id_user_employer;
        $proyecto = $select[0]->id_project;
        
        if($v==1){
            $me.=" la propuesta económica";
        }
        if($v==2){
            $me.=" el tiempo de entrega";
        }
        if($v==3){
            $me.=" la propuesta económica y el tiempo de entrega";
        }
        
        if($v>0){
            $no = new Notifications();
            $no->destination = $usuario;
            $no->type_notification = "Propuesta Actualizada";
            $no->author= Auth::user()->id;
            $no->viewed=0;
            $no->date_done =  Trim(date('Y-m-d'));
            $no->description = $me;
            $no->url = "aspirantes/".$proyecto;
            $no->save();  
        }
      
	 	return response()->json(['message'=>'Se Actualizo',
					             'select'=>$select
								]);
	 }

    public function show($doc){

    	$si = "";
    	$name = "";
    	  $xd = Agreements::where('id_agreement',$doc)->get();
    	 foreach ($xd as $value) {
    	 	$si = $value->doc;
    	 	$name = $value->file_name;
    	 }

    	 return Storage::download($si,$name);

    }
}
 ?>
