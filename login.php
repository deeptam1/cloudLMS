  <?php
    include "connect.php";
    include "navbar.php";
    session_start();
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login Page</title>
      <link rel="stylesheet" href="loginstyle.css">
      <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
      
      <div class="loginbox">
          
          <img src="images/avatar1.jpg" alt="" class="avatar">
          
          <h1>Student Login</h1>
          <br>
          
          <form name="login" method="post" action="">
              
              <p>Username</p>
              <input class="form-control" type="text" name="username" placeholder="Enter username" required="">
              <p>Password</p>
              <input class="form-control" type="password" name="password" placeholder="Enter Password" required=""><br>
              <input class="btn btn-danger" type="submit" name="submit" value="Login">
              
              <center><a href="forgetpass.php">Forgot your password? Click here.</a><br></center>

              <br>
              
              <br>
              
          </form>

      </div>

  <?php

if(isset($_POST['submit']))
{
  $count=0;
  $res=mysqli_query($db,"SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
  
  $row= mysqli_fetch_assoc($res);
  $count= mysqli_num_rows($res);

  if($count==0)
  {
    ?>
          
          <div class="alert alert-danger" style="width: 600px; margin-left: 370px; background-color: #de1313; color: white">
            <strong>The username and password doesn't match. Try again</strong>
          </div>    
        <?php
  }
  else
  {
    $_SESSION['login_user'] = $_POST['username'];

    ?>
      <script type="text/javascript">
        window.location="home.php"
      </script>

    <?php
  }
}

?>

</body>
</html>