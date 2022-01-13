<?php
    include_once "../config/config.php";
    if (isset($_POST['submit']))
    {
        $id = $_GET['id'];
        $prio = $_POST['prio'];
        if ($prio == "hoog") {
            $prioNum = 1;
        } 
        else if ($prio == "middel") 
        {
            $prioNum = 2;
        }
        else if ($prio == "laag")
        {
            $prioNum = 3;
        }
        else 
        {
            header("location: ../pages/ticket.php?id=$id&error=invalidPrio");
        }

        $query = "UPDATE `ticket` SET `Priority` = ? WHERE `ID` = ?";

        if ($statement = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($statement, 'si', $prioNum, $id);
        }

        if (!mysqli_stmt_execute($statement)) {
            DIE("EXECUTE ERROR");
        }
        header("location: ../pages/ticket.php?id=$id");
    }