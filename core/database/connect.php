<?php
	$host='webos.phst.in';
	$connecterror='unable to connect';
	mysql_connect($host,'webos','password') or die($connecterror);
	mysql_select_db('webos') or die($connecterror);
?>
