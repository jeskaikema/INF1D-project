<?php
function getTicketInfo($conn)
{
    $query = "SELECT `ID`, `User_Email`, `Description`, `Location` FROM `ticket`";
    if ($statement = mysqli_prepare($conn, $query)) {
        if (mysqli_stmt_execute($statement)) {
            return $statement;
            mysqli_stmt_bind_result($statement, $ID, $location, $email, $omschrijving);
            if (mysqli_stmt_fetch($statement)) {
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