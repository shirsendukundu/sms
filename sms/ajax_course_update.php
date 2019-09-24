
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
					<center>
					<legend>Course details</legend></br>
					</center>
								   
					 <form action ="course_update_eng.php" method= "POST" enctype="multipart/form-data">
					  <label> Course id:</label>
					  <input type="text"  name= "cid"  class="w3-input w3-border w3-round w3-light-grey" value="<?php echo substr($_POST['cid'],1);?>" readonly> <br/>
					  <label>Course Name:</label>
					  <input type="text" name="cname" class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_POST['cname'];?>" > <br/>
					  <label>Duration:</label>
					  <input type="text" name="duration"  class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_POST['duration'];?>" ><br/>
					 <label> Course Fess:</label>
					  <input type="text" name="fees" class="w3-input w3-border w3-round w3-light-grey"  value="<?php echo $_POST['fees'];?>" ><br/>
					  <input type="submit" name="Submit" class="w3-button w3-block w3-Teal w3-margin-bottom"  value="update"><br/></fieldset>
					  </form>
				</div>
		</div>
    </div>
  
      
          
</body>
</html>


  
  