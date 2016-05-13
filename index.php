<?php

?>
<!DOCTYPE html>
<html>
<head>
	<title>TrailTracker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/output.css">
	<script src="jquery/jquery-1.12.2.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function() {
			var queryp=$("#query");
			var channelp=$("#channel");
			var iframe=$("iframe");
			var danger=$("#danger");
			var success=$("#success");
			var error=$("#error");
			var video="http://www.youtube.com/watch?v=";
			var audio = new Audio('music/ringtone.mp3');

			$('#btn').click(function() {
				query=queryp.val();
				channel=channelp.val();
				danger.css('visibility','hidden');
				success.css('visibility','hidden');
				error.css('visibility','hidden');
				if(query==""||channel=="")
				{
					danger.css('visibility','visible');
				}
				else
				{
					
					success.css('visibility','visible');
                                        resend();
					function resend()
                                        {
					$,$.ajax({
					url: 'test.php',
					type: 'GET',
					async: 'true',
					data: { "q" : query, "channel" : channel},
					cache: 'false',
					success: function(data){
                                               //alert(data);
						if(data!="resend")
						{
						audio.play();
						video1=video+data;
                                               
   						window.location.href=video1;
						}
                                                else
                                                     resend();
					},
					error : function(data){
						//error.css('visibility','visible');
                                                resend();
					
					  } 
                                        
					});
                                      }
				}
				
			});
		});
			
			
			
		
	</script>

</head>
<body>

<div class="container-fluid">
	
   

	</li>
	<div class="container">
		<img  src="images/logo.jpg"  alt="Logo" > 
		<form role="form" id="searchform">
		
			<div class="form-group">
				<div class="col-sm-4">
				<input type="text" name="q" id="query" class="form-control" placeholder="Enter the video name" ></input>
				</div>
				<div class="col-sm-4">
				<input type="text" name="channel" id="channel"  class="form-control" placeholder="Enter the channel name" list="exampleList" ></input>
			
				</div>
				<div class="col-sm-2">
				<button type="button" id="btn" class="btn btn-primary" style="background-color: #353F45;" >Search</button>
				</div>
			</div><br>
			

		</form>
	


		<div class="alert alert-danger" style="visibility:hidden;margin-top:30px; height: 30px;padding:5px;width:800px;" id="danger">
				
				<strong>Video name  or channel name  is empty</strong> 
			</div><br>
		<div class="alert alert-success" style="visibility:hidden;	 height: 30px;padding:5px;width:800px;margin-left:20px" id="success">
				
				<strong>Please wait till the video arrives</strong> 
			</div>
		<div class="alert alert-danger" style="visibility:hidden; height: 30px;padding:5px;width:800px;" id="error">
				
				<strong>Server error contact system administrator</strong> 
			</div><br>

		
	</div>
	
</div>

</body>
</html>
