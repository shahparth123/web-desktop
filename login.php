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
include 'core/init.php';
logged_in_redirect();
if (empty($_POST) === false) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) === true || empty($password) === true) {
        $errors[] = 'you need to enter username and password';
    } else if (user_ex($username) === false) {
        $errors[] = 'we can\'t find user.Have you registered?';
    } else if (user_act($username) === false) {
        $errors[] = 'You have not activated your account';
    } else {
        if (strlen($password) > 32) {
            $errors[] = 'password is too long';
        }
        $login = login($username, $password);
        if ($login === false) {
            $errors[] = 'username or password is incorrect';
        } else {
            $_SESSION['user_id'] = $login;
            header('Location:index.php');
            exit();
        }
    }
} else {
    $errors[] = 'no data received';
}

include 'includes/overall/header.php';
if (empty($errors) === false) {
    ?>
    <style type="text/css">
        .alert-box {
            width:250px;
            color:#555;
            border-radius:10px;
            font-family:Tahoma,Geneva,Arial,sans-serif;font-size:11px;
            padding:10px 36px;
            margin:auto;


        }
        .error {
            background:#ffecec url('/images/error.png') no-repeat 10px 50%;
            border:1px solid #f5aca6;
        }


    </style>

    <div class="alert-box error">We tried to logged you in but<br/>
    <?php
    echo output_errors($errors);
}
?>
</div>
    <?php
    include 'includes/overall/footer.php';
    ?>
