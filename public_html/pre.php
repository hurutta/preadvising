<?php
	session_start();
	require 'dbconfig/config.php';
	if(isset($_SESSION['id'])):?>
	
	
	<!DOCTYPE html>
<html>
    
    <head>
	<title>Dashboard : ADVISING PANEL</title>
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
                <li><a class="active" href="pre.php">Advising</a></li>
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
	        <div class="col-sm-12 text-center">
	            <div class="panel panel-primary">
	                <div class="panel-body alert-success">
    	                <img src="img/avatar1.png" alt="Avatar woman" width="60" height="60"></center>
            		    <?php
            					$id=$_SESSION['id'];
            					$query="select name from user WHERE student_id='$id'";
            					$query_run=mysqli_query($con,$query);
            					$name;
            					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
            					{
                					$name=$row['name'];
            					}
            					echo "<br>".'<center>'.'<b>'.$name.' ('.$id.')'.'</b>';
        				?>
    				</div>
				</div>
	        </div>
            <div class="col-sm-8">
                <div class="panel panel-primary">
    	            <div class="panel-heading">
    	                <h2 style="padding:0;margin:0">Advised Course Details</h2>
    	            </div>
    	            <div class="panel-body">
    	        <?php
    					
    					$all=array();
    					$id=$_SESSION['id'];
    					$query="select course_id from list WHERE student_id='$id'";
    					$query_run=mysqli_query($con,$query);
    					$i=1;
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
    						$all[1][$i]=$row['course_id'];
    						$i++;
    					}
    					$query="select faculty from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id=$id group by course.course_id";
    					$query_run=mysqli_query($con,$query);
    					$i=1;
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
    						$all[2][$i]=$row['faculty'];
    						$i++;
    					}
    					$query="select class_time_1 from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id=$id group by course.course_id";
    					$query_run=mysqli_query($con,$query);
    					$i=1;
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
    						$all[3][$i]=$row['class_time_1'];
    						$i++;
    					}
    					$query="select class_time_2 from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id=$id group by course.course_id";
    					$query_run=mysqli_query($con,$query);
    					$i=1;
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
    						$all[4][$i]=$row['class_time_2'];
    						$i++;
    					}
    					$query="select exam from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id=$id group by course.course_id";
    					$query_run=mysqli_query($con,$query);
    					$i=1;
    					while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) 
    					{
    						$all[5][$i]=$row['exam'];
    						$i++;
    					}
    					echo "<table class='table table-bordered table-striped'>";
    					$all[1][0]="<b>Course Id</b>";
    					$all[2][0]="<b>Faculty Initial</b>";
    					$all[3][0]="<b>Class day time 1</b>";
    					$all[4][0]="<b>Class day time 2</b>";
    					$all[5][0]="<b>Exam day</b>";
    					for($tr=0;$tr<$i;$tr++)
    					{
    					    echo "<tr>";
    					    for($td=1;$td<=5;$td++)
    						{ 
				    		   echo "<td align='center'>".$all[$td][$tr]."</td>";  
    					    }          
    					    echo "</tr>";
    					} 
    					echo "</table>";
    			?>
    			</div>
    			</div>
    	    </div>
    	    <div class="col-sm-4">
    	        <div class="panel panel-primary">
    	            <div class="panel-heading">
    	                <h2 style="padding:0;margin:0">Advising Panel</h2>
    	            </div>
    	            <div class="panel-body">
    	                <lebel><b>Go to home to see the time schedule and other information about courses
    	                <br><hr>Type the course id you want to take:</b></lebel>
    			<br>
    			<form class="myformX" action="pre.php" method="post">
    			<div class="form-group">
    			    <input name="course" type="text" class="inputvalues form-control" placeholder="Type the course ID" required/>
    			</div>
    			<input name="submit2" type="submit" id="login_buttonX" class="btn btn-success btn-block" value="Add Course"/>
    			</form>
    			<?php
    				if(isset($_POST['submit2']))
    				{
    					$id=$_SESSION['id'];
    					$course= $_POST['course'];
    					$query="select * from course WHERE course_id='$course'";
    					$query_run=mysqli_query($con,$query);
    					if(mysqli_num_rows($query_run)>0)
    					{
    
    
    
    
    						$seat;
    						$query="select seat from course WHERE course_id='$course'";
    						$query_run=mysqli_query($con,$query);
    						while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) $seat=$row['seat'];
    						if($seat==0)
    						{
    							?>
    							<div class="alert">
    	 			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    	  						Not enough seats availabe
    							</div>
    							<?php							
    						}else     //seats are availabe
    						{
    							$counter=0;
    							$query="select course_id from list where student_id='$id'";
    							$query_run=mysqli_query($con,$query);
    							while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) $counter++;
    							if($counter>=4)
    							{
    								?>
    								<div class="alert">
    		 			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    		  						You have already taken maximum number of course for the next semester. Drop any course to take a new one, or to take more than stanrard limit, meet with the advisor
    								</div>
    								<?php
    							}else    //course limit availabe
    							{
    								$counter=0;
    								$query="select course_id from list where student_id='$id' AND course_id='$course'";
    								$query_run=mysqli_query($con,$query);
    								while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) $counter++;
    								//echo $counter;
    								if($counter>=1)
    								{
    									?>
    									<div class="alert">
    			 			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    			  						You have already taken this course, take a different one
    									</div>
    									<?php
    								}else    //not taken yet
    								{
    									$counter=0;
    									$time1;
    									$query="select class_time_1 FROM course WHERE course_id='$course'";
    									$query_run=mysqli_query($con,$query);									
    									while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) $time1=$row['class_time_1'];
    									$query="select class_time_1 from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id='$id' group by course.course_id";
    									$query_run=mysqli_query($con,$query);									
    									while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC))
    									{
    										$time11=$row['class_time_1'];
    										if($time1==$time11)
    										{
    											$counter=1;
    										}
    									}
    									$time2;
    									$query="select class_time_2 FROM course WHERE course_id='$course'";
    									$query_run=mysqli_query($con,$query);									
    									while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC)) $time2=$row['class_time_2'];
    									$query="select class_time_2 from (course inner join list on course.course_id=list.course_id) inner join user on list.student_id='$id' group by course.course_id";
    									$query_run=mysqli_query($con,$query);									
    									while ($row=mysqli_fetch_array($query_run,MYSQLI_ASSOC))
    									{
    										$time22=$row['class_time_2'];
    										if($time2==$time22)
    										{
    											$counter=1;
    										}
    									}
    									if($counter==1)
    									{
    										?>
    										<div class="alert">
    				 			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    				  						You have a clash in timing between this course and previously selected course.
    										</div>
    										<?php	
    									}else    //ok
    									{
    										$seat2=$seat-1;
    										//echo $seat." ".$seat2;
    										$query="insert INTO list VALUES ('$id','$course')";
    										$query_run=mysqli_query($con,$query);
    										$query="update course SET seat='$seat2' WHERE course_id='$course'";
    										$query_run=mysqli_query($con,$query);
    										?>
    										<div class="alert2">
    				 			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    				  						Course has been added successfully, reaload the page to see updated list
    				  						<meta charset="utf-8">;
                                            <meta http-equiv="refresh" content="1;url=pre.php">;
    										</div>
    										<?php
    									}
    								}
    							}
    						}
    
    
    
    					}else
    					{
    						?>
    						<div class="alert1">
     			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      						Invalid course, type the proper code id of the course
    						</div>
    
    						<?php
    					}
    				}
    			?>
    
    
            <br><br>
            <lebel><b>Type the course id you want to drop:</b></lebel>
    			<form action="pre.php" method="post">
    			<div class="form-group">
    			    <input name="course" type="text" class="inputvalues form-control" placeholder="Type the course ID" required/>
    			</div>
    			<input name="submit" type="submit" id="login_buttonX" class="btn btn-danger btn-block" value="Drop Course"/>
    			</form>
    			<?php
    				if(isset($_POST['submit']))
    				{
    					$id=$_SESSION['id'];
    					$course= $_POST['course'];
    					$length=strlen($course);
    					$query="select * from list WHERE student_id='$id' AND course_id='$course'";
    					$query_run=mysqli_query($con,$query);
    					if(mysqli_num_rows($query_run)>0)
    					{
    						$query="delete from list WHERE student_id='$id' AND course_id='$course'";
    						$query_run=mysqli_query($con,$query);
    						?>
    						
    					
    				
    						<div class="alert2">
     			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      						Course has been dropped successfully
      						<meta charset="utf-8">;
                            <meta http-equiv="refresh" content="2;url=pre.php">;
    						</div>
    
    						<?php
    					}else
    					if($length!=0)
    					{
    						?>
    						<div class="alert1">
     			 			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      						Invalid course, type the proper code id of the course
    						</div>
    
    						<?php
    					}
    				}
    			?>
    	            </div>
    	        </div>
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