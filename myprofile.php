<?php 
include "db_connect.php";
if(isset($_POST['update'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$work_id = $_POST['work_id'];
	$work_email = $_POST['work_email'];
	$department = $_POST['department'];
	$phonenumber = $_POST['phonenumber'];
	$password = $_POST['password'];
	$currentUser = $_SESSION['work_id'];
	//update sql query
	$sql = "UPDATE `register` SET `firstname`='$firstname',`lastname`='$lastname',`work_id`='$work_id',
	`work_email`='$work_email',`department`='$department',`phonenumber`='$phonenumber',`password`='$password' WHERE  `work_id` = '$currentUser'";
	
	$result = $conn->query($sql);
	if($result==TRUE)
	 echo "<center><button ><b>Record updated successfully.</button></center>";
	}else{
	
}
?>
<html>
<?php include 'db_connect.php'?>
<?php include('./header.php'); ?>
<head>
  <title>Muranga meetings system</title>
 
</head>
<body>
<style>
.card{
width:605px;
}
.card-heading{
font-size:30px;
color:#3297FD ;
text-align: center;
padding-top:10px;
}
select{
	width:100%;
	height:40px;
	border:1px light-grey;
	border-radius: .5px;
	box-shadow: 1px 1px 2px 1px grey;
}
</style>
  
  <div class="divider"></div>
  

    <!-- <form id = "registration" action="edit.php" method="POST"> -->
  <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card">
                <div class="card-heading">
                <h2 class="title">My Profile</h2>
                </div>
                <div class="card-body">
                    <form action ="" method="POST">
                <?php
				$currentUser = $_SESSION['work_id'];
				$sql ="SELECT * FROM `register` WHERE `work_id` = '$currentUser'";
				$gotResults = mysqli_query($conn,$sql);
				if($gotResults){
					if(mysqli_num_rows($gotResults)>0){
						while ($row = mysqli_fetch_array($gotResults)) {
					
							//print_r($row['firstname']);
						?>
  <form id="my_profile" >
                      <div class="form-group">
  							<label for="firstname" class="control-label">Firstname</label>
  							<input type="text" id="firstname" name="firstname" value="<?php echo $row['firstname'];?>" class="form-control">
  						</div>
						  <div class="form-group">
  							<label for="lastname" class="control-label">Lastname</label>
  							<input type="text" id="lastname" name="lastname" value="<?php echo $row['lastname'];?>"  class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="work_id" class="control-label">Work ID</label>
  							<input type="text" id="work_id" name="work_id" value="<?php echo $row['work_id'];?>" class="form-control">
  						</div>
                          <div class="form-group">
  							<label for="work_email" class="control-label">Work Email</label>
  							<input type="email" id="work_email" name="work_email" value="<?php echo $row['work_email'];?>"  class="form-control">
  						</div>
						  <div class="form-group">
  							<label for="work_email" class="control-label">Department</label>
  							<input type="text" id="work_email" name="department" value="<?php echo $row['department'];?>"  class="form-control">
  						</div>
						  <div class="form-group">
  							<label for="phonenumber" class="control-label">Phone Number</label>
  							<input type="tel" id="phonenumber" name="phonenumber" value="<?php echo $row['phonenumber'];?>"  class="form-control">
  						</div>
                          <div class="form-group">
  							<label for="phonenumber"  class="control-label">Password</label>
  							<input type="password" id="phonenumber" name="password" value="<?php echo $row['password'];?>"  class="form-control">
  						</div>
						  <center><button type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary" value="Update" name="update" >Update Profile</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
						<?php
						}
					}
				}
			?>
                  
   

  </main>
     <!-- Jquery JS-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script>
   
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

   
    <script src="js/global.js"></script> -->
</body>
</html>
