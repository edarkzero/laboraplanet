<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use App\Proyecto;
// use App\Applied_Jobs;
// use App\User;
// use App\Abilities;
// require_once 'vendor/autoload.php';
// use Auth;
use Google_Client;
use Google_Service_PeopleService;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitarAmigo;

Class invitar_amigos extends Controller{

	
	 public function index(Request $request){
    // print_r(route('invitar_gmail'));exit();
	 	session_start();
	 	$client = new Google_Client();
		// include('index.php');
		$client->setClientId('441389896441-5cucgmt24rj2bcrv1toe44p3pbjf5jaf.apps.googleusercontent.com');
		$client->setClientSecret('ByyKt-BxTIQtCuSLwdbCD2SU');
		$url = route('invitar_gmail');
		$client->setRedirectUri($url);
$client->setAccessType('offline');
 $client->setApprovalPrompt('force');
		$client->addScope('profile');
		$client->addScope('https://www.googleapis.com/auth/contacts.readonly');
  		$auth_url = $client->createAuthUrl();

if (isset($_GET['code'])) {
  // Receive auth code from Google, exchange it for an access token, and
  // redirect to your base URL
  $client->authenticate($_GET['code']);
  // print_r($client->getAccessToken());

  $_SESSION['access_token'] = $client->getAccessToken();
	 return redirect()->to($url)->send();

} else if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
	$contacto = [];
  // You have an access token; use it to call the People API
	// print_r($_SESSION['access_token']);exit();
	$client->setAccessToken($_SESSION['access_token']);
		if (!$client->isAccessTokenExpired()) {
	// var_dump("sad");exit;
			# code...
			
		}else{
            session_destroy();
            	 return redirect()->to($auth_url)->send();
		}
	  $people_service = new Google_Service_PeopleService($client);
	  $optParams = [
	    'personFields' => 'names,emailAddresses,addresses,phoneNumbers',
		];
	$connections = $people_service->people_connections->listPeopleConnections(
	    'people/me', array('personFields' => 'names,emailAddresses,photos,phoneNumbers'));
	$c = 0;
	foreach ($connections as $value) {
		if (isset($value->getnames()[0]->displayName)) {
				$contacto[$c]['nombre']= $value->getnames()[0]->displayName;
			}
			if (isset($value->getphotos()[0]->url)) {
				$contacto[$c]['foto']= $value->getphotos()[0]->url;
			}
		if (isset($value->getEmailAddresses()[0]->value)) {
			$contacto[$c]['email'] = $value->getEmailAddresses()[0]->value;
		}
			if (isset($value->getphoneNumbers()[0]->canonicalForm)) {
				// print_r($value->getphoneNumbers()[0]->canonicalForm);echo "<br>";echo "<br>";echo "<br>";
			$contacto[$c]['celular'] = $value->getphoneNumbers()[0]->canonicalForm;
			// 	# code...
			}
  	$c++;
	}
	// exit();
	// print_r($contacto[0]);
	return view('contactar_gmail',compact('contacto'));
  // TODO: Use service object to request People data
} else {
  // $redirect_uri = 'http://localhost/api_contacto/index.php/?oauth';
  // print_r($redirect_uri);
	 return redirect()->to($auth_url)->send();
}



	 }

	 public function contactos_g(Request $request){
	 	 	// print_r($request->emails);
	 	 	$emails= $request->emails; 
	 	 	// echo "<br>";
	 	 	$nombreusupro= Auth::user()->nombres;
			$numeros = [];
	 	 	foreach ($emails as $value) {
	 	 		if (substr($value, 0,1)!="+") {
	 	 		$objDemo  = new \stdClass;
				$objDemo->userActual = $nombreusupro;
				Mail::to($value)->send(new InvitarAmigo($objDemo));
	 	 		}else{
	 	 			$numeros[]=$value;
	 	 		}
	 	 	}
	 	 	// print_r($numeros);exit();
	 	 	// echo "finish";exit();
	 	 	return redirect()->route('perfil')->with('mensaje1','Las invitaciones se envio correctamente');
	 	 }



 

}

 ?>

