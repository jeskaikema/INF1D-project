<?php
    function getName($email) 
    {
        $split = explode('@', $email);
        $name = explode('.', $split[0]);
        return $name[0];
    }

    function getRole($email) 
    {
        include "../config/config.php";
        $query = "SELECT `Role` FROM `users` WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query)) 
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (mysqli_stmt_execute($statement))
            {
                mysqli_stmt_bind_result($statement, $role);
                if (mysqli_stmt_fetch($statement)) 
                {
                    return $role;    
                }
            }
            else 
            {
                DIE("EXECUTE ERROR");
            }
        }
        else
        {
            DIE(mysqli_error($conn));
        }
    }