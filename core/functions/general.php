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

function email($to, $subject, $body) {
    mail($to, $subject, $body, 'From:parth@localhost');
}

function protect_page() {
    if (logged_in() === false) {
        header('Location: protected.php');
    }
}

function admin_protect() {
    global $user_data;
    if (has_access($user_data['user_id'], 1) === false) {
        header('Location: index.php');
        exit();
    }
}

function logged_in_redirect() {
    if (logged_in() === true) {
        header('Location: index.php');
    }
}

function array_san(&$item) {
    $item = htmlentities(strip_tags(mysql_real_escape_string($item)));
}

function san($data) {
    $data = htmlentities(strip_tags(mysql_real_escape_string($data)));
    return $data;
}

function output_errors($errors) {
    $output = array();
    foreach ($errors as $error) {
        //echo $error,' ,';
        $output[] = '<li>' . $error . '</li>';
    }
    return '<ul>' . implode(' ', $output) . '</ul>';
}

?>