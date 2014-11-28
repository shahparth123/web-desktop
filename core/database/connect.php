<?php
//	$host='192.168.1.3';
	//$host='192.168.109.147';
//	$host='parth.myftp.org';
//	$host='webos.phst.in';
//	$host2='osftp.phst.in';
	$host='localhost';
	$connecterror='unable to connect';
	mysql_connect($host,'admin','parth123') or die($connecterror);
	mysql_select_db('webos') or die($connecterror);
?>
