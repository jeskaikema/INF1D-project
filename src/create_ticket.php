<?php
include_once "../config/config.php";
include_once "../helper/validateFile.php";
include_once "../helper/checkPhoneNumber.php";

function placeTicket($conn, $phonenumber, $email, $roomnumber, $description, $file, $priority, $location)
{
    $query = "INSERT INTO `ticket` (User_Email, Room_ID, Phone_Number, `Description`, `File`, `Status`, `Priority`, `Location`, Ticket_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {

        mysqli_stmt_bind_param($stmt, 'siisssiss', $email, $roomnumber, $phonenumber, $description, $file, $status, $priority, $location, $date);
    }

    if (!mysqli_stmt_execute($stmt)) {
        die("Execute error!");
    }
}

if (isset($_POST['submit'])) {
    $phonenumber = $_POST['phonenumber'];
    $description = $_POST['report'];
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
    $roomnumber = $_POST['roomnumber'];
    $file = $_FILES['file'];
    $priority = 3;
    $location = $_POST['branch'];
    $status = "nieuw";
    $date = date('Y-m-d H:i:s \G\M\T', time());
}

//if (empty($description) || empty($location) || empty($price)) {
//    header("location: ../pages/orderForm.php?error=emptyField");
//}
//
//if (!checkPhoneNumber($phonenumber)) {
//    header("location: ../pages/orderForm.php?error=invalidPhoneNumber");
//    exit();
//}

if (file_exists($file['tmp_name']) || is_uploaded_file($file['tmp_name'])) {
    if (validateFile($file, "create_ticket.php") == 1) {
        $target = "../img/ticketassets/" . $file['name'];
        move_uploaded_file($file["tmp_name"], $target);
    }
} else {
    $file['name'] = NULL;
}

placeTicket($conn, $phonenumber, $email, $roomnumber, $description, $file['name'], $status, $priority, $location, $date);