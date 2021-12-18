<!doctype html>
<html>
<head>
	<title>userdetails</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
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
<script>
function validateForm() {
  var mobilenumber=document.myForm.mobilenumber.value;  
var address=document.myForm.address.value;  

  var gender = document.getElementsByName('gender');
if (mobilenumber==""){  
  alert("mobilenumber can't be blank");  
  return false;  
} 

      var genValue = false;

        for(var i=0; i<gender.length;i++){
            if(gender[i].checked == true){
                genValue = true;    
            }
        }
        if(!genValue){
            alert("Please Choose the gender");
            return false;
        }



} 
</script>

<script>
function del_product1(uid){
	if(confirm("Are you sure want to delete this Id")){
		document.location.href = 'allevents?act=del&uid='+uid;
	}
}
</script>

<body >
	
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2>All events</h2>
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
  			<h4 align="center" style="color:#629b55;"><b>updated Succesfully</b></h4>
 			 <?php }
			  if($_GET['suk']=="del") {?>
  			<h4 align="center" style="color:#FF6600;"><b>Unable to save user. Please try again</b></h4>
 			 <?php } 
             if($_GET['suk']=="kk") {?>
            <h4 align="center" style="color:#FF6600;"><b>details submitted Succesfully</b></h4>
             <?php } 
             if($_GET['suk']=="deleted") {?>
            <h4 align="center" style="color:#FF6600;"><b>Deleted Succesfully</b></h4>
             <?php } 

            } ?>


<div style="padding-left:800px;padding-right:80px;">
	
  <a href="index" data-toggle="tooltip" title="" class="btn btn-success btn-xs" data-original-title="View"><h5>Add Events</h5></a>
                </div>
<br>
			<form action="" method="post">


 <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="8%">S.NO</th>

                   <th width="8%">Name</th>
                  <th width="8%">description</th>
				  <th width="8%">	location</th>
				<th width="8%">	event_date</th>

				  	<th width="8%">	date_created</th>

				  		<th width="8%">	date_modified</th>


				   <th style="text-align: center">Edit</th>
				  <th style="text-align: center">Delete</th>
                </tr>
                </thead>
			<tbody>
				<?php
                	$i=1; 
				foreach($get as $row){ 
                $s_no =$row->id;

					?>
					<tr>
                     <td><?php echo $i;?></td>
	<td> <?php echo $row->name; ?> </td>
					<td> <?php echo $row->description; ?> </td>

			          <td>  <?php echo  $row->location; ?></td>

					 <td>  <?php echo  $row->event_date; ?></td>
					  <td>  <?php echo  $row->date_created; ?></td>
					  <td>  <?php echo  $row->date_modified; ?></td>

			            
               
 <td style="text-align: center"><a href="updatevent?id=<?php echo $s_no;?>" data-toggle="tooltip" title="edit" class="btn btn-sm btn-success">
 	<i class="fa fa-edit"></i></a></td>



 <td style="text-align: center"><a href="javascript:del_product1('<?php echo $s_no;?>')" data-toggle="tooltip" title="Delete" class="btn btn-danger">
 	<i class="fa fa-trash"></i></a></td>

               <br><br><BR>
<?php $i++; } ?>
				
				
				



			</form>
		</div>
	</div>

 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 

		
<script>


function IsAlphaNumeric(evt) {		
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;


	if(charCode==48 || charCode==49 || charCode==50 || charCode==51 || charCode==52 || charCode==53 || charCode==54 || charCode==55 || charCode==56 ||charCode==57 || charCode == 118 || charCode == 99 || charCode == 13|| charCode == 8){
		document.getElementById('errormsg').innerHTML="";	
		return true;
	}
	else{
		document.getElementById('errormsg').innerHTML="Please Enter Only Digits";
		return false;
	}
}


</script>
	

</body>
 
</html>
 