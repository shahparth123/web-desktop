<?php 
require_once('../../core/init.php'); 

	//session_start();
	protect_page();
	
	if(empty($_POST) === false){
	$required_fields=array('current_password', 'password', 'password_again');
	//echo '<pre>',print_r($_POST,true) ,'</pre>';
		foreach($_POST as $key=>$value){
			if(empty($value) && in_array($key,$required_fields) === true){
				$errors[]='fields marked with * are required';
				break 1;
			}
		}
		
		
		if(md5($_POST['current_password']) === $user_data['password'])
		{
			if(trim($_POST['password']) !== trim($_POST['password_again']))
			{
				$errors[]='new passwords do not match.';
			} else if((strlen($_POST['password']) < 6 ) || (strlen($_POST['password']) > 32 ))
				{
					$errors[]='password must between 6-32 character';
				}
		}
		else
		{
			$errors[]='your current password is incorrect';
		}
	//print_r($errors);
	}
	
	


$img=mysql_result(mysql_query("select `image` from profile where user_id=".$session_user_id),0);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>WEBOS</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

	
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
		
		 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
		
					<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

		<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
		
		
		
		
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                WEBOS
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $user_data['first_name']." ".$user_data['last_name'];?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $img;?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $user_data['first_name']." ".$user_data['last_name'];?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="changeprofile.php" class="btn btn-default btn-flat">Change Picture</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="editprofile.php" class="btn btn-default btn-flat">Edit Profile</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $img;?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Parth</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
						<li>
                            <a href="changewallpaper.php">
                                <i class="fa fa-picture-o"></i> <span>Change Wallpaper</span>
                            </a>
                        </li>
                        <li>
                            <a href="changepassword.php">
                                <i class="fa fa-th"></i> <span>Change Password</span><!-- <small class="badge pull-right bg-green">new</small>-->
                            </a>
                        </li>
                        <li>
                            <a href="addicon.php">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Add Icon</span>
                           <!--     <i class="fa fa-angle-left pull-right"></i>-->
                            </a>
                         
                        </li>
						<li>
                            <a href="removeicon.php">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Remove Icon</span>
                           <!--     <i class="fa fa-angle-left pull-right"></i>-->
                            </a>
                            </li>
                        <li>
                            <a href="addapp.php">
                                <i class="fa fa-laptop"></i>
                                <span>Add Apps</span>
                            </a>
                      </li>
                   </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-8 connectedSortable">                            



                            
                            <!-- TO DO List -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Change Password</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
<?php
								if(isset($_GET['success'])===true && empty($_GET['success'])===true)
	{
		?>
		<div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>Password Changed Successfully</b>
                                    </div>

	
		<?php
		}
	else{
	if(isset($_GET['force'])===true && empty($_GET['force'])===true)
	{
	?>
	<div class="alert alert-warning alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>you must change your password now.</b>
                                    </div>
	<?php
	}
	if(empty($_POST) === false && empty($errors) === true)
		{
			//change
			//echo 'ok';
			change_password($session_user_id, $_POST['password']);
			header('Location:changepassword.php?success');
		
		}
		else if(empty($errors) === false)
		{
			?><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b><?php echo output_errors($errors); ?></b>
                                    </div> 
									
									<?php
									
		}

}
?>	
					
									
									
								<form role="form" method="POST" action="">
								   <div class="box-body">
									
                                       
										<div class="form-group">
                                            <label for="current_password">Current Password</label>
                                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">New Password</label>
                                            <input type="password" class="form-control" id="password"  name="password" placeholder="New Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password_again">New Password again*:</label>
                                            <input type="password" class="form-control" id="password_again" placeholder="Password Again" name="password_again">
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



       </body>
</html>