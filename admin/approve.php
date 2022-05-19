<?php
    include "connection.php";
    include "navbar.php";
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request </title>



	  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


</head>
<body>
  <style type="text/css">
  body{

background-image: url("images/book--.jpg");
background-repeat: no-repeat;

}


.container
{

  height: 700px;
  background-color: black;
  opacity: .6;
  color: white;

}
.Approve{
  margin-left: 400px;
}
.srch
{
  padding-left: 800px;
}
.form-control
{
  width: 300px;
  background-color: black;
  color: white;
}

</style>

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




</head>
<body>

<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="books.php" class="w3-bar-item w3-button">Books</a>
  <a href="request.php" class="w3-bar-item w3-button">Book Request</a>
  <a href="issue_info.php" class="w3-bar-item w3-button">Issue Information</a>
</div>
<!-- Page Content -->



<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<div class="container">
  
<h3 style="text-align: center;">Approve Request</h3><br>

<form class="Approve" action="" method="post">
  
  <input class="form-control" type="text" name="approve"  placeholder="Approve or Not" required=""><br>
  <input class="form-control" type="text" name="issue"  placeholder="Issue Date yyyy-mm-dd" required=""><br>
  <input class="form-control" type="text" name="return"  placeholder="Return Date yyyy-mm-dd" required=""><br>
  <button class="btn btn-default" name="submit" type="submit">Approve</button>


</form>

</div>

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];");?>
    <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
      <?php

    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        mysqli_query($db,"UPDATE books SET status='not-available' where bid='$_SESSION[bid]';");
      }
    }
    ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php"
      </script>
    <?php
  }
?>
</body>
</html>