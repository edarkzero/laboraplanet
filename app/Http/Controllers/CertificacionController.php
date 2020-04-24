<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Auth;
use App\Patroc_certif;
use App\Certifi_user;
use App\User;
use App\Mail\FormHijos;
use App\Mail\FormHijos2;
use App\Solici_men;
// use App\Mail\FormHijos;
use Validator;
use Redirect;
use App\Mail\UsuarioAplicado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
header('Content-Type: text/html; charset=UTF-8');




Class CertificacionController extends Controller{

      public function index(Request $request)
      {
        $patroc_certif = Patroc_certif::all();

          return view('certificarnu')->with('patroc_certif',$patroc_certif);
      }

      public function save_certificacion(Request $request)
      {
        $nombre = $request->nombre;
        $empresa = $request->empresa;
        $fechaexpe = $request->fechaexpe;
        $fechacadu = $request->fechacadu;
        $idcrede = $request->idcrede;
        $urlcrede = $request->urlcrede;

        //-- PARA CAMBIAR EL FORMATO DE Fecha
          $fech1 = explode("-",$fechaexpe);
          $completo1 = $fech1[2]."-".$fech1[1]."-".$fech1[0];

          if ($fechacadu == null || $fechacadu == "")
          {
            $completo2 = null;
          }
          else {
            $fech2 = explode("-",$fechacadu);
            $completo2 = $fech2[2]."-".$fech2[1]."-".$fech2[0];

          }

        //-- FIN

          $g = New Certifi_user;
          $g->id = Auth::user()->id;
          $g->nombre_cer = $nombre;
          $g->id_patroc = $empresa;
          $g->fec_expe = $completo1;
          $g->fec_cadu = $completo2;
          $g->id_creden  = $idcrede;
          $g->url_creden = $urlcrede;
          $g->save();

          return response()->json(["estado"=>'Exito']);

      }
      
    public function formhijos(Request $request)
      {
        return view('formhijos');
      }
      
       public function enviaform(Request $request)
      {

        $nombre = $request->nombre;
        $nhijos = $request->cbohijos;
        $telefono = $request->telefono;
        $correo = Auth::user()->correo;
        $file1 = $_FILES['file1']['tmp_name'];
        $file2 = $_FILES['file2']['tmp_name'];

        $type = $_FILES['file1']['type'];
        $type2 = $_FILES['file2']['type'];

        $name = $_FILES['file1']['name'];
        $name2 = $_FILES['file2']['name'];



        $g = New Solici_men;
        $g->id = Auth::user()->id;
        $g->nombre_usu = $nombre;
        $g->nhijos = $nhijos;
        $g->tele_usu = $telefono;
        $g->aprob_men = 0;
        $g->save();





$objDemo = new \stdClass;
$objDemo->nombre = $nombre;
$objDemo->nhijos = $nhijos;
$objDemo->telefono = $telefono;
$objDemo->correo = $correo;
$objDemo->tok = $g->id_solici;

Mail::to('admin@laboraplanet.com')->send(new FormHijos($objDemo,$file1,$file2,$type,$type2,$name,$name2));

      return response()->json(['Repuesta'=>'1']);

      }

      public function confirmation($token)
      {
         $actualizar = Solici_men::where('id_solici',$token)
                                  ->update([
                                            'aprob_men'=>1,
                                           ]);

         return redirect(route('aprobadoni'))->with('status','Aprobo la solicitud del usuario con exito.');
      }     

      public function denegacion($token)
      {
        $usuario = User::where('id',$token)->get();

            $correo = $usuario[0]->correo;

            Mail::to($correo)->send(new FormHijos($objDemo,$file1,$file2,$type,$type2,$name,$name2));

        return redirect(route('aprobadoni'))->with('status', 'Desaprobo la solicitud del usuario, se le notificara a su correo electronico.');
      }

}

?>
