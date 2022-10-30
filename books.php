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
        <title>Books-Student</title>
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
            <h1>STUDENT <span class="dash">DASHBOARD</span></h1>
        </div>
    </center>
        <br>
        <center>
            <div class="searchbar">
                <form class="navbar-form" method="POST">
                        
                        <input class="form-control" type="text" name="search" placeholder="Search Book" required="">
                        <button style="background-color: rgb(236, 33, 33);" type="submit" name="submit" class="btn btn-default">
                            <span style="color: white;" class="glyphicon glyphicon-search"></span>
                        </button>
            
                </form>
            </div>
            <br>

        <!------------requestbook----------->

        <div class="searchbar">
                <form class="navbar-form" method="POST">
                        
                        <input class="form-control" type="text" name="bid" placeholder="Enter Book ID to request" required="">
                        <br>
                        <br>
                        <button style="background-color: rgb(236, 33, 33); color: white;" type="submit" name="submit1" class="btn btn-default">Request
                        </button>
            
                </form>
            </div>

        </center>

<br>
<div class="name">
		<h1>BOOKS IN THE LIBRARY</h1>
	</div>

    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT * from books where `name` like '%$_POST[search]%' ");

            if(mysqli_num_rows($q)==0)
            {
                echo "No book found! Try searching again.";
            }
            else
            {
                echo "<table class='table table-bordered table-hover' style='width:80%; margin-left: auto; margin-right: auto;'>";
                echo "<tr style= 'background-color: rgb(236, 33, 33);'>";
            echo "<th>"; echo "BID"; echo "</th>";
            echo "<th>"; echo "BOOK NAME"; echo "</th>";
            echo "<th>"; echo "AUTHOR NAME"; echo "</th>";
            echo "<th>"; echo "EDITION"; echo "</th>";
            echo "<th>"; echo "STATUS"; echo "</th>";
            echo "<th>"; echo "QUANTITY"; echo "</th>";
            echo "<th>"; echo "DEPARTMENT"; echo "</th>";
        echo "</tr>";  
            
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; echo $row['department']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }

        }
            
        else
        {
            $res=mysqli_query($db,"SELECT * FROM `books`;");

            echo "<table class='table table-bordered table-hover' style='width:80%; margin-left: auto; margin-right: auto;'>";
                echo "<tr style= 'background-color: rgb(236, 33, 33);'>";
            echo "<th>"; echo "BID"; echo "</th>";
            echo "<th>"; echo "BOOK NAME"; echo "</th>";
            echo "<th>"; echo "AUTHOR NAME"; echo "</th>";
            echo "<th>"; echo "EDITION"; echo "</th>";
            echo "<th>"; echo "STATUS"; echo "</th>";
            echo "<th>"; echo "QUANTITY"; echo "</th>";
            echo "<th>"; echo "DEPARTMENT"; echo "</th>";
        echo "</tr>";  
            
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['bid']; echo "</td>";
                echo "<td>"; echo $row['name']; echo "</td>";
                echo "<td>"; echo $row['authors']; echo "</td>";
                echo "<td>"; echo $row['edition']; echo "</td>";
                echo "<td>"; echo $row['status']; echo "</td>";
                echo "<td>"; echo $row['quantity']; echo "</td>";
                echo "<td>"; echo $row['department']; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }

        if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO book_issue Values('$_SESSION[login_user]', '$_POST[bid]','$_POST[name]', '$_POST[status]', '', '');");
				
                
        ?>
                <script type="text/javascript">
                    alert("Book requested succesfully. Wait for admin approval.");
                </script>
            
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php

			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		

        }


        ?>

<?php
    include "footer.php";
?>

    </body>
    </html>