<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Proyecto;
use App\Notifications;
use App\User;
use App\Chat;
use App\User_Categories;
use DB;
use App\Mail\EnvioUsuarios;
use App\Categoria;
use App\Abilities;
use App\Conocimientos;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class PProyectoController extends Controller {
  public function index(){

    return view('publicar_trabajo');
  }


  public function PublicarParecido($id)
  {

     $variable = Proyecto::where('id',$id)->get();

    return view('publicar_trabajo')->with('variable',$variable);
  }


  public function publicar(Request $request)
  {
      set_time_limit(9999999);
      ini_set('memory_limit','15000M');

    $codsubcategoria = $request->codsubcategoria;

      $conoci = $request->conocimientos;

      $separar = explode(",",$conoci);

      foreach ($separar as $key) {
          $xdd = substr($key, -1);

          if ($xdd == ".") {

          } else {
            $gcono = new Conocimientos;
            $gcono->id_ability = $codsubcategoria;
            $gcono->descripcion = $key.".";
            $gcono->flag = 0;
            $gcono->save();
          }

      }



    $proyecto = new Proyecto();

    if ($request->propio_presupuesto=="") {
      $request->propio_presupuesto=$request->aproximado;
    }

    if($request->aproximado=="") {
        $request->aproximado = $request->propio_presupuesto;
    }

    $pais = Auth::user()->pais_empresa;

    if($pais == null)
    {
        $pais = Auth::user()->pais;
    }
    else
    {
      $pais = $pais;
    }

    $proyecto->titulo = $request->titulo;
    $proyecto->usuario = Auth::user()->id;
    $proyecto->categoria = $request->categoria;
    $proyecto->archivo ="";
    $proyecto->forma_pago = $request->forma_trabajo;
    $proyecto->tipo_trabajo = $request->tipo_trabajo;
    $proyecto->tipo_proyecto = $request->tipo_proyecto;
    $proyecto->presupuesto = round($request->propio_presupuesto,2);
    $proyecto->tiempo_entrega = $request->tipo_tiempo;
    $proyecto->cantidad_tiempo = $request->tiempo;
    $proyecto->estado = '1';
    $proyecto->habilidades = $request->conocimientos;
    $proyecto->subcategoria = $request->subcategoria;
    $proyecto->descripcion = $request->descripcion;
    $proyecto->pais = $pais;
    $proyecto->calculo = round($request->aproximado,2);
    $proyecto->fecha_publicacion = date('Y-m-d');
    $proyecto->complejidad = $request->complejidad;
    $pr = $proyecto->save();
    $publicar = $proyecto->id;
    $ulti = Proyecto::where('usuario','=',Auth::user()->id)->max('id');



    $usernot = DB::table('user_abilities')
            ->join('abilities','user_abilities.id_ability','=','abilities.id_ability')
            ->join('categories_ability','abilities.id_category','=','categories_ability.id_category')
            ->join('usuario','user_abilities.id_user','=','usuario.id')
            ->where('categories_ability.id_category',$request->categoria)
            ->where('user_abilities.id_user','<>',Auth::user()->id)
            ->distinct('user_abilities.id_user')
            ->select('usuario.usuario','usuario.correo','usuario.enviar','user_abilities.id_user')
            ->get();
    //print_r($usernot."");exit;

    $titulo = $request->titulo;

    foreach ($usernot as $val)
    {
    $id_usuario = $val->id_user;

    $noti = new Notifications;
    $noti->destination = Trim($id_usuario);
    $noti->type_notification = Trim("Proyecto");
    $noti->author = Trim(Auth::user()->id);
    $noti->viewed = Trim(0);
    $noti->titlep = $request->titulo;
    $noti->description = Trim("Buen dia el usuario ".Auth::user()->usuario." ha creado el proyecto");
    $noti->date_done = Trim(date('Y-m-d'));
    $noti->url = Trim("aplicar/".$ulti);
    $noti->save();

    $id_labochat = "380";
    $f = date('Y-m-d H:i:s');
    $f2 = strtotime('-5 hour',strtotime($f));
    $d = date('Y-m-d H:i:s',$f2);
    Chat::create([
              'id_usuario'=>$id_labochat,
              'id_contacto'=>$id_usuario,
              'chat'=>"Se ha publicado un requerimiento con tus conocimientos, date prisa , contacta al empleador e incrementa tus ganancias!!",
              'file'=>"proyecto",
              'file_name'=>$ulti."|".$titulo."|".$request->propio_presupuesto,
              'v'=>'1',
              'fecha'=>$d
          ]);




            if($val->enviar == 1 || $val->enviar == 0)
            {
                   $objDemo = new \stdClass;
                   $objDemo->titulo = $titulo;
                   $objDemo->usuario = $val->usuario;
                   $objDemo->proyect = $ulti;

                Mail::to($val->correo)->send(new EnvioUsuarios($objDemo));
            }



    }

      // complejidad:,
    return response()->json(['respuesta'=>$pr,'publicar'=>$publicar]);



  }
  
  public function verificar_categoria(Request $re){
      $te = "%".$re->ca."%";
      $v_chco = Categoria::where('description','like',$te)->count();
      $tipo = "c";
      $id ="";
      if($v_chco==0){
          $v_chco = Abilities::where('ability','like',$te)->count();
          $tipo = "h";
      }
      if($v_chco==0){
        $v_chco= Conocimientos::where('descripcion','like',$te)->count();
        $tipo = "co";
      }
      if($v_chco==0){
        $tipo ="";
        $cr = new Categoria();
        $cr->description = $re->ca;
        $cr->flag = 0;
        $cr->save();
        $id =$cr->id_category;
        
      }
      return response()->json(['tipo'=>$tipo,'id'=>$id]);
  }
  
}
?>
