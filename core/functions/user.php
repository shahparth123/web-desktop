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

function ans_ex($uid, $id) {
    $uid = san($uid);
    $query1 = mysql_query("SELECT COUNT(`uid`) FROM `log` WHERE `uid` = '$uid' and `qid`='$id'");
    return (mysql_result($query1, 0) == 1) ? true : false;
}

function has_access($user_id, $type) {
    $user_id = (int) $user_id;
    $type = (int) $type;
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `user_id` = $user_id AND `type`=$type"), 0) == 1 ? true : false);
}

function recover($mode, $email) {
    $mode = san($mode);
    $email = san($email);

    $user_data = user_data(uidfromemail($email), 'first_name', 'username');
    if ($mode == 'username') {
        //rec uname
        email($email, 'your username', "Hello " . $user_data['first_name'] . ",\n\nYour username is:" . $user_data['username'] . "\n\n\n\n-Parth Hosting");
    } elseif ($mode = 'password') {
        //rec pass
        $gen_pass = substr(md5(rand(999, 999999)), 0, 8);
        //die($gen_pass);
        change_password(uidfromemail($email), $gen_pass);
        update_user(uidfromemail($email), array('password_recover' => '1'));
        email($email, 'your password recovery', "Hello " . $user_data['first_name'] . ",\n\nYour newpassword is:" . $gen_pass . "\n\n\n\n-Parth Hosting");
        //die($gen_pass);
    }
}

function update_user($user_id, $update_data) {
    //global $session_user_id;
    $update = array();
    array_walk($update_data, 'array_san');
    foreach ($update_data as $field => $data) {
        $update[] = '`' . $field . '`=\'' . $data . '\'';
    }
//	print_r($update);
    //die();
    //mysql_query("UPDATE `user` SET ". implode(',',$update)."WHERE `user_id` ='$session_user_id'");
    mysql_query("UPDATE `user` SET " . implode(',', $update) . "WHERE `user_id` ='$user_id'");
}

function act($email, $email_code) {

    $email = mysql_real_escape_string($email);
    $email_code = mysql_real_escape_string($email_code);

    if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0 "), 0) == 1) {
        mysql_query("UPDATE `user` SET `active` = 1 WHERE `email` = '$email'");

        return true;
    } else {
        return false;
    }
}

function change_password($user_id, $password) {
    $user_id = (int) $user_id;
    $password = md5($password);
    mysql_query("UPDATE `user` SET `password` = '$password', `password_recover`=0 WHERE `user_id` = $user_id");
}

function register_user($register_data) {
    array_walk($register_data, 'array_san');
    $register_data['password'] = md5($register_data['password']);
    $fields = '`' . implode('`, `', array_keys($register_data)) . '`';
    $data = '\'' . implode('\', \'', $register_data) . '\'';
    //echo $fields;
    //print_r($register_data);
    ///
    //echo "INSERT INTO `user` ($fields) VALUES ($data)";
    //die();
    ////
    ////
    ////
    ///

    mysql_query("INSERT INTO `user` ($fields) VALUES ($data)");
    email($register_data['email'], 'ACTIVATE Account', "Hello " . $register_data['first_name'] . ",\n\nyou need to activate your account to login.\n\nto activate click link below:\n\n	http://fcpprogram.tk/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . " \n\n-fcpprogram.tk");
    $U_ID = uidfromemail($register_data['email']);
    //echo $U_ID;
    mysql_query("INSERT INTO `profile` (`id`, `user_id`, `image`) VALUES (NULL, '" . $U_ID . "', '/images/avatar.jpg');") or die("profile");
    mysql_query("INSERT INTO `wallpaper` (`id`, `user_id`, `wallpaper`) VALUES (NULL, '" . $U_ID . "', '/images/blurred.jpg');") or die("wallpaper");
//	mysql_query("insert into wallpaper (NULL,'".$U_ID."','images/blurred.jpg')") or die("Asdasd");
//	mysql_query("insert into profile (NULL,'".$U_ID."','/images/avatar.jpg')") or die("qweqwe");
}

function user_count() {
    return mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `active` = 1"), 0);
}

function user_data($user_id) {
    $data = array();
    $user_id = (int) $user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();
    //echo $func_num_args;
    if ($func_num_args > 1) {
        unset($func_get_args[0]);

        $fields = '`' . implode('`, `', $func_get_args) . '`';
        //die("SELECT $fields FROM `user` WHERE `user_id` = $user_id");
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `user` WHERE `user_id` = $user_id"));
        //echo $fields;
        //print_r($data);
        return $data;
    }
    //print_r($func_get_args);
}

function logged_in() {
    return (isset($_SESSION['user_id'])) ? true : false;
}

function user_ex($username) {
    $username = san($username);
    $query1 = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username'");
    return (mysql_result($query1, 0) == 1) ? true : false;
}

function email_ex($email) {
    $email = san($email);
    $query1 = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `email` = '$email'");
    return (mysql_result($query1, 0) == 1) ? true : false;
}

function user_act($username) {
    $username = san($username);
    $query2 = mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `active` = 1");
    return (mysql_result($query2, 0) == 1) ? true : false;
}

function uidfromuname($username) {
    $username = san($username);
    return mysql_result(mysql_query("SELECT `user_id` FROM `user` WHERE `username` = '$username'"), 0, 'user_id');
}

function uidfromemail($email) {
    $username = san($email);
    return mysql_result(mysql_query("SELECT `user_id` FROM `user` WHERE `email` = '$email'"), 0, 'user_id');
}

function login($username, $password) {
    $user_id = uidfromuname($username);
    $username = san($username);
    $password = md5($password);
    return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `user` WHERE `username` = '$username' AND `password`= '$password'"), 0) == 1) ? $user_id : false;
}

?>
