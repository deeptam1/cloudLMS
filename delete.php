<?php
    include "connect.php";

    $sql= "DELETE from student WHERE username='$_GET[uname]'";
?>