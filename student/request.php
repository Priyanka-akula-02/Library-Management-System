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

<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Close &times;</button>
  <a href="books.php" class="w3-bar-item w3-button">Books</a>
  <a href="request.php" class="w3-bar-item w3-button">Book Request</a>
  <a href="issue_info.php" class="w3-bar-item w3-button">Issue Information</a>
  <a href="expired.php" class="w3-bar-item w3-button">Expired</a>
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
  <a href="#" class="w3-bar-item w3-button">Issue Information</a>
   <a href="expired.php" class="w3-bar-item w3-button">Expired list</a>
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
<?php 

	if(isset($_SESSION['login_user']))
   	{
   		$q=mysqli_query($db,"SELECT *FROM issue_book where username='$_SESSION[login_user]' and approve=''; ");


   		if(mysqli_num_rows($q)==0)
   		{
   			echo "No Pending Request !!!!";
   		}

   		else{
 	 echo "<table class='table table-boarded table-hover '>";
    	 echo "<tr   style='background-color:#f07997;'>";
     //table header
	    
	     echo "<th>";   echo "BOOK-ID";            echo "</th>";
	     echo "<th>";   echo "APPROVED-STATUS" ;           echo "</th>";
		 echo "<th>";   echo "ISSUE-DATE" ;           echo "</th>";
		 echo "<th>";   echo "RETURNED-DATE"   ;         echo "</th>";
		
	 echo "</tr>";


	 while($row=mysqli_fetch_assoc($q))
	 {
	 	echo "<tr>";
        echo "<td>";    echo $row['bid'];    echo"</td>";
        echo "<td>";    echo $row['approve'];    echo"</td>";
        echo "<td>";    echo $row['issue'];    echo"</td>";
        echo "<td>";    echo $row['return'];    echo"</td>";
       echo "</tr>";
	 }


     echo "</table>";




   		}

     

   	}
   	else{

   		echo "Please Login First";

   	}






 ?>




</body>
</html>