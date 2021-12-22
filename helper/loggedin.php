<?php
    if(!$_SESSION['LoggedIn']) 
    {
        header("location: ../pages/index.php");
    }