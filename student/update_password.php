<?php
    include "connection.php";
    include "navbar.php";
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<style type="text/css">
	  body{
		width:1280px;
		height: 800px;
		background-image:url("images/ForgotPasswordIcon.jpg");

	}

	.wrapper
	{

		width: 400px;
		height: 400px;
		margin: 180px auto;
		background-color: black;
		opacity: .6;
		color: white;
	}
	.form-control
	{
		width: 300px;


	}


	</style>
</head>

<body>

	<div class="wrapper">
		<div style="text-align: center;"><br>
		
		<h1 style="font-family: Lucida Console;text-align: center;font-size: 28px; ;color: white">Change Your Password</h1>
			
		</div>
	<div style="padding: 40px">
		<form action="" method="post">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="text" name="password" class="form-control" placeholder="New Password" required=""><br>
			<button class="btn btn-default" type="submit" name="submit" style="width: 120px;">Update</button>

		</form>

	</div>
		</div>
		<?php 

			if(isset($_POST['submit']))
			{
				if(mysqli_query($db,"UPDATE student SET password='$_POST[password]' where username= '$_POST[username]' && email='$_POST[email]' ;"))
				{
					?>
					<script type="text/javascript">
						alert("The  Password Updated Successfully");
					</script>
					<?php 
				}


			}

		 ?>

</body>
</html>