<?php
    include "connect.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Home</title>
    <link rel="stylesheet" href="homestyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    
    <header>
        <section class="navsection">`
            <div class="logo">
                <h1>ONLINE LIBRARY MANAGEMENT</h1>
            </div>

    <div style="color: white; font-family: 'Quicksand'; font-size: 15px; background-color: rgb(236, 33, 33); padding-left: 5px; padding-right: 5px; padding-top: 5px; padding-bottom: 5px; border-radius: 10px;">
        <?php
            echo "WELCOME". $_SESSION['login_user']; 
        ?>
    </div>

        <nav>
            <a href="home.php">HOME</a>
            <a href="books.php">BOOKS</a>
            <a href="feedback.php">FEEDBACK</a>
            <a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a>
        </nav>
        </section>

    </header>
    <main>
<br>
    <center>
        <div class="name">
            <h1>STUDENT <span class="dash">DASHBOARD</span></h1>
        </div>
    </center>

    <section class="container">
        <div class="requestbook">
            <p>To Request a Book</p>
            <br>
            <a href="books.php">Click Here</a>
        </div> 
        <div class="requestbook">
            <p>To See Book Requests</p>
            <a href="request.php">Click Here</a>
        </div> 
    </section>

    </main>
<br><br><br><br><br><br><br>
<?php
    include "footer.php";
?>


</body>
</html>