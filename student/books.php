<?php
    include "connection.php";
    include "navbar.php";
    
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
   <style type="text/css">
   		.srch
   		{
   			padding-left: 1000px


   		}


   </style>
   <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>
<body>

<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="books.php" class="w3-bar-item w3-button">Books</a>
  <a href="request.php" class="w3-bar-item w3-button">Book Request</a>
  <a href="issue_info.php" class="w3-bar-item w3-button">Issue Information</a>
   <a href="expired.php" class="w3-bar-item w3-button">Expired List</a>
</div>
<!-- Page Content -->
<div class="w3-teal">
  <button class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰ Open</button>
  
</div>



<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>










<div style="margin-left: -30px;">

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div>
				<input class="form-control" type="text" name="search" placeholder="search books...." required="">
				<button style="background-color:#f07997 " type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>



				</button>


			</div>


		</form>
	</div>

<!-------------request book------------------>
  <div class="srch">
    <form class="navbar-form" method="post" name="form1">
      <div>
        <input class="form-control" type="text" name="bid" placeholder="Enter Book ID...." required="">
        <button style="background-color:#f07997 ;margin-left: -25px" type="submit1" name="submit1" class="btn btn-default">
          Request


        </button>


      </div>


    </form>
  </div>


</div>





	<h2>  List of Books</h2>
   <?php


   	if(isset($_POST['submit']))
   	{
   		$q=mysqli_query($db,"SELECT *FROM books where name like '%$_POST[search]%' ");


   		if(mysqli_num_rows($q)==0)
   		{
   			echo "Sorry no book found!!!!";
   		}

   		else{
 	 echo "<table class='table table-boarded table-hover'>";
    	 echo "<tr   style='background-color:#f07997;'>";
     //table header
	     echo "<th>";   echo "ID"    ;        echo "</th>";
	     echo "<th>";   echo "BOOK-NAME";            echo "</th>";
	     echo "<th>";   echo "AUTHOR-NAME" ;           echo "</th>";
		 echo "<th>";   echo "EDITION" ;           echo "</th>";
		 echo "<th>";   echo "STATUS"   ;         echo "</th>";
		 echo "<th>";   echo "QUANTITY"  ;          echo "</th>";
		 echo "<th>";   echo "DEPARTMENT" ;           echo "</th>";
	 echo "</tr>";


	 while($row=mysqli_fetch_assoc($q))
	 {
	 	echo "<tr>";
        echo "<td>";    echo $row['bid'];    echo"</td>";
        echo "<td>";    echo $row['name'];    echo"</td>";
        echo "<td>";    echo $row['author'];    echo"</td>";
        echo "<td>";    echo $row['edition'];    echo"</td>";
        echo "<td>";    echo $row['status'];    echo"</td>";
        echo "<td>";    echo $row['quantity'];    echo"</td>";
        echo "<td>";    echo $row['department'];    echo"</td>";
	 	echo "</tr>";
	 }


     echo "</table>";




   		}

     

   	}//if btn is not pressed
   	else
   	{

     $res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;    ");

     echo "<table class='table table-boarded table-hover'>";
     echo "<tr   style='background-color:#f07997;'>";
     //table header
	     echo "<th>";   echo "ID"    ;        echo "</th>";
	     echo "<th>";   echo "BOOK-NAME";            echo "</th>";
	     echo "<th>";   echo "AUTHOR-NAME" ;           echo "</th>";
		 echo "<th>";   echo "EDITION" ;           echo "</th>";
		 echo "<th>";   echo "STATUS"   ;         echo "</th>";
		 echo "<th>";   echo "QUANTITY"  ;          echo "</th>";
		 echo "<th>";   echo "DEPARTMENT" ;           echo "</th>";
	 echo "</tr>";

	 while($row=mysqli_fetch_assoc($res))
	 {
	 	echo "<tr>";
        echo "<td>";    echo $row['bid'];    echo"</td>";
        echo "<td>";    echo $row['name'];    echo"</td>";
        echo "<td>";    echo $row['author'];    echo"</td>";
        echo "<td>";    echo $row['edition'];    echo"</td>";
        echo "<td>";    echo $row['status'];    echo"</td>";
        echo "<td>";    echo $row['quantity'];    echo"</td>";
        echo "<td>";    echo $row['department'];    echo"</td>";
	 	echo "</tr>";
	 }

     echo "</table>";
      if(isset($_POST['submit1'])){

          if(isset($_SESSION['login_user'])){


            mysqli_query($db,"INSERT INTO issue_book values('$_SESSION[login_user]','$_POST[bid]','','','');");
          ?>
            <script type="text/javascript">
              
              window.location="request.php"

            </script>
          <?php

          }
          else
           {


          ?>


            <script type="text/javascript">
              
              alert("Please Login First");

            </script>







            <?php



          }


      }








   	}








     

   ?>
</body>
</html>
