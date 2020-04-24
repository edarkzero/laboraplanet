<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Applied_Jobs;
use App\Notifications;
use Auth;
use DB;
use App\Mail\EnvioUsuarios;
use Illuminate\Support\Facades\Mail;





Class ProyectosController extends Controller{
	 public function index(Request $request){

		$id = Auth::user()->id;
		 $proyect=Proyecto::where('usuario',$id)
		 		 ->orderBy('id','desc')
				 ->get();
		 
		 
	 	return View('proyectos',compact('proyect'));
	 }



	 public function eliminarProyecto($id){
	 	
	 	$proyecto=Proyecto::find($id);
	 	$proyecto->delete();
	 	return response()->json(['message'=>'ok']);
	 }

	 public function aplicar( Proyecto $proyecto)
	 {
	 	return view('aplicar')->with('proyecto',$proyecto);
	 }


	 public function modalproyect(Request $request)
	 {
	 
	 	$cod = $request->cod;
		
		
		$verpostu = Applied_Jobs::where('id_project',$cod)->where('id_user_employer',Auth::user()->id)->get();

		$xd = count($verpostu);
		

		if($xd == 0)
		{
			$proyecto = Proyecto::where('id',$cod)->get();
			return response()->json(['dato'=>$proyecto]);
		}
		else
		{
			return response()->json(['dato'=>1]);
		}

	 	

	 }

	 public function updateproyect(Request $request)
	 {
		
      set_time_limit(9999999);
      ini_set('memory_limit','15000M');

		//CODIGO DE PROYECTO A ACTUALIZAR
	 	$codigo = $request->codigo;

	 	$titulo = $request->titulo;
	 	$descripcion = $request->descripcion;
	 	$categoria = $request->categoria;
	 	$tiempo = $request->tiempo;
	 	$tipo_tiempo = $request->tipo_tiempo;
	 	$conocimientos = $request->conocimientos;
	 	$propio_presupuesto = $request->propio_presupuesto;
	 	$complejidad = $request->complejidad;
	 	$aproximado = $request->aproximado;

	 	if($propio_presupuesto == "")
	 	{
	 		$propio_presupuesto=$aproximado;
	 		// echo $propio_presupuesto;
	 	}


	 	$update = Proyecto::where('id',$codigo)
	 					->update([
	 								'titulo'=>$titulo,
	 								'descripcion'=>$descripcion,
	 								'categoria'=>$categoria,
	 								'cantidad_tiempo'=>$tiempo,
	 								'tiempo_entrega'=>$tipo_tiempo,
	 								'habilidades'=>$conocimientos,
	 								'presupuesto'=>$propio_presupuesto,
	 								'complejidad'=>$complejidad,
	 								'estado'=>1,
	 								'calculo'=>$aproximado,
	 	
	 							]);

	 $new = Proyecto::where('id',$codigo)->get();		


  $usernot = DB::table('user_abilities')
            ->join('abilities','user_abilities.id_ability','=','abilities.id_ability')
            ->join('categories_ability','abilities.id_category','=','categories_ability.id_category')
            ->join('usuario','user_abilities.id_user','=','usuario.id')
            ->where('categories_ability.id_category',$categoria)
            ->where('user_abilities.id_user','<>',Auth::user()->id)
            ->distinct('user_abilities.id_user')
            ->select('usuario.usuario','usuario.correo','usuario.enviar','user_abilities.id_user')
            ->get();




		
 


    $titulo = $request->titulo;

    foreach ($usernot as $val)
    {

    $noti = new Notifications;
    $noti->destination = Trim($val->id_user);
    $noti->type_notification = Trim("Actualizacion");
    $noti->author = Trim(Auth::user()->id);
    $noti->viewed = Trim(0);
    $noti->titlep = $request->titulo;
    $noti->description = Trim("El usuario ".Auth::user()->usuario." ha editado el proyecto");
    $noti->date_done = Trim(date('Y-m-d'));
    $noti->url = Trim("aplicar/".$codigo);
    $noti->save();





            if($val->enviar == 1 || $val->enviar == '0')
            {
                   $objDemo = new \stdClass;
                   $objDemo->titulo = $titulo;
                   $objDemo->usuario = $val->usuario;
                   $objDemo->proyect = $codigo; 

                Mail::to($val->correo)->send(new EnvioUsuarios($objDemo));    
            }

           

    }
     

    	 	
	 		return response()->json(['dato'=>$new]);	



	 }

}


 ?>