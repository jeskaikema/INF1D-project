<?php
    if(!$_SESSION['LoggedIn']) 
    {
        header("location: ../index.php");
    }