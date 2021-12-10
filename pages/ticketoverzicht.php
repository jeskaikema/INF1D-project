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
include_once "../helper/nameRole.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Ticketoverzicht</title>
</head>
<body>
<div class="box">
    <div class="container">
        <div class="ticket Priority<?= getPriority($ID) ?>">
            <div class="tickettype">
                <?php
                if (getType($ID) === 1) {
                    echo "Reservering";
                } elseif (getType($ID) === 2) {
                    echo "Bestelling";
                } elseif (getType($ID) === 3) {
                    echo "Melding";
                }
                ?>
            </div>
            <div class="TicketUpper">test</div>
            <div class="TicketBottom">test</div>
            <div class="StatusPriority">
                <div>
                    <p>
                        Prioriteit:
                        <br>
                        Status:
                    </p>
                </div>
                <div>
                    <p>
                        <?php
                        if (getPriority($ID) === 1) {
                            echo "Hoog";
                        } elseif (getPriority($ID) === 2) {
                            echo "Midden";
                        } elseif (getPriority($ID) === 3) {
                            echo "Laag";
                        }
                        ?>
                        <br>
                        <?= getStatus($ID) ?> ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>