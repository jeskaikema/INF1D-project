<?php
    function getName($email) 
    {
        $split = explode('@', $email);
        $name = explode('.', $split[0]);
        return $name[0];
    }

    function getUserInfo($conn, $email, $info) 
    {
        $query = "SELECT " . $info . " FROM `user` WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query)) 
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (mysqli_stmt_execute($statement))
            {
                mysqli_stmt_bind_result($statement, $info);
                if (mysqli_stmt_fetch($statement)) 
                {
                    return $info;    
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