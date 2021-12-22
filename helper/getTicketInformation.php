<?php
function getTicketInformation($conn, $ID) {
    $query = "SELECT * FROM `ticket` WHERE ID=?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'i', $ID);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement,
                $id,
                $email,
                $roomId,
                $orderId,
                $phone,
                $desc,
                $file,
                $status,
                $prio,
                $location,
                $date);
            if (mysqli_stmt_fetch($statement)) {
                return array(
                    "email" => $email,
                    "roomId" => $roomId,
                    "orderId" => $orderId,
                    "phone" => $phone,
                    "desc" => $desc,
                    "file" => $file,
                    "status" => $status,
                    "prio" => $prio,
                    "location" => $location,
                    "date" => $date
                    );
            }
        } else {
            die("EXECUTE ERROR");
        }
    } else {
        die(mysqli_error($conn));
    }
}

function getRoomNumber($conn, $ID){

}

function getOrderPrice($conn, $ID){
    
}
