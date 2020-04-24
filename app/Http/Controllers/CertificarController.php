<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plans;
use App\Categoria;
use App\Abilities;
use App\User_Abilities;
use App\Formats;
use App\Apply_format;
use Auth;
use App\Question_format;
use DB;

header('Content-Type: text/html; charset=UTF-8');
class CertificarController extends Controller 
{

	public function index()
	{
// 		$categoria =  Categoria::from('categories_ability as cat')
// 								->Leftjoin('user_categories as uc','uc.id_category','=','cat.id_category')
// 								->where('uc.id_user','=',Auth::user()->id)
// 								->get();
								
									$categoria = Categoria::from('categories_ability as ca')
								->leftJoin('user_categories as uc',function($query){
									$query->on('uc.id_category','=','ca.id_category')
										  ->on('uc.id_user','=',DB::raw(Auth::user()->id));
								})
								->get();
		$habilidad = User_Abilities::from('user_abilities as us')
					->select('f.id_format','a.*','ap.qualify','us.*','f.level_format')
					->where('us.id_user',Auth::user()->id)
					->join('abilities as a','a.id_ability','=','us.id_ability')
					->Leftjoin('apply_format as ap','ap.id_user','=','us.id_user')
					->Leftjoin('formats as f',function($query){
						$query->on('f.id_ability','=','us.id_ability');
						// $query->where('ap.id_user','=',Auth::user()->id);
						 $query->on('f.id_format','=','ap.id_format');
					})
					->orderBy('a.id_ability')
					->get();

		$fo = Formats::where('level_format','1')->get();
		for ($i=0; $i < count($habilidad); $i++) { 
			foreach ($fo as  $value) {
				if ($value->id_ability==$habilidad[$i]->id_ability && $habilidad[$i]->id_format==null) {
					$habilidad[$i]->id_format = $value->id_format;
				}
			}
		}
		// print_r($habilidad."");exit();

		return view('certificar',compact('categoria','habilidad'));
	}
	public function habilidad(Request $request){
		$habilidad = Abilities::where('id_category',$request->codigo)->get();
		return response()->json(['habilidad'=>$habilidad]);
	}


	public function eliminar(Request $request){
		$user = User_Abilities::where('id_user',Auth::user()->id)
				->where('id_ability',$request->codigo)
				->delete();
		return response()->json(['enviar'=>$user]);
	}

	public function irexamen(Request $request) 
	{	
		$id = Auth::user()->id;
		$abili = $request->id;

		$plasmar =  User_Abilities::from('user_abilities as ua')
					->join('abilities as a','a.id_ability','=','ua.id_ability')
					->join('categories_ability as ca','ca.id_category','=','a.id_category')
					->where('id_user',$id)
					->where('ua.id_ability',$abili)
					->with(['nota'=>function($query){
		              $query->join('formats as f','apply_format.id_format','=','f.id_format');
					}])
		            ->first();
		 // print_r($plasmar."");exit();
         $nivel=1;
		 if ($plasmar ) {
		 	if ($plasmar->nota) {
				$nivel = $plasmar->nota->level_format;
				if ($plasmar->nota->qualify==100) {
					$nivel+=1;
				}
		 	}
		 }else{
		 	return redirect('certificar');
		 }
         // print_r($plasmar->nota->qualify."");exit();
		 if ($nivel==4) {
		 	return redirect('certificar');
		 }else{
		 	$examen = Formats::where('id_ability',$abili)
		 			  ->with(['preguntas'=>function($query){
		 			  	$query->with('respuestas');
		 			  }])
		 			  ->where('level_format',$nivel)->first();
		 			  // print_r($examen."");exit();
		 	if ($examen) {

		 	}else{
		 		return redirect('certificar');
		 	}
		 }
		 return view('examen',compact('examen','plasmar'));
	}



	
	public function evaluar(Request $request)
	{
			$f = $request->ps[0]['formato'];
			$h = $request->ps[0]['habilidad'];
			$respu =$request->ps;
			unset($respu[0]); 
			// print_r($respu);exit();
		$verifica = 0;
		$porcentaje =0;
		if ($f!="" && $h!="") {
			$formato = Question_format::where('id_format',$f)
						->with(['respuestas'=>function($query){
							$query->where('answer','1');
						}])
						->get();
			$b = 0;
			$m = 0;
			foreach ($formato as $value) {
				foreach ($value->respuestas as $value2) {
						foreach ($respu as $value3) {
							if ($value3['p']==$value2->id_question) {
								if ($value3['r']==$value2->id_option_question) {
								++$b;
								break;
								}
							}
						}
					}
			}
			$porcentaje = round($b/count($formato)*100);
		
			$ver = Apply_format::where('id_user',Auth::user()->id)
				   ->join('formats as f','f.id_format','=','apply_format.id_format')
				   ->where('f.id_ability',$h)
				   ->first();
				// print_r($ver."");exit();	
			if ($ver) {
				$inten = (int) $ver->number_attemps;
				$ver->id_format = $f;
				$ver->number_attemps= $inten+1;
				$ver->qualify= $porcentaje;
				$verifica = $ver->save();
			// echo $porcentaje;exit();
			}else{
			$guardar = new Apply_format;
			$guardar->id_format=$f;
			$guardar->id_user =Auth::user()->id;
			$guardar->number_attemps = 1; 
			$guardar->qualify = $porcentaje;
			$guardar->certificate = 0;
			$verifica = $guardar->save();
			}
		}else{
			$verifica = 2;
		}
			return response()->json(['ver'=>$verifica,'nota'=>$porcentaje]);

	}

}



?>