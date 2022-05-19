<?php
    include "connection.php";
    include "navbar.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style type="text/css">
		.wrapper{
			width: 400px;
			margin: 0 auto;
			color: white;
		}
	</style>
</head>
<body style="background-color: green">

	<div class="container" >
		<form action="" method="post">
			<button class="btn btn-default" style="float: right;width: 70px" name="submit1" type="submit1">Edit	</button>
        </form>




        <div class="wrapper">
        	<?php

        	if(isset($_POST['submit1'])){

        		?>

        		<script type="text/javascript">
        			window.location="edit.php"
        		</script>


        		<?php


        	}






        	$q=mysqli_query($db,"SELECT *FROM admin where username='$_SESSION[login_user]';");

?>

		<h2 style="text-align: center;"> My Profile</h2>


		<?php 

		 $row=mysqli_fetch_assoc($q);

		 echo "<div style='text-align:center'>
		    <img class='img-circle profile_img 'width=120 height=110  src='images/".$_SESSION['pic']."' ></div>";

		 ?>

		 <div style="text-align: center;"><b>Welcome</b>
		   <h4><?php 

		   echo $_SESSION['login_user'];


		  ?>
		  </h4> 
		 </div>

		 <?php 
		 	echo "<b>";

		 	echo "<table class='table table-bordered'>";
		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>First Name:";
		 		echo "</td>";

		 		echo "<td>";
		 			echo $row['first'];

		 		echo "</td>";

		 	echo "</tr>";

		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>Last Name:";
		 		echo "</td>";
		 		echo "<td>";
		 			echo $row['last'];
		 		echo "</td>";
		 	echo "</tr>";

		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>Username:";
		 		echo "</td>";
		 		echo "<td>";
		 			echo $row['username'];
		 		echo "</td>";		 	
		 	echo "</tr>";

		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>Password:";
		 		echo "</td>";
		 		echo "<td>";
		 			echo $row['password'];
		 		echo "</td>";

			 	echo "</tr>";

		 	

		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>Email";
		 		echo "</td>";
		 		echo "<td>";
		 		   echo $row['email'];
		 		echo "</td>";
		 	echo "</tr>";

		 	echo "<tr>";
		 		echo "<td>";
		 			echo "<b>Contact:";
		 		echo "</td>";
		 		echo "<td>";
		 			echo $row['contact'];
		 		echo "</td>";		 	
		 	echo "</tr>";

		 	

 			echo "</table>";
		 	
		 	echo "</b>";

		  ?>
        </div>

	</div>


</body>
</html>