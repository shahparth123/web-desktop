<?php 
	include 'core/init.php';
	logged_in_redirect();

	include 'includes/overall/header.php';
	
if(isset($_GET['success']) && empty($_GET['success']))
	{
	?>
	<h2>Thanks your account is activaed</h2>
	<p>now you can login to your account</p>
	<?php
		//echo 'Account has been activated successfully';
	}
	else if(isset($_GET['email'],$_GET['email_code']) === true)
		{
			$email =$_GET['email'];
			$email_code =$_GET['email_code'];
			if(email_ex($email) == false)
			{
				$errors[] = "oopps email is not found";
			} 
			else if(act($email, $email_code) === false)
				{
					$errors[] = "we had problems activating your account";
				}
			if(empty($errors) === false)
			{
				?>
				<h2>ooops....</h2>
				<?php
				echo output_errors($errors);
				}
			else
			{
				header('Location:activate.php?success');
				exit();
			}
		}
		else
		{
			header('Location:index.php');
			exit();
		}
	
	include 'includes/overall/footer.php'?>