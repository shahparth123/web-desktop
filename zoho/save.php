<?php

$filepath = 'D:\xampp\htdocs\login\zoho\samplefile.doc';

$tmp_filename = $_FILES['content']['tmp_name']; 

$upload_status = move_uploaded_file($tmp_filename, $filepath); 

?>