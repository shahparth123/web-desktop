<?php 
	//session_start();
	include 'core/init.php';
	protect_page();
	
	if(empty($_POST) === false){
	$required_fields=array('current_password', 'password', 'password_again');
	//echo '<pre>',print_r($_POST,true) ,'</pre>';
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key,$required_fields) === true){
				$errors[]='fields marked with * are required';
				break 1;
			}
		}
		
		if(md5($_POST['current_password']) === $user_data['password'])
		{
			if(trim($_POST['password']) !== trim($_POST['password_again']))
			{
				$errors[]='new passwords do not match.';
			} else if((strlen($_POST['password']) < 6 ) || (strlen($_POST['password']) > 32 ))
				{
					$errors[]='password must between 6-32 character';
				}
		}
		else
		{
			$errors[]='your current password is incorrect';
		}
	//print_r($errors);
	}
	
	
	
	include 'includes/overall/header.php';
	
?>
	<h1>Change Password</h1>
<?php

if(isset($_GET['success'])===true && empty($_GET['success'])===true)
	{
		echo 'Password has been changed successfully';
	}
	else{
	if(isset($_GET['force'])===true && empty($_GET['force'])===true)
	{
	?>
	<p>you must change your password now.</p>
	<?php
	}
	if(empty($_POST) === false && empty($errors) === true)
		{
			//change
			//echo 'ok';
			change_password($session_user_id, $_POST['password']);
			header('Location:changepassword.php?success');
		
		}
		else if(empty($errors) === false)
		{
			echo output_errors($errors);
		}


?>	

	<form action=""  method="post">
			<ul>
			<li>
			Current Password*:
			<br>
			<input type="password" name="current_password">
			</li>
			<li>
			New Password*:
			<br>
			<input type="password" name="password">
			</li>
			<li>
			New Password again*:
			<br>
			<input type="password" name="password_again">
			</li>
			<li>
			<input type="submit" value="Change Password">
			</li>
			</ul>
			</form>
<?php 
}
include 'includes/overall/footer.php'?>