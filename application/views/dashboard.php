<!doctype html>
<html>
<head>
	<title>form</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
</head>
 
<style>
 
body{
	background:#d9edf7;
}
.custom-bottom-margin{
	padding-bottom:30px;
}
 
.error-msg{
	margin:5px auto;
	width:30%;
	background:#db3737;
	color:#ffffff;
}
</style>
<body >
	
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>DAshboard</h2>
		</div>
	</div>
	
	<div class="row">
		
			<?php 
				echo validation_errors(); 
				
				if(isset($errorMsg))
				{
					echo '<div class="error-msg">';
					echo $errorMsg;
					echo '</div>';
					unset($errorMsg);
				}
			?>
			

 
			<?php 
			 if(isset($_GET['suk'])){
			 if($_GET['suk']=="ok") {?>
  			<h4 align="center" style="color:#629b55;"><b>Form Submitted Succesfully</b></h4>
 			 <?php }
			  if($_GET['suk']=="del") {?>
  			<h4 align="center" style="color:#FF6600;"><b>Unable to save user. Please try again</b></h4>
 			 <?php } 
             if($_GET['suk']=="exist") {?>
            <h4 align="center" style="color:#FF6600;"><b>User email alreary exists</b></h4>
             <?php } 
             if($_GET['suk']=="wrong") {?>
            <h4 align="center" style="color:#FF6600;"><b>please check details email and password didnt match</b></h4>
             <?php } 

            } ?>




			<form action="" method="post">
				
				<div>

					<a href="reg"><h4>adduser</h4></a>
				</div>
				



			</form>
		</div>
	</div>

 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
	
</body>
 
</html>
 