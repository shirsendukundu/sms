<?php
include('connection.php');
  if (isset($_POST["Submit"]))
	{
		$batch=$_POST['bid'];
		$btime=$_POST['time'];
		$bday=$_POST['day'];
		$course=$_POST['cid'];
		$updatequery="UPDATE BATCH SET time='$btime',day='$bday',cid='$course' WHERE bid='$batch'";
		$data=mysqli_query($conn,$updatequery);
		if($data);
		{
			header("Refresh: 0; url=Batch_details.php");
		}
	
	
	}

?>