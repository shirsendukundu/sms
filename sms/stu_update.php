<?php
include('header.php');
?>
<DOCTYPE!HTML>
<html>
<head>
<title>Student Update</title>
</head>
<body>
<!--form for searching student by id-->
<div class=" w3-display-container w3-margin w3-card   w3-responsive">
	
		<h2><center>Update Student Details</center></h2>
	<div class= "w3-container w3-margin w3-responsive w3-border  w3-border-black "></br>
		<fieldset>
		<legend>Search Student</legend><br/>
		<form action ="" method="post">
			<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="sid" placeholder="Enter Student ID"><br/>
			<input type="submit" class="w3-button w3-block w3-blue w3-margin-bottom" name="search" value="search">
		</form>
		</fieldset><br/>
		
	</div>

</div>
</body>
</html>


<?php
//fetching student details after above form submit

include('connection.php');

if(isset($_POST["search"])){
$sid= $_POST['sid'];
$sql = "SELECT *FROM `student` WHERE `stu_id`='$sid'";
		
$query = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($query)){
	$name=$row['stu_name'];
	$gur_name = $row['Gur _name'];
    $adress = $row['address'];
    $mobile =$row['mobile'];
    $dob = $row['dob'];
    $aadhar = $row['aadhar'];
    $gender = $row['gender'];
    $caste = $row['caste'];
    $education = $row['edu_qua'];
    $cid = $row['course_id'];
    $bid=$row['batch_id'];
    $photo=$row['photo'];
}}
$avtar="stu_avtar.jpg";
	?>




<!DOCTYPE html>

<html>

<body>
<!--showing student details in update form -->
<div class=" w3-display-container w3-margin w3-card  w3-responsive">
	
	
		<h3><center>Student Details</center></h3>
		<div class= "w3-margin w3-container w3-border w3-border-black  w3-responsive"></br>
		
		<fieldset>
		<legend>Student Info</legend>
		
			<form action="" method="post" enctype="multipart/form-data">
			
		<div class="w3-display-container  " style="height:170px;">
			<div class="w3-display-topright w3-quater   ">
			
				<img src='<?php if(empty($photo)){echo"$avtar";}else{echo "$photo";} ?>' height='175'width='180' class="w3-padding w3-border"><br/>
			</div>
			
				<div class=" w3-mobile w3-display-topleft w3-threequarter" >
					
					<label> Student id:</label><br/>
					
					<input type="text" class="w3-input w3-border w3-round w3-light-grey"  name="sid" value="<?php if(empty($sid)){echo'';}else{echo "$sid";}?>"readonly></br>

					<label>Student Name:</label><br/>
					
					<input type="text" name="name" class="w3-input w3-border w3-round w3-light-grey"   value="<?php if(empty($name)){echo'';}else{ echo"$name";}?>"><br/>
				</div>
		</div>
	<label> Gurdain Name:</label><br/>
	
	<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="gur_name"value="<?php if(empty($gur_name)){echo'';}else{ echo"$gur_name";}?>" ><br/>
	
	<label>Adress:</label><br/>
	
	<textarea class="w3-input w3-border w3-round w3-light-grey" name="adress" cols="30" rows="4" ><?php if(empty($adress)){echo'';} else {echo "$adress";} ?></textarea><br/>
	
	<label>Contact no:</label><br/>

	<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="mobile" maxlength="10" value="<?php if(empty($mobile)){echo'';}else{echo"$mobile";}?>" ><br/>
	<label>Date Of Birth:</label><br/>

	<input type="date"  class="w3-input w3-border w3-round w3-light-grey" name="dob" value="<?php if(empty($dob)){echo'';}else{ echo"$dob";}?>"><br/>

	<label>Aadhar No:</label><br/>
	
	<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="aadhar" maxlength="12" value="<?php if(empty($aadhar)){echo'';}else{ echo"$aadhar";}?>"><br/>
	
	<label>Education Qualification:</label><br/>

	<input type="text" class="w3-input w3-border w3-round w3-light-grey" name="edu_qua" value="<?php if(empty($education)){echo'';}else{echo "$education";}?>"><br/>
	
			<div class="w3-row">
				<div class="w3-half">
					<label>Gender:</label><br/>
					
					<select name="gender" class="w3-select w3-border  w3-light-grey ">
					<option value="select">Select</option>
					<option value="Male"
		<?php 
		//set value in dropdown as per student record
		if(empty($gender)){echo 'select';}

			 elseif($gender =='Male')
			
			{
				echo"selected";
			}
			?>>Male</option>
					<option value="Female"
					
		<?php    if(empty($gender)){echo'';}

				 elseif($gender =='Female')
			{
				echo"selected";
			}
			?>>Female</option>
					<option value="Others"
		<?php if(empty($gender)){echo'';}
		elseif($gender =='Others')
			{
				echo"selected";
			}
			?>>Others</option>

			
			</select>
		</div>
	 
			<div class="w3-half">
			
			<label>Caste:</label><br/>
			
			<select name="caste" class="w3-select w3-border  w3-light-grey ">
			<option value="select">Select</option>
			<option value="General"
			
			<?php 
			//set value in dropdown as per student record
			if(empty($caste)){echo'';}
			elseif($caste =='General')
				{
					echo"selected";
				}
				?>>General</option>
			<option value="SC/ST"
			<?php if(empty($caste)){echo'';}
			elseif($caste =='SC/ST')
				{
					echo"selected";
				}
				?>>SC/ST</option>
			<option value="OBC"
			<?php if(empty($caste)){echo'';}
			elseif($caste =='OBC')
				{
					echo"selected";
				}
				?>>OBC</option>
			<option value="Others"
			<?php if(empty($caste)){echo'';}
			elseif($caste =='Others')
				{
					echo"selected";
				}
				?>>Others</option>
			</select><br/>
			</div>
		</div>

		</fieldset><br/>

	<fieldset>
	<legend>Course Details</legend>
	
 <div class="w3-row">
	<div class="w3-half">
	
	<label>Choose course:</label><br/>
		<?php
		//set value in dropdown as per student record
		include('connection.php');
		$query = "SELECT cid,course_name FROM course ORDER BY course_name";
		$result = mysqli_query($conn,$query);?>
		
		<select class="w3-select w3-border  w3-light-grey " name= "course">course</option>
		
		<?php
		while($row = mysqli_fetch_array($result)){
		echo "<option value=$row[cid]>$row[course_name]</option>";
		}
			$selectcourse="SELECT cid,course_name FROM course WHERE cid='$cid'";
			$selectresult0=mysqli_query($conn,$selectcourse);
			while($row = mysqli_fetch_array($selectresult0)){
			
			echo "<option selected=$row[cid]>$row[course_name]</option>";
			}
			echo "</select>";
			
		?>
	</div>
 
 <div class="w3-half">
 
	<label>Select Batch: </label><br/>
	<?php
	//set value in dropdown as per student record
	$query1 = "SELECT bid,time,day FROM batch ORDER BY day";
	$result = mysqli_query($conn,$query1);
	?>
	
	<select class="w3-select w3-border  w3-light-grey " name= "batch">batch</option>
	
		<?php
		while($row = mysqli_fetch_array($result)){
		$btime=$row[time];
		$btimeformat=date("h:i:A",$btime);
		$bday=$row[day];

			echo "<option value=$row[bid]>$btimeformat,$bday</option>";
		}

			$selectquery="SELECT bid,time,day FROM batch WHERE bid='$bid'";
			$selectresult=mysqli_query($conn,$selectquery);
			while($row = mysqli_fetch_array($selectresult)){
			$time=$row[time];
			$formatedtime=date('h:i:A',$time);
			$day=$row[day];
			
			echo "<option selected=$row[bid]>$formatedtime,$day</option>";
		}
			echo "</select>";
		?>
		
</div>
</div><br/>

	</fieldset><br/>
	<input type="Submit" class="w3-button w3-block w3-blue w3-margin-bottom"    name='update' value="update" ><br/>
	</form>
	</div>
</div>

</body>
</html>
<?php
//update student details after final submission

if(isset($_POST["update"])){
	include('connection.php');
	
		$s_id= $_POST['sid'];
		$sname = $_POST['name'];
		$g_name = $_POST['gur_name'];
		$adr = $_POST["adress"];
		$mob = $_POST['mobile'];
		$sdob = $_POST['dob'];
		$aadharno = $_POST['aadhar'];
		$gen = $_POST['gender'];
		$cast = $_POST['caste'];
		$edu = $_POST['edu_qua'];
		$c_id = $_POST['course'];
		$b_id=$_POST['batch'];
		$query="UPDATE student SET stu_name='$sname',Gur _name='$g_name',address='$adr',mobile='$mob',dob='$sdob',aadhar='$aadharno',gender='$gen',caste='$cast',edu_qua='$edu',course_id='$c_id',batch_id='$b_id' WHERE stu_id='$s_id'";
		
		$data=mysqli_query($conn,$query);
		if($data);
	{
      echo "student id $s_id,$sname ,$g_name,$adr,$mob,$sdob ,$aadharno,$gen,$cast,$edu,$c_id,$b_id record updated";
	}
		}
	?>	

<footer class="w3-container w3-red"></br>
<center>
<?php
echo "<p>All right reserved&nbsp &#169;" .date("y")."</P>";
?>
</center>
</footer>
