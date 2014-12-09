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
<?php /* $a=$argv[1];

  $b="sudo useradd -g webuser ".$a;
  $c="sudo chmod -R 707 ".$a;

  $d=`$b`;
  $e=`$c`;

  ?>
  //username=1
  //password=2
  //firstname=3
  //lastname=4
  //email=5
 */ ?>

<?php

//session_start();
include 'core/init2.php';
//logged_in_redirect();
//include 'includes/overall/header.php';

if (empty($argv) === false) {
    $required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
    //echo '<pre>',print_r($_POST,true) ,'</pre>';
    /* foreach($_POST as $key=>$value){
      if(empty($value) && in_array($key,$required_fields) === true){
      $errors[]='fields marked with * are required';
      break 1;
      }
      } */
    if (empty($errors) === true) {
        if (user_ex($argv[1]) === true) {
            $errors[] = 'username \'' . $argv[1] . '\' is already taken.';
        }
        if (preg_match("/\s/", $argv[1]) == true) {
            $errors[] = 'your username must not contain space.';
        }
        if ((strlen($argv[2]) < 6 ) || (strlen($argv[2]) > 32 )) {
            $errors[] = 'password must between 6-32 character';
        }
        if (filter_var($argv[5], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = 'Enter valid email adress.';
        }
        if (email_ex($argv[5]) === true) {
            $errors[] = 'email \'' . $argv[3] . '\' is already in use.';
        }
    }
}
//print_r($errors);
/*
  ?>
  <h1>Register</h1>
  <?php
 */
if (isset($_GET['success']) && empty($_GET['success'])) {
    echo 'you have been registered successfully.Please check your email to activate your account';
} else {
    if (empty($argv) === false && empty($errors) === true) {
        //register
        $register_data = array(
            'username' => $argv[1],
            'password' => $argv[2],
            'first_name' => $argv[3],
            'last_name' => $argv[4],
            'email' => $argv[5],
            'email_code' => md5($argv[1] + microtime())
        );

        register_user($register_data);
        //redirect
        //header('Location:register.php?success');
        $a = $argv[1];
//sudo useradd -p $(openssl passwd -1 $PASS) $USERNAME
        $b = "sudo useradd -p $(openssl passwd -1 " . $argv[2] . ") -g webuser " . $a;
        $c = "sudo chmod -R 707 " . $a;

        $d = `$b`;
        $e = `$c`;

        echo "user added successfully";

        exit();
    } else if (empty($errors) === false) {
        echo output_errors($errors);
        echo "php addu.php username passord firstname lastname email";
    }
    /*
      ?>
      <form action="" method="post">
      <ul>
      <li>
      Username:
      <br>
      <input type="text" name="username">
      </li>
      <li>
      Password:
      <br>
      <input type="password" name="password">
      </li><li>
      Password again:
      <br>
      <input type="password" name="password_again">
      </li>
      <li>
      First Name:
      <br>
      <input type="text" name="first_name">
      </li>
      <li>
      Last Name:
      <br>
      <input type="text" name="last_name">
      </li>
      <li>
      Email:
      <br>
      <input type="text" name="email">
      </li>
      <li>
      <input type="submit" value="Register">
      </li>

      </ul>
      </form>

      <?php
     */
}
?>