<?php
include_once "../helper/session.php";
include_once "../helper/getErrorMessages.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<div class="users-title">
    <h1>Bestelling Plaatsen</h1>
</div>
<form action="src/order.php" method="POST" enctype="multipart/form-data" class="form flex">
    <div class="label-input flex">
        <label for="email">Email: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "invalidEmail" || $_GET['error'] == "matchError"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="email" id="email">
        </div>
    </div>
    <div class="label-input flex">
        <label for="fName">Telefoonnummer: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "invalidPhoneNumber"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <input type="text" name="phonenumber" id="phonenumber">
        </div>
    </div>
    <div class="label-input flex">
        <label for="lName">Beschrijving: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <textarea name="description" id="description" cols="55" rows="10"></textarea>
        </div>
    </div>
    <div class="label-input flex">
        <label for="location">Locatie: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
            <select name="location" id="location">
                <option value="Emmen" <?php echo ($_SESSION['location'] ==  'emmen') ? "selected" : ""; ?>>Emmen</option>
                <option value="Leeuwarden" <?php echo ($_SESSION['location'] ==  'leeuwarden') ? "selected" : ""; ?>>Leeuwarden</option>
                <option value="Groningen" <?php echo ($_SESSION['location'] ==  'groningen') ? "selected" : ""; ?>>Groningen</option>
                <option value="Meppel" <?php echo ($_SESSION['location'] ==  'meppel') ? "selected" : ""; ?>>Meppel</option>
                <option value="Zwolle" <?php echo ($_SESSION['location'] ==  'zwolle') ? "selected" : ""; ?>>Zwolle</option>
                <option value="Terschelling" <?php echo ($_SESSION['location'] ==  'terschelling') ? "selected" : ""; ?>>Terschelling</option>
                <option value="Assen" <?php echo ($_SESSION['location'] ==  'assen') ? "selected" : ""; ?>>Assen</option>
                <option value="Amsterdam" <?php echo ($_SESSION['location'] ==  'amsterdam') ? "selected" : ""; ?>>Amsterdam</option>
            </select>
        </div>
    </div>
    <div class="label-input flex">
        <label for="location">Begintijd: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="label-input flex">
        <label for="location">Eindtijd: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="label-input flex">
        <label for="location">Datum: </label>
        <div>
            <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                <div class="error">
                    <?php echo getErrorMessages($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>