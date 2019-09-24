<?php
include('header.php');
include('connection.php');
$sql = 'SELECT * 
		FROM course';
		
$query = mysqli_query($conn, $sql);
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
<title>All Course details</title>
</head>


<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
	<h3><center>All Available Course Details</center></h3><br/>
	<div  class="w3-responsive w3-margin">
    <table  class=" w3-table-all w3-card-4 w3-hoverable ">
	 
		<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>Course ID</th>
				<th>COURSE Name</th>
				<th>Duration</th>
				<th>Fees</th>
				<th>ACTION</th>
			</tr>
		</thead>
		<tbody>
		
		<?php
		while ($row = mysqli_fetch_assoc($query))
		{
			
			echo "<tr class='w3-hover-blue'>
					<td>C".$row['cid']."</td>
					<td>".$row['course_name']."</td>
					<td>".$row['duration']."</td>
					<td>".$row['course_fees']."</td>
		            <td>
					<a>
					<i class='glyphicon glyphicon-pencil w3-large' id='edit'></i></a>  &nbsp 
					<i class='glyphicon glyphicon-list w3-large' id='blist'>
					
					</td>
					
				</tr>";
			
		}?>
		
		</tbody><br/>
		<tfoot>
			
		</tfoot>
	</table><br/></div></div>
<!-- modal-1 form & ajax call-->
 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Update Course</h2>
      </header>
	  <div id="formdiv"class="w3-container">
         
		<!-- data will be show in this div-->

    </div>
      <footer class="w3-container w3-teal">
        <p></p>
      </footer>
    
  </div>
  </div>

 
 <!-- javascript & ajax usese for call modal-1 & passes the data  -->
 <script>
$(document).ready(function () {
				$('.glyphicon-pencil').click(function(){
				$("#id01").show();	
    var cid = $(this).closest("tr").find('td:eq(0)').text();
  
	var cname = $(this).closest("tr").find('td:eq(1)').text();
    
	var duration = $(this).closest("tr").find('td:eq(2)').text();
   
	var fees = $(this).closest("tr").find('td:eq(3)').text();
    
    $.ajax({
          type: "POST",
          url: "ajax_course_update.php",
          data:{cid: cid,cname: cname,duration: duration,fees: fees},
          success: function(result){
            $("#formdiv").html(result);
                        }
          });
});
});
</script>
<!-- modal-2  & ajax call-->
 <div id='id02' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Available Batch</h2>
      </header>
	  <div id="batchlist"class="w3-container">
        
		<!-- data will be show in this div-->

    </div>
      <footer class="w3-container w3-teal">
        <p></p>
      </footer>
    
  </div>
  </div>
  <!-- javascript & ajax usese for call modal-2 & passes the data  -->
  
  <script>
$(document).ready(function () {
				$('.glyphicon-list').click(function(){
				$("#id02").show();	
    var cid = $(this).closest("tr").find('td:eq(0)').text();
  
	
    $.ajax({
          type: "POST",
          url: "ajax_batch_list.php",
          data:{cid: cid},
          success: function(result){
            $("#batchlist").html(result);
                        }
          });
});
});
</script>
  
<center><a href="Course_mng.php" class="w3-btn w3-red"><i class='glyphicon glyphicon-plus '></i> ADD NEW </a></center>

</body></html>
