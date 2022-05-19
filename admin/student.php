


<?php
    include "connection.php";
    include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>STUDENT-INFORMATION</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <style type="text/css">
   		.srch
   		{
   			padding-left: 1000px


   		}

      <style type="text/css">
      .srch
      {
        padding-left: 1000px


      }
      body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  margin-top: 60px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #343536;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;

  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.form-control{


  margin-left: -70px; 
}


.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.img-circle
{

  margin-left: 20px;

}


#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



   </style>


</head>
<body>
<!--sidenav -->

  <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

 <div style="color: white;margin-left: 40px;font-size: 20px;">
   &nbsp &nbsp 

   <?php
   if(isset($_SESSION['login_user'])){
  
      echo "<img class ='img-circle profile_img' height=100 width=100  src='images/".$_SESSION['pic']."'>"; 
      echo "<br>";
      echo " Welcome ".$_SESSION['login_user'];
    }
    ?>
 </div>     


  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="request.php">Books Request</a>
  <a href="issue_info.php">Issue Information</a>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>






















	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div>
				<input class="form-control" type="text" name="search" placeholder="student username...." required="">
				<button style="background-color:#f07997 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>



				</button>


			</div>


		</form>
	</div>
	<h2>  List of Students</h2>
   <?php


   	if(isset($_POST['submit']))
   	{
   		$q=mysqli_query($db,"SELECT FIRST,last,username,roll,email,contact FROM `student`
		 where username like '%$_POST[search]%' ");


   		if(mysqli_num_rows($q)==0)
   		{
   			echo "Sorry no student found!!!!";
   		}
   		else{
 	 echo "<table class='table table-boarded table-hover'>";
    	 echo "<tr   style='background-color:#f07997;'>";
     //table header
	     echo "<th>";   echo "FIRST NAME"    ;        echo "</th>";
	     echo "<th>";   echo "LAST NAME";            echo "</th>";
	     echo "<th>";   echo "USERNAME" ;           echo "</th>";
		 echo "<th>";   echo "ROLL" ;           echo "</th>";
		 echo "<th>";   echo "EMAIL"   ;         echo "</th>";
		 echo "<th>";   echo "CONTACT"  ;          echo "</th>";
		
	 echo "</tr>";

	 while($row=mysqli_fetch_assoc($q))
	 {
	 	echo "<tr>";
        echo "<td>";    echo $row['FIRST'];    echo"</td>";
        echo "<td>";    echo $row['last'];    echo"</td>";
        echo "<td>";    echo $row['username'];    echo"</td>";
        echo "<td>";    echo $row['roll'];    echo"</td>";
        echo "<td>";    echo $row['email'];    echo"</td>";
        echo "<td>";    echo $row['contact'];    echo"</td>";
       
	 	echo "</tr>";
	 }

     echo "</table>";




   		}

   	}//if btn is not pressed
   	else
   	{

     $res=mysqli_query($db,"SELECT FIRST,last,username,roll,email,contact FROM `student`
      ORDER BY `Student`.`FIRST` ASC");

     echo "<table class='table table-boarded table-hover'>";
     echo "<tr   style='background-color:#f07997;'>";
     //table header
	      echo "<th>";   echo "FIRST NAME"    ;        echo "</th>";
	     echo "<th>";   echo "LAST NAME";            echo "</th>";
	     echo "<th>";   echo "USERNAME" ;           echo "</th>";
		 echo "<th>";   echo "ROLL" ;           echo "</th>";
		 echo "<th>";   echo "EMAIL"   ;         echo "</th>";
		 echo "<th>";   echo "CONTACT"  ;          echo "</th>";
	      echo "</tr>";

	 while($row=mysqli_fetch_assoc($res))
	 {
	 	echo "<tr>";
        echo "<td>";    echo $row['FIRST'];    echo"</td>";
        echo "<td>";    echo $row['last'];    echo"</td>";
        echo "<td>";    echo $row['username'];    echo"</td>";
        echo "<td>";    echo $row['roll'];    echo"</td>";
        echo "<td>";    echo $row['email'];    echo"</td>";
        echo "<td>";    echo $row['contact'];    echo"</td>";
       
	 	echo "</tr>";
	 }

     echo "</table>";






   	}








     

   ?>
</body>
</html>
