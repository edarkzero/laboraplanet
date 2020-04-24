<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Proyecto;
use App\Country;
use App\Departaments;
use App\Categoria;
use App\Studies;
use App\Work_Experiences;
use App\Notifications;
use App\Abilities;
use App\Conocimientos;
use App\User_conoci;
use App\User_Categories;
use App\User_Abilities;
use App\Applied_Jobs;
use App\Ratings;
use App\Postal_codes;
use App\Sugerencias;
use App\Apply_format;
use App\Certifi_user;
use Storage;
use Validator;
use Input;
use Image;
use File;
use App\Mail\InvitarAmigo;
use App\Mail\ValidarCorreo;
use App\Mail\EnviarDatosEmpleador;
use App\Mail\UsuarioSocial;
use App\Mail\EnviarDatosTrabajador;
use Illuminate\Support\Facades\Mail;

header('Content-Type: text/html; charset=UTF-8');




class UserController extends Controller {





  public function index(){
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
                    ->where('id',Auth::user()->id)
                    ->first();
                  // foreach ($validacion->ability as $value) {
                  // print_r($value."");
                  // }
                  // exit();



    $pais = Country::select('id_country','name_country')->orderby('name_country')->get();
    $categoria = Categoria::all();
    $id = Auth::user()->id;
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

     $conteoratings = Ratings::where('id_user_set',Auth::user()->id)->where('qualification',5)->count();

      $conteoenviar = $conteoratings;

    $proyecto=Proyecto::where('usuario',$id)
              ->count();

    $noti = Notifications::where('destination',$id)->get();
    $postal = Postal_codes::orderby('code_postal')->get();
    // print_r($postal."");exit();
    
    
    $certificados = Certifi_user::from('certifi_user as cu')
                                ->join('patroc_certif as pc','pc.id_patroc',"=",'cu.id_patroc')
                                ->where('id',Auth::user()->id)->get();

    // return view('perfil',['pais'=>$pais,'categoria'=>$categoria,'estudios'=>$estudios,'experiencia'=>$experiencia,'noti'=>$noti,'habilidad'=>$habilidad,'usuarios'=>$usuarios,'proyecto'=>$proyecto,'cont'=>$cont,'postal'=>$postal,'comen'=>$comen,'conteoenviar'=>$conteoenviar] );
    return view('perfil',compact('pais','categoria','estudios','experiencia','noti','habilidad','usuarios','proyecto','cont','postal','comen','conteoenviar','certifi','llevaip','urll','certificados'));




  }


  public function traecono(Request $request)
  {
    $xd = $request->xd;

    $consulta = Conocimientos::where('id_ability',$xd)->where('flag',1)->get();


    return response()->json(['message'=>$consulta]);

  }


  public function conocimiento(Request $request)
  {
     $subcalleva = $request->subcalleva;

     $catelleva = $request->catelleva;

     $tags = $request->tags;

    $categoria = 0;

     if($catelleva == "Desarrollo web y aplicaciones m�1�7�1�7viles")
     {
       $categoria = 1;
     }

     if($catelleva == "Dise�1�70�1�79o,creatividad y arte")
    {
      $categoria = 2;
    }

     if($catelleva == "Infraestructura tecnologica")
    {
      $categoria = 3;
    }

     if($catelleva == "Escritura de textos")
    {
      $categoria = 4;
    }


     if($catelleva == "Traduccion")
    {
      $categoria = 5;
    }


     if($catelleva == "Ingenieria y arquitectura")
    {
      $categoria = 6;
    }


     if($catelleva == "Temas legales")
    {
      $categoria = 7;
    }

      if($catelleva == "Analytics, BI y Datascience")
    {
      $categoria = 8;
    }



      if($catelleva == "Soporte administrativo")
    {
      $categoria = 9;
    }


      if($catelleva == "Contabilidad y economica")
    {
      $categoria = 10;
    }


      if($catelleva == "Psicologia")
    {
      $categoria = 11;
    }


      if($catelleva == "Ventas y marketing")
    {
      $categoria = 12;
    }


    $xd = str_replace("&amp;","&",$subcalleva);

    $validara = Abilities::select('id_ability')->where('ability','like', "%".$xd."%")->first();


    if($validara){
    $ff = new User_abilities();
    $ff->id_user= Auth::user()->id;
    $ff->id_ability= $validara->id_ability;
    $ff->save();
    }


    // ESTO ES PARA CAPTURAR EL ULTIMO CARACTER DE UNA CADENA.
    //$xddd = substr($tags,-1);

     $sep = explode(",",$tags);

     foreach ($sep as $key ) {
       $xdd = substr($key, -1);

       if($xdd == ".")
       {

       }
       else
       {

          $xddd = Conocimientos::where('descripcion','LIKE',trim($key).".")->get();

         if (count($xddd)>0) {
           $buscarco = Conocimientos::from('conocimientos as cono')
                                    ->join('abilities as abi','cono.id_ability','=','abi.id_ability')
                                    ->where('cono.descripcion',trim($key).".")
                                    ->get();

           // echo $buscarco;
           //El conocimiento que estas tratando de ingresar se encuentra en la subcategor�1�7�1�7a XX"
            return response()->json(['message'=>5,
                                     'texto'=>'El conocimiento'.' '.$buscarco[0]->descripcion. ' ' .'que estas tratando de ingresar se encuentra en la subcategoria'. ' ' .$buscarco[0]->ability]);
         } 
         
/*else {
           $insertar = new Conocimientos;
           $insertar->id_ability = $validara->id_ability;
           $insertar->descripcion = $key.".";
           $insertar->flag = 0;
           $insertar->save();
         }*/


       }


     }
     
     
        foreach ($sep as $key2 ) {
      $xdd = substr($key2, -1);

      if($xdd == ".")
      {
        $buscono = Conocimientos::where('descripcion',trim($key2))->select('idconocimiento','id_ability')->get();


        $g1 = New User_conoci;
        $g1->id = Auth::user()->id;
        $g1->id_ability = $buscono[0]->id_ability;
        $g1->idconocimiento = $buscono[0]->idconocimiento;
        $g1->save();

      }
      else
      {

        $insertar = new Conocimientos;
         $insertar->id_ability = $validara->id_ability;
         $insertar->descripcion = $key2.".";
         $insertar->flag = 0;
         $insertar->save();


         $g2 = New User_conoci;
         $g2->id = Auth::user()->id;
         $g2->id_ability = $insertar->id_ability;
         $g2->idconocimiento = $insertar->idconocimiento;
         $g2->save();

      }


    } 
     
     
     

     //nuevo
           $m = User::where('id',Auth::user()->id)->where('unosubcategoria',$subcalleva)->first();
           if($m){
               $d = explode(",",$m->unoconocimiento);
               if(count($d)<6){
                   $m->unoconocimiento =$m->unoconocimiento.",".$tags;
                   $m->save();
                   return response()->json(['message'=>1]);
               }

           }else{
               $m2 = User::where('id',Auth::user()->id)->where('dossubcategoria',$subcalleva)->first();
               if($m2){
                  $d = explode(",",$m2->dosconocimiento);
                   if(count($d)<6){
                       $m2->dosconocimiento = $m2->dosconocimiento.",".$tags;
                       $m2->save();
                       return response()->json(['message'=>1]);
                   }
               }else{
                   $m3 = User::where('id',Auth::user()->id)->where('tressubcategoria',$subcalleva)->first();
                   if($m3){
                      $d = explode(",",$m3->tresconocimiento);
                       if(count($d)<6){
                           $m3->tresconocimiento = $m3->tresconocimiento.",".$tags;
                           $m3->save();
                           return response()->json(['message'=>1]);
                       }
                   }
               }
           }
     //final




     $verificar1 = User::where('id',Auth::user()->id)->whereNull('unosubcategoria')->get();

     $verificar2 = User::where('id',Auth::user()->id)->whereNull('dossubcategoria')->get();

     $verificar3 = User::where('id',Auth::user()->id)->whereNotNull('unosubcategoria')->whereNotNull('dossubcategoria')->get();

      $verificar4 = User::where('id',Auth::user()->id)->whereNotNull('unosubcategoria')->whereNotNull('dossubcategoria')->whereNotNull('tressubcategoria')->get();

     //SI VERIFICAR ENCUENTRA QUE 'unoconocimiento',es vacio traera = 1, y si 'unoconocimiento' , se encuentra lleno seria = 0.



     if(count($verificar4)!=0)
    {
        return response()->json(['message'=>2]);
    }
    else
    {
     if(count($verificar1)!=0){
            $cat = new User_Categories;
            $cat->id_user = Auth::user()->id;
            $cat->id_category = $categoria;
            $cat->save();

                      $actualizar1= User::where('id',Auth::user()->id)
                        ->update([
                              'unosubcategoria'=>$subcalleva,
                              'unoconocimiento'=>$tags
                          ]);

          return response()->json(['message'=>1]);
    }

    if(count($verificar2)!= 0)
    {
        $cat = new User_Categories;
        $cat->id_user = Auth::user()->id;
        $cat->id_category = $categoria;
        $cat->save();

       $actualizar= User::where('id',Auth::user()->id)
                        ->update([
                              'dossubcategoria'=>$subcalleva,
                              'dosconocimiento'=>$tags
                          ]);

          return response()->json(['message'=>1]);
    }

    if(count($verificar3)!= 0)
    {
        $cat = new User_Categories;
        $cat->id_user = Auth::user()->id;
        $cat->id_category = $categoria;
        $cat->save();

       $actualizar= User::where('id',Auth::user()->id)
                        ->update([
                              'tressubcategoria'=>$subcalleva,
                              'tresconocimiento'=>$tags
                          ]);

          return response()->json(['message'=>1]);
    }



    }

    }















  public function guardasug(Request $request)
  {
    $txtsug = $request->txtsug;
    $idusu = Auth::user()->id;

    $s = new Sugerencias();
    $s->description = $txtsug;
    $s->id_user = $idusu;
    $s->save();

    return response()->json(['message'=>1]);
  }

  public function pasaayuda(Request $request)
{
  $codcat = $request->codcat;

  $ayuda = Categoria::where('id_category',$codcat)->get();


  return response()->json([
                            'ayuda'=>$ayuda
                          ]);
}


  public function index2() {
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
                    ->where('id',Auth::user()->id)
                    ->first();
                  // foreach ($validacion->ability as $value) {
                  // print_r($value."");
                  // }
                  // exit();



    $pais = Country::select('id_country','name_country')->orderby('name_country')->get();
    $categoria = Categoria::all();
    $id = Auth::user()->id;
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

     $conteoratings = Ratings::where('id_user_set',Auth::user()->id)->where('qualification',5)->count();

      $conteoenviar = $conteoratings;

    $proyecto=Proyecto::where('usuario',$id)
              ->count();

    $noti = Notifications::where('destination',$id)->get();
    $postal = Postal_codes::orderby('code_postal')->get();
    // print_r($postal."");exit();

    // return view('perfil',['pais'=>$pais,'categoria'=>$categoria,'estudios'=>$estudios,'experiencia'=>$experiencia,'noti'=>$noti,'habilidad'=>$habilidad,'usuarios'=>$usuarios,'proyecto'=>$proyecto,'cont'=>$cont,'postal'=>$postal,'comen'=>$comen,'conteoenviar'=>$conteoenviar] );
    return view('perfil2',compact('pais','categoria','estudios','experiencia','noti','habilidad','usuarios','proyecto','cont','postal','comen','conteoenviar','certifi','llevaip','urll'));

  }

    public function saveProfesion(Request $request)
  {
    $usuario = Auth::user()->id;
    $txtprofesion = $request->txtprofesion;


    $actualizar = User::where('id',$usuario)
                        ->update([
                              "profesion"=>strtolower($txtprofesion),
                            ]);

      return response()->json(['message'=>1]);

  }

   public function saveVerdni(Request $request)
  {
    $si = $request->si;
    $usuario = Auth::user()->id;

      $actualizar = User::where('id',$usuario)
                        ->update([
                                'ver_dni'=>$si,
                                ]);

  }

  public function saveVerdni_no(Request $request)
  {
    $no = $request->no;
    $usuario = Auth::user()->id;

      $actualizar = User::where('id',$usuario)
                        ->update([
                               'ver_dni'=>$no,
                                ]);
  }

  public function saveEstudio(Request $request){



    $estudio = new Studies;
    $estudio->institute = $request->centro_educacion;
    $estudio->date_start = date("Y-m-d",strtotime($request->desde));
    $estudio->date_end= date("Y-m-d",strtotime($request->hasta));
    $estudio->degree=  $request->titulo;
    $estudio->id_user= Auth::user()->id;
    $estudio->type_study=$request->tipo;
    $estudio->country = $request->pais;
    $estudio->city=$request->ciudad;

    $estudio->save();
    return response()->json(['true']);

  }
  public function save_Experiences(Request $request){
    // print_r($request->all());exit();
      $validar  = Validator::make($request->all(),[
        'empresan'=>'required|',
        'fechai'=>'required|date',
        // 'fechaf'=>'required|date|after:fechai',
        'cargoe'=>'required',
        'comentario'=>'required',
        'pais1'=>'required|integer',
        'ciudad1'=>'integer',
      ]);

      $en = 0;
      if (!$validar->fails()) {
      $depar = Departaments::where('id_country',$request->pais1);
      $ciudad = "";
        if ($request->ciudad1!=null) {
          $depar->where('id_departament',$request->ciudad1);
          $ciudad= $request->ciudad1;
        }
        if (count($depar->get())>=1) {
          $nuevo = new Work_Experiences;
          $nuevo->company=$request->empresan;
          $nuevo->date_start=date("Y-m-d",strtotime($request->fechai));
          $nuevo->date_end=date("Y-m-d",strtotime($request->fechaf));
          $nuevo->charge=$request->cargoe;
          $nuevo->description_profile=$request->comentario;
          $nuevo->id_user=Auth::user()->id;
          $nuevo->country= $request->pais1;
          $nuevo->city=$ciudad;
          $en =$nuevo->save();
        }else{
          $en = 0;
        }

      }else{
        $en= $validar->errors()->all();
      }

      return response()->json($en);
  }

  public function ciudad(Request $request){
    $departament = Departaments::where('id_country',$request->pais)->orderby('name_departament')->get();
    return response()->json(['ciudad'=>$departament]);
  }

  public function deletehabilidad(Request $request){

      $buscar = Abilities::where('id_ability',$request->codigo)->get();

      $enco = $buscar[0]->id_category;

      $eliminar = User_Categories::where('id_user',Auth::user()->id)->where('id_category',$enco)->delete();


    $verificar = User_Abilities::where('id_user',Auth::user()->id)->where('id_ability',$request->codigo)->delete();
         return response()->json(['ver'=>$verificar]);

  }

  public function eliminar_estudio(Request $request){
    $verificar = Studies::where('id_user',Auth::user()->id)
                  ->where('id_study',$request->codigo)->delete();
     return response()->json(['ver'=>$verificar]);
  }
  public function eliminar_certificado(Request $request){
    $verificar = Work_Experiences::where('id_user',Auth::user()->id)
                  ->where('id_experiencie',$request->codigo)
                  ->delete();
    return response()->json(['ver'=>$verificar]);
  }


  public function save_data(Request $request){

    // print_r($request->all());exit();

    $url = $request->urllinkedin;



     $xdd = substr($url, 0, 1);

     if( $xdd == "h")
     {
        $urllleva  = $request->urllinkedin;
     }
     else {
       $urllleva = 'https://'.$request->urllinkedin;
     }


    $usuario = User::find(Auth::user()->id);
    $usuario->usuario = ucwords(trim($request->usuariod));
    $usuario->pais = $request->paisd;
    $usuario->perfil = $request->comentariod;
    $usuario->telefono = $request->telefonod;
    $usuario->apellidos= $request->apellidosd;
    $usuario->nombres= $request->nombred;
    $usuario->direccion= $request->direcciond;
    $usuario->documento= $request->documentod;
    $usuario->precio_hora= $request->preciohd;
    $usuario->type_money = $request->monedad;
    $usuario->enviar = $request->enviar;
    $usuario->postalCode = $request->codigopd;
    $usuario->urllinkedin = $urllleva;


    $v =$usuario->save();


  }

  // public function editar_estudio
  public function save_data_juridico(Request $request){

      // $xd = $request->telefonoe;

      // print_r($xd);
      // exit();

        $va = 0;
        // $id = Auth::user()->id;
        // $archivo = $request->file('archivo2');




             $usuario = User::find(Auth::user()->id);

             $usuario->nombre_empresa = $request->razonse;
             $usuario->razon_social = $request->razonse;
             $usuario->telefono_empresa = $request->telefonoe;
             $usuario->pais_empresa = $request->paise;
             $usuario->nit = $request->nit;
             $usuario->direccion_empresa = $request->direccione;
             $usuario->descripcion = $request->descripcione;
             $va =$usuario->save();








    return response()->json(['ver'=>$va]);
  }



  public function enviar_datose()
  {
      //AQUI HACER OTRO MAILABLE PARA EL "ENVIAR DATOS"
      Mail::to(Auth::user()->correo)->send(new EnviarDatosEmpleador());

      return response()->json('true');
  }

  public function enviar_datos(Request $request)
  {
    $correo = $request->correo;

    Mail::to($correo)->send(new EnviarDatosTrabajador());

    return response()->json(['mensaje'=>'Se envio correctamente']);
  }


  public function e_activo(Request $request) {

      $estado = $request->estado;
      $userActual = Auth::user()->id;

      if($estado == 0)
      {

        $actualizar = User::where('id',$userActual)
                        ->update([
                             "estado"=>$estado,
                          ]);

        return response()->json(['message'=>0]);

      }
      else
      {
        //print_r("No hizo cambio");
      }

      if($estado == 1)
      {

        $actualizar = User::where('id',$userActual)
                          ->update([
                               "estado"=>$estado,
                          ]);
        return response()->json(['message'=>1]);

      }
      else
      {
        //print_r("No hizo nada");
      }

  }

  public function invitaramigo(Request $request) {

      $correo_amigo = $request->correo_amigo;
      $comentario = $request->comentario;
      $nombre_amigo = $request->nombre_amigo;
      $userActual = Auth::user()->nombres;

      // $data = [
      //           'nombre_usuario'=>$userActual,
      //           'comentario'=>$comentario,
      //           'correo_amigo' =>$correo_amigo,
      //           'nombre_amigo'=>$nombre_amigo,
      //         ];

          // Mail::send('mail.correo_invitacion', $data, function($message) use ($data) {
          //       $message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
          //       $message->to($data['correo_amigo']);
          //       $message->subject('INVITACION A LABORAPLANET');
          //      });

          $objDemo = new \stdClass;
          $objDemo->nombre_amigo = $nombre_amigo;
          $objDemo->userActual = $userActual;
          $objDemo->comentario = $comentario;

      Mail::to($correo_amigo)->send(new InvitarAmigo($objDemo));

       return response()->json(['message'=>'Envio exitoso']);
  }



  public function validar_correo(Request $request) {
    $correo = $request->correo;
    $userActual = Auth::user()->nombres;
    $useridActual = Auth::user()->id;
    $token = str_random(15).$useridActual.str_random(15);




     $actualizar = User::where('id',$useridActual)
                        ->update([
                                  "email_verified_at"=>$token,
                                ]);


          $objDemo = new \stdClass();
          $objDemo->nombres = $userActual;
          $objDemo->token = $token;


    Mail::to($correo)->send(new ValidarCorreo($objDemo));

    return response()->json(['message'=>'Envio de Confirmacion Exitoso']);

  }

    public function rconfirmacion(Request $request)
  {
      $x = $request->x;
      $userActual = Auth::user()->nombres;

    $token = User::where('correo',$x)->select('email_verified_at')->get();

    $tokenv = $token[0]->email_verified_at;


    $objDemo = new \stdClass();
    $objDemo->nombres = $userActual;
    $objDemo->token = $tokenv;

    Mail::to($x)->send(new ValidarCorreo($objDemo));

    return response()->json(['message'=>'Mensaje Enviado']);
  }

  public function confirmation($token)
  {
     $user = User::where('email_verified_at',$token)->first();

     if(!is_null($user)) {

      $user->email_verified_at='1';
      $user->save();
      return redirect(route('perfil'))->with('status','Correo validado. Ahora puedes continuar con el registro.');
     }
     return redirect(route('perfil'))->with('status','Su correo electronico ya fue verificado.');

  }

  public function confirmation2($token)
  {
    $user = User::where('email_verified_at',$token)->first();

    if(!is_null($user)) {
      $user->email_verified_at='1';
      $user->save();
      return redirect(route('perfil2'))->with('status','Correo validado. Ahora puedes continuar con el registro.');
    }
    return redirect(route('perfil2'))->with('status','Su correo electronico ya fue verificado.');
  }


  public function subir_imagen_usuario(Request $request)
  {

  $id = $request->input('id_usuario_foto');
  $archivo = $request->file('archivo');

    $input = array('image'=> $archivo);
    $reglas = array('image'=> 'required|image|mimes:jpeg,jpg,png|max:900');
    $validation = Validator::make($input, $reglas);
    if($validation->fails())
    {
      print_r("ESTA NO ES UNA FOTOGRAFIA");
    }
    else
    {
      $nombre_original = $archivo->getClientOriginalName();
      $extension=strtolower($archivo->getClientOriginalExtension());
      $nuevo_nombre = str_random(5).$id.str_random(5).".".$extension;
      $location = 'images/'.$nuevo_nombre;
      // $r1=Storage::disk('public')->put($nuevo_nombre, \File::get($archivo));
      $r1 =Image::make($archivo)->save($location);
      $rutadelaimagen = "images/".$nuevo_nombre;


      if($r1) {
        $usuario=User::find($id);
        $usuario->imagen=$rutadelaimagen;
        $r2=$usuario->save();
        print_r('Si se logro');
      }
      else
      {
        print_r('Nose logro');
      }
    }
  }


  public function subir_imagen_usuario2(Request $request)
  {
      $archivo = $request->file('archivo2');
      $id = Auth::user()->id;

      $input = array('image'=>$archivo);
      $reglas = array('image'=>'required|image|mimes:jpeg,jpg,png|max:900');
      $validation = Validator::make($input,$reglas);
      if($validation->fails())
      {
        print_r("ESTA NO ES UNA FOTOGRAFIA");
      }
      else
      {
          $nombre_original = $archivo->getClientOriginalName();
          $extension=strtolower($archivo->getClientOriginalExtension());
          $nuevo_nombre= str_random(5).$id."-empresa".str_random(5).".".$extension;
          $location = 'images/'.$nuevo_nombre;

          $r1= Image::make($archivo)->save($location);
          $rutadelaimagen = "images/".$nuevo_nombre;

          if($r1) {
            $usuario=User::find($id);
            $usuario->logo_empresa=$rutadelaimagen;
            $r2=$usuario->save();
            print_r('Si se logro');
          }
          else
          {
            print_r('Nose logro');

          }
      }

  }


// -- LLENAR HABILIDADES -- //

public function llenarhabilidades(Request $request)
{
  $codcat = $request->codcat;
  $radiob = $request->radiob;


  $habilidades =  Abilities::where('id_category',$codcat)->get();
  $conocimiento = Conocimientos::where('id_ability',$radiob)->where('flag',1)->get();

  return response()->json([
                           'habilidades'=>$habilidades,
                           'conocimiento'=>$conocimiento,
                          ]);
}

// -- FIN -- //

// -- LLENAR OPCION SUBCATEGORIAS --//
public function llevacatx(Request $request)
{
  $catx = $request->catx;

  $subcategorias = Abilities::where('id_category',$catx)->get();

  return response()->json(['subcategorias'=>$subcategorias]);
}

//-- FIN --//


//-- GUARDAR HABILIDADES DE USUARIO -- //

public function guardarhabilidades(Request $request)
{
   $usu_actual = Auth::user()->id;
   $categoria = $request->categoria;
   $habilidad = $request->habilidad;
   $re = 0;
   $enviar= [];

         $verificar = User_Abilities::where('id_user',$usu_actual)
                                  ->where('id_ability',$habilidad)
                                  ->get();


        $validacion =  User_Abilities::from('user_abilities as ua')
                                ->join('abilities as a','a.id_ability','=','ua.id_ability')
                                ->select('ua.id_ability','ua.id_user','a.ability','a.id_category')
                                ->where('id_user',$usu_actual)->get();


            $conteo = count($validacion);


          if($conteo >=4)
          {
            return response()->json(['message'=>5]);
          }
          else
          {

              if (count($verificar)==0) {

          $existe = Abilities::where('id_ability',$habilidad)
                              ->where('id_category',$categoria)
                              ->get();

          $buscador = User_Categories::where('id_user',$usu_actual)
                              ->where('id_category',$categoria)
                              ->get();



          if (count($existe)!=0 ) {
            $hab = new User_Abilities;
            $hab->id_user = $usu_actual;
            $hab->id_ability = $habilidad;
            $re = $hab->save();


            if(count($buscador)!=1) {

            $cat = new User_Categories;
            $cat->id_user = $usu_actual;
            $cat->id_category = $categoria;
            $cat->save();

            }
            else
            {

            }


            if ($re=="true") {
              $enviar =Abilities::where('id_ability',$habilidad)
                    ->join('categories_ability as c','c.id_category','=','abilities.id_category')
                    ->get();
            }
          }else{
            $re = 3;
          }
      }else{
        $re = 2;
      }

      return response()->json(['div'=>$enviar,
                               'message'=>$re]);





          }




}

// -- FIN -- //

// -- PASAR DATOS AL MODAL EXPERIENCIA --//

public function PasardatosModal(Request $request)
{
  $cod = $request->tr_codigo;

  $split = explode(",", $cod);


  $codusu = $split[0];
  $codwork = $split[1];

  $query = Work_Experiences::whereraw("id_user='$codusu' and id_experiencie='$codwork'")->get();

  return response()->json(['tabla'=>$query]);
}

public function PasardatosModal2(Request $request)
{
  $cod = $request->tr_codigo;

  $split = explode(",", $cod);

  $codusu = $split[0];
  $codsty = $split[1];

  $query = Studies::whereraw("id_user='$codusu' and id_study='$codsty'")->get();


  return response()->json(['tabla'=>$query]);
}

public function  PasardatosModalComentario(Request $request)
{
    $cod = $request->tr_codigo;

    $query =Ratings::where('id_user',$cod)->where('id_user_set',null)->get();


    return response()->json(['tabla'=>$query]);

}


public function ModificarExperiencia(Request $request)
{
  $codigo_up = $request->codigo_up;

  $split = explode(",", $codigo_up);

  $codusu = $split[0];
  $codwork = $split[1];

  $empresa_up = $request->empresa_up;
  $cargo_up = $request->cargo_up;
  $desde_up = $request->desde_up;
  $hasta_up = $request->hasta_up;
  $cbopais_up = $request->cbopais_up;
  $ciudad3 = $request->ciudad3;
  $comentario_up = $request->comentario_up;

    //CONVERTIR FORMATO DESDE
    $time = strtotime($desde_up);
    $newdt = date('Y-m-d',$time);

    //CONVERTIR FORMATO HASTA
    $time2 = strtotime($hasta_up);
    $newdt2 = date('Y-m-d',$time2);



  $query = Work_Experiences::whereraw("id_user='$codusu' and id_experiencie='$codwork'")
                            ->update([
                                  'company'=>$empresa_up,
                                  'charge'=>$cargo_up,
                                  'date_start'=>$newdt,
                                  'date_end'=>$newdt2,
                                  'country'=>$cbopais_up,
                                  'city'=>$ciudad3,
                                  'description_profile'=>$comentario_up
                                    ]);

        return response()->json(['message'=> 'Se actualizo con exito']);

}

public function ModificarEduacion(Request $request)
{
  $codigo_up = $request->codigo_up;

  $split = explode(",", $codigo_up);

  $codusu = $split[0];
  $codedu = $split[1];

  $centroestudio_up = $request->centroestudio_up;
  $tipoestudio_up = $request->tipoestudio_up;
  $titulobtenido_up = $request->titulobtenido_up;
  $desde_up_e = $request->desde_up_e;
  $hasta_up_e = $request->hasta_up_e;
  $cbopais_up_e = $request->cbopais_up_e;
  $ciudad4 = $request->ciudad4;


  //CONVERSION DE FORMATO DEL "DESDE"
  $time = strtotime($desde_up_e);
  $newdt = date('Y-m-d',$time);


  //CONVERSION DE FORMATO DEL "HASTA"
  $time2 = strtotime($hasta_up_e);
  $newdt2 = date('Y-m-d',$time2);

  $query = Studies::whereraw("id_user='$codusu' and id_study='$codedu'")
                  ->update([
                          'institute'=>$centroestudio_up,
                          'type_study'=>$tipoestudio_up,
                          'degree'=>$titulobtenido_up,
                          'date_start'=>$newdt,
                          'date_end'=>$newdt2,
                          'country'=>$cbopais_up_e,
                          'city'=>$ciudad4
                          ]);


  return response()->json(['message'=>'Se actualizo con exito']);


}



//-- FIN -- //

  public function estadisticas()
  {
        // $ip = $_SERVER["REMOTE_ADDR"];

        // print_r($ip);
        // exit();

  //-- PARA EL CONTADOR DE USUARIOS Y PROYECTOS EN EL INDEX
    $totalusu = User::count();
    $totalpro = Proyecto::count();

    //-- MULTIPLICACION
    $llevausu = ($totalusu*989);
    $llevapro = ($totalpro*789);


    //-- PARA LA SECCION DE LOS COMENTARIOS EN EL INDEX
    $coments = Ratings::from('ratings as ra')
    ->join('usuario as usu','usu.id','=','ra.id_user')
    ->select('usu.nombres','usu.imagen','usu.profesion','countries.*','ra.qualification','ra.commit_finish','ra.date_finish')
    ->leftJoin('countries',function($cont) {
        $cont->on('countries.id_country','=','usu.pais');
    })
    ->whereNull('id_user_set')
    ->where('ra.per','=','1')
    ->where('usu.flag','=','1')
    ->orderBy('ra.date_finish','DESC')->get();

 $pais = Country::select('id_country','name_country')->orderby('name_country')->get();

    $coments2 = Ratings::from('ratings as ra')
    ->join('usuario as usu','usu.id','=','ra.id_user')
    ->select('usu.descripcion','razon_social','logo_empresa','countries.*','ra.qualification','ra.commit_finish','ra.date_finish')
    ->leftJoin('countries',function($cont2) {
      $cont2->on('countries.id_country','=','pais_empresa');
    })
    ->whereNull('id_user_set')
    ->where('ra.per','=','2')
    ->where('usu.flag','=','1')
    ->orderBy('ra.date_finish','DESC')->get();



    //-- PARA EL RECORRIDO DE LAS CATEGORIAS DESTACADOS
    $categoria = Categoria::whereIn('id_category',[1,2,3,4,5,6,7,8])->get();


    return view('index')->with('llevausu',$llevausu)->with('llevapro',$llevapro)->with('coments',$coments)->with('categoria',$categoria)->with('coments2',$coments2)->with('pais',$pais);

  }

  public function buscar(Request $request)
  {
    $tipo = $request->cbx_tipo;
    $buscar = $request->txtbusqueda;
    if($tipo ==1){
        return redirect('buscar_trabajo?txtbusqueda='.$buscar);
    }elseif($tipo ==2){
        return redirect('trabajadores?txtbusqueda='.$buscar);
    }else{
        return back();
    }


  }

  public function comentario(Request $request)
  {
      $cantidad = $request->cantidad;
      $comment = $request->comment;
      $usuario = $request->usuario;
      $fecha = $request->fecha;
      $per = $request->per;

      $ratings = new Ratings;
      $ratings->qualification = $cantidad;
      $ratings->commit_finish =$comment;
      $ratings->date_finish = $fecha;
      $ratings->id_user = $usuario;
      $ratings->per = $per;
      $ratings->save();

      return response()->json(['message'=>1]);

  }


  public function reenviarcorreo(Request $request)
  {
    $correo = $request->correo;
    $pass = Auth::user()->pass_simple;


                     $objDemo = new \stdClass;
                     $objDemo->correo = $correo;
                     $objDemo->pass=$pass;

                Mail::to($correo)->send(new UsuarioSocial($objDemo));
                return response()->json(['true']);

  }

   public function todascategorias()
  {
    $categorias = Categoria::all();

    return view('categorias')->with('categorias',$categorias);
  }

    public function eliminar_aa(Request $request){
        $s = User::find(Auth::user()->id);
        $ss = "";
        if($request->v==1){
            $ss = $s->unosubcategoria;
            $s->unosubcategoria = null;

        }
        if($request->v==2){

               $ss = $s->dossubcategoria;
            $s->dossubcategoria = null;
        }
        if($request->v==3){

                 $ss = $s->tressubcategoria;

            $s->tressubcategoria = null;
        }
           $f = Abilities::where('ability',$ss)->first();
            if($f){
                $mm = User_Abilities::where('id_ability',$f->id_ability)
                                    ->where('id_user',Auth::user()->id)
                                    ->delete();
            }
        $d = $s->save();
        return 1;
        //print_r($s."");
    }

    public function eliminar_aaa(Request $request){
        $s = User::find(Auth::user()->id);
        $f = $request->v2;
        //print_r($s."");
        if($request->v==1){
            $d = $s->unoconocimiento;
        }
        if($request->v==2){
            $d = $s->dosconocimiento;
        }
        if($request->v==3){
            $d = $s->tresconocimiento;
        }
        $p = str_replace([$f.",",",".$f,$f],["","",""],$d);
        if($request->v==1){
            $s->unoconocimiento=$p;
            if($p==""){
                $s->unosubcategoria = null;
            }

        }
        if($request->v==2){
            $s->dosconocimiento=$p;
             if($p==""){
                $s->dossubcategoria = null;
            }
        }
        if($request->v==3){
            $s->tresconocimiento=$p;
             if($p==""){
                $s->tressubcategoria = null;
            }
        }
        //$d = $p;
        $s->save();
        return 1;
        //print_r($p);
        //echo "dasdas";eeeee,Visual Fox Pro.,Delphi.
    }

}
?>
