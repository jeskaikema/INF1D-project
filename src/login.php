<?php
    include_once "../config/config.php";
    include_once "../helper/loggedin.php";
    $email = isset($_POST['email']) ? $_POST['email'] : NULL;
    if (empty($email)) 
    {
        echo "vul alle vakken in";
        return 1;
    }
    $name = explode('@', $email);
    $fName = explode('.', $name[0]);
    $query = "SELECT `email` FROM users WHERE `email` = ?";
    if ($statement = mysqli_prepare($conn, $query)) {
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
        $_SESSION['name'] = ucfirst($fName[0]);
        echo "Welkom, " . $_SESSION['name'] . ".";
    }
    else 
    {
        DIE("PREPARE ERROR");
    }