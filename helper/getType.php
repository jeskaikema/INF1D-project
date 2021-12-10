<?php
function getType($ID)
{
    include_once "../config/config.php";
    $query = "SELECT `Room_ID`, `Order_ID` FROM `ticket` WHERE `ID` = ?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'i', $ID);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $room, $order);
            if (mysqli_stmt_fetch($statement)) {
                if ($room === NULL && $order !== NULL) {
//                    reservering
                    return 1;
                } elseif ($room !== NULL && $order === NULL) {
//                    bestelling
                    return 2;
                } else {
//                    melding
                    return 3;
                }
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}

?>