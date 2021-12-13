<?php
function getCountStatus() {
    include "../config/config.php";
    $query = "SELECT Status, COUNT(*) FROM Ticket GROUP BY Status";
    if ($statement = mysqli_prepare($conn, $query)) {
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $result);
            if (mysqli_stmt_fetch($statement)) {
                return $result;    
            }
        } else {
            DIE("EXECUTE ERROR");
        }
    }else {
        DIE(mysqli_error($conn));
    }
}