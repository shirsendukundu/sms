<?php
//this page is reciving modal form data & firing update query
include('connection.php');

 if(isset($_POST["Submit"]))
				  {
				    $courseid= $_POST['cid'];
					$cname= $_POST['cname'];
					$duration= $_POST['duration'];
					$cfees= $_POST['fees'];
					$query= "UPDATE `course` SET `course_name`='$cname',`duration`='$duration',`course_fees`='$cfees' WHERE `cid`='$courseid' " ;
				
					$data=mysqli_query($conn,$query);
					if(!$data){
						echo $query ;
					die('Could not update data: ' . mysql_error());
					        }
				  
				  else {
					  
					   echo "update";
					   header("Refresh: 0; url=course_details.php");

					    }
				  }
				 ?>

  


