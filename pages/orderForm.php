<?php
    include_once "../helper/session.php";
    include_once "../helper/loggedin.php";
    include_once "../helper/getErrorMessages.php";

//the page is not to be accessed by anyone but management, helpdesk or teachers
if(!($_SESSION['role'] === "management"|| $_SESSION['role'] === "Helpdeskmedewerker" || $_SESSION['docent'])){
    header("Location: ticketoverzicht.php");
    exit();
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
            <div class="users-title">
                <h1>Bestelling Plaatsen</h1>
            </div>
            <form action="../src/order.php" method="POST" enctype="multipart/form-data" class="form flex">
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
                    <label for="department">bestand: </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "uploadError" || $_GET['error'] == "fileExists" || $_GET['error'] == "typeError" || $_GET['error'] == "sizeError"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input type="file" name="file" id="file">
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
                            <option value="Emmen" <?php echo ($_SESSION['location'] ==  'Emmen') ? "selected" : ""; ?>>Emmen</option>
                            <option value="Leeuwarden" <?php echo ($_SESSION['location'] ==  'Leeuwarden') ? "selected" : ""; ?>>Leeuwarden</option>
                            <option value="Groningen" <?php echo ($_SESSION['location'] ==  'Groningen') ? "selected" : ""; ?>>Groningen</option>
                            <option value="Meppel" <?php echo ($_SESSION['location'] ==  'Meppel') ? "selected" : ""; ?>>Meppel</option>
                            <option value="Zwolle" <?php echo ($_SESSION['location'] ==  'Zwolle') ? "selected" : ""; ?>>Zwolle</option>
                            <option value="Terschelling" <?php echo ($_SESSION['location'] ==  'Terschelling') ? "selected" : ""; ?>>Terschelling</option>
                            <option value="Assen" <?php echo ($_SESSION['location'] ==  'Assen') ? "selected" : ""; ?>>Assen</option>
                            <option value="Amsterdam" <?php echo ($_SESSION['location'] ==  'Amsterdam') ? "selected" : ""; ?>>Amsterdam</option>
                        </select>
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="price">Prijs (in euro's): </label>
                    <div>
                        <?php if ((isset($_GET['error']) && ($_GET['error'] == "emptyField"))): ?>
                            <div class="error">
                                <?php echo getErrorMessages($_GET['error']); ?>
                            </div>
                        <?php endif; ?>
                        <input type="text" name="price" id="price">
                    </div>
                </div>
                    <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>
</html>