<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plans;
use DB;
use App\Plan_users;
use App\Money_moves;
use Auth;
use Carbon\Carbon;
class PlanesController extends Controller 
{

	public function index()
	{
	    include ('librerias/funciones.php');
		$planplatinum = Plans::find(3);
		$plangolden = Plans::find(4);
        $fecha_actual = date("Y-m-d");
		$miplan= Plan_users::select(DB::raw('DATE_FORMAT(date_end, "%d-%m-%Y") as datae'),'plan_users.*')
                    ->where('id_user',Auth::user()->id)
                    ->where('date_end','>=',$fecha_actual)
                   ->get();
		return view('planes',['planplatinum'=>$planplatinum,'plangolden'=>$plangolden,'miplan'=>$miplan]);

	}


public function visanet(Request $request)
	{
			include ('librerias/funciones.php');
			$respuesta ="";
			$request_body = "";


			if (isset($_POST['transactionToken'])){
	       $key = $_COOKIE["key"];
	       $transactionToken = $_POST['transactionToken'];
	       $entorno = $_GET['entorno'];
	       $purchaseNumber = $_GET['purchaseNumber'];
	       $amount = $_GET['amount'];
	       $status = "";
	       $respuesta = authorization($entorno,$key,$amount,$transactionToken,$purchaseNumber,$status,$request_body);
	       // var_dump($respuesta);
	       unset($_COOKIE["key"]);
	    }

			if($status == 200)
	    {


	    //$pro =$request->proyecto;

	      $now = Carbon::now();

	      $fecha = $now->format('d-m-Y');
	      $hora =  $now->format('H:i:s');


	    $c= json_decode($respuesta);

	    $numpedido = $c->order->purchaseNumber;
	    $numautori = $c->order->authorizationCode;
	    $comprador = Auth::user()->nombres." ".Auth::user()->apellidos;
	    //NUMERO DE TARJETA
	    $numtarje = $c->dataMap->CARD;
	    //FECHA Y HORA DEL PEDIDO
	    $fechayhoralleva = $fecha." ".$hora;
	    //IMPORTE DE LA TRANSACCION
	    $importe = $c->dataMap->AMOUNT;
	    //MONEDA DE LA TRANSACCION
	    $moneda = $c->order->currency;
	    //COMENTARIOS
	    $comentarios = $c->dataMap->ACTION_DESCRIPTION;

	    //ID DE TRANSACTION

	    $idtransac = $c->order->transactionId;

	          $id = Auth::user()->id;
	            $mostrar = Plans::where('price','like','%'.$importe.'%')->get();
	            $codigo = $mostrar[0]->id_plan;
	            $pl = $mostrar[0]->name_plan;
                $price=explode (",",$mostrar[0]->price);
                $sf = "";
                if($price[0]==$importe){
                    $sf= "1 month";
                }elseif($price[1]==$importe){
                    $sf= "3 month";
                }elseif($price[2]==$importe){
                    $sf= "1 year";
                }
                 $fecha_actual = date("Y-m-d");
          $fecha_final= date("Y-m-d",strtotime($fecha_actual."+ ".$sf));
                $precio = $importe;
                $verificar = Plan_users::where('id_user',$id)->get();
                 if (count($verificar)>0) {
              $guardar = Plan_users::where('id_user',$id)->update([
                'date_start'=>$fecha_actual,
                'date_end'=> $fecha_final,
                'id_plan'=>$codigo  
                      ]);
                  }else{
                  $guardar = new  Plan_users();
                  $guardar->id_user = $id;
                  $guardar->id_plan =$codigo;
                  $guardar->date_start=$fecha_actual;
                  $guardar->date_end= $fecha_final ;
                  $guardar->state = "1";
                  $guardar->save();
                  }
                  $n = new Money_moves();
                  $n->move = "Plan";
                  $n->description = "Pago de menbresia ".$pl;
                  $n->import_move = $precio;
                  $n->date_move= $fecha_actual;
                  $n->user_id = $id;
                  $n->save();


	    return redirect()->route('recibo_pago_planes',compact('numpedido','numautori','comprador','numtarje','fechayhoralleva','importe','moneda','comentarios','idtransac'));



	    }
	    else
	    {



	        $now = Carbon::now();

	        $fecha = $now->format('d-m-Y');
	        $hora = $now->format('H:i:s');

	        $c = json_decode($respuesta);
	        $d = json_decode($request_body);


	        //NUMERO DE PEDIDO
	        $numpedido = $d->order->purchaseNumber;
	        //NUMERO DE TARJETA
	        $numtarje = $c->data->CARD;
	        //FECHA Y HORA DEL PEDIDO
	        $fechayhoralleva = $fecha." ".$hora;
	        //COMENTARIOS
	        $comentarios = $c->data->ACTION_DESCRIPTION;


	       return redirect()->route('recibo_pago_error_planes',compact('numpedido','numtarje','fechayhoralleva','comentarios'));

	    }



	exit();




	}



}



?>