<?php
	//session_start();
	include 'core/init.php';
	include 'includes/overall/header.php';
	
?>

			<p>

			  <?php if(isset($_SESSION['user_id'])){
	//echo ' You are logged in <br>';
//echo $session_user_id;

?>
<?php
$q="select `image` from profile where user_id=".$session_user_id;
$img=mysql_result(mysql_query($q),0);
?>
<div id="profile" style="position:fixed;top:5%;left:90%;width:100px;text-align:center;">
<img src="<?php echo $img;?>" alt="" style="width: 80px;	height: 80px;border-radius:40px;
	-webkit-border-radius: 40px;
	-moz-border-radius: 40px;" />
	<br />
	<div style="background:#fff;text-align:center;" ><a href="#"><?php echo $user_data['first_name']." ".$user_data['last_name'];?></a></div>
	</div>
	<script type="text/javascript">
$(function(){
  var last;

  // preview icon
  $("#config-icon select")
    .change(function(){
      var icon = "<span class='ui-icon "+$(this).val()+"'></span>";
      $(this).parents(".wrapper").find("ins").html(icon);
    })
    .trigger("change");


  // click to open dialog
  $("#profile").click(function(){
    //dialog options
    var dialogOptions = {
      "title" : "Control Panel",
      "width" : "330",
      "height" : "500",
      "modal" : false,
      "resizable" : true,
      "draggable" : true,
      "close" : function(){
        if(last[0] != this){
          $(this).remove(); 
        }
      }
    };
    var dialogExtendOptions = {
      "closable" : true,
      "maximizable" : true,
      "minimizable" :true,
      "minimizeLocation" : "left",
      "collapsable" : false,
      "dblclick" : "minimize",
      "titlebar" :  false
    };
   
	dialogExtendOptions.icons={};
    dialogExtendOptions.icons['minimize']='ui-icon-circle-minus';
    dialogExtendOptions.icons['maximize']='ui-icon-arrow-4-diag';
    dialogExtendOptions.icons['close']='ui-icon-circle-close';
  
    // open dialog
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='app/cpanel/changeprofile.php' seamless scrolling='auto' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});
</script>
	
<?php
if(has_access($session_user_id,1)===true)
{

/*
?>
	<a href="filemanager/dialog.php?type=0&lang=en_EN&popup=0&crossdomain=0&field_id=&akey=<?php echo md5($_SESSION['user_name']);?>&fldr=&53fa1d7e3c072&1408900703994">Fileman</a>
	
	<?php
	*//*echo 'admin';
	?>
	<br />
	<a href="addstaff.php">Add Staff</a><br />
	<a href="addclass.php">Add Class to Staff</a><br />
	<?php
*/

}
else if(has_access($session_user_id,2)===true)
{/*
	?>
	<a href="filemanager/dialog.php?type=0&lang=en_EN&popup=0&crossdomain=0&field_id=&akey=<?php echo md5($_SESSION['user_name']);?>&fldr=&53fa1d7e3c072&1408900703994">Fileman</a>
	
	<?php
	echo 'moderator';
*/
?>


<?php
}
	} else{
//echo 'Register/login to enter into site.';
}
?>
</p>
<?php include 'includes/overall/footer.php'?>
