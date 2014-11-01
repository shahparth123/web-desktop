<?php
$api = 'b0fba4e137fc9ca51ddccfbf95051ccc';

$fields = array();
$fields['content'] = "@/login/zoho/ostp1.doc";
$fields['filename'] = 'ostp1.doc';
$fields['id'] = '13';
$fields['format'] = 'doc';
$fields['saveurl'] = urlencode('http://parth.myftp.org:100/z.php');

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://exportwriter.zoho.com/remotedoc.im?apikey='.$api.'&output=editor');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
curl_setopt($ch, CURLOPT_VERBOSE,  1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$page = curl_exec($ch);
curl_close($ch);
echo $page;
?>