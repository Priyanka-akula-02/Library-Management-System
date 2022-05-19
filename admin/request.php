<?php
    include "connection.php";
    include "navbar.php";
    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>



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

  <div class="srch">
    <form name="form1" method="post" action="" style="margin-top: 10px;">
      <input type="text" name="username" placeholder="USERNAME........" class="form-control" required=""><br>
      <input type="text" name="bid" placeholder="BOOK-ID........" class="form-control" required=""><br>
      <button class="btn btn-default" name="submit" type="submit">Submit</button><br>

    </form>
  </div>

  <h3 style="text-align: center;">Request of Book</h3>

<?php
  
  if(isset($_SESSION['login_user']))
  {
    $sql= "SELECT student.username,roll,books.bid,name,author,edition,status FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =' '";
    $res= mysqli_query($db,$sql);

    if(mysqli_num_rows($res)==0)
      {
        echo "<h2><b>";
        echo "There's no pending request.";
        echo "</h2></b>";
      }
    else
    {
      echo "<table class='table table-bordered' >";
      echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        
      echo "</tr>"; 

      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
        echo "<td>"; echo $row['username']; echo "</td>";
        echo "<td>"; echo $row['roll']; echo "</td>";
        echo "<td>"; echo $row['bid']; echo "</td>";
        echo "<td>"; echo $row['name']; echo "</td>";
        echo "<td>"; echo $row['author']; echo "</td>";
        echo "<td>"; echo $row['edition']; echo "</td>";
        echo "<td>"; echo $row['status']; echo "</td>";
        
        echo "</tr>";
      }
    echo "</table>";
    }
  }
  else
  {
    ?>
    <br>
      <h4 style="text-align: center;color: yellow;">You need to login to see the request.</h4>
      
    <?php
  }

  if(isset($_POST['submit']))
  {
    $_SESSION['name']=$_POST['username'];
    $_SESSION['bid']=$_POST['bid'];

    ?>
      <script type="text/javascript">
        window.location="approve.php"
      </script>
    <?php
  }

  ?>
  </div>
</div>
</body>
</html>