<?php 
	//session_start();
	include 'core/init.php';
	protect_page();
	?>

<html>
	<head>
			<script src="http://code.jquery.com/jquery-1.11.1.js"></script>

	<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
</head>
<body>
<form action="wallsave.php" method="post">
<div class="input-append">
	    <input id="fieldID" type="text" value="" ">
	    <input id="fieldID1" type="text" value="" ">

	    <a href="filemanager/dialog.php?type=1&akey=<?php echo md5($_SESSION['user_name']);?>&fldr=&53fa1d7e3c072&1408900703994&field_id=fieldID" class="btn iframe-btn" type="button">Select</a>
	</div><br/>

</form>
				<script type="text/javascript">
				jQuery(document).ready(function ($) {
      $('.iframe-btn').fancybox({
			  'width'	: 880,
			  'height'	: 570,
			  'type'	: 'iframe',
			  'autoScale'   : false
      });

      $('#fieldID').on('change',function(){
	      alert('change triggered');
		$('#ifieldID').attr('src',$('#fieldID').val());
      });

			//
			// Handles message from ResponsiveFilemanager
			//
			function OnMessage(e){
			  var event = e.originalEvent;
			   // Make sure the sender of the event is trusted
			   if(event.data.sender === 'responsivefilemanager'){
			      if(event.data.field_id){
			      	var fieldID=event.data.field_id;
			      	var url=event.data.url;
							$('#fieldID').val(url).trigger('change');

							$.fancybox.close();

							// Delete handler of the message from ResponsiveFilemanager
							$(window).off('message', OnMessage);
			      }
			   }
			}

		  // Handler for a message from ResponsiveFilemanager
			$('.iframe-btn').on('click',function(){
			  $(window).on('message', OnMessage);
			});


      
    
});

				</script>


</body>
</html>
