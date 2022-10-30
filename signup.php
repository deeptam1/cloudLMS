<?php
include "connect.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="signupstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="signupbox">

        <h1>SIGN UP</h1>
        <br>
        <form name="" action="" method="post">
            
            <p>Name</p>
            <input class="form-control" type="text" name="sname" placeholder="Enter your name" required=""><br>
            <p>Email Address</p>
            <input class="form-control" type="email" name="email" placeholder="Enter email address" required=""><br>
            <p>Create Username</p>
            <input class="form-control" type="text" name="username" placeholder="Enter new username" required=""><br>
            <p>Create Password</p>
            <input class="form-control" type="password" name="password" placeholder="Enter new password" required=""><br>
            <p>Enter Phone Number</p>
            <input class="form-control" type="number" name="phonenumber" placeholder="Enter phone number" required=""><br>
            <br>
            <center><input class="btn btn-danger" type="submit" name="signup" value="SignUp"><br></center>
            
        </form>

    </div>

<?php

    if(isset($_POST['signup']))
    {
    $count=0;

    $sql="SELECT username from `student`";
    $res=mysqli_query($db,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        if($row['username']==$_POST['username'])
        {
        $count=$count+1;
        }
    }
    if($count==0)
    {
        mysqli_query($db,"INSERT INTO `student` VALUES('','$_POST[sname]', '$_POST[email]', '$_POST[username]', '$_POST[password]', '$_POST[phonenumber]');");
    ?>
        <script type="text/javascript">
            alert("Account created successfully");
        </script>
    <?php
    }
    else
    {

        ?>
        <script type="text/javascript">
            alert("The username already exists. Try another one..");
        </script>
        <?php

    }

    }

?>
    

</body>
</html>