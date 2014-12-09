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
<header>

    <h1>Web <strong>OS</strong></h1>
    <h2>OS that runs on browser</h2>

    <div class="support-note">
        <span class="note-ie">Sorry, only modern browsers.</span>
    </div>

</header>

<section class="main">
    <form class="form-3" action="login.php" method="POST">
        <p class="clearfix">
            <label for="login">Username</label>
            <input type="text" name="username" id="login" placeholder="Username">
        </p>
        <p class="clearfix">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password"> 
        </p>
        <p class="clearfix">
            <input type="submit" name="submit" value="Sign in">
        </p>       
    </form>​
</section>
