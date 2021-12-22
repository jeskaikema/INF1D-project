<?php
include "../helper/session.php";
include "../helper/loggedin.php";
include "../config/config.php";
include "../helper/getTicketInformation.php";
$dbConn = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "bottomdesk";


$ticket = getTicketInformation($conn, $_GET['id']);
echo $_SESSION['email'];

if(!($_SESSION['role'] === "manager" || $_SESSION['role'] === "helpdesk" || $_SESSION['email'] === $ticket['email'])){
    header("Location: ticketoverzicht.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gebruikers</title>
    <?php include "../templates/head.php"; ?>
</head>

<body>
<div id="container">
    <?php include "../templates/sidebar.php"; ?>
    <div id="sub-container">
        <?php
        include "../templates/header.php";
        include "../helper/session.php";
        ?>

        <div id="ticketContainer">
            <div id="ticketEmailContainer">
                <h3><?=$ticket['email']?></h3>
            </div>

            <div id="ticketContentContainer">
                <div class="ticketItem">
                    <?php
                    if($ticket['roomId'] != null){
                        echo $ticket['roomId'];
                    }

                    if($ticket['orderId'] != null){
                        echo $ticket['roomId'];
                    }
                    ?>
                </div>

                <div class="ticketItem">
                    <?=$ticket['phone']?>
                </div>

                <div class="ticketItem">
                    <?=$ticket['status']?>
                </div>

                <div class="ticketItem">
                    <?=$ticket['prio']?>
                </div>

                <div class="ticketItem">
                    <?=$ticket['location']?>
                </div>

                <div class="ticketItem">
                    <?=$ticket['date']?>
                </div>

                <div id="ticketFile">
                    <?=$ticket['file']?>
                </div>

                <div id="ticketDescr">
                    <?=$ticket['desc']?>
                </div>
            </div>
        </div>

        <div id="responseContainer">
            <form method="post" action="" id="responseForm">

            </form>
            <textarea name="response" form="responseForm">yo</textarea>
            <input type="submit" name="submit" value="Submit" id="submit" form="responseForm">
        </div>
    </div>
</div>
</body>

</html>
