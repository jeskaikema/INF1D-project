<?php
    if(empty($_SESSION['LoggedIn'])) 
    {
        header("location: ../pages/index.php");
    }