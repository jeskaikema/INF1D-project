<?php
include "../helper/session.php";
include "../helper/loggedin.php";
include "../config/config.php";
include "../helper/getTicketInformation.php";
include "../helper/getErrorMessages.php";

$ticket = getTicketInformation($conn, $_GET['id'], $_SESSION['email'], $_SESSION['role']);
$ticketID = $_GET['id'];

if (!rightToViewTicket($conn, $ticket)){
    header("Location: ticketoverzicht.php");
}

if(isset($_POST['submit'])){
    $email = $_SESSION['email'];
    $message = $_POST['responseArea'];

    if(empty($message)){
        // $errorMessage = "Reactie mag niet leeg zijn!";
        header("location: ticket.php?id=" . $ticketID . "&error=reactionError");
    }else {
        include_once "../src/createResponse.php";
        createResponse($conn, $email, $ticketID, $message);
    }
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
        <?php
        include "../templates/header.php";
        include "../helper/session.php";
        ?>

        <div id="ticketContainer">
            <div id="ticketEmailContainer">
                <h3><?php echo $ticket['email']; ?></h3>
            </div>

            <div id="ticketContentContainer">
                <?php
                if ($ticket['roomId'] != null) {
                    echo "<div class='ticketItem'>";
                    echo "<p>Werkruimte:</p>";
                    echo "<p>" . getRoomNumber($conn, $ticket['roomId']) . "</p>";
                    echo "</div>";
                }

                if ($ticket['orderId'] != null) {
                    echo "<div class='ticketItem'>";
                    echo "<p>Prijs:</p>";
                    echo "<p>" . getOrderPrice($conn, $ticket['orderId']) . "</p>";
                    echo "</div>";
                }
                ?>

                <div class="ticketItem">
                    <?php echo "<p>Telefoonnummer:</p>"; ?>
                    <?php echo "<p>" . $ticket['phone'] . "</p>"; ?>
                </div>

                <div class="ticketItem">
                    <?php echo "<p>Status:</p>"; ?>
                    <?php echo "<p>" . $ticket['status'] . "</p>"; ?>
                </div>

                <div class="ticketItem">
                    <?php echo "<p>Prioriteit:</p>"; ?>
                    <?php echo "<p>" . ($ticket['prio'] == 1 ? "Hoog" : ($ticket['prio'] == 2 ? "Middel" : "Laag")) . "</p>"; ?>
                </div>

                <div class="ticketItem">
                    <?php echo "<p>Locatie:</p>"; ?>
                    <?php echo "<p>" . $ticket['location'] . "</p>"; ?>
                </div>

                <div class="ticketItem">
                    <?php echo "<p>Aangemaakt op:</p>"; ?>
                    <?php echo "<p>" . $ticket['date'] . "</p>"; ?>
                </div>

                <?php
                if ($ticket['file'] != null) {
                    echo '<div id="ticketFile">';
                    echo "<p>File:</p>";
                    echo "<p>" . $ticket['file'] . "</p>";
                    echo "</div>";
                }
                ?>

                <div id="ticketDescrLabel">
                    <?php echo "<p>Beschrijving:</p>"; ?>
                </div>

                <div id="ticketDescr">
                    <?php echo "<p>" . $ticket['desc'] . "</p>"; ?>
                </div>
            </div>
            <?php if ($_SESSION['role'] === 'Helpdeskmedewerker'){ ?>
            <div class="prioForm"">
                <form action="../helper/setPrio.php?id=<?php echo $ticketID; ?>" method="POST">
                    <label for="prio">Wijzig de prioriteit van de ticket</label>
                    <?php if ((isset($_GET['error']) && ($_GET['error'] == "invalidPrio"))): ?>
                        <div class="error">
                            <?php echo getErrorMessages($_GET['error']); ?>
                        </div>
                    <?php endif; ?>
                    <select name="prio" id="prio">
                        <option value="hoog" <?php echo ($ticket['prio'] == 1) ? "selected" : ""; ?>>Hoog</option>
                        <option value="middel" <?php echo ($ticket['prio'] == 2) ? "selected" : ""; ?>>Middel</option>
                        <option value="laag" <?php echo ($ticket['prio'] == 3) ? "selected" : ""; ?>>Laag</option>
                    </select>
                    <input type="submit" name="submit" value="Wijzig">
                </form>
            </div>
            <div class="closeTicket">
                <form action="../src/close_ticket.php?id=<?php echo $ticketID; ?>" method="POST">
                    <input type="submit" name="submit" value="Sluit Ticket">
                </form>
            </div>
    <?php
    }
    ?>
        </div>
        <div id="responseContainer">
            <h2>Reageer:</h2>
            <form method="post" action="" id="responseForm">

            </form>
            <textarea id="responseArea" name="responseArea" form="responseForm"></textarea>
            <input type="submit" name="submit" value="Submit" id="submit" form="responseForm">
        </div>
        <?php if ((isset($_GET['error']) && ($_GET['error'] == "reactionError"))): ?>
            <div class="error">
                <?php echo getErrorMessages($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <?php
        $responses = getResponses($conn, $_GET['id']);

        echo"<div id='responsesWrapper'>";
        echo"<h2>Reacties:</h2>";
        foreach($responses as $response){
            echo"<div class='existingResponseContainer'>";
            echo"<div class='responseEmail'>";
            echo"<h3>" . $response['email'] . "</h3>";
            echo"</div>";
            echo"<div class='responseMessage'>";
            echo"<p>" . $response['message'] . "</p>";
            echo"</div>";
            echo"</div>";
        }

        echo"</div>";
        ?>

    </div>
</div>
</body>

</html>
