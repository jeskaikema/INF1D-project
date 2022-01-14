<?php 
    include_once "../helper/session.php";
    include_once "../helper/getErrorMessages.php";

//the page is not to be accessed by anyone but management and helpdesk
if(!($_SESSION['role'] === "management"|| $_SESSION['role'] === "Helpdeskmedewerker")){
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
                <h1>Nieuwe Gebruiker</h1>
            </div>
            <form action="../src/insertUser.php" method="post" class="form flex">
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
                        <select name="department" id="department">
                            <option value="ICT">ICT</option>
                            <option value="Staff">Staff</option>
                            <option value="Hotel">Hotel</option>
                            <option value="Economie">Economie</option>
                            <option value="PABO">PABO</option>
                        </select>
                    </div>
                </div>
                <div class="label-input flex">
                    <label for="location">Locatie: </label>
                    <div>
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
                    <label for="role">Rol: </label>
                    <div>
                        <select name="role" id="role">
                            <option value="student">Student</option>
                            <option value="docent">Docent</option>
                            <option value="Helpdeskmedewerker">Helpdeskmedewerker</option>
                        </select>
                    </div>
                </div>
                    <input type="submit" name="submit" value="submit">
            </form>
        </div>
    </div>
</body>
</html>