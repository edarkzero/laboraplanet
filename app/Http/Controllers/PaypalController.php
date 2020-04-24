<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Plans;
use App\Plan_users;
use App\Proyecto;
use Auth;
use DateTime;
use DB;
use App\Money_moves;

use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

use Carbon\Carbon;
header('Content-Type: text/html; charset=UTF-8');
class PaypalController extends Controller 
{
    public function paypal(Request $request){
    	$array =explode('-', $request->n_plan);
    	$object="";
      $precio = 0;
      $mensaje= "";
    	if (count($array)==2 and strlen($request->n_plan)==3) {
    	  $plan = Plans::where('id_plan',$array[1])->get();
	      if (count($plan)==1) {
          $pr = explode(",", $plan[0]->price);
          $ve = 0;
          $tiemp ="";
          $sf="";
          if ($array[0]=="m") {	$ve=0;$tiemp="mensual";$sf = "1 month";}
	        if ($array[0]=="t") {	$ve=1;$tiemp="trimestral";$sf = "3 month";}
  			  if ($array[0]=="a") {	$ve=2;$tiemp="anual";$sf = "1 year";}
      	    
          $fecha_actual = date("Y-m-d");
          // $fecha_final= date("Y-m-d",strtotime($fecha_actual."+ ".$sf));
               $verificar = Plan_users::select(DB::raw('DATE_FORMAT(date_end, "%d-%m-%Y") as datae'))
                        ->where('id_user',Auth::user()->id)
                        ->where('date_end','>=',$fecha_actual)
                        ->get();
          // $verificar = Plan_users::where('id_user',Auth::user()->id)
          //                         ->where('date_end','>=',$fecha_actual)
          //                         ->get();
          if (count($verificar)>0) {
            $mensaje= "USTED YA CUENTA CON UN PLAN HASTA EL PLAZO DE " . $verificar[0]->datae."/0";
          }
          $precio = $pr[$ve];
          $object ="Plan ". strtolower($plan[0]->name_plan)." ".$tiemp;
          }else{
            $mensaje="No se reconocio el plan/0";
          }		
    	}else{
        $mensaje ="No se reconocio el plan/0";
      }
      
      if ($mensaje!="") {
        return redirect()->route('planes')->with('mensaje',$mensaje);
      }

   $environment = new ProductionEnvironment(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'));
      $client = new PayPalHttpClient($environment);
      // print_r($client);exit()
            $requests = new OrdersCreateRequest();
      $requests->payPalPartnerAttributionId('return=representation');
      $requests->body = [
                           "intent" => "CAPTURE",
                           "purchase_units" => [[
                               "description"=>$object,
                               "amount" => [
                                   "value" => $precio,
                                   "currency_code" => "USD"
                               ]
                           ]],
                           "application_context" => [ 
                                'user_action' => 'PAY_NOW',
                                "cancel_url" => route('paypal_error'),
                                "return_url" => "https://www.laboraplanet.com/paypal_proceso"
                           ] 
                       ];

      try {
          // Call API with your client and get a response for your call
          $response = $client->execute($requests);
          // print_r($response);echo "<br><br><br>";
          // print_r($response->result->links[0]->href);echo "<br>";
          return redirect($response->result->links[1]->href);
      }catch (\HttpException $ex) {
          echo $ex->statusCode;
          print_r($ex->getMessage());
      }
       exit();
  
  
  
  
  
  
  
  
  
  
  
  
  
      $apiContext = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET')));
      //production
      //$apiContext->setConfig(['mode' => 'live']);
      // Create new payer and method
      $payer = new Payer();
      $payer->setPaymentMethod("paypal");
      // Set redirect URLs
      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl(route('paypal_proceso'))
        ->setCancelUrl(route('paypal_error'));
        //Set Item
      $item1 = new Item();
      $item1->setName($object)->setCurrency('USD')->setQuantity(1)->setPrice($precio);
      // $item2 = new Item();
      // $item2->setName('Plan numero dos')->setCurrency('USD')->setQuantity(1)->setPrice(20);
      
      //Lista de Items
      $itemList = new ItemList();
      $itemList->setItems(array($item1/*,$item2*/));
      // Set payment amount
      $transaction = new Transaction();
      $amount = new Amount();
      $amount->setCurrency("USD")
        ->setTotal($precio);
      // Set transaction object
      $transaction->setAmount($amount)->setItemList($itemList)
        ->setDescription("Compra en Laboraplanet");

      // Create the full payment object
      $payment = new Payment();
      $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

          // Create payment with valid API context
          try {
            $payment->create($apiContext);
            // Get PayPal redirect URL and redirect the customer
            $approvalUrl = $payment->getApprovalLink();
            return redirect($approvalUrl);exit();
            // Redirect the customer to $approvalUrl
          } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
          } catch (Exception $ex) {
            die($ex);
          }
    }
    
    
 public function visanet_u(Request $request)
    {
      include('librerias/funciones.php');

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
        //var_dump($respuesta);

       unset($_COOKIE["key"]);

    }

     //exit();

  //TARJETA DE PRUEBA - VALIDA

  //NRO TARJETA     : 4091332908678286
  //FE. VENCIMIENTO : 03/22
  // CVV            : 740


  //TARJETA DE PRUEBA - INVALIDA
  //NRO TARJETA     : 4444333322221111
  //FE. VENCIMIENTO : 03/22
  // CVV            : 740




    if($status == 200)
    {
       
      $id = Auth::user()->id;
      $pro = $request->id;
 

      $verificar = Proyecto::where('usuario',$id)
                            ->where('id',$pro)
                            ->first();

      if($verificar) {
        $verificar->urgente = 1;

        $verificar->save();


        $n = new Money_moves();
          $n->move = "Adicional";
          $n->description = "Pago para poner prioridad en la busqueda de proyecto...";
          $n->import_move = $amount;
          $n->date_move = date("Y-m-d");
          $n->user_id = $id;
          $n->id_proyecto = $pro;

          $n->save();


        }



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

  
    return redirect()->route('recibo',compact('numpedido','numautori','comprador','numtarje','fechayhoralleva','importe','moneda','comentarios','idtransac'));

    exit();

    }
    else
    {
        $pro = $request->id;
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


       return redirect()->route('recibo_error',compact('numpedido','numtarje','fechayhoralleva','comentarios','pro')); 

       exit();
      
    }

    

    exit();



    }

public function paypal_proceso(Request $request)
{
  // print_r();exit();
        $environment = new ProductionEnvironment(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'));
       //         $environment = new SandboxEnvironment('AUPPwekyYvpd-xQGO2k58U-lduN8N8DvFykmT0afPfavPL-VPSOAf_hspUzCMxapjTDMIHHqfLs4X1dB', 'EJ1911_Gk2F7qsDLOqoQj1Te7vG7U7coLJtAx7yXBm4tNd1GTEZH-2FmCrtwOKa_uGE_eA_OS_PAO09R');
        
        $client = new PayPalHttpClient($environment);

 $request = new OrdersCaptureRequest($request->token);
$request->prefer('return=representation');
try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    // print_r($response->result);echo "<br><br>";
    // print_r($response->result->purchase_units[0]->amount->value);echo "<br><br>";
    // print_r($response->result->purchase_units[0]->description);echo "<br>";
    // print_r($response->statusCode);
         if ($response->statusCode=="201") {
          $plan = $response->result->purchase_units[0]->description;
          $precio = $response->result->purchase_units[0]->amount->value;
          $d = explode(" ", $plan);
          $pl =  $d[1];
          $codigo =0;
          if ($pl =="laboral") {
            $codigo = "3";
          }elseif ($pl =="empresarial") {
            $codigo = "4";
          }

          if ($codigo!=0) {
          $fecha = $d[2];
          
          $sf = "";
          if ($fecha=="anual") {
            $sf = "1 year";
          }
          if ($fecha=="trimestral") {
            $sf = "3 month";
          }
          if ($fecha=="mensual") {
            $sf = "1 month";
          }
          $fecha_actual = date("Y-m-d");
          $fecha_final= date("Y-m-d",strtotime($fecha_actual."+ ".$sf));
          $id = Auth::user()->id;
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
          // $guardar->save();
          $mensaje = "La compra se realizo con exito/1";
          
          }else{
            $mensaje = "Ocurrio un error no se reconocio el tipo de plan/0";
          }
          
        }else{
          $mensaje= "Ocurrio un error para mas informacion comuniquese con el administrador/0";
        }
        return redirect()->route('planes')->with('mensaje',$mensaje);

}catch (\HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
}

    

    public function paypal_proceso1(Request $request){
      $apiContext = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET')));
            $apiContext->setConfig(['mode' => 'live']);
      // Get payment object by passing paymentId
      $paymentId = $request->paymentId;
      $payment = Payment::get($paymentId, $apiContext);
      $payerId = $request->PayerID;

      // Execute payment with payer ID
      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);
      $mensaje = "";
      try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);

        if ($result->state=="approved") {
          $plan = $result->transactions[0]->item_list->items[0];
          $precio = $plan->price;
          $d = explode(" ", $plan->name);
          $pl =  $d[1];
          $codigo =0;
          if ($pl =="platinum") {
            $codigo = "3";
          }elseif ($pl =="golden") {
            $codigo = "4";
          }

          if ($codigo!=0) {
          $fecha = $d[2];
          
          $sf = "";
          if ($fecha=="anual") {
            $sf = "1 year";
          }
          if ($fecha=="trimestral") {
            $sf = "3 month";
          }
          if ($fecha=="mensual") {
            $sf = "1 month";
          }
          $fecha_actual = date("Y-m-d");
          $fecha_final= date("Y-m-d",strtotime($fecha_actual."+ ".$sf));
          $id = Auth::user()->id;
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
          $n->import_move = $plan->price;
          $n->date_move= $fecha_actual;
          $n->user_id = $id;
          $n->save();
          // $guardar->save();
          $mensaje = "La compra se realizo con exito/1";
          
          }else{
            $mensaje = "Ocurrio un error no se reconocio el tipo de plan/0";
          }
          
        }else{
          $mensaje= "Ocurrio un error para mas informacion comuniquese con el administrador/0";
        }
        return redirect()->route('planes')->with('mensaje',$mensaje);
       // return view('',['mensaje']);
      } catch (\PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo "<br>";
        echo $ex->getData();
        die($ex);
      } catch (Exception $ex) {
        die($ex);
      }
    }
    public function paypal_error(Request $request){
      $mensaje ="Ocurrio un error a la hora del pago/2";
      return redirect()->route('planes')->with('mensaje',$mensaje);
    }
    public function pago_paypal_index(Request $request)
    {
        include ('librerias/funciones.php');
      $p = Proyecto::where('usuario',Auth::user()->id)->find($request->id);
     if ($p) {
        return view('formapago',['p'=>$p]);
      }else{
        return redirect('proyectos');
      }
    }
    public function pago_paypal(Request $request){
      $p = Proyecto::where('usuario',Auth::user()->id)->find($request->id);
      // print_r();exit();
      if ($p and $p->urgente!="1") {
      $apiContext = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET')));
            $apiContext->setConfig(['mode' => 'live']);

      // Create new payer and method
      $payer = new Payer();
      $payer->setPaymentMethod("paypal");
      // Set redirect URLs
      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl(route('pago_proceso'))
        ->setCancelUrl(route('pago_error'));
        //Set Item
      $item1 = new Item();
      $item1->setName($request->id.".Adicionar urgente al proyecto")->setCurrency('USD')->setQuantity(1)->setPrice("10");
      // print_r($item1."");exit();
      // $item2 = new Item();
      // $item2->setName('Plan numero dos')->setCurrency('USD')->setQuantity(1)->setPrice(20);
      
      //Lista de Items
      $itemList = new ItemList();
      $itemList->setItems(array($item1/*,$item2*/));
      // Set payment amount
      $transaction = new Transaction();
      $amount = new Amount();
      $amount->setCurrency("USD")
        ->setTotal("10");
      // Set transaction object
      $transaction->setAmount($amount)->setItemList($itemList)
        ->setDescription("Compra en Laboraplanet");

      // Create the full payment object
      $payment = new Payment();
      $payment->setIntent('sale')
        ->setPayer($payer)
        ->setRedirectUrls($redirectUrls)
        ->setTransactions(array($transaction));

          // Create payment with valid API context
          try {
            $payment->create($apiContext);
            // Get PayPal redirect URL and redirect the customer
            $approvalUrl = $payment->getApprovalLink();
            return redirect($approvalUrl);exit();
            // Redirect the customer to $approvalUrl
          } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
          } catch (Exception $ex) {
            die($ex);
          }

      }else{
        return redirect()->route('proyect')->with('mensaje','Este Proyecto ya esta de modo urgente/2');
      }



    }
    public function pago_error(Request $request){
      return redirect()->route('proyect')->with('mensaje','Ocurrio un error a la hora del pago/2');
    }

    public function pago_proceso(Request $request){
      $apiContext = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET')));
            $apiContext->setConfig(['mode' => 'live']);
      // Get payment object by passing paymentId
      $paymentId = $request->paymentId;
      $payment = Payment::get($paymentId, $apiContext);
      $payerId = $request->PayerID;

      // Execute payment with payer ID
      $execution = new PaymentExecution();
      $execution->setPayerId($payerId);
      $mensaje = "";
      // print_r("asd");exit();
      try {
        // Execute payment
        $result = $payment->execute($execution, $apiContext);
        if ($result->state=="approved") {
          $cod = explode(".", $result->transactions[0]->item_list->items[0]->name);
          // print_r($cod[0]);
          $id = Auth::user()->id;
        // print_r($cod[0]);print_r($id);exit();
          $verificar = Proyecto::where('usuario',$id)->find($cod[0]);
          if ($verificar) {
            $verificar->urgente = 1;
            $v = $verificar->save();
            // print_r($verificar."");exit();
            $mensaje = "El pago se realizo con exito/1";
          }else{
            $mensaje = "Error no se encontro el proyecto/0";
          }
          }else{
            $mensaje = "Ocurrio un error para mas informacion comuniquese con el administrador/0";
          }
          
        
        return redirect()->route('proyect')->with('mensaje',$mensaje);
       // return view('',['mensaje']);
      } catch (PayPal\Exception\PayPalConnectionException $ex) {
        echo $ex->getCode();
        echo $ex->getData();
        die($ex);
      } catch (Exception $ex) {
        die($ex);
      }
    }


}



?>