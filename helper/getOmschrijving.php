<?php
function getOmschrijving($conn, $ID)
{
    $query = "SELECT `Description` FROM `ticket` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $omschrijving);
            if (mysqli_stmt_fetch($statement))
            {
                return $omschrijving;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>