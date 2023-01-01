<?php
    $dbSurver = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "myportfolio";

    $conn = new mysqli ($dbSurver, $dbUser, $dbPass, $dbName);

    if ($conn->connect->error)(
        die("coonnection faild".$conn->connect->eerror);
    )
    
?>