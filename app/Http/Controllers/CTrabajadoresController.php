<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Categoria;
use App\Abilities;
use App\Usuarios;

Class CTrabajadoresController extends Controller{
	 public function index(Request $request){
	 	$va = $this->certificado();
	 	// $habi=$this->habilidadescla();
	 	$categoria=Categoria::select()->get();
	 	// $this->habilidades($request);
	 	// $proyect=Proyecto::paginate(10);  
	 	


// print_r($habi."");exit();
	 	return View('trabajadores_certificados',['categoria'=>$categoria,'va'=>$va]);
	 }

	 public function habilidades(Request $request){
	 	$habilidades=Abilities::select()
	 	->where('id_category',$request->categoria)
	 	->get();

	 	$certificado=Usuarios::select('usuario.nombres','usuario.perfil','usuario.id','user_categories.id_user','user_categories.id_category')
	 	->join('user_categories',function($cate){
	 		$cate->on('user_categories.id_user','=','usuario.id');
	 	})
	 	->where('user_categories.id_category',$request->categoria)
	 	->get();
	 	if($request->categoria==0){
	 		$certificado=$this->certificado();
	 	}

	 	return response()->json(['habilidades'=>$habilidades,'certificado'=>$certificado]);
	 	// print_r($habilidades."");exit();
	 	

	 }

	 public function certificado(){
	 	$certificad=Usuarios::select('usuario.nombres','usuario.perfil','usuario.id','user_categories.id_user','user_categories.id_category')
	 	->join('user_categories',function($cate){
	 		$cate->on('user_categories.id_user','=','usuario.id');
	 	})
	 	->get();
	 	return $certificad;

	 }

	 public function habilidadescla(Request $request){
	 	$habicla=Usuarios::select('usuario.nombres','usuario.perfil','usuario.id','user_abilities.id_user','user_abilities.id_ability')
	 	->join('user_abilities',function($abi){
	 		$abi->on('usuario.id','=','user_abilities.id_user');
	 	})
	 	->where('user_abilities.id_ability',$request->id_ability)
	 	->get();
	 	// return $habicla;
	 	return response()->json(['habicla'=>$habicla]);

	 }
}

 ?>