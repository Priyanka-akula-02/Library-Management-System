<?php


session_start();


?>





<!DOCTYPE html>
<html>
<head>
	<title></title>
		<link rel="stylesheet" type="text/css" href="style.css">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
</head>
<body>

	<nav class="navbar navbar-inverse">
				<div class="container-fluid">
					<div class=navbar-header>
					<!--<img src="images/logo.png" height="40px">-->
					<a class="navbar-brand active">Online Library Management System</a>
					</div>

					
						<ul class="nav navbar-nav ">
							<li><a href="index.php">HOME</a></li>
		                    <li><a href="books.php">BOOKS</a></li>
		                    <li><a href="feedback.php">FEEDBACK</a></li>
		                    <li><a href="fine.php">FINE</a></li>
						</ul>

						<?php

							if (isset($_SESSION['login_user']))
							{?>
								<ul class="nav navbar-nav ">

								<li><a href="profile.php">PROFILE</a></li>					
								
                               <li><a href="student.php">STUDENT-INFORMATION</a></li>
							
								</ul>
							
								<ul class=" nav navbar-nav  navbar-right">
								<li><a href="profile.php">
									<div style="color: white;">
									<?php
									echo"<img class ='img-circle profile_img' height=30 width=30  src='images/".$_SESSION['pic']."'>";
										echo "  ".$_SESSION['login_user'];
									?>


								</div>
									
								</a></li>	
								<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
															</ul>

							<?php	

							}else
							{?>

							<ul class=" nav navbar-nav  navbar-right">
							<li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in "> LOGIN</span>
		                     </a></li>
							
		                    <li><a href="registration.php"><span class="glyphicon glyphicon-user"> SIGN UP</span></a></li>
		                    
						</ul>
						<?php


							}


						?>




						
				</div>
			</nav>


</body>
</html>