<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>register page</title>
	<script src="js/js2.js"></script>
	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body >
	<div class="content">
  <div class="title">Create account</div>
  <input type="text" placeholder="E-mail"/>
  <input type="password" placeholder="Password"/>
  <input type="checkbox" id="rememberMe"/>
  <label for="rememberMe"></label><span>I have read and agree to the <a href="#">Terms of Use </a>and <a href="#">Privacy Policy</a></span>
  <button>Create Account</button>
  <div class="social"> <span>or sign up with social media</span></div>
  <div class="buttons">
    <button class="facebook"><i class="fa fa-facebook"></i>Facebook</button>
    <button class="twitter"><i class="fa fa-twitter"></i>Twitter</button>
    <button class="google"><i class="fa fa-google-plus"></i>Google</button>
  </div>
  <div class="already">Already have an account? <a href="#">Sign In</a></div>
</div>
</body>

</html>