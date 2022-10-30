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
    <title>Admin_Home</title>
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <main>
<br>
    <center>
        <div class="name">
            <h1>ADMIN <span class="dash">DASHBOARD</span></h1>
        </div>
    </center>

    <section class="container">
        <div class="requestbook">
            <p>To Add a Book</p>
            <br>
            <a href="addbook.php">Click Here</a>
        </div> 
        <div class="requestbook">
            <p>To see pending requests</p>
            </center><a href="request.php">Click Here</a></center>
        </div> 
        <div class="requestbook">
            <p>To See Books Issued</p>
            </center><a href="issue.php">Click Here</a></center>
        </div> 
    </section>



</main>
    
</body>
<br>
<br>
<br>
<br>
<br><br><br>

<?php
    include "footer.php";
?>


</html>
