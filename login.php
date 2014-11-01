<?php
	include 'core/init.php';
	logged_in_redirect();
	/*if(user_ex('parth') === true){
		echo 'exists';
		}
	die();*/
	if(empty($_POST) === false)
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		if(empty($username) === true || empty($password) === true)
		{
		$errors[]= 'you need to enter username and password';
		//echo $username, ' ', $password ;
		} else if(user_ex($username) === false){
		$errors[]= 'we can\'t find user.Have you registered?';
		} else if(user_act($username) === false){
		$errors[]= 'You have not activated your account';
		} else {
			if(strlen($password) > 32)
			{
				$errors[]='password is too long';
			}
		 $login=login($username, $password);
		 if($login === false){
		 $errors[]='username or password is incorrect';
		}else{
			//set the user session
			//die($login);
			//redirect to home
			$_SESSION['user_id'] = $login;
			header('Location:index.php');
			exit();
		}
	}
	}else{
	$errors[]='no data received';
	}
	
	include 'includes/overall/header.php';
	//echo output_errors($errors);
	if(empty($errors) === false)
	{
	?>
<style type="text/css">
	.alert-box {
		width:250px;
		color:#555;
		border-radius:10px;
		font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
		padding:10px 36px;
		margin:auto;


	}
	.error {
		background:#ffecec url('/images/error.png') no-repeat 10px 50%;
		border:1px solid #f5aca6;
	}


</style>

	<div class="alert-box error">We tried to logged you in but<br/>
	<?php
	echo output_errors($errors);
	}
?>
	</div>
<?php
	include 'includes/overall/footer.php';
	
	?>
