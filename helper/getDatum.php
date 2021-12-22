<?php
function getDatum($conn, $ID)
{
    $query = "SELECT `Ticket_Date` FROM `ticket` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $datum);
            if (mysqli_stmt_fetch($statement))
            {
                return $datum;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>