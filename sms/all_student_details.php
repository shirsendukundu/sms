<?php
include('header.php');
include('connection.php');
?>
<html><head>
<title>All Students details</title></head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
/*data search bar in html table*/
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabledata tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<div class=" w3-container w3-margin w3-card  w3-responsive">
		<h3><center>All Students Details</center></h3>
			<div  class="w3-responsive w3-margin">
				<i class='glyphicon glyphicon-search  w3-large'></i><input class="w3-input w3-animate-input" type="text" id="search" placeholder=" Search Student " style="width:225px"><br/>

	<!--html table -->
     <table class="w3-table-all w3-hoverable w3-centered w3-card-4 w3-small">
		<thead>
				<tr class="w3-color w3-dark-grey  ">
						<th>Image</th>
						<th>Stu_ID</th>
						<th>Name</th>
						<th>Gurdian</th>
						<th>Address</th>
						<th>Contact no</th>
						<th>DOB</th>
						<th>Aadhar no</th>
						<th>Gender</th>
						<th>Caste</th>
						<th>Qualification</th>
						<th>Course</th>
						<th>Bid</th>
						
					</tr>
		</thead>
		
		
		<?php
		/*starting of pagination*/
		/*counting total no of row in table*/
		
		$total = 'SELECT `photo`,`stu_id`, `stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`,`course_name`,`batch_id` FROM `student` INNER JOIN course on student.course_id=course.cid ';
		
		$query1=mysqli_query($conn,$total);
		
		$total_row = mysqli_num_rows($query1);
		
		/*set per page data limit & calculating the total no of page require*/
		
		$data_limit=10;
		
		$page = ceil($total_row/$data_limit);
		
		/*For first time page load*/
		
		$get= $_GET['next'];
		if(empty($get)){
		$get=1;
		}
		 /*set Limit & offset value in query*/
		 $offset=($data_limit*$get)-$data_limit;
		
		$sql= "SELECT `photo`,`stu_id`, `stu_name`, `Gur _name`, `address`, `mobile`, `dob`, `aadhar`, `gender`, `caste`, `edu_qua`,`course_name`,`batch_id` FROM `student` INNER JOIN course on student.course_id=course.cid LIMIT $offset,$data_limit";
		
		/*execute the query */
        $query = mysqli_query($conn,$sql);
		
		// for showing data in table
		
		while ($row = mysqli_fetch_assoc($query))
		 
		{
			echo "<tbodhttp://localhost/sms/all_student_details.php?next=1y id= tabledata> 
			 <tr class='w3-hover-blue'>
			         
			        <td><img src='".$row['photo']."'height='50'width='50'/></td>
					<td>".$row['stu_id']."</td>
					<td>".$row['stu_name']."</td>
					<td>".$row['Gur _name']."</td>
					<td>".$row['address']."</td>
					<td>".$row['mobile']."</td>
					<td>".$row['dob']."</td>
					<td>".$row['aadhar']."</td>
					<td>".$row['gender']."</td>
					<td>".$row['caste']."</td>
					<td>".$row['edu_qua']."</td>
					<td>".$row['course_name']."</td>
					<td>".$row['batch_id']."</td>
					
		         </tr>
			</tbody>";
		}
		?>
		</table>
		
		</div>
		<div class="w3-center ">
		
		<div class="w3-bar w3-border w3-round ">
		
		<?php
		/*for loop for creating pagination link*/
		
		for($i=1;$i<=$page;$i++)
		  {
			   if($_GET['next']>1 && $i==1)
		{
		  echo "<a href ='http://localhost/sms/all_student_details.php?next=$i 'class='w3-bar-item w3-button w3-blue'> Back</a>";
		}
	//set pagination page link after how many pages show next button
	//if it has 15+ pages 
		  elseif($i>15 )
		  {
		 
			   $x=$_GET['next']+1;
	
				if($x<=$page){
				echo "<a href ='http://localhost/sms/all_student_details.php?next=$x'class='w3-bar-item w3-button w3-blue'> Next</a>";		
				}
			//break the for loop	
			 break;
			}
				
		 //if it has less than 15 pages then show 1-15
			
			else{
				echo "<a href ='http://localhost/sms/all_student_details.php?next=$i 'class='w3-bar-item w3-button w3-blue'> $i</a>";
				
				}
		  	
		  }
		
		
		 ?>
		</div>
		</div></br>
		<!--end of pagination-->
		
	</div>
	

</body>
</html>



