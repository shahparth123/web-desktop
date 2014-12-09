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
<?php

session_start();
require 'database/connect.php';
require 'functions/general.php';
require 'functions/user.php';

$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
if (logged_in() === true) {
    $session_user_id = $_SESSION['user_id'];
    $user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'first_name', 'last_name', 'email', 'password_recover', 'type', 'allow_email');
    $_SESSION['user_name'] = $user_data['username'];

    //echo $user_data['username'];
    if (user_act($user_data['username']) === false) {
        session_destroy();
        header('Location:index.php');
        exit();
    }
    if ($current_file !== 'changepassword.php' && $current_file !== 'logout.php' && $user_data['password_recover'] == 1) {
        header('Location: changepassword.php?force');
        exit();
    }
}


$errors = array();
ob_start();
?>