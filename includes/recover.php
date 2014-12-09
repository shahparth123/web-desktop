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
//session_start();
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
?>
<h1>Recover</h1>
<?php
$mode_allowed = array('username', 'password');
if (isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
    //echo $_GET['mode'];
    if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
        if(email_exist($_POST['email']) {
            echo 'ok';
        } else {
            echo '<p>Opps,we could not find that email address!</p>';
        }
    }
    ?>
    <form action="" method="post">
        <ul>
            <li>
                please enter your email address: <br />
                <input type="text" name="email"/>
            </li>
            <li>
                <input type="submit" value="Recover"/>
            </li>
        </ul>
    </form>
    <?php
} else {
    header('Location: index.php');
    exit();
}
?>


<?php include 'includes/overall/footer.php' ?>