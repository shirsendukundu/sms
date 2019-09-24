<?php
include('header.php');
?>
 
<!DOCTYPE html>
<html>
<title>student admission</title>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>


 <div class=" w3-container w3-margin w3-card  ">
 
<h1><center>Student Admission</center></h1>
<div class="w3-container  w3-card w3-border w3-border-black">
<div  class="w3-container w3-row-padding "></br>
<fieldset>
<legend>Student Info</legend>
<form action="admission_eng.php" method="post" enctype="multipart/form-data">
<label>Student Name:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="name"required><br/>
<label>Gurdian Name:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="gur_name" required><br/>
<label> Adress:</label>
<textarea rows="4" cols="30" class="w3-input w3-border w3-round w3-light-grey" name="adress">
</textarea><br/>
<label>Contact no:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="mobile" maxlength="10" ><br/>
<label>Date Of Birth:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="date" name="dob"><br/>
<label>Aadhar No:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="aadhar" maxlength="12"><br/>
</div>
  <div class="w3-row-padding">
  <div class="w3-half">
<label>Gender:</label>
<select class="w3-select w3-border  w3-light-grey " name="gender">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>
</select><br><br/></div>
<div class="w3-half">
<label>Caste:</label>
<select class="w3-select  w3-border w3-light-grey " name="caste">
<option value="General">General</option>
<option value="SC/ST">SC/ST</option>
<option value="OBC">OBC</option>
<option value="Others">Others</option></select><br><br/>
</div></div>
<div  class="w3-container w3-row-padding">
<label>Education Qualification:</label>
<input class="w3-input w3-border w3-round w3-light-grey" type="text" name="edu_qua"><br/>

</fieldset>


<fieldset>
<legend>Course Details</legend>
</div>
<div class="w3-row-padding ">
<div class="w3-half ">
  
<label>Choose course:</label>

<?php
include('connection.php');
$query = "SELECT cid, course_name FROM course ORDER BY course_name";
$result = mysqli_query($conn,$query);
?>
  
<select class="w3-select w3-border  w3-light-grey " name= "course" id="course-list" onChange="getbatch(this.value)";>
<option value=''>Select course</option>
<?php
while($row = mysqli_fetch_array($result)){
echo "<option value=$row[cid]>$row[course_name]</option>";
}
echo "</select>";
?>
</div>
 <div class="w3-half ">
<label> Select Batch:</label>

<select class="w3-select w3-border  w3-light-grey " id="batch-list" name="batch">
<option value=''>Select Batch</option>
</select>

</div>
</fieldset></div><br>

<div  class="w3-container w3-row-padding">
<fieldset>

<legend>Upload Photo</legend>

<input class="w3-input w3-border w3-round w3-light-grey" type="file" name="photo" accept="image/*"><br/>
<input class="w3-button w3-block w3-blue w3-margin-bottom" type="Submit"name="Submit" value="submit" ><br/>
</fieldset>
</div>
</div>
</div>
</form>


</body>

</html>


<script>
function getbatch(val) {
	$.ajax({
	type: "POST",
	url: "get-batch.php",
	data:'cid='+val,
	success: function(data){
		$("#batch-list").html(data);
	}
	});
}
</script>




