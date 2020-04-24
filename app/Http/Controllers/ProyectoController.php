<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Applied_Jobs;
use App\User;
use App\Abilities;
use Auth;
header('Content-Type: text/html; charset=UTF-8');

Class ProyectoController extends Controller{

		
	 public function index(Request $request){

	 	$name=$request->get('txtbusqueda');
	 	$precio = $request->get('presupuesto');
	 	$pais = $request->get('pais');
	 	$estado = $request->get('estado');
	 	// print_r($estado);exit();
	 	$categoria = $request->get('categoria');
	 	$tipo = $request->get('tipo_trabajo');
	 	// $descripcion=$request->get('txtbusqueda');
	 	//$proyect=Proyecto::orderBy('id','DES')->titulo($name)->paginate(5);
	 	if(Auth::check())
	 	{
		 	$usu = Auth::user()->id;
		 	// $proyect=Proyecto::where('usuario','!=',$usu)
		 	// 			   ->orderBy('urgente','DES')
		 	// 			   ->orderBy('id','DES')
		 	// 			   ->titulo($name,$precio,$pais,$estado,$categoria,$tipo)
		 	// 			   ->paginate(5);

		$proyect=Proyecto::from('proyecto as pr')
							->join('usuario as usu','usu.id','=','pr.usuario')
							->leftjoin('countries',function($cont){
								$cont->on('countries.id_country','=','pr.pais');
							})
							//->where('pr.usuario','!=',$usu)
							->where('usu.flag','=','1')
							->where('usu.baja','=','1')
		 				    ->orderBy('pr.urgente','DES')
		 				    ->orderBy('pr.id','DES')
		 				    ->select('pr.titulo','pr.urgente','usu.logo_empresa','usu.imagen','usu.nombre_empresa','usu.nombres','usu.apellidos','pr.descripcion','pr.habilidades','pr.estado','pr.presupuesto','pr.id','pr.fecha_publicacion','pr.presupuesto','pr.cantidad_tiempo','pr.tiempo_entrega','pr.pais','countries.*')
		 				    ->titulo($name,$precio,$pais,$estado,$categoria,$tipo)
		 				    ->paginate(5);						
						

	 	}
	 	else
	 	{

	 		$proyect=Proyecto::from('proyecto as pr')
	 						->join('usuario as usu','usu.id','=','pr.usuario')
	 						->leftjoin('countries',function($cont){
								$cont->on('countries.id_country','=','pr.pais');
							})		
	 						->where('usu.flag','=','1')
	 						->where('usu.baja','=','1')
	 						->orderBy('pr.urgente','DES')
	 						->orderBy('pr.id','DES')
	 						->select('pr.titulo','pr.urgente','usu.logo_empresa','usu.imagen','usu.nombre_empresa','usu.nombres','usu.apellidos','pr.descripcion','pr.habilidades','pr.estado','pr.presupuesto','pr.id','pr.fecha_publicacion','pr.cantidad_tiempo','pr.tiempo_entrega','pr.pais','countries.*')
	 						->titulo($name,$precio,$pais,$estado,$categoria,$tipo)
	 						->paginate(5);

	 	}

	 	if($request->ajax()){
	 		return response()->json(View('users',compact('proyect'))->render());
	 	}
	 	$hab = Abilities::where('id_category',$categoria)->get();

	 		// print_r($id."");exit();
	 	return View('buscar_trabajo',compact('proyect','hab'));
	 }
 
	 
}



?>