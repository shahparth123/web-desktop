<?php 
	//session_start();
	include 'core/init.php';
	logged_in_redirect();
	include 'includes/overall/header.php';
	
?>
			<h1>Recover</h1>
<?php
	$mode_allowed=array('username','password');
	if(isset($_GET['mode'])===true && in_array($_GET['mode'],$mode_allowed)===true)
	{ 
		//echo $_GET['mode'];
		if(isset($_POST['email'])===true && empty($_POST['email'])===false)
		{
			if(email_exist($_POST['email'])
			{
				echo 'ok';
			}
			else
			{
				echo '<p>Opps,we could not find that email address!</p>';
			}
		}
		?>
		<form action="" method="post">
		<ul>
			<li>
				please enter your email address: <br />
				<input type="text" name="email"/>
			</li>
			<li>
			<input type="submit" value="Recover"/>
			</li>
		</ul>
		</form>
		<?php
	}
	else
	{
		header('Location: index.php');
		exit();
	}
?>

			
<?php include 'includes/overall/footer.php'?>