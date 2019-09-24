<?php
include('connection.php');

$_POST['bid'];
$_POST['time'];
$_POST['day'];
$_POST['course_name'];


?>


<!DOCTYPE html>
<html>
  <title>W3.CSS</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<body>

	<div class=" w3-display-container  w3-margin w3-card  w3-responsive">
      <div class= "w3-margin  w3-responsive">   
			
				<div class= "w3-margin w3-responsive">   
					<fieldset>
					<center><legend>Update details</legend></center>
                 
 <form action ="batch_update_eng.php" method="POST">
   Batch id:
  <input type="text" class="w3-input w3-border w3-round w3-light-grey" name="bid" value="<?php echo substr($_POST['bid'],1);?>" readonly> <br>
  Course: 
<?php
 

	$query = "SELECT cid, course_name FROM course ORDER BY course_name";
	$result = mysqli_query($conn,$query);
    echo "<select name='cid' value=''class='w3-input w3-border w3-round w3-light-grey'>";
 while($row = mysqli_fetch_array($result))
	{
	echo "<option value=$row[cid]>$row[course_name]</option>";
    }		
	    $select=$_POST['course_name'];
		$selectcourse="SELECT cid,course_name FROM course WHERE course_name='$select'";
		$selectresult0=mysqli_query($conn,$selectcourse);
	    while($row = mysqli_fetch_array($selectresult0))
		{
	      echo "<option selected=$row[cid]>$row[course_name]</option>";
	    }
               echo "</select>";

?>
<br>
   
  <div class="w3-half">
  Batch Time:
  <input type="time" class="w3-input  w3-border w3-round w3-light-grey" name="time" value="<?php echo $_POST['time'];?>"> 
  </div>
  <div class="w3-half">
 On Day:<br>
	<select name="day" class="w3-input w3-border w3-round w3-light-grey ">
    <option value="Sunday".
	<?php if($_POST['day']=='Sunday')
	{
		echo"selected";
	}
	?>.
	>Sunday</option>
    <option value="Monday".
	<?php if($_POST['day']=='Monday')
	{
		echo"selected";
	}
	?>.
	>Monday</option>
    <option value="Tuesday".
	<?php if($_POST['day']=='Tuesday')
	{
		echo"selected";
	}
	?>.
	>Tuesday</option>
    <option value="Wenesday".
	<?php if($_POST['day']=='Wenesday')
	{
		echo"selected";
	}
	?>.
	>Wenesday</option>
	<option value="Thrusday".
	<?php if($_POST['day']=='Thrusday')
	{
		echo"selected";
	}
	?>.
	>Thrusday</option>
	<option value="Friday".
	<?php if($_POST['day']=='Friday')
	{
		echo"selected";
	}
	?>.
	>Friday</option>
	<option value="Saturday".
	<?php if($_POST['day']=='Saturday')
	{
		echo"selected";
	}
	?>.
	>Saturday</option>
	
	</select><br/></div>
	
  <input type="submit" class="w3-button w3-block w3-Teal w3-margin-bottom" name="Submit" value="update"><br/>
</fieldset>
</form>
</body>
</html>

