<?php

namespace App\Http\Controllers;
use App\Http\Controllers\IpController;
use Illuminate\Http\Request;
use App\Country;
// use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Redirect;



class IpController extends Controller {
  public function ip(){
    include("geoiploc/geoiploc.php"); 
    error_reporting(E_ALL & ~E_NOTICE);
    if (empty($_POST['checkip'])){

    //Obtiene la IP del cliente
    function get_client_ip() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
    
    $ipfun = get_client_ip();
    //print_r($ipfun);
    //exit();
    
    $llevar = explode(",",$ipfun);
    //exit();
    
    //print_r($llevar[0]);
    //exit();
  	 $ip = $llevar[0];
    }
    else{
  	  $ip = $_POST['checkip']; 
    }
  return getCountryFromIP($ip, "namE");
  }  
  public function registrar(){
        require "init.php";
         //print_r($this->ip());
         //exit();
         //$this->ip();Coun
         $pais = Country::all();
  return view('auth.register',['pais'=>$pais])->with('linkedin',$linkedin);
  }
  
    public function convocatoria(){
        require "init.php";
        $pais = Country::all();
  return view('convocatoria',['pais'=>$pais])->with('linkedin',$linkedin);
  }
  
   public function convocatoriae(){
    require "init.php";
    $pais = Country::all();
  return view('convocatoriae',['pais'=>$pais])->with('linkedin',$linkedin);
  }
  
  public function postregister() {
    return view('confirmacion');
  }
}
?>