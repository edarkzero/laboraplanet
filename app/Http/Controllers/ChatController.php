<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Applied_Jobs;
use App\User;
use App\Contactos;
use App\Chat;
use App\Proyecto;
use App\Select_project;
use App\Mail\LaboChatInforma;
use Mail;
use App\Notifications;
use Auth;
use Storage;
use DB;

header('Content-Type: text/html; charset=UTF-8');


Class ChatController extends Controller
{

	public function listarchat()
	{	

      
		return view('lista_chat');					
		
	}
    
    	public function listar_trabajador()
	{
	/*	$trabajadores= User::select('nombres','apellidos','imagen','perfil','usuario.id','v','codigo_pais','precio_hora','usuario',
									DB::raw("1 as rol"),'v')
					->LeftJoin('countries as c','c.id_country','=','usuario.pais')
					->Leftjoin('chat as ch',function($j){
						$j->on('ch.id_usuario','=','usuario.id')
						  	->where('ch.id_contacto',Auth::user()->id)
						  	->where('ch.v',1);
					})
					->where('usuario.id','!=',Auth::user()->id)
					->LeftJoin('contactos as co',function($join){
						$join->on('co.id_contacto','=','usuario.id')
							 ->where('co.id_usuario',Auth::user()->id);
					})
					->leftJoin('plan_users as pl','usuario.id','=','pl.id_user')
					->whereNull('rol')
					->where('usuario.id',"!=","380")
					->orderby('id_plan','desc')
					->distinct()
					->get();
					// print_r($trabajadores."");exit();
		return view('listar_trabajador')->with('trabajadores',$trabajadores);*/
			$tr = Proyecto::select('categoria')->where('usuario',Auth::user()->id)->orderBy('id','desc')->first();
		$trabajadores= User::select('nombres','apellidos','imagen','perfil','usuario.id','v','codigo_pais','precio_hora','usuario',
									DB::raw("1 as rol"),'v','id_plan')
					->LeftJoin('countries as c','c.id_country','=','usuario.pais')
					->Leftjoin('chat as ch',function($j){
						$j->on('ch.id_usuario','=','usuario.id')
						  	->where('ch.id_contacto',Auth::user()->id)
						  	->where('ch.v',1);
					})
					->where('usuario.id','!=',Auth::user()->id)
					->LeftJoin('contactos as co',function($join){
						$join->on('co.id_contacto','=','usuario.id')
							 ->where('co.id_usuario',Auth::user()->id);
					})
					->leftJoin('plan_users as pl','usuario.id','=','pl.id_user')
					//->whereNull('rol')
					->where('usuario.id',"!=","380")
					->orderby('id_plan','desc')
					->distinct();
		$trabajadores2 =$trabajadores;
		      // print_r($trabajadores->get()."");exit();

		if ($tr) {
		//	$trabajadores->join('user_categories as uc','uc.id_user','=','usuario.id')
		//				->where('id_category',$tr->categoria);
		$trabajadores->join('user_abilities as ua','ua.id_user','=','usuario.id')
		             ->join('abilities as aa','aa.id_ability','=','ua.id_ability')
    				 ->where('aa.id_category',$tr->categoria);
       // print_r($trabajadores->get()."");exit();

		}
		$d = $trabajadores->get();
		if ($d) {
			$d = $trabajadores2->get();
		}
	    return view('listar_trabajador')->with('trabajadores',$d);
	}
    
	public function irchat(Request $request)
	{
		$mid = Auth::user()->id;
		$v = Contactos::where('id_usuario',$mid)
						->where('id_contacto',$request->id)
						->first();

		if ($v) {
		$User = User::find($request->id);
		$m = Chat::where('id_contacto',$mid)
					->where('id_usuario',$request->id)
					->where('v',1)
					->update(['v'=>0]);
		// print_r($m);exit();
		return view('chat')->with('id',$User);
		}else{
			return redirect('lista_chat');
		}
	}

	public function getchat(Request $request){
		  $proyecto = $request->proyecto;
		  
		
		  $id = $request->id;
		  $rol = $request->rol;
		$mo = Chat::where('id_contacto',Auth::user()->id)
					->where('file','notificacion')
					->where('id_usuario',$id)
					->where('v',1)
					->get();
		if (count($mo)>0) {
			foreach ($mo as $value) {
				$v = Notifications::find($value->file_name);
				$v->viewed = 1;
				$v->save();
			}
		}
		$select = 0;
		  // $ch = Contactos::where('id_usuario',Auth::user()->id)
		  // 				  ->where('id_contacto',$id)
		  // 				  ->first();
		  // if ($ch) {
		  // 	$selectpro = Select_project::where('id_contactos',$ch->id)->first();
		  // 	if ($selectpro) {
		  // 	$select = $selectpro->proyecto;
		  // 	}
		  // }
        Chat::where('id_contacto',Auth::user()->id)
					->where('id_usuario',$id)
					->where('v',1)
					->where('proyecto',$proyecto)
					->update(['v'=>0]);
					
	    Chat::where('id_contacto',Auth::user()->id)
				->where('id_usuario',$id)
				->where('v',2)
				->where('proyecto',$proyecto)
				->update(['v'=>3]);

     

		$trabajos=array();
		$mistrabajos= Applied_Jobs::where('id_user_employer',$id)
									->where('id_user_employee',Auth::user()->id)
									->whereNotIn('state_aplication',['6','4'])
									->join('proyecto as p','p.id','=','id_project')
									->select('id_project','titulo','economic_proposal','cantidad_tiempo','tiempo_entrega')
									->orderBy('id_trabajo_aplicado','desc')
									->get();
		if ($rol==1) {
			$trabajos = Proyecto::where('usuario',Auth::user()->id)
								  ->select('id as id_project','titulo','presupuesto as economic_proposal','cantidad_tiempo','tiempo_entrega')
								  ->orderBy('id','desc')
								  ->get();
		}else{
		$trabajos = Applied_Jobs::where('id_user_employer',Auth::user()->id)
								->where('id_user_employee',$id)
								->whereNotIn('state_aplication',['6','4'])
								->join('proyecto as p','p.id','=','id_project')
								->select('id_project','titulo','economic_proposal','time_finish as cantidad_tiempo','type_time as tiempo_entrega')
								->orderBy('id_trabajo_aplicado','desc')
								->get();
		}
		// print_r($trabajos."");exit;
		



		if (count($trabajos)>0) {
			$select = $trabajos[0]->id_project;
		}else{
			if (count($mistrabajos)>0) {
				$select = $mistrabajos[0]->id_project;
			}
		}
		  if ($proyecto!="") {
				$select = $proyecto;
		  }
        
        $chat = Chat::where(function($query) use ($id,$select){
            $query->where('id_usuario',Auth::user()->id)
                  ->where('id_contacto',$id)
                  ->where(function($query2) use ($select){
                      $query2->where('proyecto',$select);
                  });                  
        })->orWhere(function($query) use ($id,$select){
            $query->where('id_usuario',$id)
            	  ->where('id_contacto',Auth::user()->id)
                  ->where(function($query2) use ($select){
                      $query2->where('proyecto',$select);
                  });    
        })->get();	
        
        $envio[]= $chat;
        $envio[] = $trabajos;
        $envio[] = $mistrabajos;
        $envio[] = $select;
        return $envio;
	}
	public function sendchat(Request $request){

		$id = $request->id_contacto;
		$proyecto = $request->proyecto;
			Chat::where(function($query) use ($id){
				$query->whereIn('id_usuario',[$id])
						->whereIn('id_contacto',[Auth::user()->id]);
						// ->where('proyecto',$proyecto)
			})
			->update(['v'=>0]);
			Chat::where(function($query) use ($id){
				$query->whereIn('id_usuario',[Auth::user()->id])
						->whereIn('id_contacto',[$id]);
						// ->where('proyecto',$proyecto)
			})
			->update(['v'=>1]);
		// $f = date('Y-m-d H:i:s');
		// $f2 = strtotime('-5 hour',strtotime($f));
		// $d = date('Y-m-d H:i:s',$f2);
			$d =$request->fech;
			$verifi = User::where('id',$id)->where('activo',0)->first();
			if ($verifi) {
				
			}
			// print_r($proyecto);exit();
		if ($request->video==0) {
		    Chat::create([
	            'id_usuario'=>$request->id_usuario,
	            'id_contacto'=>$request->id_contacto,
	            'chat'=>$request->chat,
	            'v'=>'2',
				'fecha'=>$d,
				'proyecto'=>$proyecto
	        ]);
		}else{
			Chat::create([
				'id_usuario'=>$request->id_usuario,
				'id_contacto'=>$request->id_contacto,
				'chat'=>$request->chat,
				'file'=>'llamada',
				'v'=>'2',
				'fecha'=>$d,
				'proyecto'=>$proyecto
			]);
		}

		return $d;
		// return []M;
	}
	public function file_chat(Request $request){
		$r = "Archivo";
		// $f = date('Y-m-d H:i:s');
		// $f2 = strtotime('-5 hour',strtotime($f));
		// $d = date('Y-m-d H:i:s',$f2);
					$d =$request->fech;
					$proyecto = $request->proyecto;
		$v = Chat::create([
            'id_usuario'=>$request->id_usuario,
            'id_contacto'=>$request->id_contacto,
            'chat'=>$r,
            'v'=>'2',
            'file'=>$request->file('file')->store('chat'),
            'file_name'=>$request->file('file')->getClientOriginalName(),
			'fecha'=>$d
        ]);
		// echo $v->file.$v->file_name;
		return response()->json(['file'=>$v->file,'file_name'=>$v->file_name,'id'=>$v->id,'date'=>$d]);
		// print_r($request->file('file'));
		// echo "<br>".$v;
		// exit();	
	}
	
	public function descargar(Request $request){
		$id = Auth::user()->id;
		$v = Chat::where('id',$request->id)
				->where(function($query) use ($id){
					$query->orwhere('id_usuario',$id)
						->orWhere('id_contacto',$id);
				})
				->first();
				// print_r($v."");exit();
		if ($v) {
		return Storage::download(trim($v->file),trim($v->file_name));
		}else{
			return "Error";
		}
	
	
	}
	public function video_chat(Request $request){

		$id = $request->id;
		$c = Contactos::whereIn('id_usuario',[Auth::user()->id,$id])->whereIn('id_contacto',[$id,Auth::user()->id])->orderBy('id','desc')->first();
		// print_r($c->id."");exit();
		if ($c) {
			return view('video_chat')->with('u',$c);
		}else{
			return redirect('/');
		}
	}
	public function voz(Request $request){
		// print_r($request->audio_data);
		// echo "-------------";
		// print_r($_FILES);
		// print_r($request->all());
		$r = "voz";
		$proyecto = $request->proyecto;
		$idf = $request->friend;
		$id = Auth::user()->id;
		// $f = date('Y-m-d H:i:s');
		// $f2 = strtotime('-5 hour',strtotime($f));
		// $d = date('Y-m-d H:i:s',$f2);
		// print_r($request->all());exit();
					$d = $request->fech;

		$voz  = Chat::where('file','voz')->where('id_contacto',$idf)->where('id_usuario',$id)->count();
		$vv = md5($id.($voz+1).$idf);
		$output = "audio/audio_".$vv.".mp3"; 
		$input = $_FILES['audio_data']['tmp_name']; 
		move_uploaded_file($input, $output);
		// print_r("audio_".$vv.".mp3");
		$v = Chat::create([
            'id_usuario'=>Auth::user()->id,
            'id_contacto'=>$request->friend,
            'chat'=>$r,
            'v'=>'1',
            'file'=>'voz',
            'file_name'=>$vv,
			'fecha'=>$d,
			'proyecto'=>$proyecto
        ]);
		
		return response()->json(['file_name'=>$vv,'date'=>$d]);

		// return $d;
		// exit();
	}
	
	public function selecp(Request $request){
		$f = $request->id_f;
		$pp = $request->pro;
		$contac = Contactos::where('id_usuario',Auth::user()->id)->where('id_contacto',$f)->first();
		$cc = $contac->id;
		$v2 = Select_project::where('id_contactos',$cc)->first();
		if (!$v2) {
		    if($pp!=null || $pp!=00){
    		    $v = new Select_project();
			    $v->id_contactos = $cc;
			    $v->proyecto = $pp;
	    		$v->save();    
		    }
		}else{
			$v = Select_project::where('id_contactos',$cc)->update(['proyecto'=>$pp]);
		}
		return response()->json(['v'=>true]);
		// print_r( $request->id_f);
	}
	
	public function aplicar(){
		$f = date('Y-m-d H:i:s');
		$f2 = strtotime('-6 hour',strtotime($f));
		$d = date('Y-m-d H:i:s',$f2);
		$chat = Chat::where('file','notificacion')
					->where('fecha','>',$d)
					->where('id_contacto',Auth::user()->id)
					->where('v','1')
					->first();
			$detalles = 0;
		$mostrar =[];
		if ($chat) {
			$id = $chat->id_usuario;
			$mostrar =User::select('nombres','apellidos','id','imagen','perfil','precio_hora','usuario','co.codigo_pais',DB::raw("'1' as v"))
							->Leftjoin('countries as co','co.id_country','=','pais')
							->where('id',$id)
							->first();
		// print_r($mostrar."");exit();
		}
		return response()->json(['chat'=>$mostrar]);
	}
	
	public function aquixd($correo)
	{
	      $objDemo = new \stdClass();
          $objDemo->nombre_usuario = Auth::user()->usuario;
          $objDemo->contacto = Auth::user()->id;
    	  Mail::to($correo)->send(new LaboChatInforma($objDemo));
	}
}	