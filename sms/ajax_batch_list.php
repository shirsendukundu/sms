 <center><h4>Batch Details</h4></center>
<table  class=" w3-table-all w3-card-4 w3-hoverable ">
	 
		<thead>
			<tr class="w3-color w3-dark-grey ">
				<th>Batch ID</th>
				<th>ON Day</th>
				<th>Time</th>
				
			</tr>
		</thead>
		<tbody>
		

<?php
include("connection.php");
//use subsstring for exclude c from cid
$cid=substr($_POST['cid'],1);

$sql= "SELECT * FROM `batch` WHERE `cid`=$cid ";
$query= mysqli_query($conn,$sql);
if(mysqli_num_rows($query)==0)
	{
	$error ="this course does't have any batch ";
	}
	else {
while($row= mysqli_fetch_assoc($query))
	 
	{
	echo
	"<tr class='w3-hover-blue'>
	<td>B".$row['bid']."</td>
	<td>".$row['day']."</td>
	<td>".$row['time']."</td>
	</tr>";
	

    }
	}
	
?>
</tbody>

</table><br>