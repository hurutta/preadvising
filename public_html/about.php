<?php
	session_start();
	require 'dbconfig/config.php';
	if(isset($_SESSION['id'])):?>
	
	<!DOCTYPE html>
<html>
    
    <head>
	<title>Dashboard : Faculty</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>

<body style="margin-bottom:40px">
    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Student Database</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="homepage.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="pre.php">Advising</a></li>
                <li><a class="active" href="about.php">Faculty</a><li>
            </ul>
             <ul class="nav navbar-nav navbar-right">
                <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;<?php
    					$id=$_SESSION['id'];
    					$query="select name from user WHERE student_id='$id'";
    					$query_run=mysqli_query($con,$query);
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
        					echo $row['name'];
    					}
    					echo ' (';
    					echo $id;
    					echo ')';
    				?>
    				</a>
    			</li>
                <li>
              		<form action="homepage.php" method="post">
        			<button name="logout" type="submit" class="btn btn-danger" style="margin-top: 8px;margin-right: 8px;">Logout <span class="glyphicon glyphicon-log-out"></span> </button>
              		</form>
        			<?php
        			if(isset($_POST['logout']))
        			{
        				session_destroy();
        				?>
        					<meta charset="utf-8">;
                            <meta http-equiv="refresh" content="0;url=index.php">;
        				<?php
        				header('location:index.php');
        			}			
        			?>
    			</li>
            </ul>
        </div>
    </nav>
    
	<div class="container-fluid">
	    <div class="row">
	        <div class="col-xs-12">
	

			<?php
				$data=array();
				$id=$_SESSION['id'];
				//echo '<p>ID number : ';
				$data1[0]="<b>Faculty Initial</b>";
				$query="select faculty from faculty";
				$query_run=mysqli_query($con,$query);
				$i=1;
				while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
				{
					$data1[$i]=$row['faculty'];
					$i++;
				}
				
				$data2[0]="<b>Name</b>";
				$query="select name from faculty";
				$query_run=mysqli_query($con,$query);
				$i=1;
				while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
				{
					$data2[$i]=$row['name'];
					$i++;
				}
				
				$data3[0]="<b>Department</b>";
				$query="select dept_initial from faculty";
				$query_run=mysqli_query($con,$query);
				$i=1;
				while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
				{
					$data3[$i]=$row['dept_initial'];
					$i++;
				}
				
				$data4[0]="<b>Email</b>";
				$query="select email from faculty";
				$query_run=mysqli_query($con,$query);
				$i=1;
				while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
				{
					$data4[$i]=$row['email'];
					$i++;
				}
				
				$data5[0]="<b>Consultation Hour</b>";
				$query="select consultation_hour from faculty";
				$query_run=mysqli_query($con,$query);
				$i=1;
				while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
				{
					$data5[$i]=$row['consultation_hour'];
					$i++;
				}
				
				echo "<table class='table table-striped table-bordered'>";
				for($tr=0;$tr<$i;$tr++)
				{ 

				    echo "<tr>"; 
				    		   echo "<td align='center'>".$data1[$tr]."</td>";  
				               echo "<td align='center'>".$data2[$tr]."</td>";
				               echo "<td align='center'>".$data3[$tr]."</td>";  
				               echo "<td align='center'>".$data4[$tr]."</td>";
				               echo "<td align='center'>".$data5[$tr]."</td>";
				    echo "</tr>"; 
				} 
				echo "</table>";
			?>
			
			<?php
			if(isset($_POST['logout']))
			{
				session_destroy();
				header('location:index.php');
			}else
			if(isset($_POST['profile']))
			{
				header('location:profile.php');
			}else
			if(isset($_POST['home']))
			{
				header('location:homepage.php');
			}else
			if(isset($_POST['pread']))
			{
				header('location:pre.php');
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
</body>

</html>
<?php

    else:

    header("location:index.php");//send them to login

    endif;

?>