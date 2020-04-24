<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Notifications;
use App\Studies;
use App\Work_Experiences;
use App\User_Abilities;
use App\Applied_Jobs;
use App\Proyecto;
use App\Country;
use App\Contactos;
use App\Postal_codes;
use App\Categoria;
use App\Ratings;
use App\Apply_format;
use DB;
use Auth;
header('Content-Type: text/html; charset=UTF-8');
Class TrabajadoresController extends Controller{


	public function index(Request $request){
		$name=$request->get('txtbusqueda');
		$precio = $request->get('precio');
		$paiss = $request->get('paiss');

		$pais = Country::select('id_country','name_country')->orderby('name_country')->get();

		$traba=User::select('id','nombres','apellidos','pais','perfil','id','countries.*','imagen','nivel',
		'reconocimiento','fecha','precio_hora','unoconocimiento','dosconocimiento','tresconocimiento','id_plan')
		-> leftjoin('countries',function($cont){
				$cont->on('countries.id_country','=','usuario.pais');
		                })

                ->leftJoin('plan_users as pl','id','=','pl.id_user')
                ->orderby('id_plan','desc')
                ->where('usuario.baja','1')
                ->where('usuario.flag','1')
                //->where('id','!=',380)
                ->distinct()
                ->titulo($name,$precio,$paiss);
        $t = $traba->get();        
        $trabajadores = $traba->paginate(5);


        $d = ceil(count($t)/5);
        $trabajadores->editLastPage($d);
	  	if($request->ajax()){
	  		return response()->json(View('trabajadores_paginate',compact('trabajadores'))->render());
	  	}

//print_r($t."");exit();
		return View('trabajadores',compact('trabajadores'))->with('pais',$pais);exit();
	}

	public function emplear($id){

 		$trabajador = User::find($id);
 		$id_u = Auth::user()->id;
		if ($trabajador && $id!=$id_u) {
			$proyecto=Proyecto::select()
    			->where('usuario',$id_u)
    			->get();


    		$habilidad = User_Abilities::where('id_user',$id)
                  ->join('abilities as a','a.id_ability','=','user_abilities.id_ability')
                  ->orderby('a.id_category')
                  ->get();

			return View('emplear',compact('trabajador','habilidad','proyecto'));
		}else{
			return redirect()->route('trabajadores');
		}

	}

	 //  public function vertrabajador(Request $request)
  // {
  //   $codigo = $request->codigo;

  //   $usuario = User::where('id',$codigo)->get();

  //   $proyecto=Proyecto::where('usuario',$codigo)
  //   ->count();

  //    $aplicados=Applied_Jobs::where('id_user_employee',$codigo)
  //     ->count();

  //     $realizados=Applied_Jobs::where('state_aplication','=',6)
  //     ->where('id_user_employee',$codigo)
  //     ->count();


  //  	return response()->json([
  //  							  'tabla'=>$usuario,
  //  							  'proyectos'=>$proyecto,
  //  							  'aplicados'=>$aplicados,
  //  							  'realizados'=>$realizados,
  //  							]);

  // }

  public function verperfil(User $user)
  {

    $id =$user->id;

       require "init1.php";

      $urll = $linkedin->getAuthUrl();

     include("geoiploc/geoiploc.php");


    error_reporting(E_ALL & ~E_NOTICE);
    if (empty($_POST['checkip'])){
      $ip = $_SERVER["REMOTE_ADDR"];
    }
    else{
      $ip = $_POST['checkip'];
    }


   $llevaip = getCountryFromIP($ip, "code");



     $validacion =  User::with(['ability'=>function($query){
                      $query->join('abilities as a','a.id_ability','=','user_abilities.id_ability');
                    }])
                    ->where('id',$id)
                    ->first();
                  // foreach ($validacion->ability as $value) {
                  // print_r($value."");
                  // }
                  // exit();



    // $pais = Country::select('id_country','name_country')->orderby('name_country')->get();

    $paiss = Country::from('countries as co')
                    ->join('usuario as usu','usu.pais','=','co.id_country')
                    ->where('usu.id',$id)
                    ->get();

    $pais = $paiss[0]->id_country."-".$paiss[0]->name_country;


    $categoria = Categoria::all();

    $comen = Ratings::where('id_user_set',$id)->with('usuario')->orderBy('date_finish','DESC')->get();
    $certifi = Apply_format::where('id_user',$id)
            ->with(['habilidad'=>function($query){
              $query->join('abilities as a','a.id_ability','=','formats.id_ability');
            }])
            ->get();
        // print_r($certifi."");exit();
    $estudios = Studies::where('id_user',$id)
                  ->leftJoin('countries','countries.id_country','=' ,'country')
                  ->leftJoin('departaments','departaments.id_departament','=','city')->get();

    $experiencia = Work_Experiences::where('id_user',$id)
                  ->leftJoin('countries','countries.id_country','=' ,'country')
                  ->leftJoin('departaments','departaments.id_departament','=','city')->get();

    $habilidad = User_Abilities::where('id_user',$id)
                  ->join('abilities as a','a.id_ability','=','user_abilities.id_ability')
                  ->join('categories_ability as c','c.id_category','=','a.id_category')
                  ->orderby('c.id_category')
                  ->get();

    $usuarios=Applied_Jobs::where('id_user_employee',$id)
                  ->count();

    $cont=Applied_Jobs::where('state_aplication','=',6)
      ->where('id_user_employee',$id)
      ->count();

     //CONTEO DE RATING PARA EL EMPLEADOR

     $conteoratings = Ratings::where('id_user_set',$id)->where('qualification',5)->count();

      $conteoenviar = $conteoratings;

    $proyecto=Proyecto::where('usuario',$id)
              ->count();

    $noti = Notifications::where('destination',$id)->get();
    $postal = Postal_codes::orderby('code_postal')->get();
    // print_r($postal."");exit();

    // return view('perfil',['pais'=>$pais,'categoria'=>$categoria,'estudios'=>$estudios,'experiencia'=>$experiencia,'noti'=>$noti,'habilidad'=>$habilidad,'usuarios'=>$usuarios,'proyecto'=>$proyecto,'cont'=>$cont,'postal'=>$postal,'comen'=>$comen,'conteoenviar'=>$conteoenviar] );
    return view('verperfil',compact('user','pais','categoria','estudios','experiencia','noti','habilidad','usuarios','proyecto','cont','postal','comen','conteoenviar','certifi','llevaip','urll'));

  }

  public function agregar_t(Request $request){
  	$id_t = $request->id_usuario;


          //PARA LA TABLA CONTACTOS AL CONTRATAR
          $id_usuario = Auth::user()->id;
          $id_contacto = $id_t;

          $validar = Contactos::where('id_usuario',$id_usuario)->where('id_contacto',$id_contacto)->get();

          $ahora = count($validar);

          if($ahora == 1)
          {

          }
          else
          {
          $contacto = new Contactos();
          $contacto->id_usuario = $id_usuario;
          $contacto->id_contacto = $id_contacto;
          $contacto->save();
           $contacto = new Contactos();
          $contacto->id_usuario = $id_contacto;
          $contacto->id_contacto = $id_usuario;
          $contacto->save();
          }


          //FIN



  	$verificar = Proyecto::where('id',$request->id_p)->where('usuario',Auth::user()->id)->first();
  	$usuario = User::find($id_t);

  	$mensaje = 0;
  	if ($verificar && $usuario->exists && is_numeric($request->precioa)) {
  		$ver = Applied_Jobs::where('id_user_employee',$id_t)->where('id_project',$request->id_p);
  		if ($ver->exists()) {
  			$mensaje = 2;
  		}else{
  			if ($id_t!=Auth::user()->id) {
	  			$data = date('Y-m-d');
			  	$aplicar = new Applied_Jobs();
			  	$aplicar->id_project = $request->id_p;
			  	$aplicar->id_user_employee = $id_t;
			  	$aplicar->id_user_employer= Auth::user()->id;
			  	$aplicar->state_aplication = '1';
			  	$aplicar->date_contract=$data;
          $aplicar->economic_proposal = $request->precioa;
          $aplicar->time_finish =  $verificar->cantidad_tiempo;
          $aplicar->type_time = $verificar->tiempo_entrega;
	  			$mensaje=$aplicar->save();


	  			if ($mensaje) {
	  				$notificacion = new Notifications();
            		$notificacion->description = 'El cliente '.Auth::user()->nombres." ".Auth::user()->apellidos.' lo ha contratado para el proyecto titulo.';
            		$notificacion->destination = $id_t;
            		$notificacion->author = Auth::user()->id;
            		$notificacion->type_notification = 'Proyecto';
            		$notificacion->date_done= date('Y-m-d');
            		$notificacion->viewed = 0;
            		$notificacion->id_job_apply = $aplicar->id_trabajo_aplicado;
            		$notificacion->url ="trabajos";

            		$notificacion->save();
	  			}


  			}else{
  				$mensaje=3;
  			}
  		}
  	}
  	return response()->json(['mensaje'=>$mensaje]);
  }

  public function agregar_contacto(Request $request){
    $id = Auth::user()->id;
    $contac = $request->id;
    $v=0;
    if ($contac!=$id) {
      // Taranjit2019
      $us = User::where('id',$contac)
                  ->select('id','apellidos','nombres','imagen','c.codigo_pais','perfil')
                  ->join('countries as c','c.id_country','=','pais')
                  ->first();
      if ($us) {
        $v=1;
        $validar = Contactos::where('id_usuario',$id)->where('id_contacto',$contac)->first();
        $validar1 = Contactos::where('id_contacto',$id)->where('id_usuario',$contac)->first();
        if(!$validar){
          $contacto = new Contactos;
          $contacto->id_usuario = $id;
          $contacto->id_contacto = $contac;
          $contacto->rol =1;
          $contacto->save();
          $v =2;
        }
        if(!$validar1){
          $contacto = new Contactos;
          $contacto->id_usuario = $contac;
          $contacto->id_contacto = $id;
          $contacto->rol =0;
          $contacto->save();
          $v=2;
        }
      }
    }else{
        $v=3;
    }
    $array = [
      'v'=>$v
    ];
    if ($v==2) {
      $array['us']=$us;
    }
    return response()->json($array);
  }

     public function postular(Request $request)
  {
    $id = Auth::user()->id;
    $pr = $request->proyecto;
    $p = Proyecto::find($pr);
    $user_c = $request->id;
    $d = User::find($user_c);
    if ($p && $id !=$user_c && $d) {
      $v = Applied_Jobs::where('id_user_employee',$user_c)
                        ->where('id_user_employer',$id)
                        ->where('id_project',$pr)
                        // ->whereIn('state_aplication',['1'])
                        ->first();

        $validar = Contactos::where('id_usuario',$id)->where('id_contacto',$user_c)->first();
        $validar1 = Contactos::where('id_contacto',$id)->where('id_usuario',$user_c)->first();
        if(!$validar){
            $contacto = new Contactos;
            $contacto->id_usuario = $id;
            $contacto->id_contacto = $user_c;
            $contacto->rol =1;
            $contacto->save();

        }
        if(!$validar1){
            $contacto = new Contactos;
            $contacto->id_usuario = $user_c;
            $contacto->id_contacto = $id;
            $contacto->rol =0;
            $contacto->save();

        }
        if (!$v) {
          $proyect= $pr;
          $employee = $user_c;
          $employer = Auth::user()->id;
          $present = "";
          $money = $request->precio;
          $type = $p->tiempo_entrega;
          $time = $p->cantidad_tiempo;
          $aplipro = new Applied_Jobs;
          $aplipro->id_project = trim($proyect);
          $calcula = $money + ($money * 0.098);
          $aplipro->id_user_employee = Trim($employee);
          $aplipro->id_user_employer = Trim($employer);
          $aplipro->state_aplication = '1';
          $aplipro->presentation = Trim($present);
          $aplipro->economic_proposal = Trim($calcula);
          $aplipro->time_finish = Trim($time);
          $aplipro->type_time = Trim($type);
          $aplipro->date_contract  = Trim(date('Y-m-d'));
          $aplipro->save();

            // $noti = new Notifications;
            // $noti->destination = Trim($employee);
            // $noti->type_notification = Trim("Encuenta");
            // $noti->author = Trim(Auth::user()->id);
            // $noti->viewed = Trim(0);
            // $noti->description = Trim("El usuario ".Auth::user()->nombres." ".Auth::user()->apellidos." vio tu perfil y te tomo encuenta para el proyecto '".$p->titulo."'");
            // //  [Nom_empleador]
            // $noti->date_done = Trim(date('Y-m-d'));
            // $noti->url = Trim("#");
            // $noti->save();

          return response()->json(['v'=>'2']);
        }else{
          return response()->json(['v'=>'1']);
        }

    }
              return response()->json(['v'=>'0']);
  }



}




 ?>
