<?php 

session_start();
include('./db_connect.php'); 
include('./header.php'); 
	   
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
		
		$Subject = $_REQUEST['Subject'];
		$Message = $_REQUEST['Message'];
        $From = $_REQUEST['From'];
		$Date = $_REQUEST['Date'];
		

        $sql = "INSERT INTO `notifications`(`Subject`, `Message`, `From`, `Date`) 
        VALUES ('$Subject' , '$Message', '$From', '$Date' )";
        if (mysqli_query($conn, $sql)) {
            header("location:sentsuccess.php");
        }  else{
            echo"Error: ".$sql;
        }
		
		// Close connection
		mysqli_close($conn);
		?>