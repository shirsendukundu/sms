<?php   include('connection.php');
		include('header.php');
		include('balancecheck.php');
		//count total student
		$sql="SELECT COUNT('sid') as total FROM student where certificate_issue is NULL";
         $query= mysqli_query($conn,$sql);
		  $stotal= mysqli_fetch_assoc($query);
		  
		 //count total coureses
		 $sql="SELECT COUNT('cid') as total FROM course ";
         $query= mysqli_query($conn,$sql);
		  $ctotal= mysqli_fetch_assoc($query);
		 
		 
		//total batch available
		
		$sql="SELECT COUNT('bid') as total FROM batch ";
         $query= mysqli_query($conn,$sql);
		  $btotal= mysqli_fetch_assoc($query);
		  
		
		
		
		
		
		
		
		
		
		
		
		?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboad</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
	<div class="w3-contanier  w3-responsive">
		<center><h2 class='w3-card w3-dark-grey w3-padding-16'> Dashboard</h2></center>
		<div  class=" w3-row-padding">
			<div class="w3-quarter w3-container ">
		<div class="w3-panel w3-card-4 w3-blue w3-round-large">
        <i class="glyphicon glyphicon-user"></i>
        <h3>Students</h3>
		<?php echo "<h1>".$stotal['total']."</h1>";?>
        </div></div>
		<div class="w3-quarter w3-container">
		<div class="w3-panel w3-card-4 w3-deep-orange w3-round-large">
		<i class="glyphicon glyphicon-book"></i>
		<h3>Courses</h3>
		<?php echo "<h1>".$ctotal['total']."</h1>";?>
		</div></div>
		<div class="w3-quarter w3-container">
		<div class="w3-panel w3-card-4 w3-teal w3-round-large">
		<i class="glyphicon glyphicon-th-list"></i>
		<h3>Batches</h3>
		<?php echo "<h1>".$btotal['total']."</h1>";?>
			</div></div>
		<div class="w3-quarter w3-container">
		<div class="w3-panel w3-card-4 w3-green w3-round-large">
		<i class="glyphicon glyphicon-envelope"></i>
			<h3>Messages</h3>
			<?php echo "<h1>".$sms."</h1>";?>
			</div></div>

</div>
	</div>
	<!-- for pie chart-->
	
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['course_name', 'total'],
        //dynamic data fetching for pie chart student vs course// 
    <?php
		 $sql="SELECT COUNT(sid)as total,course_name from student INNER JOIN course on student.course_id=course.cid GROUP BY course_id";
	     $query=mysqli_query($conn,$sql);
          while($row = mysqli_fetch_assoc($query))
		  {
          echo "['".$row["course_name"]."', ".$row["total"]."],";
           }
             ?>
        ]);

        var options = {
          title: 'Student vs coureses',
          is3D: true,
		  curveType: 'function',
          legend: { position: 'bottom' }
		
		};

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <div class="w3-margin-left w3-card " id="piechart_3d" style="width: 400px; height: 300px;"></div>
<!-- end of pie chart-->
	
<style>
	i{
		position: absolute;
		float: right;
		font-size: 100px;
		color:white;
        text-shadow:2px 2px 4px #000000;
        padding:8px;
        opacity:0.5;


	}
</style>




</body>
</html>