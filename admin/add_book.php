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
  background-color: gray;
}


.book
{
  width: 300px;
  margin: 0px 500px;

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
  <div class="h"> <a href="#">Books Request</a> </div>
 <div class="h">  <a href="#">Issue Information</a> </div>
</div>
</div>


<div id="main">
  
  <span style="font-size:30px;cursor:pointer;color: black; text-align: center" onclick="openNav()">&#9776; open</span>
  <div class="container">
      <h2 style="font-family: Lucide Console;color: black ;text-align: center">Add New Books</h2>
      <form class="book" action="" method="post">
          <input type="text" name="bid" class="form-control" placeholder="Boat Id" required=""><br>
          <input type="text" name="name" class="form-control" placeholder="Book Name" required=""> <br> 
          <input type="text" name="author" class="form-control" placeholder="Authors" required=""> <br> 
          <input type="text" name="edition" class="form-control" placeholder="Edition" required=""> <br>
          <input type="text" name="status" class="form-control" placeholder="Status" required=""> <br> 
          <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""> <br>
          <input type="text" name="department" class="form-control" placeholder="Department" required=""> <br> 
          

          <button class="btn btn-default" type="submit" name="submit" style="text-align: center; margin-left: 50px">ADD</button>
      </form>

  </div>
<?php 

  if(isset($_POST['submit']))
  {


    if (isset($_SESSION['login_user'])) {

      mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]','$_POST[name]','$_POST[author]','$_POST[edition]','$_POST[edition]','$_POST[quantity]','$_POST[department]') ");

?>
<script type="text/javascript">
  alert("Books added successfully");
</script>
<?php 

    }
    else
    {


      ?>
      <script type="text/javascript">
        alert("You need to Login First");
      </script>
      <?php 
    }
  }

  
?>
   

</div>
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





</body>
</html>