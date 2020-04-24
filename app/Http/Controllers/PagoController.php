<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Proyecto;
use App\Applied_Jobs;
use App\Abilities;
use App\Agreements;
use DB;
use App\User;
use App\Money_moves;
use Auth;
use Storage;

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
use App\Notifications;
use App\Mail\PropuestaAceptada;
use App\Mail\PagoPropuesta;
use Illuminate\Support\Facades\Mail;
Class PagoController extends Controller{

	public function index(Request $request)
	{
	    include ('librerias/funciones.php');
		// print_r($request->codigo);exit();
		$dato = Applied_Jobs::where('id_project',$request->proyecto)
							->where('id_user_employee',$request->codigo)
							->where('id_user_employer',Auth::user()->id)
							->first();

		if (!$dato) {
			return redirect('proyectos');
		}
		return View('pago',compact('dato'));
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


    $pro =$request->proyecto;

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


        //id_user_employer
          $id = Auth::user()->id;
          //id_project
          $pro =$request->proyecto;
          //id_user_employee
          $cod = $request->codigo;


            $verificar = Applied_Jobs::where('id_project',$pro)
                                ->where('id_user_employee',$cod)
                                ->where('id_user_employer',$id)
                                ->first();

            $precio = $verificar->economic_proposal;


            $estadoproyecto = Proyecto::where('id',$pro)
                                      ->update([
                                            "estado"=>4,
                                              ]);
                                              
    //AQUI SE OBTIENE EL NOMBRE DEL PROYECTO AL QUE APLICO
      $proyectoc = Proyecto::where('id',$request->proyecto)
                            ->select('titulo')->get();

            if($verificar)
            {
              $verificar->state_aplication =4;
              $v = $verificar->save();

                    $noti = new Notifications;
                    $noti->destination = Trim($cod);
                    $noti->type_notification = Trim("Contratado");
                    $noti->author = Trim(Auth::user()->id);
                    $noti->viewed = Trim(0);
                    $noti->description = Trim("Felicidades has sido contratado por ".Auth::user()->nommbres ." ".Auth::user()->apellidos." en el proyecto ".$proyectoc[0]['titulo']." por el monto de $ ".$precio.", realizar tu trabajo con puntualidad y profesionalismo te permitirá subir de nivel en la plataforma y aumentar tus clientes.");
                    //  [Nom_empleador]
                    $noti->date_done = Trim(date('Y-m-d'));
                    $noti->url = Trim("trabajos");
                    $noti->save();



                $n = new Money_moves();
                $n->move = "Contrato";
                $n->description = "Se realizo una contratacion";
                $n->import_move = $amount;
                $n->date_move = date("Y-m-d");
                $n->user_id = $id;
                $n->id_contratado = $cod;
                $n->id_proyecto= $pro;

                $n->save();
                
       //AQUI SE OBTIENE EL NOMBRE,APELLIDO,CORREO DEL USUARIO QUE APLICO
      $usuarioc = User::where('id',$request->codigo)->select('correo','nombres','apellidos')->get();
      $correoenviar = $usuarioc[0]['correo'];




      
                //CODIGO PARA ENVIAR CORREO ELECTRONICO AL USUARIO APLICADO AL PROYECTO

                      $objDemo = new \stdClass;
                      $objDemo->usuarioc = $usuarioc;
                      $objDemo->proyectoc = $proyectoc;
                      $objDemo->precio = $precio;
                      Mail::to($correoenviar)->send(new PropuestaAceptada($objDemo));

                //CODIGO PARA ENVIAR CORREO ELECTRONICO AL USUARIO EMPLEADOR

                      $objDemo2 = new \stdClass;
                      $objDemo2->idpro = $request->proyecto;
                      $objDemo2->usuapli = $usuarioc;
                      $objDemo2->proyectoc = $proyectoc; 
                      $objDemo2->numpedido = $numpedido;
                      $objDemo2->numautori = $numautori;
                      $objDemo2->comprador = $comprador;
                      $objDemo2->numtarje = $numtarje;
                      $objDemo2->fechayhoralleva = $fechayhoralleva;
                      $objDemo2->importe = $importe;
                      $objDemo2->moneda = $moneda;
                      $objDemo2->comentarios = $comentarios;
                      Mail::to(Auth::user()->correo)->send(new PagoPropuesta($objDemo2));
                


}


  
    return redirect()->route('recibo_pago',compact('numpedido','numautori','comprador','numtarje','fechayhoralleva','importe','moneda','comentarios','idtransac','pro'));



    }
    else
    {

           //id_project
           $pro =$request->proyecto;
      //     //id_user_employee
           $cod = $request->codigo;


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


       return redirect()->route('recibo_pago_error',compact('numpedido','numtarje','fechayhoralleva','comentarios','cod','pro')); 




    }










exit();

      //   if($status == 200)
      //   {
      //     //id_user_employer
      //     $id = Auth::user()->id;
      //     //id_project
      //     $pro =$request->proyecto;
      //     //id_user_employee
      //     $cod = $request->codigo;


      //       $verificar = Applied_Jobs::where('id_project',$pro)
      //                           ->where('id_user_employee',$cod)
      //                           ->where('id_user_employer',$id)
      //                           ->first();

      //       if($verificar)
      //       {
      //         $verificar->state_aplication =4;
      //         $v = $verificar->save();





      //         $n = new Money_moves();
      //           $n->move = "Contato";
      //           $n->description = "Se realizo una contratacion";
      //           $n->import_move = $amount;
      //           $n->date_move = date("Y-m-d");
      //           $n->user_id = $id;
      //           $n->id_contratado = $cod;
      //           $n->id_proyecto= $pro;

      //           $n->save();
                
      //  //AQUI SE OBTIENE EL NOMBRE,APELLIDO,CORREO DEL USUARIO QUE APLICO
      // $usuarioc = User::where('id',$request->codigo)->select('correo','nombres','apellidos')->get();
      // $correoenviar = $usuarioc[0]['correo'];

      // //AQUI SE OBTIENE EL NOMBRE DEL PROYECTO AL QUE APLICO
      // $proyectoc = Proyecto::where('id',$request->proyecto)->select('titulo')->get();



      
      //           //CODIGO PARA ENVIAR CORREO ELECTRONICO


      //           $data = [
      //                   'usuarioc'=>$usuarioc,
      //                   'proyectoc'=>$proyectoc,
      //                   'enviarcorreo'=>$correoenviar
      //                 ];

      //           Mail::send('mail.propuesta_aceptada', $data, function($message) use ($data) {
      //           $message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
      //           $message->to($data['enviarcorreo']);
      //           $message->subject('�0�3 PROPUESTA ACEPTADA !');
      //          });              
               
                
                
                
                
                

      //       }
      //       else
      //       {
              
      //         $mensaje = "Error no se encontro los datos/0";
      //           return redirect()->route('proyect')->with('mensaje',$mensaje);

      //       }                    




      //     $mensaje = "El pago se realizo con exito/1";
      //      return redirect()->route('proyect')->with('mensaje',$mensaje);
      //   }
      //   else
      //   {
      //     $mensaje = "Ocurrio un error para mas informacion comuniquese con el administrador/0";
      //      return redirect()->route('proyect')->with('mensaje',$mensaje);
      //   }


  }

	
	
	
	
	
	
	public function conexion(Request $request){
		$pro =$request->proyecto;
		$cod = $request->codigo;
		 $dato = Applied_Jobs::where('id_project',$request->proyecto)
							->where('id_user_employee',$request->codigo)
							->where('id_user_employer',Auth::user()->id)
							->first();
      // print_r($dato);exit();
      if ($dato) {
      	if ($dato->state_aplication!="4") {
      		# code...
      	
      $apiContext = new ApiContext(new OAuthTokenCredential(env('PAYPAL_CLIENT_ID'),env('PAYPAL_SECRET')));
      $apiContext->setConfig(['mode' => 'live']);
      // Create new payer and method
      $payer = new Payer();
      $payer->setPaymentMethod("paypal");
      // Set redirect URLs
      $redirectUrls = new RedirectUrls();
      $redirectUrls->setReturnUrl(route('pago_p'))
        ->setCancelUrl(route('pago_e'));
        //Set Item
      $item1 = new Item();
      $item1->setName($pro.".Realizar pago al usuario .".$cod)->setCurrency('USD')->setQuantity(1)->setPrice($dato->economic_proposal);
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
        ->setTotal($dato->economic_proposal);
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
			return redirect()->route('proyect')->with('mensaje','Este proyecto ya pago/2');
		}
      }else{
        return redirect()->route('proyect')->with('mensaje','Error no se encontro los datos/2');
      }
	}
	public function pago_p(Request $request){
	        $environment = new ProductionEnvironment(env('PAYPAL_CLIENT_ID'), env('PAYPAL_SECRET'));
        //        $environment = new SandboxEnvironment('AUPPwekyYvpd-xQGO2k58U-lduN8N8DvFykmT0afPfavPL-VPSOAf_hspUzCMxapjTDMIHHqfLs4X1dB', 'EJ1911_Gk2F7qsDLOqoQj1Te7vG7U7coLJtAx7yXBm4tNd1GTEZH-2FmCrtwOKa_uGE_eA_OS_PAO09R');
               $client = new PayPalHttpClient($environment);

 $request = new OrdersCaptureRequest($request->token);
$request->prefer('return=representation');

try {
        $response = $client->execute($request);

     if ($response->statusCode=="201") {
	          $cod = explode(".", $response->result->purchase_units[0]->description);
	          $id = Auth::user()->id;
	          $verificar = Applied_Jobs::where('id_project',$cod[0])
	          						   ->where('id_user_employee',$cod[2])
	          						   ->where('id_user_employer',$id)
	          						   ->first();
	          if ($verificar) {
	              
	                $noti = new Notifications;
                    $noti->destination = Trim($cod[2]);
                    $noti->type_notification = Trim("Contratado");
                    $noti->author = Trim(Auth::user()->id);
                    $noti->viewed = Trim(0);
                    $noti->description = Trim("Felicidades has sido contratado por ".Auth::user()->nommbres ." ".Auth::user()->apellidos." realizar tu trabajo con puntualidad y profesionalismo.");
                    //  [Nom_empleador]
                    $noti->date_done = Trim(date('Y-m-d'));
                    $noti->url = Trim("trabajos");
                    $noti->save();
                    
	            $verificar->state_aplication = 4;
	            $v = $verificar->save();
	             $n = new Money_moves();
                  $n->move = "Contrato";
                  $n->description = "Se realizó una contratación";
                  $n->import_move = $response->result->purchase_units[0]->amount->value;
                  $n->date_move=  date("Y-m-d");
                  $n->user_id = $id;
                  $n->id_contratado = $cod[2];
                  $n->id_proyecto = $cod[0];
                  
                  $n->save();
	                  //AQUI OBTIENES EL CORREO, NOMBRE Y APELLIDOS DEL USUARIO QUE APLICO
                $usuarioc = User::where('id',$cod[2])->select('correo','nombres','apellidos')->get();

                $coreoenviar = $usuarioc[0]['correo'];
                
                //AQUI OBTIENES EL NOMBRE DEL PROYECTO
                $proyectoc = Proyecto::where('id',$cod[0])->select('titulo')->get();
              

                //CODIGO PARA ENVIAR CORREO ELECTRONICO


                // $data = [
                //         'usuarioc'=>$usuarioc,
                //         'proyectoc'=>$proyectoc,
                //         'enviarcorreo'=>$coreoenviar
                //       ];

                      $objDemo = new \stdClass;
                      $objDemo->usuarioc = $usuarioc;
                      $objDemo->proyectoc = $proyectoc;
                      $objDemo->precio =  $response->result->purchase_units[0]->amount->value;   
                Mail::to($coreoenviar)->send(new PropuestaAceptada($objDemo));

               //  Mail::send('mail.propuesta_aceptada', $data, function($message) use ($data) {
               //  $message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
               //  $message->to($data['enviarcorreo']);
               //  $message->subject('PROPUESTA ACEPTADA');
               // });
	            $mensaje = "Felicidades , ahora ".$usuarioc[0]['nombres']." ".$usuarioc[0]['apellidos']." comenzará a trabajar para ti/1";
	          }else{
	            $mensaje = "Error no se encontro los datos/0";
	          }
	          }else{
	            $mensaje = "Ocurrio un error para mas informacion comuniquese con el administrador/0";
	          }
	        return redirect()->route('proyect')->with('mensaje',$mensaje);
 
 }catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
	    
	    
	    
	    exit();
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
	          $cod = explode(".", $result->transactions[0]->item_list->items[0]->name);
	          $id = Auth::user()->id;
	          $verificar = Applied_Jobs::where('id_project',$cod[0])
	          						   ->where('id_user_employee',$cod[2])
	          						   ->where('id_user_employer',$id)
	          						   ->first();
	          if ($verificar) {
	              
	                $noti = new Notifications;
                    $noti->destination = Trim($cod[2]);
                    $noti->type_notification = Trim("Contratado");
                    $noti->author = Trim(Auth::user()->id);
                    $noti->viewed = Trim(0);
                    $noti->description = Trim("Felicidades has sido contratado por ".Auth::user()->nommbres ." ".Auth::user()->apellidos." realizar tu trabajo con puntualidad y profesionalismo.");
                    //  [Nom_empleador]
                    $noti->date_done = Trim(date('Y-m-d'));
                    $noti->url = Trim("trabajos");
                    $noti->save();
                    
	            $verificar->state_aplication = 4;
	            $v = $verificar->save();
	             $n = new Money_moves();
                  $n->move = "Contrato";
                  $n->description = "Se realizó una contratación";
                  $n->import_move = $result->transactions[0]->amount->total;
                  $n->date_move=  date("Y-m-d");
                  $n->user_id = $id;
                  $n->id_contratado = $cod[2];
                  $n->id_proyecto = $cod[0];
                  
                  $n->save();
	                  //AQUI OBTIENES EL CORREO, NOMBRE Y APELLIDOS DEL USUARIO QUE APLICO
                $usuarioc = User::where('id',$cod[2])->select('correo','nombres','apellidos')->get();

                $coreoenviar = $usuarioc[0]['correo'];
                
                //AQUI OBTIENES EL NOMBRE DEL PROYECTO
                $proyectoc = Proyecto::where('id',$cod[0])->select('titulo')->get();
              

                //CODIGO PARA ENVIAR CORREO ELECTRONICO


                // $data = [
                //         'usuarioc'=>$usuarioc,
                //         'proyectoc'=>$proyectoc,
                //         'enviarcorreo'=>$coreoenviar
                //       ];

                      $objDemo = new \stdClass;
                      $objDemo->usuarioc = $usuarioc;
                      $objDemo->proyectoc = $proyectoc;

                Mail::to($coreoenviar)->send(new PropuestaAceptada($objDemo));

               //  Mail::send('mail.propuesta_aceptada', $data, function($message) use ($data) {
               //  $message->from('correo.de.prueba.labora@gmail.com','LABORAPLANET');
               //  $message->to($data['enviarcorreo']);
               //  $message->subject('PROPUESTA ACEPTADA');
               // });
	            $mensaje = "Felicidades , ahora ".$usuarioc[0]['nombres']." ".$usuarioc[0]['apellidos']." comenzará a trabajar para ti/1";
	          }else{
	            $mensaje = "Error no se encontro los datos/0";
	          }
	          }else{
	            $mensaje = "Ocurrio un error para mas informacion comuniquese con el administrador/0";
	          }
	        return redirect()->route('proyect')->with('mensaje',$mensaje);

		      } catch (PayPal\Exception\PayPalConnectionException $ex) {
		        echo $ex->getCode();
		        echo $ex->getData();
		        die($ex);
		      } catch (Exception $ex) {
		        die($ex);
		      }
	}
	
	  public function pago_e(){
      $mensaje ="Ocurrio un error a la hora del pago/2";
      return redirect()->route('proyect')->with('mensaje',$mensaje);
      }

	public function probar()
	{
		$this->mejorespeso(0);

	}
function mejorespeso($mejores,$nota1=0,$nota2=0,$nota3=0,$nota4=0,$nota5=0,$nota6=0,$nota7=0,$nota8=0,$nota9=0,$nota10=0,$nota11=0,$nota12=0)
    {
        if ($mejores<=func_num_args()-1) {      
        $notas = [
            '1'=>$nota1,
            '2'=>$nota2,
            '3'=>$nota3,
            '4'=>$nota4,
            '5'=>$nota5,
            '6'=>$nota6,
            '7'=>$nota7,
            '8'=>$nota8,
            '9'=>$nota9,
            '10'=>$nota10,
            '11'=>$nota11,
            '12'=>$nota12,
        ];
        //ORDENADO SIN PERDER MATRIZ;
        arsort($notas);
        //AGARRA LOS 4 PRIMEROS SIN PERDER MATRIZ;
        $a = array_slice($notas, 0,$mejores,true);
        //ORDENAR POR MATRIZ;
        ksort($a);

        $c =1;
        $total =0;
        foreach ($a as $key => $value) {            
            $total += $value*$c;
            echo $value*$c."---".$value."<br>";;
            $c++;
        }
        print_r($total);
        }else{
            echo "error";
        }
    }
}