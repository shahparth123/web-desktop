<html>
<head>
<?php
require('core/init.php');
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://<?php echo $host;?>/static/gateone.js"></script>

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
                                    url: 'https://<?php echo $host?>',
                                    embedded: true,
                                    audibleBell: false,
				    auth: <?php echo $valid_json_auth_object?>
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
                            var existingContainer = GateOne.Utils.getNode('#'+GateOne.prefs.prefix+'container');
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

                    
		/*		GateOne.Events.once('terminal:new_terminal',function(termNum){
			setTimeout(function()
{*/
//                            GateOne.Terminal.sendString(termNum,'ssh://root@localhost:22\n'); // Create the new terminal
/*},500
);				

});*/

GateOne.Terminal.sendString('ssh://<?php echo $_SESSION['user_name'];?>@localhost:22\n');

	}
            </script>
<?php echo $_SESSION['user_name'];?>
    </body>
</html>
