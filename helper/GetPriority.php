<?php
function getPriority($ID)
{
    include "../config/config.php";
    $query = "SELECT `Priority` FROM `ticket` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $priority);
            if (mysqli_stmt_fetch($statement)) {
                return $priority;
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}

?>