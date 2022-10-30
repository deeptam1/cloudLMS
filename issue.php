<?php
    include "connect.php";
    include "navbar1.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issue Information</title>
    <link rel="stylesheet" href="bookstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <br>
<center>
        <div class="name1">
            <h1>ADMIN <span class="dash">DASHBOARD</span></h1>
        </div>
    </center>
<br>
<br>
    <div class="name">
		<h1>INFORMATION OF BOOKS ISSUED</h1>
	</div>
	
<?php
    if(isset($_SESSION['login_user']))
    {
        $sql="SELECT student.sname,student.username,books.bid,books.name,books.authors,books.edition,book_issue.issuedate,book_issue.returndate FROM student inner join book_issue ON student.username=book_issue.username inner join books ON book_issue.bid=books.bid WHERE book_issue.status ='Approved'";
        
        $res=mysqli_query($db,$sql);
    
        echo "<table class='table table-bordered' style='width:80%; margin-left: auto; margin-right: auto;' >";
        echo "<tr style= 'background-color: rgb(236, 33, 33);'>";
        echo "<th>"; echo "Student Name";  echo "</th>";
        echo "<th>"; echo "Username";  echo "</th>";
        echo "<th>"; echo "Book ID";  echo "</th>";
        echo "<th>"; echo "Book Name";  echo "</th>";
        echo "<th>"; echo "Authors Name";  echo "</th>";
        echo "<th>"; echo "Edition";  echo "</th>";
        echo "<th>"; echo "Issue Date";  echo "</th>";
        echo "<th>"; echo "Return Date";  echo "</th>";

        echo "</tr>"; 
    while($row=mysqli_fetch_assoc($res))
        {      

            echo "<tr>";
            echo "<td>"; echo $row['sname']; echo "</td>";
            echo "<td>"; echo $row['username']; echo "</td>";
            echo "<td>"; echo $row['bid']; echo "</td>";
            echo "<td>"; echo $row['name']; echo "</td>";
            echo "<td>"; echo $row['authors']; echo "</td>";
            echo "<td>"; echo $row['edition']; echo "</td>";
            echo "<td>"; echo $row['issuedate']; echo "</td>";
            echo "<td>"; echo $row['returndate']; echo "</td>";

            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
echo"<br>";
    include "footer.php";
?>

</body>
</html>