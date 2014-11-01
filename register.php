<?php 
	//session_start();
	include 'core/init.php';
	logged_in_redirect();
	include 'includes/overall/header.php';
	
	if(empty($_POST) === false){
	$required_fields=array('username', 'password', 'password_again', 'first_name', 'email');
	//echo '<pre>',print_r($_POST,true) ,'</pre>';
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key,$required_fields) === true){
				$errors[]='fields marked with * are required';
				break 1;
			}
		}
		if(empty($errors) === true){
			if(user_ex($_POST['username']) === true){
				$errors[]='username \'' . $_POST['username'] . '\' is already taken.'; 
			}
			if(preg_match("/\s/",$_POST['username']) == true){
				$errors[]='your username must not contain space.'; 
			}
			if((strlen($_POST['password']) < 6 ) || (strlen($_POST['password']) > 32 )){
				$errors[]='password must between 6-32 character';
			}
			if($_POST['password'] !== $_POST['password_again']){
				$errors[]='passwords do not match.';
			}
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
				$errors[]='Enter valid email adress.';
			}
			if(email_ex($_POST['email']) === true){
				$errors[]='email \'' . $_POST['email'] . '\' is already in use.'; 
			}
		}
	}
	//print_r($errors);
?>
			<h1>Register</h1>
<?php
	if(isset($_GET['success']) && empty($_GET['success']))
	{
		echo 'you have been registered successfully.Please check your email to activate your account';
	}
	else{
		if(empty($_POST) === false && empty($errors) === true)
		{
			//register
			$register_data=array(
				'username' => $_POST['username'],
				'password' => $_POST['password'],
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'email' => $_POST['email'],
				'email_code' => md5($_POST['username'] + microtime())
			);
			register_user($register_data);
			//redirect
			header('Location:register.php?success');
			exit();
		}
		else if(empty($errors) === false)
		{
			echo output_errors($errors);
		}
	
?>		
		<form action="" method="post">
			<ul>
			<li>
			Username:
			<br>
			<input type="text" name="username">
			</li>
			<li>
			Password:
			<br>
			<input type="password" name="password">
			</li><li>
			Password again:
			<br>
			<input type="password" name="password_again">
			</li>
			<li>
			First Name:
			<br>
			<input type="text" name="first_name">
			</li>
			<li>
			Last Name:
			<br>
			<input type="text" name="last_name">
			</li>
			<li>
			Email:
			<br>
			<input type="text" name="email">
			</li>
			<li>
			<input type="submit" value="Register">
			</li>
			
			</ul>			
			</form>

<?php /*if(isset($_SESSION['user_id'])){
	echo 'logged in';
} else{
echo 'not logged in';
}*/
?>
<?php 
	}
	include 'includes/overall/footer.php'?>