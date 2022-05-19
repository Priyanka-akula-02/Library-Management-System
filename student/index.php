<?php


session_start();


?>

<!DOCTYPE html>
<html>
<head>
    
    <title>  Online Library Management System</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<style type="text/css"></style>
<style type="text/css">
	nav
	{
	    float: right;
	    word-spacing: 30px;
	    padding: 20px;
	}
	nav li
	{
	  display: inline-block;
	  line-height: 70px;

	}	


</style>

</head>
<body>
	<div class="wrapper">
	



		<header>
			<div class=logo>

			<img src="images/logo.png" height="55px" >
			<h1 style="color: white;font-size: 15px;margin-top: 0px"> Online Library Management System</h1>
			</div>

			<?php
				
				if (isset($_SESSION['login_user']))
			     {?>

<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="logout.php">LOGOUT</a></li>
                   
                    <li><a href="feedback.php">FEEDBACK</a></li>

				</ul>
			</nav>
			<?php


			     }else
			     {
			     	?>
<div style="margin-top:  0px;">	
			<nav style="">
			<ul class="nav navbar-nav   navbar-right">
					<li><a href="index.php">HOME</a></li>
                    <li><a href="books.php">BOOKS</a></li>
                    <li><a href="student_login.php">STUDENT-LOGIN</a></li>
                   
                    <li><a href="feedback.php">FEEDBACK</a></li>

				</ul>
			</nav>
			</div>

			<?php

			     }


			?>

			
			
		</header>

		<section>
		<div class="sec_img">
			
<!--
		<div class="w3-content w3-section" style="width: 1280px;height: 400px;">

		     	<img class="mySlides w3-animate-left" src="images/school.jpg" style="width: 100%;">

		        <img class="mySlides w3-animate-left" src="images/library-interior.jpg "style="width: 100%;">

				<img class="mySlides w3-animate-fading" src="images/background.jpg "style="width: 100%;">
				<img class="mySlides w3-animate-fading" src="images/book-business.jpg " style="width: 100%;">
				



		     </div>

		<script type="text/javascript">
			var a=0;
		    carousel();

			function carousel(){

				var i;
				var x=document.getElementsByClassName("mySlides");
				
				for(i=0;i<x.length;i++){

					x[i].style.display="none";
				}
				a++;
				if(a>x.length){a=1}
					x[a-1].style.display="block";
					setTimeout(carousel,5000);

			}

		</script>-->


			<br> <br><br>
		  <div class="box">
			<br>
			<h1 style="text-align: center; font-size: 30px;">Welcome To Library</h1><br> <br>
			<h1 style="text-align: center;font-size: 22px;">Opens at 9:00 </h1>
			<h1 style="text-align: center;font-size: 22px;">Closes at 15:00 </h1><br>
		  </div>
	
		</div>   

		
		</section>
		
	</div>

	<?php

    include "footer.php";

     
	?>

    
</body>
</html>