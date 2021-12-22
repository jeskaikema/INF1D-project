<?php
function getRoomNumber($conn, $ID)
{
    $query = "SELECT `Room_Number` FROM `room` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $kamernummer);
            if (mysqli_stmt_fetch($statement))
            {
                return $kamernummer;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>