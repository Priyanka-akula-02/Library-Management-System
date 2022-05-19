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

  height: 800px;
  background-color: black;
  opacity: .6;
  color: white;
  width: 80%;
  margin-top: -60px;

}

.scroll{
  height: 200px;
  width: 100%;
  overflow: auto;;
}
th,td{
  width: 10%;
}

.srch
{
  padding-left: 70%;
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
<div class="container">
<?php 

 if(isset($_SESSION['login_user'])){
  ?>
<div style="float: left; padding: 25px;">
      <form method="post" action="">
          <button name="submit2" type="submit" class="btn btn-default" style="background-color: #06861a; color: yellow;">RETURNED</button> 
                      &nbsp&nbsp
          <button name="submit3" type="submit" class="btn btn-default" style="background-color: red; color: yellow;">EXPIRED</button>
      </form>
      </div>

<div class="srch">
    <form name="form1" method="post" action="" style="margin-top: 10px;">
      <input type="text" name="username" placeholder="USERNAME........" class="form-control" required=""><br>
      <input type="text" name="bid" placeholder="BOOK-ID........" class="form-control" required=""><br>
      <button class="btn btn-default" name="submit" type="submit">Submit</button><br>

    </form>
  </div>

<?php

        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*1;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


          $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';
          mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

          mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
          
        }
      }
    
    $c=0;

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='yes' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table class='table table-bordered' style='width:100%;' >";
        //Table header
        
        echo "<tr style='background-color: #6db6b9e6;'>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Roll No";  echo "</th>";
        echo "<th>"; echo "BID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Status";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

      echo "</tr>"; 
      echo "</table>";

       echo "<div class='scroll'>";
        echo "<table class='table table-bordered' >";
      while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr>";
          echo "<td>"; echo $row['username']; echo "</td>";
          echo "<td>"; echo $row['roll']; echo "</td>";
          echo "<td>"; echo $row['bid']; echo "</td>";
          echo "<td>"; echo $row['name']; echo "</td>";
          echo "<td>"; echo $row['author']; echo "</td>";
          echo "<td>"; echo $row['edition']; echo "</td>";
          echo "<td>"; echo $row['approve']; echo "</td>";
          echo "<td>"; echo $row['issue']; echo "</td>";
          echo "<td>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
        echo "</div>";

    ?>
  </div>
</div>
</body>
</html>