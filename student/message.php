<?php 
include "connection.php";
include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Meessage</title>
 </head>
 <meta name="viewport" content="width=device-width,initial-scale=1">
 <style type="text/css">
 	body
 	{

 		background-image: url("images/messages.jpg");
 		background-repeat: no-repeat;

 	}
 	.wrapper
 	{
 		height: 600px;
 		width: 500px;
 		background-color: black;
 		opacity: .9;
 		color: white;
 		margin: -20px auto;
 		padding: 10px;

 	}
 	.form-control
 	{
 		height: 40px;
 		width: 76%;
 	}
 	.msg
 	{
 		height: 450px;
 		
 		overflow-y: scroll;
 	}
 	.btn-info
 	{
 		background-color: #02c5b6;
 	}
 	.chat
 	{
 		display: flex;
 		flex-flow: row wrap;
 		
 	}
 	.user .chatbox
 	{
 		width: 380px;
 		padding: 13px 10px;
 		border-radius: 10px;
 		color: white;
 		background-color: purple;	
 		order: -1;
 	}

	.Admin .chatbox
 	{
 		width: 380px;
 		color: black;
 		padding: 13px 10px;
 		border-radius: 10px;
 		background-color: white;	
 		
 	}


 </style>



 <body>

 	 <?php 
 	if(isset($_POST['submit'])){
 		mysqli_query($db,"INSERT into `library`.`message` values ('','$_SESSION[login_user]','$_POST[msg]','no','student'); ");
 	}
 	else
 	{
 		$res=mysqli_query($db,"SELECT *from message where username='$_SESSION[login_user]' ;");
	 }
  ?>



 	<div class="wrapper" >
 		<div style="height: 50px; width: 100%; background-color: #2eaC8b; text-align: center;color: white;">
 			<h3 style="margin-top: -5px;padding-top: 10px;">Admin</h3>
 		</div>
	 <div class="msg"><br>

	 	<?php 

	 		while($row=mysqli_fetch_assoc($res)){

	 			if($row['sender']=='student'){


	 		

	 	 ?>



	 	<div class="chat user" >
			<div style="float: left;padding-top: 5px;">&nbsp
			<?php
				echo"<img class ='img-circle profile_img' height=50 width=50  src='images/".$_SESSION['pic']."'>";					
				
			?>


			</div>	
			<div class="chatbox" style="float: left">
				<?php 

				echo $row['message'];
				 ?>
		
			</div> 		
	    </div>
	    <br>
<?php 
}
 ?>


	    <!---  ADMIN-->
	    <div class="chat Admin">
			<div style="float: left;padding-top: 5px;">
			<?php
				echo"<img class ='img-circle profile_img' height=50 width=50  src='images/".$_SESSION['pic']."'>";					
				
			?>
&nbsp

			</div>	
			<div class="chatbox" style="float: left">
				
			</div> 		
			<?php 
			}
			 ?>
	    </div>
 		
 	</div>

 	<div style="height: 100px;padding-top: 10px; ">
 		<form action="" method="post">
 		<input type="text" name="msg" class="form-control" required="" placeholder="Write Message...." style="float: left;width: 300px; margin-top: 4px;margin-left: 400px"> &nbsp
 			<button class="btn btn-info btn-lg" type="submit" name="submit" style="height: 40px;padding: -5px; margin-top: 4px;  "><span style="margin-left: -5px" class="glyphicon glyphicon-send"></span> &nbsp Send</button>
 		</form>
 	</div>
 	</div>	

 </body>
 </html>