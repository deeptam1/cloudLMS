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
        <title>Book Request</title>
        <link rel="stylesheet" href="bookstyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
		<br>
		<br>
		<br>
	<div class="name">
		<h1>BOOK(S) REQUESTED</h1>
	</div>
	<br>
    
	<?php
	if(isset($_SESSION['login_user']))
		{
			$q=mysqli_query($db,"SELECT * from book_issue where username='$_SESSION[login_user]' and status='' ;");

			if(mysqli_num_rows($q)==0)
			{
				echo "<br><br><br>"; 
				
				echo "<h2 style='color: white;'><b>";
				echo " There are no pending requests.";
				echo "</b></h2>";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: rgb(236, 33, 33);'>";

				
				echo "<th>"; echo "Username";  echo "</th>";
                echo "<th>"; echo "Book ID";  echo "</th>";
				echo "<th>"; echo "Approval Status";  echo "</th>";
				echo "<th>"; echo "Issue Date";  echo "</th>";
				echo "<th>"; echo "Return Date";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_row($q))
			{
				echo "<tr>";
                echo "<td>"; echo $row['0']; echo "</td>";
				echo "<td>"; echo $row['1']; echo "</td>";
				echo "<td>"; echo $row['2']; echo "</td>";
				echo "<td>"; echo $row['3']; echo "</td>";
				echo "<td>"; echo $row['4']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
			}
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2><b>";
			echo " Please login first to see the request information.";
			echo "</b></h2>";
		}
		?>
	</div>
</div>
        
<br><br><br><br><br><br><br><br><br><br><br>

<?php
    include "footer.php";
?>

    </body>
    </html>