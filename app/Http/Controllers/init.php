<?php


session_start();

require "LinkedIn/vendor/autoload.php";
require "LinkedIn.php";


use myPHPnotes\LinkedIn;


$app_id = "789miu011iu17t";
$app_secret = "3aIKovkOLcAV9CBN";
$app_callback = "https://www.laboraplanet.com/callback";
$app_scopes = "r_emailaddress r_basicprofile r_liteprofile w_member_social rw_company_admin w_share";

$ssl = false;

$linkedin = new LinkedIn($app_id,$app_secret,$app_callback,$app_scopes,$ssl);


?>
