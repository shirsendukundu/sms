<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
</script>
</head>
<body>
<?php
include('connection.php');
    
	$txn_id=$_POST['txn_id'];
	$sql="SELECT * FROM `transaction` inner JOIN fees_type on 
transaction.fees_for=fees_type.fees_type_id
where txn_id='$txn_id'";
    $result=mysqli_query($conn,$sql);
	
	?>
<div class= " w3-container  w3-margin w3-responsive ">

	<center>
		<h3>Transactions Details</h3>
	</center>

	
		<table  class=" w3-table-all  w3-hoverable">
			<thead>
				<tr class="w3-dark-grey">
				  <th>Stu_Id</th>
				  <th>Txn_date</th>
				  <th>For Month</th>
				  <th>For year</th>
				  <th>Fees Type</th>
				  <th>Amount</th>
				</tr>
			</thead>
<?php
	if((mysqli_num_rows($result))==0){
    $error_log = 'No such record found';
   {echo"<tr><td style='color:red;text-align:center;'><b> $error_log</b></td></tr>";}
  }
  else{
	while($row = mysqli_fetch_assoc($result))
	{
    
		{echo"<tr>
  <td>S".$row['sid']."</td>
  <td>".$row['date']."</td>
  <td>".$row['month']."</td>
   <td>".$row['year']."</td>
  <td>".$row['fees_type']."</td>
  <td>".$row['amount']."</td>
	</tr>";
		}
	}
  

}
?>
	</table>
	</br>
</div>


</body>
</html>
	



