<!--330 bij 330-->
<!--rood = #E62328-->
<!--aqua = #009baa-->
<!--blauw = #005aaa-->
<!---->
<!--borderwidth 3-->
<!--50-->
<!--51-->
<!--3-->
<!--170-->
<!--50-->

<?php
include_once "../helper/session.php";
include_once "../helper/loggedin.php";
include_once "../helper/getPriority.php";
include_once "../helper/getType.php";
include_once "../helper/getStatus.php";
include_once "../helper/userInfo.php";
include_once "../config/config.php";
include_once "../helper/getTicketInfo.php";
include_once "../helper/getBeginTime.php";
include_once "../helper/getEndTime.php";
include_once "../helper/getRoomDate.php";
include_once "../helper/getRoomNumber.php";
include_once "../helper/getPrice.php";
include_once "../helper/getOmschrijving.php";

$query = "SELECT `ID`, `User_Email`, `Room_ID`, `Order_ID`, `Description`, `Location` FROM `ticket`";
if ($statement = mysqli_prepare($conn, $query)) {
    if (mysqli_stmt_execute($statement)) {
        mysqli_stmt_bind_result($statement, $ID, $email, $roomId, $orderId, $description, $location);
        mysqli_stmt_store_result($statement);
    } else {
        die("EXECUTE ERROR");
    }
} else {
    die(mysqli_error($conn));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../templates/head.php"; ?>
</head>
<body>
    <div class="container">
        <?php include "../templates/sidebar.php"; ?>
        <div class="sub-container">
            <?php include "../templates/header.php"; ?>
            <div class="box">
                <?php if (mysqli_stmt_num_rows($statement) > 0): ?>
                    <?php while(mysqli_stmt_fetch($statement)): ?>
                        <a href="ticket.php?id=<?php echo $ID ?>" class="ticket-link">
                            <div class="container-overview">
                                <div class="ticket Priority<?php echo getPriority($conn, $ID) ?> <?php echo (getPrice($conn, $orderId) >= 1500) ? 'price' : ''?>">
                                    <div class="tickettype">
                                        <?php
                                        if (getTypeOfTicket($conn, $ID) === 1) {
                                            echo "Bestelling";
                                        } elseif (getTypeOfTicket($conn, $ID) === 2) {
                                            echo "Reservering";
                                        } elseif (getTypeOfTicket($conn, $ID) === 3) {
                                            echo "Melding";
                                        }
                                        ?>
                                    </div>
                                    <div class="TicketUpper">test</div>
                                    <div class="TicketBottom">
                                        <?php
                                        if (getTypeOfTicket($conn, $ID) === 2) {
                                            echo "Vestiging: ".$location
                                                ."<br>Datum: ".getRoomDate($conn, $roomId)
                                                ."<br>Tijd: ".getBeginTime($conn, $roomId)." - ".getEndTime($conn, $roomId)
                                                ."<br>Kamernummer: ".getRoomNumber($conn, $roomId);
                                        } elseif (getTypeOfTicket($conn, $ID) === 1) {
                                            echo "<p>Vestiging: " . $location . "</p>";
                                            echo "<p class=" . "'" . ((getPrice($conn, $orderId) >= 1500) ? 'price-text' : '') . "'" . ">Prijs: &euro; ". getPrice($conn, $orderId) . "</p>";
                                            echo "<p>Korte omschrijving: " . $description . "</p>";
                                        } elseif (getTypeOfTicket($conn, $ID) === 3) {
                                            echo "Korte omschrijving: ".$description;
                                        }
                                        ?>
                                    </div>
                                    <div class="StatusPriority">
                                        <div class="test">
                                            <p class="priosta">
                                                Prioriteit:
                                                <br>
                                                Status:
                                            </p>
                                        </div>
                                        <div>
                                            <p>
                                                <?php
                                                if (getPriority($conn, $ID) === 1) {
                                                    echo "Hoog";
                                                } elseif (getPriority($conn, $ID) === 2) {
                                                    echo "Midden";
                                                } elseif (getPriority($conn, $ID) === 3) {
                                                    echo "Laag";
                                                }
                                                ?>
                                                <br>
                                                <?php echo getStatus($conn, $ID) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                <?php else: ?>
                    <?php echo "geen zooi"; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>