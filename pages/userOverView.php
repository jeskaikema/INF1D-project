<?php
include_once "../helper/session.php";
include_once "../helper/getErrorMessages.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gebruikers</title>
    <?php include "../templates/head.php"; ?>
</head>

<body>
    <div class="container">
        <?php include "../templates/sidebar.php"; ?>
        <div class="sub-container">
            <?php
            include "../templates/header.php";
            include "../helper/session.php";
            include "../helper/loggedin.php";
            //todo
            if(!($_SESSION['role'] === "management"|| $_SESSION['role'] === "helpdesk")){
                header("Location: index.php");
            }

            include "../config/config.php";
            $location = $_SESSION['location'];
            $department = $_SESSION['department'];

            if (isset($_POST['submit'])) {
                $location = $_POST['location'];
                $department = $_POST['department'];
            }
            $paramIndex = 0;
            if ($location != "-1" && $department != "-1") {
                $query = "SELECT * FROM `user` WHERE `Location` = ? AND `Department` = ?";
                $paramIndex = 1;
            } else if (($location != "-1")) {
                $query = "SELECT * FROM `user` WHERE `Location` = ?";
                $paramIndex = 2;
            } else if (($department != "-1")) {
                $query = "SELECT * FROM `user` WHERE `Department` = ?";
                $paramIndex = 3;
            } else {
                $query = "SELECT * FROM `user`";
            }

            echo "<div id='userViewForm'>";

            if ($_SESSION['role'] === "helpdesk") {
                $location = $_SESSION['location'];
                $department = $_SESSION['department'];
                switch ($paramIndex) {
                    case 0:
                        echo "<h1>Alle Gebruikers</h1>";
                        break;

                    case 1:
                        echo "<h1>Gebruikers van Afdeling " . $department . " in " . $location . "</h1>";
                        break;

                    case 2:
                        echo "<h1>Gebruikers in " . $location . "</h1>";
                        break;

                    case 3:
                        echo "<h1>Gebruikers van Afdeling " . $department . "</h1>";
                        break;
                }
                echo ' <form method="post" action="">
                <select name="location" id="location">
                    <option value="-1">Alle Locaties</option>
                    <option value="Emmen">Emmen</option>
                    <option value="Leeuwarden">Leeuwarden</option>
                </select>

                <select name="department" id="department">
                    <option value="-1">Alle Afdelingen</option>
                    <option value="ICT">ICT</option>
                    <option value="informatica">informatica</option>
                    <option value="technische informatica">technische informatica</option>
                </select>

                <input type="submit" name="submit" id="submit" value="Submit">
            </form>';
            }else if($_SESSION['role'] === "management"){
                $location = $_SESSION['location'];
                $department = $_SESSION['department'];
                echo $location;
                echo $department;
                echo "<h1>Gebruikers van jouw Afdeling</h1>";
            }
            echo "</div>";
            ?>

            <?php

            if ($statement = mysqli_prepare($conn, $query)) {
                switch ($paramIndex) {
                    case 1:
                        mysqli_stmt_bind_param($statement, 'ss', $location, $department);
                        break;

                    case 2:
                        mysqli_stmt_bind_param($statement, 's', $location);
                        break;

                    case 3:
                        mysqli_stmt_bind_param($statement, 's', $department);
                }

                if (!mysqli_stmt_execute($statement)) {
                    die("EXECUTE ERROR " . mysqli_stmt_error($statement));
                }
                mysqli_stmt_bind_result($statement, $email, $departmentResult, $locationResult, $role, $firstName, $lastName);
                while (mysqli_stmt_fetch($statement)) {
                    echo "<div class='userContainer'>";
                    echo "<div class='userNameContainer'><p>" . $firstName . " " . $lastName ."</p></div>";
                    echo "<div class='userEmailContainer'><p>" . $email . "</p></div>";
                    echo "</div>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>