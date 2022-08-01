<?php
include('functions.php');
$ip = get_client_ip();
$day = date('l jS  h:i:s A');
file_put_contents('hits.txt', 'INDEX '.$_SERVER['REMOTE_ADDR']." ".$day."\n", FILE_APPEND);
$hash = md5($ip);
header('Location: login.php' . getUrlHash($hash));
