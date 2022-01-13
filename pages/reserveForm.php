<?php
include_once "../helper/session.php";
include_once "../helper/loggedin.php";
include_once "../helper/getErrorMessages.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../templates/head.php"; ?>
</head>
<body>
<div id="container">
    <?php include "../templates/sidebar.php"; ?>
    <div class="sub-container">
        <?php include "../templates/header.php"; ?>
        <div class="users-title">
            <h1>Lokaal Reserveren</h1>
        </div>
            <form action="../src/reserve.php" method="POST" enctype="multipart/form-data" class="form flex">
                <div class="label-input flex">
                    <label for="email">Email: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField" || $_GET['error'] == "invalidEmail" || $_GET['error'] == "matchError"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input type="text" name="email" id="email" value=<?php echo $_SESSION['email']; ?> readonly>
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="phonenumber">Telefoonnummer: </label>
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
                    <label for="description">Beschrijving: </label>
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
                    <label for="room">Lokaal: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input type="text" name="room" id="room">
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="Begintijd">Begintijd: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input id="Begintijd" name="Begintijd" type="time" value="08:30">
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="Eindtijd">Eindtijd: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input id="Eindtijd" name="Eindtijd" type="time" value="09:00">
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="Datum">Datum: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input id="Datum" name="Datum" type="date">
                    </div>
                </div>
                <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>
</html>