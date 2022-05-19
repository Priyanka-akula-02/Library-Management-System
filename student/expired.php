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
      <div  style="float: right;padding-top: 20px;">
        <?php 
        $var=0;
        $result=mysqli_query($db,"SELECT *FROM `fine` where username='$_SESSION[login_user]'and status='not paid';");
        while ($r=mysqli_fetch_assoc($result)) {
          $var=$var+$r['fine'];
        }
        $var2=$var+$_SESSION['fine'];

         ?>


        <h2> Your fine is:
          <?php 

            echo "Rs.".$var2;

           ?>

        </h2>
      </div>



 <?php

      }
    
  

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp'  and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT student.username,roll,books.bid,name,author,edition,approve,issue,issue_book.return FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='yes' and issue_book.username='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
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