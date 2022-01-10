<?php
include "../helper/session.php"
?>
<div class="overlay"></div>
<div class="Sidebar-mobile">      
    <img src="../img/logo-nhl-stenden-2018 wit2.png" alt= witLogo width="133px" height="128px" style="margin-left:25px;margin-top:15px">
    <div class="S-1">

    <?php
    if($_SESSION['role'] === "helpdesk" || $_SESSION['role'] === "management"){
        echo '<div class="S-Item">
            <img src="../img/dashboard.png" alt=Dashboard width="24.8px" height="25.6px" style="margin:auto; margin-left: 8px; margin-right: 20px;">
            <a href="../pages/userOverView.php"><h4>Dashboard</h4></a>
        </div>';
    }
    ?>
        <div class="S-Item">
            <img src="../img/mijn tickets.png" alt=Mijn tickets width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;"> 
            <a href="../pages/ticketoverzicht.php"><h4>Mijn Tickets</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/maak melding.png" alt=Maak melding width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;">
            <a href="../pages/create_ticket.php"><h4>Maak melding</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/reserveren.png" alt=Reserveren width="32px" height="29px" style="margin:auto; margin-left: 8px; margin-right: 14px;">
            <a href="../pages/reserveForm.php"><h4>Reserveren</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/privacy.png" alt=Privacy width="15px" height="26px" style="margin:auto; margin-left: 12px; margin-right: 26px;">
            <a href="#"><h4>Data privacy</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/bestelling.png" alt=bestelling width="25px" height="27px" style="margin:auto; margin-left: 8px; margin-right: 22px;">
            <a href="../pages/orderForm.php"><h4>Bestellingen</h4></a>   
        </div>
    </div>
    

    <div class="S-2">
        <div class="S-Item">
            <a href="#"><h4>Over ons</h4></a>
        </div>
        <div class="S-Item">
            <a href="../pages/faq.php"><h4>Need help?</h4></a>
        </div>
    </div>

    <div class="S-3">
        <div class="S-Item">
            <a href="../src/logout.php"><h5>Uitloggen</h5></a>
        </div>   
    </div>   
</div>

<div class="Sidebar-desktop">      
    <img src="../img/logo-nhl-stenden-2018 wit2.png" alt= witLogo width="133px" height="128px" style="margin-left:25px;margin-top:15px">
    <div class="S-1">

    <?php
    if($_SESSION['role'] === "helpdesk" || $_SESSION['role'] === "management"){
        echo '<div class="S-Item">
            <img src="../img/dashboard.png" alt=Dashboard width="24.8px" height="25.6px" style="margin:auto; margin-left: 8px; margin-right: 20px;">
            <a href="../pages/userOverView.php"><h4>Dashboard</h4></a>
        </div>';
    }
    ?>
        <div class="S-Item">
            <img src="../img/mijn tickets.png" alt=Mijn tickets width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;"> 
            <a href="../pages/ticketoverzicht.php"><h4>Mijn Tickets</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/maak melding.png" alt=Maak melding width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;">
            <a href="../pages/create_ticket.php"><h4>Maak melding</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/reserveren.png" alt=Reserveren width="32px" height="29px" style="margin:auto; margin-left: 8px; margin-right: 14px;">
            <a href="../pages/reserveForm.php"><h4>Reserveren</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/privacy.png" alt=Privacy width="15px" height="26px" style="margin:auto; margin-left: 12px; margin-right: 26px;">
            <a href="#"><h4>Data privacy</h4></a>
        </div>
        <div class="S-Item">
            <img src="../img/bestelling.png" alt=bestelling width="25px" height="27px" style="margin:auto; margin-left: 8px; margin-right: 22px;">
            <a href="../pages/orderForm.php"><h4>Bestellingen</h4></a>   
        </div>
    </div>
    

    <div class="S-2">
        <div class="S-Item">
            <a href="#"><h4>Over ons</h4></a>
        </div>
        <div class="S-Item">
            <a href="../pages/faq.php"><h4>Need help?</h4></a>
        </div>
    </div>

    <div class="S-3">
        <div class="S-Item">
            <a href="../src/logout.php"><h5>Uitloggen</h5></a>
        </div>   
    </div>   
</div>