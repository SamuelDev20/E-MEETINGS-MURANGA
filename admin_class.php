<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:main.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function save_meeting(){
		extract($_POST);
		$data .= " type = '$type' ";
		$data = ", date = '$date' ";
		$data .= ",time = '$time' ";
		$data .= ", content = '$content' ";
		$data .= ", file = '$file' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO `meetings` set ".$data);
		}else{
			$save = $this->db->query("UPDATE meetings set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function save_password(){
		extract($_POST);
		$data .= ", work_id = '$work_id' ";
		$data .= ", password = '$password' ";
		if(empty($work_id)){
			$save = $this->db->query("INSERT INTO register set ".$data);
		}else{
			$save = $this->db->query("UPDATE register set ".$data." where work_id = ".$work_id);
		}
		if($save){
			return 1;
		}
	}
	function signup(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", username = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$data .= ", type = 3";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO users set ".$data);
		if($save){
			$qry = $this->db->query("SELECT * FROM users where username = '".$email."' and password = '".md5($password)."' ");
			if($qry->num_rows > 0){
				foreach ($qry->fetch_array() as $key => $value) {
					if($key != 'passwors' && !is_numeric($key))
						$_SESSION['login_'.$key] = $value;
				}
			}
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '".str_replace("'","&#x2019;",$name)."' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_employee(){
		extract($_POST);
		$data =" firstname='$firstname' ";
		$data .=", lastname='$lastname' ";
		$data .=", work_id='$work_id' ";
		$data .=", work_email='$work_email' ";
		$data .=", phonenumber='$phonenumber' ";
		$data .=", password='$password' ";

		if(empty($id)){
			$i= 1;
			while($i == 1){
			$e_num=date('Y') .'-'. mt_rand(1,9999);
				$chk  = $this->db->query("SELECT * FROM employees where id = '$id' ")->num_rows;
				if($chk <= 0){
					$i = 0;
				}
			}
			$data .=", id='$id' ";

			$save = $this->db->query("INSERT INTO employees set ".$data);
		}else{
			$save = $this->db->query("UPDATE employees set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_employee(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM employees where id = ".$id);
		if($delete)
			return 1;
	}
	
	
	function save_department(){
		extract($_POST);
		$data =" name='$name' ";
		

		if(empty($id)){
			$save = $this->db->query("INSERT INTO department set ".$data);
		}else{
			$save = $this->db->query("UPDATE department set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_department(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM department where id = ".$id);
		if($delete)
			return 1;
	}
	function save_position(){
		extract($_POST);
		$data =" name='$name' ";
		$data .=", department_id = '$department_id' ";
		

		if(empty($id)){
			$save = $this->db->query("INSERT INTO position set ".$data);
		}else{
			$save = $this->db->query("UPDATE position set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	
		}
	
