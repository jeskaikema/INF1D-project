<?php
    $dbConn = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "bottomdesk";
    $conn = mysqli_connect($dbConn, $dbUser, $dbPassword, $dbName);
    if(!$conn)
    {
        DIE("Could not connect: " . mysqli_connect_error());
    }
