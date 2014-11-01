<?php
if(logged_in()==true)
{
?>
<nav>
	
		<?php
		if(logged_in()==true)
		{
		?>
	<style type="text/css">
		.menubar1 {
display: block;
width: 50px;
height: 100%;
position: fixed; 
top:0;left:-40px;
background-color: #313131;
background-position: 0px 0px;
background-repeat: no-repeat;
z-index: 300;
padding: 18px 0 0 0px;
-moz-border-radius: 5px 5px 5px 5px;
border-radius: 5px 5px 5px 5px;
-webkit-border-radius: 5px 5px 5px 5px;
-khtml-border-radius: 5px 5px 5px 5px;
-moz-transition: 0.4s;
-ms-transition: 0.4s;
-o-transition: 0.4s;
-webkit-transition: 0.4s;
transition: 0.4s;

}

.menubar1:hover {
 width:100px; background-color:#f57d13;padding:50px;
 }
 
 .menubar1 > ul > li
 {
 
 height:20%;
	border-radius:10px;
	border-color:black;
 }
.menubar1 > ul > li > a{
color:black;
}
 </style>
<div class="menubar1">
<ul>
	<li><a href="#" id="settings" title="Control Panel"><i class="fa fa-gear fa-3x"></i></a></li>
	<li><a href="#" id="fileman" title="File Manager"><i class="fa fa-folder fa-3x"></i></a></li>
	<?php /*<li><a href="#" title="Text Editor"><i class="fa fa-pencil-square-o fa-3x"></i></a></li>*/?>
	<li><a href="#" id="calc" title="Calculator"><i class="fa fa-calculator fa-3x"></i></a></li>
	<li><a href="#" id="term" title="Terminal"><span class="fa-stack fa-lg">
  <i class="fa fa-square fa-stack-2x"></i>
  <i class="fa fa-terminal fa-stack-1x fa-inverse"></i>
</span>
</a>
<li><a href="logout.php" title="Logout"><i class="fa fa-power-off fa-3x"></i></a></li>
	
</li>
</ul>
</div>	<?php
		}
	?>
	
</nav>
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
  $("#settings").click(function(){
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
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='app/cpanel/index.php' seamless scrolling='auto' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});

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
  $("#calc").click(function(){
    //dialog options
    var dialogOptions = {
      "title" : "Calculator",
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
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='app/calc.html' seamless scrolling='no' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});

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
  $("#fileman").click(function(){
    //dialog options
    var dialogOptions = {
      "title" : "Filemanager",
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
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='filemanager/dialog.php?type=0&lang=en_EN&popup=0&crossdomain=0&field_id=&akey=<?php echo md5($_SESSION['user_name']);?>&fldr=&53fa1d7e3c072&1408900703994' seamless scrolling='no' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});

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
  $("#term").click(function(){
    //dialog options
    var dialogOptions = {
      "title" : "Terminal",
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
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='2.php' seamless scrolling='no' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div><a href='https://<?php echo $host;?>' target=_blank>click here if not loaded</a>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});

</script>
<style>
  .desktopicon {border:0px; width: 80px; height: 80px; margin-left: 100px; margin-bottom: 30px; margin-top: 10px; text-align:center;}
  .lablename{background:white;margin:0px 0px;}
  </style>

<div class="desktopicon">
    <a href="#" id="fm">

<img width="80px" height="80px" src="images/fm.png" alt="" />
  <p class="lablename">Computer</p>
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
  $("#fm").click(function(){
    //dialog options
    var dialogOptions = {
      "title" : "Filemanager",
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
    last = $("<div scrolling='no' style='padding:0px;margin:0px;background-color:#EEE;'><iframe src='filemanager/dialog.php?type=0&lang=en_EN&popup=0&crossdomain=0&field_id=&akey=<?php echo md5($_SESSION['user_name']);?>&fldr=&53fa1d7e3c072&1408900703994' seamless scrolling='no' style='position: absolute; height: 100%;width: 100%;padding:0;margin:0;'  > </iframe></div>").dialog(dialogOptions).dialogExtend(dialogExtendOptions);
  });
 
});


</script>
</a>

  </div>
  
<?php
$q="select * from icons where user_id=".$session_user_id;
//echo $q;
$r1=mysql_query($q);
while($row1=mysql_fetch_array($r1))
{
?>
  <div class="desktopicon">
    <a href="<?php echo $row1['url']; ?>" id="<?php echo $row1['css_id']; ?>" <?php if($row1['new']==1){echo "target=_blank";}?> >

<img width="80px" height="80px" src="<?php echo $row1['image']; ?>" alt="" />
  <p class="lablename"><?php echo $row1['name']; ?></p>
<script type="text/javascript">
<?php echo $row1['javascript']; ?>
</script>
</a>

  </div>
<?php
}
?>

<script>
  $(function() {
    $( ".desktopicon" ).draggable();
  });
  $(function() {
    $( ".desktopicon" ).resizable();
  });
  </script>

<?php
}
?>