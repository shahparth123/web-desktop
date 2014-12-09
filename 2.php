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
<html>
    <head>
        <?php
        require('core/init.php');
        ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://<?php echo $host; ?>/static/gateone.js"></script>

    </head>
    <body> 
        <div id="gateone_container" style="position: relative; width: 100%; height: 100%;">
            <div id="gateone"></div>
        </div>

        <script>
            $(document).ready(function()
            {
<?php
$secret = 'NjMwZjZjYTgzOWVmNDJhZGFjZTQ4ZjIzNjgyYWE2YzQxY';
$authobj = array(
    'api_key' => 'ZTgzNzY1MTczZTVkNGVlZThiNjFmZmU2NzdhYzUyNWY4Z',
    'upn' => $_SESSION['user_name'],
    'timestamp' => time() . '0000',
    'signature_method' => 'HMAC-SHA1',
    'api_version' => '1.0'
);
$authobj['signature'] = hash_hmac('sha1', $authobj['api_key'] . $authobj['upn'] . $authobj['timestamp'], $secret);
$valid_json_auth_object = json_encode($authobj);
?>
                // Initialize Gate One
                GateOne.init({
                    url: 'https://<?php echo $host ?>',
                    embedded: true,
                    audibleBell: false,
                    auth: <?php echo $valid_json_auth_object ?>
                });


                var authGateOneCheckInterval = setInterval(function()
                {
                    if (GateOne.initialized)
                    {
                        showTerminal();

                        clearInterval(authGateOneCheckInterval);
                    }
                }, 500);
            });

            function showTerminal()
            {
                // NOTE: To avoid name conflicts GateOne.Utils.createElement() automatically prepends
                //       GateOne.prefs.prefix to the ID of the created element.  This is why
                //       GateOne.Utils.getNode() below has the prefix inserted in the middle...
                var existingContainer = GateOne.Utils.getNode('#' + GateOne.prefs.prefix + 'container');
                var container = GateOne.Utils.createElement('div', {
                    'id': 'container',
                    'class': 'terminal',
                    'style': {'height': '100%', 'width': '100%'}
                });
                var gateone = GateOne.Utils.getNode('#gateone');

                if (!existingContainer) {
                    gateone.appendChild(container); // Put our terminal in the container
                } else {
                    container = existingContainer;
                }

                termNum = GateOne.Terminal.newTerminal(null, null, container); // Create the new terminal


                GateOne.Terminal.sendString('ssh://<?php echo $_SESSION['user_name']; ?>@localhost:22\n');

            }
        </script>
        <?php echo $_SESSION['user_name']; ?>
    </body>
</html>
