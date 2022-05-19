<?php
    include "connection.php";
    include "navbar.php";
?>




<!DOCTYPE html>
<html>
<head>


	<title>Admin Registration</title>

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
	<div class="reg_img">

<br><br><br>
		

		<div class="box2">
			<h1 style="font-family: Lucida Console;text-align: center;font-size: 30px ;color: white">&nbsp Library Management System</h1>
			
			<h1 style="font-family: Lucida Console;text-align: center;font-size: 22px ;color: white">User Registration Form</h1>
            <form name="Registration" action="" method="post">
            	<div class="registration">
            	
                 <input class="form-control" type="text" name="first" placeholder="First Name" required=""><br>

				 <input class="form-control" type="text" name="last" placeholder="Last Name" required=""><br>


                 <input class="form-control" type="text" name="username" placeholder="username" required=""><br>
                 <input class="form-control" type="password" name="password" placeholder="password" required=""><br>
                 
                 <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
                  <input class="form-control" type="text" name="contact" placeholder="phone number" required=""><br>
                 


				<input  class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: black;width: 80px;height: 34px;">


                 </div>

            </form>
           
        </div>
	</div>
</section>

	<?php
   
	     if(isset($_POST['submit']))
	     {

	     	$count=0;
	     	$sql="SELECT username FROM `admin`";
	     	$res=mysqli_query($db,$sql);


	     	while ($row=mysqli_fetch_assoc($res)) {
	     		# code...
	     		if($row['username']==$_POST['username'])
	     		{
	     			$count=$count+1;
	     		}
	     	}

            if($count==0){
             
	             mysqli_query($db,"INSERT INTO `admin` VALUES ('', '$_POST[first]','$_POST[last]',
	             '$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','admin.png');");

            

    ?>         
	  <script type="text/javascript">
	  	
       alert("Registration successful");



	  </script>
    <?php

}

else{

?>
	 <script type="text/javascript">
	  	
       alert("the username already exists");



	  </script>
	  <?php

}

	     }

	 ?>


</body>
</html>