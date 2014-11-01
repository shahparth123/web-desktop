<?php
	//session_start();
	//error_reporting(0);
	require 'database/connect.php';
	require 'functions/general.php';
	require 'functions/user.php';
	
	//$current_file=basename(__FILE__);
	$current_file=explode('/',$_SERVER['SCRIPT_NAME']);
	//echo $current_file=end($current_file);
	//print_r($current_file);
	if(logged_in() === true){
	$session_user_id=$_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email','password_recover','type','allow_email');
		$_SESSION['user_name']=$user_data['username'];

	//echo $user_data['username'];
	if(user_act($user_data['username']) === false){
		session_destroy();
		header('Location:index.php');
		exit();
		}
		if($current_file!=='changepassword.php' && $current_file!=='logout.php' && $user_data['password_recover']==1)
		{
			header('Location: changepassword.php?force');
			exit();
		}
		
	}
	
	
	$errors=array();
	ob_start();
?>