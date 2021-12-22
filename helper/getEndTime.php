<?php
function getEndTime($conn, $ID)
{
    $query = "SELECT `End_Time` FROM `room` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $eindTijd);
            if (mysqli_stmt_fetch($statement))
            {
                return $eindTijd;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>