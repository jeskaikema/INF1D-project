<?php
    include_once "../config/config.php";
    include_once "../helper/userInfo.php";
    if (isset($_POST['submit'])) 
    {
        if (empty($_POST['email'])) 
        {
            header("location: ../pages/index.php?error=emptyError");
            exit();
        }
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$email) 
        {
            header("location: ../pages/index.php?error=invalidEmail");
            exit();
        }
        $name = getName($email);
        $query = "SELECT `Email` FROM user WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query)) 
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (!mysqli_stmt_execute($statement))
            {
                DIE("EXECUTE ERROR");
            }
            mysqli_stmt_store_result($statement);
            if (mysqli_stmt_num_rows($statement) == 0) 
            {
                header("location: ../pages/index.php?error=nonexistantUser");
                exit();
            }
            include "../helper/session.php";
            $_SESSION['LoggedIn'] = true;
            $_SESSION['name'] = ucfirst($name);
            $_SESSION['email'] = $email;
            $_SESSION['role'] = getUserInfo($conn, $email, "Role");
            $_SESSION['location'] = lcfirst(getUserInfo($conn, $email, "Location"));
            $_SESSION['department'] = getUserInfo($conn, $email, "Department");
            header("location: ../pages/ticketoverzicht.php");
        }
        else
        {
            DIE("PREPARE ERROR");
        }
    }
    else 
    {
        header("location: ../index.php");
    }