<?php
include '../../core/init.php';
if(isset($_GET['id'])==true && $_GET['id']!="")
{
	$id= san($_GET['id']);
	
	$q="delete from icons where id=$id";
	echo $q;
	mysql_query($q) or die("error");
	header('Location:removeicon.php?success');
}
else{
echo "error";
}


?>
