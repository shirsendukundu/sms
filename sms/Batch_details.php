
<?php
include('header.php');
include('connection.php');
$sql ='SELECT `bid`, `time`, `day`, `course_name` FROM `batch` INNER JOIN course on batch.cid=course.cid';
		
$query = mysqli_query($conn, $sql);

?>
<html><head>
<title>All Bacth details</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<body>
<div class=" w3-display-container w3-margin w3-card  w3-responsive">

<div  class="w3-responsive w3-margin">
<h3><center>All Available Batch Details</center></h3>
<div  class="w3-margin">
<table id="table1" class=" w3-table-all w3-card-4 w3-hoverable ">
	
		<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>BATCH ID</th>
				<th>TIME</th>
				<th>ON DAY</th>
				<th>COURSE </th>
				<th>ACTION</th>
				
			</tr>
		</thead>
		<tbody>
		
<?php


		while ($row = mysqli_fetch_assoc($query))
		{
			
			echo "<tr class='w3-hover-blue tr'>
					
				    <td>B".$row['bid']."</td>
					<td>".$row['time']."</td>
					<td>".$row['day']."</td>
					<td>".$row['course_name']."</td>
		            <td><a><i class='glyphicon glyphicon-pencil w3-large edit'></i></a> &nbsp
					<i class='glyphicon glyphicon-user  w3-large bid'></i></td>
					
				</tr>";
			
		}

?>	

</tbody><br/>
		<tfoot>
			
		</tfoot>
	</table><br/></div>

<center><a href="batch_mng.php" class="w3-btn w3-red"><i class="glyphicon glyphicon-plus"></i>Add New</a></center>

</div></div>

<!--for modal of student list in perticular batch-->

 <div id='id01' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id01').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Student list</h2>
      </header>
	  <div id="stu-list"class="w3-container">
         
		<!--content will be show here-->
        </div>
    
      <footer class="w3-container w3-teal">
        <p></p>
      </footer>
    
  </div>
  </div>
<script>
// call student list modal 
$(document).ready(function(){
$(".bid").click(function(){
        $("#id01").show();
});
		$("#table1").on('click','.bid',function(){
		var currentrw=$(this).closest("tr");
		var col1=currentrw.find("td:eq(0)").text();
		
		 $.ajax({
	type: "POST",
	url: "stu_list.php",
	data:'batch_id='+col1,
	success: function(result){
		$("#stu-list").html(result);
	}
	});
		
        });
    });



</script>
     <script>//call modal for batch update
	 $(document).ready(function () {
				$('.edit').click(function(){
				$("#id02").show();	
    var bid = $(this).closest("tr").find('td:eq(0)').text();
  
	var time = $(this).closest("tr").find('td:eq(1)').text();
    
	var day = $(this).closest("tr").find('td:eq(2)').text();
   
	var course_name = $(this).closest("tr").find('td:eq(3)').text();
    
    $.ajax({
          type: "POST",
          url: "ajax_batch_update.php",
          data:{bid: bid,time: time,day: day,course_name: course_name},
          success: function(result){
            $("#batchupdate").html(result);
                        }
          });
});
});
</script>
<!--modal batch update-->
<div id='id02' class="w3-modal">
    <div class="w3-modal-content w3-animate-zoom w3-card-4">
      <header class="w3-container w3-teal"> 
        <span onclick="document.getElementById('id02').style.display='none'" 
        class="w3-button w3-display-topright">&times;</span>
        <h2>Batch Details</h2>
      </header>
	  <div id="batchupdate"class="w3-container">
        <!-- content will be shown here-->
		
</div>
    
      <footer class="w3-container w3-teal">
        <p></p>
      </footer>
      </div>
  </div>
</body>
</html>