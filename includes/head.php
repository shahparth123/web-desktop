<head>
  <meta itemprop="image" content="/images/ic_launcher.png">
	<meta name="mobile-web-app-capable" content="yes">
	<link rel="manifest" href="manifest.json">
<link rel="icon" href="launcher_ic.png">
<link rel="apple-touch-icon" href="launcher_ic.png">
<link rel="apple-touch-icon-precomposed" href="launcher_ic.png">
    <link rel="icon" type="image/x-icon" href="logo.ico">

		<?php
		if(logged_in()==true)
		{
		?>
		<title>Web OS</title>
		<script src="js/jquery-1.11.1.js"></script>
  <script src="js/jquery-ui.js"></script>
<link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
		  <script type="text/javascript" src="js/jquery.dialogextend.js"></script>
 <script src="js/jquery.ui.touch-punch.min.js"></script>

<script src="js/jquery.contextmenu.js"></script>
    <link rel="stylesheet" href="css/jquery.contextmenu.css">
    
 
		<style type="text/css">
		*,
*:after,
*:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -o-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

.clearfix:after {
    content: "";
    display: table;
    clear: both;
}

  .ui-dialog { font-size: 12px; }
 
  /***** CONTENT *****/
  section fieldset { margin: 5px; width: 200px; }
  section label { cursor: pointer; }
  #config-icon .wrapper { clear: both; }
  #config-icon ins { float: left; margin: 0 5px 0 0; }
  #config-icon label { float: left; }
  #config-icon select { float: right; width: 100px; }
  #config-method button { width: 48%; }
  @media only screen and (max-width:200px){
.fa-3x {
font-size: 10em;
}
}
		</style>
		<meta charset="UTF-8">
		<?php
		}
		else{
		?>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Web OS Login</title>
        
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.63321.js"></script>
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #563c55 url(images/blurred.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
		
		<?php
		}
		
		?>
	</head>