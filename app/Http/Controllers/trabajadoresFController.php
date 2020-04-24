<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Favorites;
use Auth;
use DB;
header('Content-Type: text/html; charset=UTF-8');

Class trabajadoresFController extends Controller{
// SELECT * FROM usuario INNER join plan_users on usuario.id= plan_users.id_user where id_plan!='1'

	public function index(){
		// $name=$request->get('txtbusqueda');
		$trabajadores=$this->usuarios();
		$favoritos = Favorites::select('id','nombres','perfil')
				->where('id_user',Auth::user()->id)
				->join('usuario','usuario.id','=','id_favorite')
				->get();
		// print_r($tr."");exit();
		return View('trabajadores_favoritos',['trabajadores'=>$trabajadores,'favoritos'=>$favoritos]);
	}
	public function agregar(Request $request){
// 		$con = $this->usuarios($request->id);

	    if (Auth::user()->id!=$request->id) {
			$ve = Favorites::where('id_user',Auth::user()->id)
							->where('id_favorite',$request->id)
							// ->where('id_favorite','!=',Auth::user()->id)
							->get();
			if (count($ve)==0) {
				$agregar  = new Favorites();
				$agregar->id_user= Auth::user()->id;
				$agregar->id_favorite=$request->id;
				$agregar->type_favorite=0;
				$en =$agregar->save();
			}else{
				$en ="existe";
			}
		}else{
			$en = "error";
		}
		
		
		return response()->json(['enviar'=>$en]);
	}
	public function eliminar(Request $request){
		$respuesta = Favorites::where('id_user',Auth::user()->id)->where('id_favorite',$request->id)->delete();
		return response()->json(['enviar'=>$respuesta]);
	}

	function usuarios($id =null){
		$en = User::join('plan_users','plan_users.id_user','=','id')->where('id_plan','!=','1');
		if ($id!=null) {
			$en->where('id_user',$id);
		}
		return $en->get();
	}
}




 ?>