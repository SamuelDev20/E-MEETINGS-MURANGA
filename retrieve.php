<?php
session_start();
include ('db_connect.php');

if(isset($_POST['work_id']) && isset($_POST['password'])){
    $work_id = $_POST['work_id'];
    $password = $_POST['password'];

    if (empty($work_id)) {
      header("location:stafflogin.php?error=work_id is required"); 
    }elseif (empty($password)) {
      header("location:stafflogin.php?error=password is required");  
    }else {
      header("location:stafflogin.php?error=Invalid username or password");
    }
   
  }
    //$password = MD5($password);
    $sql = "SELECT * FROM employees WHERE work_id='$work_id' AND Password='$password'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1)
    {
      $row=mysqli_fetch_assoc($result);  
        
       if ($row['work_id']===$work_id && $row['password'] === $password ) {
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['work_id'] = $row['work_id'];
          header("Location:employeehome.php");
          exit();
       }
       else
       {
           header("Location:stafflogin.php.php?failed=invalid username or password");
	        exit();
       exit();
           echo $conn->error;
       }
    }
  

?>