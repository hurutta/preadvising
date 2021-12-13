<?php
	session_start();
	require 'dbconfig/config.php';
	if(isset($_SESSION['id'])):?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style4.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body style="margin-bottom: 40px;">
    
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Student Database</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a class="active" href="homepage.php">Home</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="pre.php">Advising</a></li>
                <li><a href="about.php">Faculty</a><li>
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
	        <div class="col-xs-12 text-center">
	            <div class="well">
    	            <h3 style="padding:0;margin-top:0">Choose the Name of the Department to see the courses you are looking for</h3>
        		    <form class="myform" action="homepage.php" method="post">
            			<button name="cse" class="button button1 btn btn-success">CSE</button>
            			<button name="mns" class="button button1 btn btn-success">MNS</button>
            			<button name="bus" class="button button1 btn btn-success">BUS</button>
            			<button name="law" class="button button1 btn btn-success">LAW</button>
        		    </form>
    		    </div>
            </div>
            <div class="col-xs-12">
			<?php
			if(isset($_POST['cse']))
			{
				$id=$_SESSION['id'];
				$all=array();				
				$query="select course_id FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][0]=$row['course_id'];
						$i++;
						
					}

				}
				$query="select faculty FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][1]=$row['faculty'];
						$i++;
						
					}
				}
				$query="select seat FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][2]=$row['seat'];
						$i++;
						
					}
				}

				$query="select class_time_1 FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][3]=$row['class_time_1'];
						$i++;
						
					}
				}
				$query="select class_time_2 FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][4]=$row['class_time_2'];
						$i++;
						
					}
				}
				$query="select exam FROM course WHERE course_id LIKE 'c%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][5]=$row['exam'];
						$i++;
						
					}
				}
				echo '<br><b>'.$i.'</b> courses offered by CSE department for next semester';
				echo '<br>';
				echo "<table border='5' class='table table-striped table-bordered'>";
					$all[0][0]="<b>Course Id</b>";
					$all[0][1]="<b>Faculty initial</b>";
					$all[0][2]="<b>Seat</b>";
					$all[0][3]="<b>Class Day Time 1</b>";
					$all[0][4]="<b>Class Day Time 2</b>";
					$all[0][5]="<b>Exam Day</b>";
					for($tr=0;$tr<$i;$tr++)
					{
					    echo "<tr>";
					    for($td=0;$td<6;$td++)
						{ 
					    		   echo "<td align='center'>".$all[$tr][$td]."</td>";  
					    }          
					    echo "</tr>";
					} 
					echo "</table>";

			}else
			if(isset($_POST['mns']))
			{
				$id=$_SESSION['id'];
				$all=array();				
				$query="select course_id FROM course WHERE course_id LIKE 'm%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][0]=$row['course_id'];
						$i++;
						
					}

				}
				$query="select course_id FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][0]=$row['course_id'];
						$i++;
						
					}

				}
				$query="select faculty FROM course WHERE course_id LIKE 'm%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][1]=$row['faculty'];
						$i++;
						
					}
				}
				$query="select faculty FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][1]=$row['faculty'];
						$i++;
						
					}
				}
				$query="select seat FROM course WHERE course_id LIKE 'm%' || 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][2]=$row['seat'];
						$i++;
						
					}
				}
				$query="select seat FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][2]=$row['seat'];
						$i++;
						
					}
				}
				$query="select class_time_1 FROM course WHERE course_id LIKE 'm%' || 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][3]=$row['class_time_1'];
						$i++;
						
					}
				}
				$query="select class_time_1 FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][3]=$row['class_time_1'];
						$i++;
						
					}
				}
				$query="select class_time_2 FROM course WHERE course_id LIKE 'm%' || 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][4]=$row['class_time_2'];
						$i++;
						
					}
				}
				$query="select class_time_2 FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][4]=$row['class_time_2'];
						$i++;
						
					}
				}
				$query="select exam FROM course WHERE course_id LIKE 'm%' || 'p'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][5]=$row['exam'];
						$i++;
						
					}
				}
				$query="select exam FROM course WHERE course_id LIKE 'p%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][5]=$row['exam'];
						$i++;
						
					}
				}
				echo '<br><b>'.$i.'</b> courses offered by mns department for next semester';
				echo '<br>';
				echo "<table border='5' class='table table-striped table-bordered'>";
					$all[0][0]="<b>Course Id</b>";
					$all[0][1]="<b>Faculty initial</b>";
					$all[0][2]="<b>Seat</b>";
					$all[0][3]="<b>Class Day Time 1</b>";
					$all[0][4]="<b>Class Day Time 2</b>";
					$all[0][5]="<b>Exam Day</b>";
					for($tr=0;$tr<$i;$tr++)
					{
					    echo "<tr>";
					    for($td=0;$td<6;$td++)
						{ 
					    		   echo "<td align='center'>".$all[$tr][$td]."</td>";  
					    }          
					    echo "</tr>";
					} 
					echo "</table>";

			}else
			if(isset($_POST['law']))
			{
				$id=$_SESSION['id'];
				$all=array();				
				$query="select course_id FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][0]=$row['course_id'];
						$i++;
						
					}

				}
				$query="select faculty FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][1]=$row['faculty'];
						$i++;
						
					}
				}
				$query="select seat FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][2]=$row['seat'];
						$i++;
						
					}
				}

				$query="select class_time_1 FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][3]=$row['class_time_1'];
						$i++;
						
					}
				}
				$query="select class_time_2 FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][4]=$row['class_time_2'];
						$i++;
						
					}
				}
				$query="select exam FROM course WHERE course_id LIKE 'l%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][5]=$row['exam'];
						$i++;
						
					}
				}
				echo '<br><b>'.$i.'</b> courses offered by LAW department for next semester';
				echo '<br>';
				echo "<table border='5' class='table table-striped table-bordered'>";
					$all[0][0]="<b>Course Id</b>";
					$all[0][1]="<b>Faculty initial</b>";
					$all[0][2]="<b>Seat</b>";
					$all[0][3]="<b>Class Day Time 1</b>";
					$all[0][4]="<b>Class Day Time 2</b>";
					$all[0][5]="<b>Exam Day</b>";
					for($tr=0;$tr<$i;$tr++)
					{
					    echo "<tr>";
					    for($td=0;$td<6;$td++)
						{ 
					    		   echo "<td align='center'>".$all[$tr][$td]."</td>";  
					    }          
					    echo "</tr>";
					} 
					echo "</table>";

			}else
			if(isset($_POST['bus']))
			{
				$id=$_SESSION['id'];
				$all=array();				
				$query="select course_id FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][0]=$row['course_id'];
						$i++;
						
					}

				}
				$query="select faculty FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][1]=$row['faculty'];
						$i++;
						
					}
				}
				$query="select seat FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][2]=$row['seat'];
						$i++;
						
					}
				}

				$query="select class_time_1 FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][3]=$row['class_time_1'];
						$i++;
						
					}
				}
				$query="select class_time_2 FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][4]=$row['class_time_2'];
						$i++;
						
					}
				}
				$query="select exam FROM course WHERE course_id LIKE 'b%'";
				$query_run=mysqli_query($con,$query);
				if(mysqli_num_rows($query_run)>0)
				{
					$i=1;
					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
					{
						$all[$i][5]=$row['exam'];
						$i++;
						
					}
				}
				echo '<br><b>'.$i.'</b> courses offered by BBS department for next semester';
				echo '<br>';
				echo "<table border='5' class='table table-striped table-bordered'>";
				    $all[0][0]="<b>Course Id</b>";
					$all[0][1]="<b>Faculty initial</b>";
					$all[0][2]="<b>Seat</b>";
					$all[0][3]="<b>Class Day Time 1</b>";
					$all[0][4]="<b>Class Day Time 2</b>";
					$all[0][5]="<b>Exam Day</b>";
					for($tr=0;$tr<$i;$tr++)
					{
					    echo "<tr>";
					    for($td=0;$td<6;$td++)
						{ 
					    		   echo "<td align='center'>".$all[$tr][$td]."</td>";  
					    }          
					    echo "</tr>";
					} 
					echo "</table>";

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