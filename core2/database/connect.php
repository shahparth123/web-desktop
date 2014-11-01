<?php
	$connecterror='unable to connect';
	mysql_connect('localhost','root','parth123') or die($connecterror);
	mysql_select_db('webos') or die($connecterror);
?>
