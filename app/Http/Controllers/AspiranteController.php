<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Applied_Jobs;

use App\Abilities;
use App\Agreements;
use DB;
use App\User;
use Auth;
use Storage;
use Validator;
use Redirect;
use App\Ratings;
use App\User_Abilities;
use App\Work_Experiences;
use App\Studies;

header('Content-Type: text/html; charset=UTF-8');
Class AspiranteController extends Controller{

	public function index($id){

	 	$usu=Auth::user()->id;
	 	$aspirant=Applied_Jobs::select('proyecto.estado as estad','proyecto.*','applied_jobs.*','usuario.*')
	 	->join('proyecto',function($proy){
	 		$proy->on('proyecto.id','=','applied_jobs.id_project');
	 	})
	 	->join('usuario',function($usu){
	 		$usu->on('usuario.id','=','applied_jobs.id_user_employee');
	 	})
	 	->where('id_user_employer',$usu)
	 	->where('id_project',$id)
	 	->get();
	 	 //print_r($aspirant."");exit();
	 	return View('aspirantes',compact('aspirant','id'));
	}

	public function eliminarProyecto_aspi($id){
	 	// print_r($id);exit();
	 	$proyecto=Applied_Jobs::find($id);
	 	$proyecto->delete();
	 	return response()->json(['message'=>'ok']);
	}


	public function aspirante_usuario(Request $request){

        $consulta = Applied_Jobs::where('id_user_employee',$request->id)
                                ->where('id_project',$request->id_p)
                                ->get();


        $comparar = $consulta[0]->state_aplication;


        if($comparar == 1 || $comparar == 2 || $comparar == 3)
        {

    $update  = Applied_Jobs::where('id_user_employee',$request->id)
                               ->where('id_project',$request->id_p)
                               ->update([
                                        'state_aplication'=>3,
                                        ]);


                    $update2 = Proyecto::where('id',$request->id_p)
                            ->update([
                                      'estado'=>3
                                    ]);


				$experiencia = Work_Experiences::from('work_experiences as we')
													->join('countries as co','we.country','=','co.id_country')
													->join('departaments as de','we.city','=','de.id_departament')
													->where('we.id_user',$request->id)->get();

				$educacion = Studies::from('studies as stu')
													->join('countries as co','stu.country','=','co.id_country')
													->join('departaments as de','stu.city','=','de.id_departament')
													->where('id_user',$request->id)->get();


        $propuest=Applied_Jobs::where('id_user_employee',$request->id)
        ->where('id_project',$request->id_p)
        ->get();



       	$usuario=Applied_Jobs::
	 	    select('usuario','perfil','imagen','telefono','correo','nombres','apellidos','fecha','reconocimiento','usuario.id','nivel','urllinkedin','unosubcategoria','unoconocimiento','dossubcategoria','dosconocimiento','tressubcategoria','tresconocimiento','name_country','pais','codigo_pais','precio_hora')
	 	->join('usuario',function($usu){
	 		$usu->on('usuario.id','=','applied_jobs.id_user_employee');
	 	})
	 	->leftJoin('countries as c','c.id_country','=','pais')
	 	->where('usuario.id',$request->id)
	 	->where('applied_jobs.id_project',$request->id_p)
	 	->get();


$comen = Ratings::where('id_user_set',$request->id)->with('usuario')->orderBy('date_finish','DESC')->get();

        $proyecto=Proyecto::where('proyecto.usuario',$request->id)
        // ->where('proyecto.correo',Auth::user()->correo)
        ->get();


        $proyecto2 = Proyecto::where('id',$request->id_p)->get();


        $habilidades = User_Abilities::from('user_abilities as us')
                      ->select('a.*','us.id_user','f.level_format','us.id_ability')
                      ->where('us.id_user',$request->id)
                      ->join('abilities as a','a.id_ability','=','us.id_ability')
                      ->join('apply_format as ap','ap.id_user','=','us.id_user')
                      ->join('formats as f',function($query){
                        $query->on('f.id_ability','=','us.id_ability');
                        // $query->where('ap.id_user','=',Auth::user()->id);
                         $query->on('f.id_format','=','ap.id_format');
                      })
                      ->orderBy('us.id_ability')
                      ->distinct()
                      ->get();

        $agreements=Agreements::select()
        ->where('agreements.id_apply_job',$request->id)
        ->distinct()
        ->get();

         $parajs = 1;

        return response()->json(compact('usuario','proyecto','habilidades','agreements','propuest','proyecto2','comen','experiencia','educacion','parajs'));



        }
        else
        {

        $propuest=Applied_Jobs::where('id_user_employee',$request->id)
        ->where('id_project',$request->id_p)
        ->get();


        	$usuario=Applied_Jobs::select('usuario','perfil','imagen','telefono','correo','nombres','apellidos','fecha','reconocimiento','usuario.id','nivel','urllinkedin','unosubcategoria','unoconocimiento','dossubcategoria','dosconocimiento','tressubcategoria','tresconocimiento','pais')
						 	->join('usuario',function($usu){
	 		                        $usu->on('usuario.id','=','applied_jobs.id_user_employee');
	 	                                  })
	 	                            ->where('usuario.id',$request->id)
	 	                            ->where('applied_jobs.id_project',$request->id_p)
	 	                            ->get();


$comen = Ratings::where('id_user_set',$request->id)->with('usuario')->orderBy('date_finish','DESC')->get();

        $proyecto=Proyecto::where('proyecto.usuario',$request->id)
        // ->where('proyecto.correo',Auth::user()->correo)
        ->get();

				$experiencia = Work_Experiences::where('id_user',$request->id)->get();

				$educacion = Studies::where('id_user',$request->id)->get();
        $proyecto2 = Proyecto::where('id',$request->id_p)->get();

        $habilidades = User_Abilities::from('user_abilities as us')
                      ->select('a.*','us.id_user','f.level_format')
                      ->where('us.id_user',$request->id)
                      ->join('abilities as a','a.id_ability','=','us.id_ability')
                      ->Leftjoin('apply_format as ap','ap.id_user','=','us.id_user')
                      ->Leftjoin('formats as f',function($query){
                        $query->on('f.id_ability','=','us.id_ability');
                        // $query->where('ap.id_user','=',Auth::user()->id);
                         $query->on('f.id_format','=','ap.id_format');
                      })
                      ->orderBy('us.id_ability')
                      ->distinct()
                      ->get();

        $agreements=Agreements::select()
        ->where('agreements.id_apply_job',$request->id)
        ->distinct()
        ->get();


            $parajs = 0;

return response()->json(compact('usuario','proyecto','habilidades','agreements','propuest','proyecto2','comen','experiencia','educacion','parajs'));
        }


	}

 	public function aspirante_detalle(Request $request){

	 	$proyec=Proyecto::from('proyecto as pr')->select('pr.descripcion','pr.fecha_publicacion','pr.estado','pr.titulo','pr.habilidades','pr.presupuesto','usu.nombres','usu.apellidos','usu.nombre_empresa','pr.cantidad_tiempo','pr.tiempo_entrega','pr.tipo_proyecto')
									->join('usuario as usu','usu.id','=','pr.usuario')
									->where('pr.id',$request->id)->get();

        //print_r($proyec);exit();
	 	return response()->json(compact('proyec'));
	 }




	 public function propuesta_detalle(Request $request){

        $consulta = Applied_Jobs::where('id_project',$request->id2)
                                ->where('id_trabajo_aplicado',$request->id)
                                ->get();

        $comparar = $consulta[0]->state_aplication;



        if($comparar==1 || $comparar==2)
        {
        $update  = Applied_Jobs::where('id_project',$request->id2)
                               ->where('id_trabajo_aplicado',$request->id)
                               ->update([
                                        'state_aplication'=>2,
                                        ]);


        $propuest=Applied_Jobs::where('id_project',$request->id2)
        ->where('id_trabajo_aplicado',$request->id)
        ->get();

            $parajs = 1;
            return response()->json(compact('propuest','parajs'));
        }
        else
        {

        $propuest=Applied_Jobs::where('id_project',$request->id2)
        ->where('id_trabajo_aplicado',$request->id)
        ->get();

            $parajs = 0;

            return response()->json(compact('propuest','parajs'));
        }







	}


	public function publicacion_aspirante(Request $request ){

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
	 	$publicacion->id_user_get=$request->usua;
	 	$publicacion->id_apply_job=$request->id1;
	 	$publicacion->id_user_set=Auth::user()->id; //usuario logeado
	 	$publicacion->date_agreement=$ldate;
	 	$publicacion->state_agreement=0;
	 	$publicacion->file_name=$request->file('file')->getClientOriginalName();
		$xd=$request->file('file')->store('doc');
		$publicacion->doc=trim($xd);
		$ver=$publicacion->save();


		// $noti = new Notifications;
		// $noti->destination = Trim($request->id1);
		// $noti->type_notification = Trim("Acuerdo de Proyecto");
		// $noti->author = Trim(Auth::user()->id);
		// $noti->viewed = Trim(0);
		// $noti->description = Trim("El freelancer ".Auth::user()->usuario." quiere llegar a un acuerdo para el proyecto ".$pro);
		// $noti->date_done = Trim(date('Y-m-d'));
		// $noti->url = Trim("trabajos");
		// $noti->save();

//El freelancer Sediel30 quiere llegar a un acuerdo para el proyecto Analista datascience
//El freelancer Sediel30 modificÃ³ acuerdo para el proyecto Analista datascience

		$agreements=Agreements::select()
    	->where('agreements.id_apply_job',$request->id1)
    	->distinct()
    	->get();
		return response()->json(compact('ver','agreements'));
    }

    public function Notif_aspi(Request $request){
    	// print_r($request->id1);exit();
    	$var=1;
    	// $apli=$request->apli;
    	$id_agre=$request->id_agre;
    	// print_r($apli." ".$id_agre);exit();
    	$notif=Agreements::where('id_user_get',Auth::user()->id)
    	// ->where('id_apply_job',$apli)
    	->where('id_agreement',$id_agre)
    	->where('state_agreement','!=',1)
    	->update(['state_agreement'=>$var]);
    	// ->get();
    	return response()->json(['message'=>'Actualizo']);
    }
    public function Modificar_aspi(Request $request){

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

    	$agreements=Agreements::where('agreements.id_apply_job',$request->id1)
    	->distinct()
    	->get();


    	return response()->json(compact('agreements'));
    }

    public function modalaspirante(Request $request)
    {
    	$xd = $request->codigo;



    $modal = DB::table('applied_jobs')
    		->join('usuario','applied_jobs.id_user_employee','=','usuario.id')
    		->join('proyecto','applied_jobs.id_project','=','proyecto.id')
    		->where('applied_jobs.id_trabajo_aplicado',$xd)
    		->select('proyecto.titulo','usuario.usuario','applied_jobs.economic_proposal')
    		->get();
    	//print_r($xd);exit();

    	return response()->json(['dato' => $modal]);
    }


    public function modalliberarfondos(Request $request)
    {
        $xd = $request->codigo;



    $modal = DB::table('applied_jobs')
            ->join('usuario','applied_jobs.id_user_employee','=','usuario.id')
            ->join('proyecto','applied_jobs.id_project','=','proyecto.id')
            ->where('applied_jobs.id_trabajo_aplicado',$xd)
            ->select('proyecto.titulo','usuario.usuario','applied_jobs.economic_proposal')
            ->get();

        return response()->json(['dato'=>$modal]);


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
    public function descar($doc){
    	$si="";
    	$name="";
    	$des=Applied_Jobs::where('id_trabajo_aplicado',$doc)->get();
    	foreach ($des as $value) {
    		$si=$value->document;
    		$name=$value->file_name;
    	}
    	return Storage::download($si,$name);
    }

    public function guardarc(Request $request)
    {
      $id = Auth::user()->id;
        $proy = Applied_Jobs::where('id_project',$request->proyecto)
                            ->where('id_user_employer',$id)
                            ->where('id_user_employee',$request->usuario)
                            ->where('state_aplication','!=','6')
                            ->first();
        // print_r($proy."");exit();
                            $mensaje = 0;
        if ($proy) {
        $g = new Ratings();
        $g->qualification = $request->califica;
        $g->commit_finish = $request->comentario;
        $g->date_finish = date('Y-m-d');
        $g->id_user = $id;
        $g->id_user_set = $request->usuario;
        $mensaje = $g->save();
        $proy->state_aplication = 6;
        $proy->save();
        $cont=Applied_Jobs::where('state_aplication','=',6)->where('id_user_employee',$request->usuario)
                ->count();
      $conteoenviar= Ratings::where('id_user_set',$request->usuario)->where('qualification',5)->count();
        $up =0;
  if($conteoenviar >=5 && $conteoenviar <=9)
  {$up =1;}
  if($conteoenviar >=10 && $conteoenviar <=14)
   {$up =2;}
   if($conteoenviar >=15 && $conteoenviar <=19)
   {$up =3;}
   if($conteoenviar >= 20 && $conteoenviar <=24)
   {$up =4;}
   if($conteoenviar >=25  && $conteoenviar <=29)
   {$up =5;}
   if($conteoenviar >=30 && $conteoenviar <=34)
   {$up =6;}
   if($conteoenviar >= 35)
   {$up =7;}
$numerolevel =1;
    if($cont == 2)
    {
      $numerolevel = 2;
    }
    if($cont == 3)
    {
      $numerolevel =3;
    }

    if($cont >=4 && $cont <=6)
    {
      $numerolevel = 4;
    }
    if($cont >=7 && $cont <=9)
    {
      $numerolevel = 5;
    }
    if($cont >=10)
    {
      $numerolevel = 6;
    }
    // if ($up!=0) {
        $u = User::find($request->usuario);
        $u->reconocimiento = $up;
        $u->nivel =$numerolevel;
        $u->save();
    // }

        }
        return response()->json(['mensaje'=>$mensaje]);
    }


}

 ?>
