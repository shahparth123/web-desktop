<?php 
	//session_start();
	include 'core/init.php';
	include 'includes/overall/header.php';
	if(isset($_GET['username'])===true && empty($_GET['username'])===false)
	{
		$username=$_GET['username'];
		if(user_ex($username)===true)
		{
		$user_id=uidfromuname($username);
		//echo user_id;
		
		$profile_data=user_data($user_id,'first_name','last_name','email');
		//echo $username;
		?>
		
		<h1><?php echo $profile_data['first_name']; ?>'s Profile</h1>
		<p><?php echo $profile_data['first_name']; ?></p>
		<p><?php echo $profile_data['last_name']; ?></p>
		<p><?php echo $profile_data['email']; ?></p>
		
		<?php
		}
		else
		{
			echo 'sorry,user doesnot exist';
		}
	}
	else
	{
		header('Location: index.php');
		exit();
	}

	include 'includes/overall/footer.php'
?>