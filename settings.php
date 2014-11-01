<?php 
	//session_start();
	include 'core/init.php';
	protect_page();
	?>
	<html>
	<head>
			<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
</head>
	<?php
	//include 'includes/overall/header.php';
	
	if(empty($_POST) === false)
	{
		$required_fields=array('first_name', 'email');
		//echo '<pre>',print_r($_POST,true) ,'</pre>';
		foreach($_POST as $key=>$value)
		{
			if(empty($value) && in_array($key,$required_fields) === true)
			{
				$errors[]='fields marked with * are required';
				break 1;
			}
	
		}
		if(empty($errors)=== true)
		{
			if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)===false)
			{
				$errors[]='Enter valid email adress.';
			}
			elseif(email_ex($_POST['email'])===true && $user_data['email']!==$_POST['email'])
			{
				$errors[]='email \'' . $_POST['email'] . '\' is already in use.'; 
			}
		}
	//print_r($errors);
	
	}
?>
	<h1>settings</h1>
<?php
if(isset($_GET['success']) === true && empty($_GET['success'])===true)
{
	echo 'your details have updated';
}
else
{
	if(empty($_POST)===false && empty($errors) === true)
	{
		//updare user detail
		$update_data=array(
			'first_name' => $_POST['first_name'],
			'last_name'	 => $_POST['last_name'],
			'email' => $_POST['email'],
		);
		//print_r($update_data);
		update_user($session_user_id,$update_data);
		header('Location: settings.php?success');
		exit();
	}
	else if(empty($errors)===false)
	{
		echo output_errors($errors);
	}
	?>
	
	<pre>
<?php
$a=`sudo -u root useradd -g webuser user102`;    // figure out what user we're executing as
?>
</pre>	<form action=""  method="post">
				<ul>
				<li>
				First Name*:
				<br>
				<input type="text" name="first_name" value="<?php echo $user_data['first_name'];?>">
				</li>
				<li>
				last Name*:
				<br>
				<input type="text" name="last_name" value="<?php echo $user_data['last_name'];?>">
				</li>
				<li>
				email*:
				<br>
				<input type="text" name="email" value="<?php echo $user_data['email'];?>">
				</li>
				<li>
				<input type="checkbox" name="allow_email"<?php if($user_data['allow_email']==1){echo 'checked="checked"';}?>/>Would like to receive email from us?
				</li>
				<li>
				<input type="submit" value="update">
				</li>
				</ul>
				</form>

	<?php
}	
//include 'includes/overall/footer.php'?>
