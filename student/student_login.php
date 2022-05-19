<?php
    include "connection.php";
    include "navbar.php";
    //session_start();
?>

<!DOCTYPE html>
<html>
<head>


	<title>Student Login</title>

	<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<style type="text/css">
			section
			{
				margin-top: -80px;
			}
		</style>


</head>
<body>

	
<section>
	<div class="log_img">
<br><br>

		<div class="box1">
			<h1 style="font-family: Lucida Console;text-align: center;font-size: 30px ;color: white">Library Management System</h1>
			
			<h1 style="font-family: Lucida Console;text-align: center;font-size: 20px ;color: white">User Login Form</h1>  
            <form name="login" action="" method="post">
            	<div class="login">
            	
                 <input class="form-control" type="text" name="username" placeholder="username" required=""><br>
                 <input class="form-control" type="password" name="password" placeholder="password" required=""><br>
                  <input  class="btn btn-default" type="submit" name="submit" value="Login" style="color: black;width: 70px;height: 34px;">
                
                 </div>

           
            <p style="color: white;padding: left"><br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            	<a style="color: white;" href="update_password.php">Forgot password? </a>&nbsp &nbsp &nbsp &nbsp &nbsp
            	New to this website?  <a style="color: white;"href="registration.php">Sign Up</a>
            </p>
             </form>

        </div>
	</div>

</section>
<?php

    if(isset($_POST['submit'])){
    	$count=0;
       


    	$res=mysqli_query($db,"SELECT * FROM `student` where username='$_POST[username]' && password='$_POST[password]';");
             
        $row=mysqli_fetch_assoc($res);    
        $count=mysqli_num_rows($res);
        if($count==0){
        	?>
        	<script type="text/javascript">
        		alert("username and password doesnot match");
        	</script>
        	<?php

      	  }
      	 else
        	{

        	$_SESSION['login_user']=$_POST['username'];
            $_SESSION['pic']=$row['pic'];


        	?>
				<script type="text/javascript">
				
				 window.location="index.php"        		
				</script>
		<?php

        }

    }


?>

</body>
</html>