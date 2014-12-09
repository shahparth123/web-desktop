<?php
/* It is web based version of desktop environment like GNOME or KDE. 
 * It will have basic functionalities of any linux system like text editor, file-manager, terminal, calculator ,web based office suite etc. 
 * It will also able to run any command line programs like gcc, python, bc, vi,mysql etc.
 * It also have control panel for personalize user experience like changing wallpaper, manage user accounts.
 * It is also mobile enable so any one can easily use it from any remote place over the internet.
 * It is  fully written in php.
 * It is developed by:-
 * 
 * Parth Shah,
 * Chirag Vidja,
 * Janvi Patel
 *  
 * You can download our project from http://github.com/shahparth123/web-desktop
 * for more detail contact us at parth@parthhosting.com
 * 
 * COPYRIGHT NOTICE
 * ================
 * Web Desktop and all related original code...
 * Copyright 2014 Parth Shah,Chirag Vidja,Janvi Patel
 * 
 *  
 */
?>
<!doctype html >
<html>
    <?php
    include 'includes/head.php';

//	$q=mysql_query("select wallpaper from wallpaper where user_id=$session_user_id");//.$session_user_id);
    ?>
    <body <?php if (logged_in() == true) {
        $q = mysql_query("select wallpaper from wallpaper where user_id=$session_user_id"); ?> style="background: url('<?php echo mysql_result($q, 0); ?>') no-repeat center center fixed;  -webkit-background-size: cover;  -moz-background-size: cover;  -o-background-size: cover;  background-size: cover;" <?php } ?> >
            <?php include 'includes/header.php' ?>
        <div class="container">
<?php include 'includes/aside.php' ?>