<?php
    function closeTicket($conn, $id) 
    {
    $query = "UPPDATE `Status` FROM `ticket` WHERE `ID` = ?";
        if isset($_POST(["submit"])) {     
        $closeticket = true;
        }   
                
        $status = gesloten;

        if ($statement = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($statement, 's', $ID);
            if (mysqli_stmt_execute($statement)) {
                mysqli_stmt_bind_result($statement, $status);
                if (mysqli_stmt_fetch($statement)) {
                    return $status;
                }
            } else {
                die("EXECUTE ERROR");
            }
        } else {
            die(mysqli_error($conn));
        }
    }
