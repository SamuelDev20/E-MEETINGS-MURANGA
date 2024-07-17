<?php

// Initialize the session
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['work_id'])) {


 ?>
<!DOCTYPE html>
<html>
<head>

<link rel="shortcut icon" type="image/ico" href="assets/img/logo.png" />
</head>
<title>Muranga County Management System</title>
<link rel="shortcut icon" type="image/ico" href="assets/img/logo.png" />
<?php include 'db_connect.php' ?>
<?php include('./header.php'); ?>
<style>
	body{
        background:  #f1e420;
  }
   .welcome{
	 
	   color:#4e73df;
	   margin-left:260px;
   }
   .Logout{
	   color:white;
	   margin-left: 1110px;
	   margin-top: -78px;
   }
   .reset_password{
	margin-left:950px;
	margin-top:-36px;
   }
   .card{
	margin-left:250px;
   }
   .sidebar-list{
	   margin-top:40px; 
   }
   .copyright{
	   color:white;
	   padding-top:200px;
	   padding-left: 10px;
   }
</style>
<body>
<div class="row mt-3 ml-3 mr-3">
			<div class="col-lg-12">
                    <div class="welcome">
                    <h4 class="my-5">Welcome back, <b><?php echo $_SESSION['work_id']; ?></b></h4>
					<div class = "Logout">
					<a href="logout.php" class="btn btn-dark">Logout</a>
                     </div>  
					 <div class="reset_password">
					 <a href="change-password.php" class="btn btn-primary">Change Password</a> 
					 </div>                 
                    </div>
					<body>
<main id="view-panel" >
      <?php $page = isset($_GET['page']) ? $_GET['page'] :'welcome'; ?>
  	<?php include $page.'.php' ?>
  	

  </main>
</body>

<div class="containe-fluid">

	<div class="row">
		<div class="col-lg-12">
		<nav class="navbar navbar-light fixed-top bg-success" style="padding:0;min-height:3.5rem">
  <div class="container-fluid mt-2 mb-2">
  	<div class="col-lg-12">
  		<div class="col-md-1 float-left" style="display: flex;">
  		
  		</div>
      <div class="col-md-4 float-left text-white">
        <h5><b>MURANG'A MEETINGS SYSTEM</b></h5>
      </div>
		 </ul>
	    </div>
    </div>
  </div>
</nav>
		</div>
	</div>
</div>
<nav id="sidebar" class='mx-lt-5 bg-success' class="navbar navbar-dark bg-tertiary">
		<div class="sidebar-list">
				<a href="employeehome.php?page=welcome" class="nav-item nav-welcome"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
				<a href="employeehome.php?page=myprofile" class="nav-item nav-myprofile"><span class='icon-field'><i class="fa fa-user"></i></span<active> Update Profile</a>	
				<a href="employeehome.php?page=meeting_samples" class="nav-item nav-meeting_samples"><span class='icon-field'><i class=" fa fa-clipboard "></i></span>
	 Meetings</a>
	 <a href="employeehome.php?page=viewminutes"class="nav-item nav-viewminutes"><span class='icon-field'><i class="fa fa-clock"></i></span> Minutes</a>			

				<a href="employeehome.php?page=all_events" class="nav-item nav-all_events"><span class='icon-field'><i class="fa fa-calendar"></i></span> Events</a>		
				<a href="employeehome.php?page=mynotifications"class="nav-item nav-mynotifications"><span class='icon-field'><i class="fa fa-bell"></i></span> General Notifications</a>
				<a href="employeehome.php?page=messages"class="nav-item nav-messages"><span class='icon-field'><i class="fas fa-sms"></i></span> Chat box</a>			

			</div>
		
		
</nav>
</body>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php
}else{

}
?>
</html>