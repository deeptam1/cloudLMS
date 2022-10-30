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
        <title>Request</title>
        <link rel="stylesheet" href="approve_style.css">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
    <center>
        <div class="name1">
            <h1>ADMIN <span class="dash">DASHBOARD</span></h1>
        </div>
    </center>
        <br>
        <br> 
        <div class="container">
            <div class="info">
                <P>Book requested by:</p>
                <?php
                    echo "Username of the Student-"; 
                    $uname = $_GET['uname'];
                    echo "$uname";
                    echo "<br>";
                    echo "Book ID-";
                    $bid = $_GET['bid'];
                    echo "$bid";
                    
                ?>


            </div>
            
            <div class="signupbox">

                <h3>Approve Book Request</h3>
                <br>
                <br>
                <form name="" action="" method="post">
                    <label for="">Enter status</label>
                    <input type="text" name="status" class="form-control" placeholder="Approved or Declined" required=""><br>
                    <label for="">Enter date of issue</label>
                    <input type="date" name="issuedate" class="form-control" placeholder="Issue date" required=""><br>
                    <label for="">Enter date of return</label>
                    <input type="date" name="returndate" class="form-control" placeholder="Return date" required=""><br>
                    <br>
                    <center><input class="btn btn-danger" type="submit" name="approve" value="Issue Book"><br></center>
                    
                </form>

            </div>
        </div>

    <?php
    
    ?>
    
    <?php
        if(isset($_POST['approve']))
        {
            mysqli_query($db,"UPDATE  book_issue SET  status =  '$_POST[status]', `issuedate` =  '$_POST[issuedate]', `returndate` =  '$_POST[returndate]' WHERE username='$_GET[uname]' and bid='$_GET[bid]';");
        
            if($_row['status']=='Approved')
            {
                mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_GET[bid]' ;");
            }
                $res=mysqli_query($db,"SELECT quantity from books where bid='$_GET[bid];");

                    while($row=mysqli_fetch_assoc($res))
                    {
                        if($row['quantity']==0)
                        {
                            mysqli_query($db,"UPDATE books SET `status`= 'Not Available' where bid='$_GET[bid]';");
                        }
                    }
    ?>
            <script type="text/javascript">
                alert("Request Updated Successfully.");
                window.location="request.php"
            </script>
    <?php
        }
    ?>
    
    
    
    </body>
    </html>