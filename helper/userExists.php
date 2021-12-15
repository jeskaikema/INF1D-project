<?php
    function userExists($conn, $email) {
        $query = "SELECT `Email` FROM `user` WHERE `Email` = ?";
        if ($statement = mysqli_prepare($conn, $query))
        {
            mysqli_stmt_bind_param($statement, 's', $email);
            if (!mysqli_stmt_execute($statement))
            {
                DIE("EXECUTE ERROR " . mysqli_stmt_error($statement));
            }
            mysqli_stmt_store_result($statement);
            if (mysqli_stmt_num_rows($statement) > 0)
            {
                return true;
            }
            return false;
        }
    }