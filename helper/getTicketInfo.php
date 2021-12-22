<?php
function getTicketInfo($conn, $ID)
{
    $query = "SELECT `Location`, `User_Email`, `Description` FROM `ticket` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query)){
        mysqli_stmt_bind_param($statement, 's', $ID);
        if (mysqli_stmt_execute($statement)){
            mysqli_stmt_bind_result($statement, $location, $email, $omschrijving);
            if (mysqli_stmt_fetch($statement)){
                return $location;
                return $email;
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