<?php
function createResponse($conn, $email, $ticketID, $message) {

    $query = "INSERT INTO `ticket_response` (User_Email, Ticket_ID, `Message`) VALUES (?, ?, ?)";
    if ($statement = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($statement, 'sis', $email, $ticketID, $message);
        if (!mysqli_stmt_execute($statement)) {
            DIE("EXECUTE ERROR");
        }
        mysqli_stmt_close($statement);
    }
}

?>
