<?php
    include_once "../config/config.php";
    include_once "../helper/NameRole.php";
    if (isset($_POST['submit'])) 
    {
        $email = isset($_POST['email']) ? $_POST['email'] : NULL;
        if (empty($email)) 
        {
            echo "vul alle vakken in";
            return 1;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            echo "Vul een email adres in";
            return 1;
        }
        $name = getName($email);
        $query = "SELECT `email` FROM users WHERE `email` = ?";
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
                DIE("USER DOES NOT EXIST");
            }
            include "../helper/session.php";
            $_SESSION['LoggedIn'] = true;
            $_SESSION['name'] = ucfirst($name);
            $_SESSION['email'] = $email;
            header("location: ../test.php");
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