<?php
	session_start();
	$_SESSION['index'] = true;
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login page</title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="js/js1.js"></script>
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color:#000000">
	<section>
	<h2> <br> </h2>
	<center>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="index.php" method="post">
			<h1>Sign in to your Usis ID</h1>
			<div>
				<IMG SRC="img/a.gif" width="200" height="60">
			</div>
			<span>or use your account</span>
			<input name="id" type="text" placeholder="Your student ID" />
			<input name="password" type="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button name="submit">Sign In</button>
		</form>

		<?php
			if(isset($_POST['submit']))
			{
				$id=$_POST['id'];
				$password=$_POST['password'];
				$query="select * from user WHERE student_id='$id' AND password='$password'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$_SESSION['id']=$id;
					?>
					<meta charset="utf-8">;
                    <meta http-equiv="refresh" content="0;url=homepage.php">;
					<?php
					header('location:homepage.php');
				}else
				{
					echo '<script type="text/javascript"> alert("user name and password didnot matched,try again")</script>';
				}
			}
		?>
	</div>




	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Student!</h1>
				<p>If you doesn't have any account, create this today!</p>
				<button onclick="window.location.href = 'register.php';" class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</center>

<footer style="background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
    padding: 10px">
	<p style="margin:0">		
		All right reserved by <a target="_blank" href="https://www.facebook.com/">CARB University</a> &copy; 2019.
	</p>
</footer>

	</div>
	</section>
</body>

</html>