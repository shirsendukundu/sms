<?php
include('header.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>search transaction</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
	</script>

	</head>
		<body>

			<div class="  w3-margin w3-card  w3-responsive">
				<div class= "w3-margin w3-container">
					<div  class="w3-margin w3-card w3-responsive">
						<fieldset>
							<div  class="w3-margin w3-responsive">
								<legend>Search Transaction Details</legend>
									<label>Transaction ID</label>


									<input class="w3-input w3-border w3-round w3-light-grey" type ="text" name="txnid" placeholder="Enter Transaction ID eg:T123 " ="" id="txnid"><br/>
								<center>
									<button type="submit" id="btn" class="w3-btn w3-blue">Search</button>
							</center>
						</div>
						
						</fieldset>

					</div>
				</div>
			
				<div id='txndiv' class='w3-margin'>

					<script>
						$(document).ready(function () {
						  
								$("#btn").click(function () {
								var txnno =  $('#txnid').val();
							$.ajax({
								  type: "POST",
								  url: "ajax_search_txn.php",
								  data:'txn_id='+txnno,
								  success: function(result){
									$("#txndiv").html(result);
												}
								  });
							});
						  
							});
							 
							
							  
							
							
						  
					</script>
 
				</div>
			</div>
    </body>
</html>

