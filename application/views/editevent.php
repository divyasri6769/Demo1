<!doctype html>
<html>
<head>
	<title>Event</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
   <link rel="stylesheet" href="assets/plugins/datepicker/datepicker3.css">
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
			<h2>Add Event</h2>
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
  			<h4 align="center" style="color:#FF6600;"><b>Unable to save . Please try again</b></h4>
 			 <?php } 
             if($_GET['suk']=="exist") {?>
            <h4 align="center" style="color:#FF6600;"><b>User  alreary exists</b></h4>
             <?php } 
             if($_GET['suk']=="wrong") {?>
            <h4 align="center" style="color:#FF6600;"><b>password did not match</b></h4>
             <?php } 
if($_GET['suk']=="err") {?>
            <h4 align="center" style="color:#FF6600;"><b>check your details</b></h4>
             <?php } 
            } ?>


<div style="padding-left:800px;padding-right:80px;">
	
  <a href="allevents" data-toggle="tooltip" title="" class="btn btn-success btn-xs" data-original-title="View"><h5>ALL EVENTS</h5></a>
                </div>

                <br>

			<form action="" method="post">



				<div class="form-group custom-bottom-margin">
					<label class="control-label col-sm-4 text-right" for="name">name</label>
					<div class="col-sm-5">
					  <input type="text" name="name" class="form-control" value="<?php echo $name;?>" placeholder="Enter name" id="name">
					</div>
				</div>
				
				
				<div class="form-group custom-bottom-margin">
					<label class="control-label col-sm-4 text-right" for="description">description</label>
					<div class="col-sm-5">
					  <input type="text" name="description" class="form-control" value="<?php echo $description;?>" placeholder="Enter description" id="description" required>
					</div>
				</div>
				
			<div class="form-group custom-bottom-margin">
					<label class="control-label col-sm-4 text-right" for="location">Confirm location, </label>
					<div class="col-sm-5">
					  <input type="text"  name="location" class="form-control" value="<?php echo $location;?>" placeholder="Confirm location" id="location" required >
					</div>
				</div>





<div class="form-group custom-bottom-margin">
              <label class="control-label col-sm-4 text-right" for="event_date">Confirm event_date </label>
					<div class="col-sm-5">
				<input type="text" class="form-control"  name="event_date"  value="<?php echo $event_date;?>" autocomplete="off" readonly required>
                </div>
                <!-- /.input group -->
              </div>



              <div class="form-group custom-bottom-margin">
              <label class="control-label col-sm-4 text-right" for="event_mod">Confirm modified date </label>
					<div class="col-sm-5">
				<input type="text" class="form-control" id="datepicker" name="date_modified"  value="<?php echo $date_modified;?>" autocomplete="off" >
                </div>
                <!-- /.input group -->
              </div>

				
				<div class="form-group custom-bottom-margin">
					<label class="control-label col-sm-4 text-right"></label>
					<div class="col-sm-5">
					  <button class="btn btn-primary" type="submit" name="update" value="update"> Submit</button>
					</div>
				</div>
				
						

  

			</form>
		</div>
	</div>
 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
	<script src="assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
  var dateToday = new Date();
  $(function () {
 //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  startDate: dateToday
    });
//Timepicker
    
 });	
</script>

</body>
 
</html>
 