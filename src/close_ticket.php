<?php
    function closeTicket($conn, $id) 
    {
        $query = "UPDATE `ticket` 
                  SET `Status` = 'closed' 
                  WHERE `ID` = ?";   
        // $closeticket = true;   

        if ($statement = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($statement, 'i', $ID);
        }

        if (!mysqli_stmt_execute($statement)) {
            DIE("EXECUTE ERROR");
        }
    }