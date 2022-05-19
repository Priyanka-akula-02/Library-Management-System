<?php
    include "connection.php";
    include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

   <style type="text/css">
   		.srch
   		{
   			padding-left: 1000px


   		}
      body {
  font-family: "Lato", sans-serif;
}
.btn{
  margin-left: -20px;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
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
.h:hover
{
  color: white;
  width: 150px;
  height: 50px;
  background-color: red;
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

  <div id="mySidenav" class="sidenav" style="width: 400px">
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
 </div>     <br><br>

 <div> <div class="h"> <a href="add_book.php">Add Book</a>  </div>
  <div class="h"> <a href="books.php">Delete Book</a> </div>
  <div class="h"> <a href="request.php">Books Request</a> </div>
 <div class="h">  <a href="issue_info.php">Issue Information</a> </div>
</div>
</div>


<div id="main">
  
  <span style="font-size:30px;cursor:pointer;color: black;" onclick="openNav()">&#9776; open</span>


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
				<input class="form-control" type="text" name="search" placeholder="search books...." required="">
				<button style="background-color:#f07997" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>



				</button>




			</div>


		</form>




    <form class="navbar-form" method="post" name="form1">
      <div>
        <input class="form-control" type="text" name="bid" placeholder="Book Id...." required="">
        <button style="background-color:#f07997" type="submit" name="submit1" class="btn btn-default">
        Delete 
        </button>


      </div>


    </form>


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

   	}


    if(isset($_POST['submit1'])){

      if(isset($_SESSION['login_user'])){
        mysqli_query($db,"DELETE FROM BOOKS WHERE bid=$_POST[bid]");

        ?>

        <script type="text/javascript">
          alert("Book is deleted Succesfully");
        </script>

        <?php
      }
      else{
      ?>
      <script type="text/javascript">
        alert("Please Login first");
      </script>

    <?php
      }

    }


   ?>
</div>
</body>
</html>
