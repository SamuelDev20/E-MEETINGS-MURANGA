<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'save_password'){
	$save = $crud->save_password();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_employee"){
	$save = $crud->save_employee();
	if($save)
		echo $save;
}
if($action == "delete_employee"){
	$save = $crud->delete_employee();
	if($save)
		echo $save;
}
if($action == "save_meeting"){
	$save = $crud->save_meeting();
	if($save)
		echo $save;
}
if($action == "delete_meeting"){
	$save = $crud->delete_meeting();
	if($save)
		echo $save;
}
if($action == "save_department"){
	$save = $crud->save_department();
	if($save)
		echo $save;
}
if($action == "delete_department"){
	$save = $crud->delete_department();
	if($save)
		echo $save;
}
if($action == "save_position"){
	$save = $crud->save_position();
	if($save)
		echo $save;
}
if($action == "delete_position"){
	$save = $crud->delete_position();
	if($save)
		echo $save;
}

