<?php
function getBeginTime($conn, $ID)
{
    $query = "SELECT `Begin_Time` FROM `room` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $beginTijd);
            if (mysqli_stmt_fetch($statement))
            {
                return $beginTijd;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>