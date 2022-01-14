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
            mysqli_stmt_close($statement);
        }
        mysqli_close($conn);
    }

    if (isset($_POST['submit']))
    {
        $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
        $fName = ctype_alpha($_POST['fName']) ? $_POST['fName'] : 0;
        $lName = ctype_alpha($_POST['lName']) ? $_POST['lName'] : 0;
        $department = ctype_alpha($_POST['department']) ? $_POST['department'] : 0;
        $location = ctype_alpha($_POST['location']) ? $_POST['location'] : 0;
        $role = ctype_alpha($_POST['role']) ? $_POST['role'] : 0;

        if (empty($email) || empty($fName) || empty($lName) || empty($department) || empty($location) || empty($role))
        {
            header("location: ../pages/users.php?error=emptyField");
            exit();
        }

        if ($email == "invalid")
        {
            header("location:  ../pages/users.php?error=invalidEmail");
            exit();
        }

        insertUser($conn, $email, $fName, $lName, $department, $location, $role);
    }