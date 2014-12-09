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
require_once('../core/init.php');
$flag = 0;
if (isset($_FILES["zip_file"]["name"]) == true) {

    function rmdir_recursive($dir) {
        foreach (scandir($dir) as $file) {
            if ('.' === $file || '..' === $file)
                continue;
            if (is_dir("$dir/$file"))
                rmdir_recursive("$dir/$file");
            else
                unlink("$dir/$file");
        }

        rmdir($dir);
    }

    if ($_FILES["zip_file"]["name"]) {
        $filename = $_FILES["zip_file"]["name"];
        $source = $_FILES["zip_file"]["tmp_name"];
        $type = $_FILES["zip_file"]["type"];

        $name = explode(".", $filename);
        $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
        foreach ($accepted_types as $mime_type) {
            if ($mime_type == $type) {
                $okay = true;
                break;
            }
        }

        $continue = strtolower($name[1]) == 'zip' ? true : false;
        if (!$continue) {
            $message = "The file you are trying to upload is not a .zip file. Please try again.";
        }

        /* PHP current path */
        $path = dirname(__FILE__) . '/';  // absolute path to the directory where zipper.php is in
        $filenoext = basename($filename, '.zip');  // absolute path to the directory where zipper.php is in (lowercase)
        $filenoext = basename($filenoext, '.ZIP');  // absolute path to the directory where zipper.php is in (when uppercase)

        $targetdir = $path . $filenoext; // target directory
        $targetzip = $path . $filename; // target zip file

        /* create directory if not exists', otherwise overwrite */
        /* target directory is same as filename without extension */

        if (is_dir($targetdir))
            rmdir_recursive($targetdir);


        mkdir($targetdir, 0777);


        /* here it is really happening */

        if (move_uploaded_file($source, $targetzip)) {
            $zip = new ZipArchive();
            $x = $zip->open($targetzip);  // open the zip file to extract
            if ($x === true) {
                $zip->extractTo($targetdir); // place in the directory with same name  
                $zip->close();

                unlink($targetzip);
            }

            $message = "Your .zip file was uploaded and unpacked." . $filenoext . " installed";
            mysql_query("INSERT INTO `apps` (`id`, `name`, `image`, `css_id`, `javascript`, `url`, `new`) VALUES (NULL, '" . $filenoext . "', '/app/" . $filenoext . "/logo.png', '" . $filenoext . "', '$(function(){
  var last;

  // preview icon
  $(\"#config-icon select\")
    .change(function(){
      var icon = \"<span class=''ui-icon \"+$(this).val()+\"''></span>\";
      $(this).parents(\".wrapper\").find(\"ins\").html(icon);
    })
    .trigger(\"change\");


  // click to open dialog
  $(\"#" . $filenoext . "\").click(function(){
    //dialog options
    var dialogOptions = {
      \"title\" : \"" . $filenoext . "\",
      \"width\" : \"330\",
      \"height\" : \"500\",
      \"modal\" : false,
      \"resizable\" : true,
      \"draggable\" : true,
      \"close\" : function(){
        if(last[0] != this){
          $(this).remove(); 
        }
      }
    };
    var dialogExtendOptions = {
      \"closable\" : true,
      \"maximizable\" : true,
      \"minimizable\" :true,
      \"minimizeLocation\" : \"left\",
      \"collapsable\" : false,
      \"dblclick\" : \"minimize\",
      \"titlebar\" :  false
    };
   
	dialogExtendOptions.icons={};
    dialogExtendOptions.icons[''minimize'']=''ui-icon-circle-minus'';
    dialogExtendOptions.icons[''maximize'']=''ui-icon-arrow-4-diag'';
    dialogExtendOptions.icons[''close'']=''ui-icon-circle-close'';
  
    // open dialog
    last = $(\"<div scrolling=''no'' style=''padding:0px;margin:0px;background-color:#EEE;''><iframe src=''app/" . $filenoext . "/index.php'' seamless scrolling=''no'' style=''position: absolute; height: 100%;width: 100%;padding:0;margin:0;''  > </iframe></div>\").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});', '#', '0');

");
            $flag = 1;
        } else {
            $message = "There was a problem with the upload. Please try again.";
        }
    }
}

$img = mysql_result(mysql_query("select `image` from profile where user_id=" . $session_user_id), 0);
protect_page();
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
        <link href="cpanel/css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="cpanel/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="cpanel/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="cpanel/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="cpanel/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="cpanel/css/AdminLTE.css" rel="stylesheet" type="text/css" />


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
        <script src="cpanel/js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="cpanel/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="cpanel/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="cpanel/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="cpanel/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="cpanel/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="cpanel/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="cpanel/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="cpanel/js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="cpanel/js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="cpanel/js/AdminLTE/demo.js" type="text/javascript"></script>

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
                                <span><?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $img; ?>" class="img-circle" alt="User Image" />
                                    <p>
<?php echo $user_data['first_name'] . " " . $user_data['last_name']; ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="cpanel/changeprofile.php" class="btn btn-default btn-flat">Change Picture</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="cpanel/editprofile.php" class="btn btn-default btn-flat">Edit Profile</a>
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
                            <img src="<?php echo $img; ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $user_data['first_name']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="cpanel/index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="cpanel/changewallpaper.php">
                                <i class="fa fa-picture-o"></i> <span>Change Wallpaper</span>
                            </a>
                        </li>
                        <li>
                            <a href="cpanel/changepassword.php">
                                <i class="fa fa-th"></i> <span>Change Password</span><!-- <small class="badge pull-right bg-green">new</small>-->
                            </a>
                        </li>
                        <li>
                            <a href="cpanel/addicon.php">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Add Icon</span>
                            </a>
                                  </li>
                        <li>
                            <a href="cpanel/removeicon.php">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Remove Icon</span>
                           <!--     <i class="fa fa-angle-left pull-right"></i>-->
                            </a>
                        </li>
                        <li>
                            <a href="cpanel/addapp.php">
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
                                    <h3 class="box-title">Install App</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php
                                if ($flag == 1) {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <b>App installed</b>
                                    </div>
                                    <?php
                                }
                                ?>



                                <form role="form" enctype="multipart/form-data" method="post" action="">
                                    <div class="box-body">

                                        <div class="form-group">

                                            <label for="zip_file">Choose file</label>

                                            <div class="input-group input-group-sm">
                                                <input type="file" name="zip_file" />
                                                </span>
                                            </div>





                                            <br/>

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