<!doctype html >
<html>
	<?php include 'includes/head.php'; 
	
//	$q=mysql_query("select wallpaper from wallpaper where user_id=$session_user_id");//.$session_user_id);
	
	?>
<body <?php if(logged_in()==true){$q=mysql_query("select wallpaper from wallpaper where user_id=$session_user_id"); ?> style="background: url('<?php echo mysql_result($q,0); ?>') no-repeat center center fixed;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover;" <?php } ?> >
	<?php include 'includes/header.php' ?>
<div class="container">
			<?php include 'includes/aside.php' ?>