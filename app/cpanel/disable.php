<?php
include '../../core/init.php';
admin_protect();
if(isset($_GET['id'])==true && $_GET['id']!="")
{
	$id= san($_GET['id']);
    $a=mysql_query("select active from user where user_id=".$id);
	$active=mysql_result($a,0);
	if($active==1)
	{
		$new=0;
	}
	else
	{
		$new=1;
	}
	$q="update user set active=".$new." where user_id=$id";
	echo $q;
	mysql_query($q) or die("error");
	header('Location:manageuser.php?success');
}
else{
echo "error";
}


?>
