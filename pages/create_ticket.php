<?php
include_once("../helper/session.php");
include_once "../helper/getErrorMessages.php";
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
        <div class="users-title">
            <h1>Bestelling Plaatsen</h1>
        </div>
        <form action="../src/create_ticket.php" method="POST" enctype="multipart/form-data" class="form flex">
            <div class="label-input flex">
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="label-input flex">
                <label for="phonenumber">Telefoonnummer:</label>
                <input type="tel" name="phonenumber" id="phonenumber">
            </div>
            <div class="label-input flex">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="label-input flex">
                <label for="department">Afdeling</label>
                <input type="text" name="department" id="department">
            </div>
            <div class="label-input flex">
                <label for="branch">Vestiging</label>
                <select name="branch" id="branch">
                    <option value="blank" selected></option>
                    <option value="leeuwarden">Leeuwarden</option>
                    <option value="emmen">Emmen</option>
                    <option value="groningen">Groningen</option>
                    <option value="meppel">Meppel</option>
                    <option value="zwolle">Zwolle</option>
                    <option value="terschelling">Terschelling</option>
                    <option value="assen">Assen</option>
                    <option value="amsterdam">Amsterdam</option>
                </select>
            </div>
            <div class="label-input flex">
                <label for="roomnumber">Kamernummer</label>
                <input type="text" name="roomnumber" id="roomnumber">
            </div>
            <div class="label-input flex">
                <label for="report">Melding</label>
                <input type="text" name="report" id="report">
            </div>
            <div class="label-input flex">
                <label for="file">Bijlage</label>
                <input type="file" name="file" id="file" multiple>
            </div>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>