<?php 
    include_once "helper/session.php";
    include_once "helper/getErrorMessages.php"; 
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
        <h1>Nieuwe Gebruiker</h1>
    </div>
    <form action="src/insertUser.php" method="post" class="form flex">
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
            <label for="fName">Voornaam: </label>
            <div>
                <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                    <div class="error">
                        <?php echo getErrorMessages($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="fName" id="fName">
            </div>
        </div>
        <div class="label-input flex">
            <label for="lName">Achternaam: </label>
            <div>
                <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "matchError"))): ?>
                    <div class="error">
                        <?php echo getErrorMessages($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="lName" id="lName">
            </div>
        </div>
        <div class="label-input flex">
            <label for="department">Afdeling: </label>
            <div>
                <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                    <div class="error">
                        <?php echo getErrorMessages($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="department" id="department">
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
                    <option value="emmen" <?php echo ($_SESSION['location'] ==  'emmen') ? "selected" : ""; ?>>Emmen</option>
                    <option value="leeuwarden" <?php echo ($_SESSION['location'] ==  'leeuwarden') ? "selected" : ""; ?>>Leeuwarden</option>
                    <option value="groningen" <?php echo ($_SESSION['location'] ==  'groningen') ? "selected" : ""; ?>>Groningen</option>
                </select>
            </div>
        </div>
        <div class="label-input flex">
            <label for="role">Rol: </label>
            <div>
                <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                    <div class="error">
                        <?php echo getErrorMessages($_GET['error']); ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="role" id="role">
            </div>
        </div>
            <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>