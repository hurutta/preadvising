<?php
	require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>register page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<script src="js/js2.js"></script>
	<link rel="stylesheet" href="css/style3.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<section>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
  <div class="panel panel-primary">
      <div class="panel-heading"><h3 style="padding:0;margin:0">Create Account</h3></div>
      <div class="panel-body">
  <form action="register.php" method="post">
      <div class="form-group">
        <input name="id" type="text" class="input-control inputvalues" placeholder="Type your user ID" required/>
      </div>
      <div class="form-group">
      <input name="name" type="text" class="input-control inputvalues" placeholder="Type your name" required/>
      </div>
      <div class="form-group">
      <input name="birth" type="text" class="input-control inputvalues" placeholder="Your birthday (DD/MM/YYYY)" required/>
      </div>
      <div class="form-group">
      <input name="mail" type="text" class="input-control inputvalues" placeholder="Your email ID (e.g. aaaaa@gmail.com)" required/>
      </div>
      <div class="form-group">
      <input name="phone" type="text" class="input-control inputvalues" placeholder="Your mobile number (e.g. 017********)" required/>
      </div>
      <div class="form-group">
      <input name="cgpa" type="text" class="input-control inputvalues" placeholder="Your current cgpa (e.g. 3.7)" required/>
      </div>
      <div class="form-group">
      <input name="credit" type="text" class="input-control inputvalues" placeholder="Completed credit (e.g. 92)" required/>
      </div>
      <div class="form-group">
      <input name="password" type="password" class="input-control inputvalues" placeholder="Type a new password" required/>
      </div>
      <div class="form-group">
      <input name="cpassword" type="password" class="input-control inputvalues" placeholder="confirm your password" required/>
      </div>
          <div class="checkbox">
    <label><input type="checkbox" id="rememberMe"> I have read and agree to the <a href="#">Terms of Use </a>and <a href="#">Privacy Policy</a></label>
  </div>
  <button name="submit" type="submit" class="btn btn-success">Register</button>
  <br/>
  </form>
  <br/>
  <div class="alert alert-warning" style="margin-bottom:0px">
      Already have an account? <a href="index.php">Sign In</a>
      </div>
  </div>
  <?php
			if(isset($_POST['submit']))
			{
				//echo '<script type="text/javascript"> alert("submit button clicked")</script>';
				$id= $_POST['id'];
				$name=$_POST['name'];
				$birth=$_POST['birth'];
				$mail=$_POST['mail'];
				$phone=$_POST['phone'];
				$cgpa=$_POST['cgpa'];
				$credit=$_POST['credit'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				if($password==$cpassword)
				{
					$query="select * from user WHERE student_id='$id'";
					$query_run=mysqli_query($con,$query);
					if(mysqli_num_rows($query_run)>0)
					{
						echo '<script type="text/javascript"> alert("USER already exist")</script>';
					}else
					{
						$query="insert into user values('$id','$name','$birth','$mail','$phone','$cgpa','$credit','$password')";
						$query_run=mysqli_query($con,$query);
						if($query_run)
						{
							?>
	        				<meta charset="utf-8">;
                            <meta http-equiv="refresh" content="0;url=done.php">;
				            <?php
							echo '<script type="text/javascript"> alert("Done! go to login page to login")</script>';
						}else
						{
							echo '<script type="text/javascript"> alert("error!")</script>';	
						}
					}
				}else
				{
					echo '<script type="text/javascript"> alert("password did not match,try again")</script>';
				}
			}
		?>


</div>
</div>
  </div>
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
	
</section>
</body>

</html>