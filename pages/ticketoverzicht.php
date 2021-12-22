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
//include_once "../helper/getPriority.php";
//include_once "../helper/getType.php";
//include_once "../helper/getStatus.php";
include_once "../helper/userInfo.php";
include_once "../config/config.php";
include_once "../helper/getTicketInfo.php";
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
        <div class="ticket Priority<?php echo getPriority($conn, $ID) ?>">
            <div class="tickettype">
                <?php
                if (getTypeOfTicket($conn, $ID) === 1) {
                    echo "Reservering";
                } elseif (getTypeOfTicket($conn, $ID) === 2) {
                    echo "Bestelling";
                } elseif (getTypeOfTicket($conn, $ID) === 3) {
                    echo "Melding";
                }
                ?>
            </div>
            <div class="TicketUpper">test</div>
            <div class="TicketBottom">
                <?php
                if (getTypeOfTicket($conn, $ID) === 1) {
                    echo "Vestiging: ".getVestiging($conn, $ID)
                        ."<br>Datum: ".getDatum($conn, $ID)
                        ."<br>Tijd: ".getBeginTijd($conn, $ID)." - ".getEindTijd($conn, $ID)
                        ."<br>Kamernummer: ".getRoom($conn, $ID);
                } elseif (getTypeOfTicket($conn, $ID) === 2) {
                    echo "Vestiging: ".getVestiging($conn, $ID)
                        ."<br>Prijs: ".getPrijs($conn, $ID)
                        ."<br>Korte omschrijving: ".getKorteOmschrijving($conn, $ID);
                } elseif (getTypeOfTicket($conn, $ID) === 3) {
                    echo "Korte omschrijving: ".getKorteOmschrijving($conn, $ID);
                }
                ?>
            </div>
            <div class="StatusPriority">
                <span>
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
                            if (getPriority($conn, $ID) === 1) {
                                echo "Hoog";
                            } elseif (getPriority($conn, $ID) === 2) {
                                echo "Midden";
                            } elseif (getPriority($conn, $ID) === 3) {
                                echo "Laag";
                            }
                            ?>
                            <br>
                            <?php echo getStatus($conn, $ID) ?> ?>
                        </p>
                    </div>
                </span>
            </div>
        </div>
    </div>
</div>
</body>
</html>