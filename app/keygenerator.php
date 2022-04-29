<?php
//$res = openssl_pkey_new();
//openssl_pkey_export_to_file($res,'./rsaKeys/rsaTempKey.key');

//openssl_pkey_export($res,$privatekey);

//$details = openssl_pkey_get_details($res);
//
//echo $details['key'];

//echo $privatekey;



//use Firebase\JWT\JWT;
//use Firebase\JWT\Key;
//require_once('./vendor/autoload.php');
//
//$privateKey = file_get_contents('./rsaKeys/rsaKeys.key');
//
//$res = openssl_pkey_get_private($privateKey);
////
////echo openssl_pkey_get_details($res)['key'];
//
//$date = new DateTimeImmutable();
//$payload = [
//    'exp' => $date->getTimestamp()+10,
//    'sub' => 'wesh alors'
//];
//
//echo JWT::encode($payload, $res, 'RS256');