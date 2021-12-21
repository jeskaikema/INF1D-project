<?php
    function closeTicket($conn, $id) 
    {
        $query = "UPDATE `ticket` 
                  SET `Status` = 'gesloten' 
                  WHERE `ID` = ?";   
        // $closeticket = true;   

        if ($statement = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($statement, 'i', $id);
        }

        if (!mysqli_stmt_execute($statement)) {
            DIE("EXECUTE ERROR");
        }
    }