<?php
function getPrice($conn, $ID)
{
    $query = "SELECT `Price` FROM `order` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement))
        {
            mysqli_stmt_bind_result($statement, $prijs);
            if (mysqli_stmt_fetch($statement))
            {
                return $prijs;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}
?>