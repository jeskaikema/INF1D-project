<?php
    function closeTicket($conn, $id) 
    {
        $query = "UPDATE `ticket` SET `Status` = 'gesloten' WHERE `ID` = ?";      

        if ($statement = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($statement, 'i', $id);
        }

        if (!mysqli_stmt_execute($statement)) {
            DIE("EXECUTE ERROR");
        }
        header("location: ../pages/ticketoverzicht.php");
    }

    if (isset($_POST['submit']))
    {
        include_once "../config/config.php";
        $id = $_GET['id'];
        closeTicket($conn, $id);
    }
