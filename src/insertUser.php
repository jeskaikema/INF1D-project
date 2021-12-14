<?php
    include_once "../config/config.php";
    include_once "../helper/userExists.php";

    function insertUser($conn, $email, $fName, $lName, $department, $location, $role) {
        if (userExists($conn, $email))
        {
            header("location: ../users.php?error=userExists");
            exit();
        }
        $query = "INSERT INTO `user` VALUES (?, ?, ?, ?, ?, ?)";
        if ($statement = mysqli_prepare($conn, $query)) 
        {
            mysqli_stmt_bind_param($statement, 'ssssss', $email, $department, $location, $role, $fName, $lName);
            if (!mysqli_stmt_execute($statement)) 
            {
                DIE("EXECUTE ERROR");
            }
        }
    }

    if (isset($_POST['submit']))
    {
        $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
        $fName = ctype_alpha($_POST['fName']);
        $lName = ctype_alpha($_POST['lName']);
        $department = ctype_alpha($_POST['department']);
        $location = ctype_alpha($_POST['location']);
        $role = ctype_alpha($_POST['role']);

        if (empty($email) || empty($fName) || empty($lName) || empty($department) || empty($location) || empty($role))
        {
            header("location: ../users.php?error=emptyField");
            exit();
        }

        if ($email == "invalid")
        {
            header("location:  ../users.php?error=invalidEmail");
            exit();
        }

        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        if (!strpos($email, lcfirst($fName)) || !strpos($email, lcfirst($lName))) 
        {
            header("location: ../users.php?error=matchError");
            exit();
        }

        insertUser($conn, $email, $fName, $lName, $department, $location, $role);
    }