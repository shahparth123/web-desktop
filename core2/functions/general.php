<?php
	function email($to, $subject, $body)
	{
		mail($to, $subject, $body, 'From:parth@localhost');
	}
	
	function protect_page()
	{
		if(logged_in() === false)
		{
			header('Location: protected.php');
		}
	}
	function admin_protect()
	{
		global $user_data;
		if(has_access($user_data['user_id'],1)=== false)
		{
			header('Location: index.php');
			exit();
		}
	}

	function logged_in_redirect()
	{
		if(logged_in() === true)
		{
			header('Location: index.php');
		}
	}
	
	function array_san(&$item){
	$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
	
	}
	function san($data){
	$data = htmlentities(strip_tags(mysql_real_escape_string($data)));
	return $data;
	}
	function output_errors($errors){
	$output=array();
	foreach($errors as $error){
		//echo $error,' ,';
		$output[]='<li>'. $error . '</li>';
		}
	return '<ul>' . implode(' ' , $output) . '</ul>'; 
	}
?>