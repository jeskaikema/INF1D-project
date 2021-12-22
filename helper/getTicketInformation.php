<?php
function getTicketInformation($conn, $ID)
{
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
                mysqli_stmt_close($statement);
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
    mysqli_stmt_close($statement);
}

function getRoomNumber($conn, $ID)
{
    if (is_null($ID)) {
        return null;
    }
    $query = "SELECT `Room_Number` FROM `room` WHERE ID=?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'i', $ID);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $roomNumber);
            if (mysqli_stmt_fetch($statement)) {
                mysqli_stmt_close($statement);
                return $roomNumber;
            }
        }
    }
    mysqli_stmt_close($statement);
}

function getOrderPrice($conn, $ID)
{
    if (is_null($ID)) {
        return null;
    }
    $query = "SELECT `Price` FROM `order` WHERE ID=?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'i', $ID);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $price);
            if (mysqli_stmt_fetch($statement)) {
                mysqli_stmt_close($statement);
                return $price;
            }
        }
    }
    mysqli_stmt_close($statement);

}

function getResponses($conn, $ticketId) {
    $query = "SELECT User_Email, Message FROM `ticket_response` WHERE Ticket_ID=?";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'i', $ticketId);
        if (mysqli_stmt_execute($statement)) {
            mysqli_stmt_bind_result($statement, $email, $message);

            $result = array();
            $row = 0;
            while (mysqli_stmt_fetch($statement)) {
                $result[$row] = array(
                    "email" => $email,
                    "message" => $message
                );
                $row++;
            }
            mysqli_stmt_close($statement);
            return $result;
        }
    }
    mysqli_stmt_close($statement);
}
