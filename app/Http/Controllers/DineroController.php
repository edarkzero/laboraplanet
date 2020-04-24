<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\User;
use App\Country;
use Auth;
use DB;
use Validator;
use App\Accounts;
use App\Money_moves;
use DateTime;
use App\Mail\InformaLabora;
use Illuminate\Support\Facades\Mail;

Class DineroController extends Controller{



	public function generar_clave(Request $request)
	{
		$clave = $request->pass;
		$clave_c = $request->pass_validate;
		$correousu = Auth::user()->correo;

		if($clave <> $clave_c)
		{
			return view('logindni',['diferentes'=>'Las contrase���as no son iguales']);
		}
		else
		{	

	 	$up = User::where('id',Auth::user()->id)
	 			  ->update([
	 			  		'pass_dinero'=>bcrypt($clave),
	 			  		//'pass_simple_dinero'=>$clave,
	 			  		  ]);


    			 $objDemo = new \stdClass;
	 			$objDemo->correo = $correousu;
	 			$objDemo->variable = 'cs';
	 			

	 			Mail::to($correousu)->send(new InformaLabora($objDemo));    


    		return redirect(route('dinero'))->with('status','Clave Dinero generada, te hemos enviado un correo');

		}

	}






	 public function logindni(Request $request){


	 	if ($request->isMethod('post')) {
 
	 		$dni = $request->username;
	 		$usuario = Auth::user();
            $cl = $usuario->pass_dinero;
	 		$clave = $request->pass;
	 		$documen = $usuario->documento;
	 		$actividad = $usuario->actividad_dinero;
	 		$bloquear = explode(" ", $actividad);
	 		if (count($bloquear)==3) {
	 			$f = $bloquear[0]." ".$bloquear[1];
	 			$dateb = new DateTime($f);
	 			$date  = new DateTime();
	 			$dife=$date->diff($dateb);
	 			$b = $dife->format('%i');
	 			if ($b<=5 && $bloquear[2]==3) {
	 				return View('logindni',['error'=>'Cuenta Bloqueada Temporalmente']);
	 			}else{
	 				if ($b!=0) {
					$usuario->actividad_dinero=null;
					$usuario->save();
					$actividad = null;
	 				}
	 			}

	 		}
	 			if ($documen!=null && $documen==$dni && password_verify($clave,$cl)) {
		 	$movimientos = Money_moves::where('user_id',$usuario->id)
		 							->select(DB::raw('DATE_FORMAT(money_moves.date_move, "%d/%m/%Y") as datae'),'money_moves.*','u.nombres','u.apellidos','ap.state_aplication as estado')
		 							->leftJoin('usuario as u','u.id','=','id_contratado')

		 							->leftJoin('applied_jobs as ap',function($q){
		 								$q->on('ap.id_project','=','id_proyecto')
		 								  ->on('ap.id_user_employee','=','user_id');
		 							})
		 							// ->orWhere('id_contratado',$usuario->id)
		 							->get();
		 							
		 							$movimientos1 = Money_moves::where('id_contratado',$usuario->id)
					->select(DB::raw('DATE_FORMAT(money_moves.date_move, "%d/%m/%Y") as datae'),'money_moves.*','u.nombres','u.apellidos','ap.state_aplication as estado')
					->leftJoin('usuario as u','u.id','=','user_id')
					
					->leftJoin('applied_jobs as ap',function($q){
						$q->on('ap.id_project','=','id_proyecto')
						  ->on('ap.id_user_employer','=','user_id');
					})
					->where('estado',"6")
					->get();
		 			$pais = Country::all();
		 			$cuentas = Accounts::where('id_user',$usuario->id)
		 						->leftJoin('departaments as d','d.id_departament','=','accounts.city')
		 						->select(DB::raw('DATE_FORMAT(accounts.date_expitry, "%d/%m/%Y") as datae'),'accounts.*','d.*')->get();
		 			$usuario->actividad_dinero=null;
		 			$usuario->save();
		 	// 		print_r($movimientos1."");exit();
		 			return View('dinero',['pais'=>$pais,'cuentas'=>$cuentas,'movimientos'=>$movimientos,'movimientos1'=>$movimientos1]);
		 		}else{
		 			$date  = date("d-m-Y H:i:s");
		 			$i = 0;
		 			if ($actividad!=null) {
		 			$acti = explode(" ",$actividad);
		 	// 		print_r($acti);exit();
			 			if (count($acti)==3) {
			 				$i = $acti[2]+1;
			 				$usuario->actividad_dinero = $date." ".$i;
			 			}else{
			 				$i=1;
			 				$usuario->actividad_dinero= $date ." 1";	
			 			}
		 			}else{
		 				$i=1;
		 				$usuario->actividad_dinero = $date." 1"; 
		 			}
		 			$usuario->save();
		 			$a =3-$i;
		 			return View('logindni',['error'=>'Intentos disponibles '.$a,
		 			                        'texto'=>'Recuerde que para iniciar sesion, debe registrar su DNI en su perfil']);
		 		}

	 	}else{
	 		return View('logindni');
	 	}
	 }

	 public function cuentas(Request $request){
	 	$type_card = 2;
	 	if ($request->tipo==2 || $request->tipo==3) {
	 		$type_card = 1;
	 		// $request->date_expitry = '';
	 		// $request->code_security= '';
	 		// $request->address = '';
	 		// $request->country = '';
	 		// $request->city = '';
	 		// $request->code_postal = '';
	 		// $request->state_or_province = '';
	 		// $request->last_name_headline = '';
	 	}
	 	$accounts = new Accounts();
	 	$accounts->number_account = $request->number_account;
	 	$accounts->date_expitry = $request->date_expitry;
	 	$accounts->type_card = $type_card;
	 	$accounts->id_user = Auth::user()->id;
	 	$accounts->email = '';
	 	$accounts->type_card_bancaria=$request->type_card_bancaria;
	 	$accounts->code_security= $request->code_security;
	 	$accounts->address=$request->address;
	 	$accounts->country=$request->country;
	 	$accounts->city=$request->city;
	 	$accounts->name_headline=$request->name_headline;
	 	$accounts->last_name_headline= $request->last_name_headline;
	 	$accounts->state_or_province=$request->state_or_province;
	 	$accounts->code_postal =$request->code_postal;
	 	$e = $accounts->save();
	 	return response()->json(['respuesta'=>$e]);
	 	// print_r("sad");exit();
	 }
	 public function eliminar_m(Request $request){
	 	$accounts = Accounts::find($request->id);
	 	$env = $accounts->delete();
	 	return response()->json([$env]);
	 	// print_r();

	 }


}


 ?>