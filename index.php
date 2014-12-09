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
include 'includes/overall/header.php';
?>

<p>

    <?php
    if (isset($_SESSION['user_id'])) {
        $q = "select `image` from profile where user_id=" . $session_user_id;
        $img = mysql_result(mysql_query($q), 0);
        ?>
    <div id="profile" style="position:fixed;top:5%;left:90%;width:100px;text-align:center;">
        <img src="<?php echo $img; ?>" alt="" style="width: 80px;	height: 80px;border-radius:40px;
             -webkit-border-radius: 40px;
             -moz-border-radius: 40px;" />
        <br />
        <div style="background:#fff;text-align:center;" ><a href="#"><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?></a></div>
    </div>
    <script type="text/javascript">
        $(function() {
            var last;

            // preview icon
            $("#config-icon select")
                    .change(function() {
                        var icon = "<span class='ui-icon " + $(this).val() + "'></span>";
                        $(this).parents(".wrapper").find("ins").html(icon);
                    })
                    .trigger("change");


            // click to open dialog
            $("#profile").click(function() {
                //dialog options
                var dialogOptions = {
                    "title": "Control Panel",
                    "width": "330",
                    "height": "500",
                    "modal": false,
                    "resizable": true,
                    "draggable": true,
                    "close": function() {
                        if (last[0] != this) {
                            $(this).remove();
                        }
                    }
                };
                var dialogExtendOptions = {
                    "closable": true,
                    "maximizable": true,
                    "minimizable": true,
                    "minimizeLocation": "left",
                    "collapsable": false,
                    "dblclick": "minimize",
                    "titlebar": false
                };

                dialogExtendOptions.icons = {};
                dialogExtendOptions.icons['minimize'] = 'ui-icon-circle-minus';
                dialogExtendOptions.icons['maximize'] = 'ui-icon-arrow-4-diag';
                dialogExtendOptions.icons['close'] = 'ui-icon-circle-close';

                // open dialog
                last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='app/cpanel/changeprofile.php' seamless scrolling='auto' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
            });

        });
    </script>

    <?php
    if (has_access($session_user_id, 1) === true) {
        
    } else if (has_access($session_user_id, 2) === true) {
        ?>


        <?php
    }
} else {
    
}
?>
</p>
<?php include 'includes/overall/footer.php' ?>
