<?php
        include "connect.php";
        include "navbar1.php";
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Information</title>
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
        <center>
            <div class="searchbar">
                <form class="navbar-form" method="POST">
                        
                        <input class="form-control" type="text" name="search" placeholder="Student username...." required="">
                        <button style="background-color: rgb(236, 33, 33);" type="submit" name="submit" class="btn btn-default">
                            <span style="color: white;" class="glyphicon glyphicon-search"></span>
                        </button>
            
                </form>
            </div>
        </center>

<br>
<br>
    <div class="name">
		<h1>REGISTERED USERS</h1>
	</div>
	

    <?php

        if(isset($_POST['submit']))
        {
            $q=mysqli_query($db,"SELECT id,sname,email,username,phonenumber FROM `student` where username like '%$_POST[search]%' ");

            if(mysqli_num_rows($q)==0)
            {
                echo "<div class='alert alert-danger' style='width: 600px; margin-left: 370px; background-color: #de1313; color: white; text-align: center';>
                <strong>No student record found. Try searching again.</strong>
                </div>   ";
            }
            else
            {
                echo "<table class='table table-bordered table-hover' style='width:80%; margin-left: auto; margin-right: auto;'>";
                echo "<tr style= 'background-color: rgb(236, 33, 33);'>";
            echo "<th>"; echo "SID"; echo "</th>";
            echo "<th>"; echo "STUDENT NAME"; echo "</th>";
            echo "<th>"; echo "EMAIL ID"; echo "</th>";
            echo "<th>"; echo "USERNAME"; echo "</th>";
            echo "<th>"; echo "CONTACT NUMBER"; echo "</th>";
            echo "<th>"; echo "DELETE RECORD"; echo "</th>";
        echo "</tr>";  
            
            while($row=mysqli_fetch_assoc($q))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['sname']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['phonenumber']; echo "</td>";
                echo "<td>"; echo"<form  method='GET'><a style='background-color: rgb(236, 33, 33); font-weight: bold; color: white; padding-left: 3px; padding-right: 3px; padding-top: 3px; padding-bottom: 5px; border-radius: 8px; text-decoration: none;' href='approve.php?uname=$row[username]'>DELETE</a></form>"; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            }

        }
            
        else
        {
            $res=mysqli_query($db,"SELECT id,sname,email,username,phonenumber FROM `student`");

            echo "<table class='table table-bordered table-hover' style='width:80%; margin-left: auto; margin-right: auto;'>";
                echo "<tr style= 'background-color: rgb(236, 33, 33);'>";
                echo "<th>"; echo "SID"; echo "</th>";
                echo "<th>"; echo "STUDENT NAME"; echo "</th>";
                echo "<th>"; echo "EMAIL ID"; echo "</th>";
                echo "<th>"; echo "USERNAME"; echo "</th>";
                echo "<th>"; echo "CONTACT NUMBER"; echo "</th>";
                echo "<th>"; echo "DELETE RECORD"; echo "</th>";
        echo "</tr>";  
            
            while($row=mysqli_fetch_assoc($res))
            {
                echo "<tr>";
                echo "<td>"; echo $row['id']; echo "</td>";
                echo "<td>"; echo $row['sname']; echo "</td>";
                echo "<td>"; echo $row['email']; echo "</td>";
                echo "<td>"; echo $row['username']; echo "</td>";
                echo "<td>"; echo $row['phonenumber']; echo "</td>";
                echo "<td>"; echo "<form method='GET'><a style='background-color: rgb(236, 33, 33); font-weight: bold; color: white; padding-left: 3px; padding-right: 3px; padding-top: 3px; padding-bottom: 5px; border-radius: 8px; text-decoration: none;' href='delete.php?uname=$row[username]'>DELETE</a></input></form>"; echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        ?>


</body>

<?php
    include "footer.php";
?>

    </html>