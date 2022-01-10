<?php
include_once "../config/config.php";
include_once "../helper/validateFile.php";

function placeTicket($conn, $phonenumber, $email, $roomnumber, $description, $attachment)
{
    $query = "INSERT INTO 'ticket' (Phone_Number, User_Email, Room_ID, Description, File) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($stmt, 'isiss', $phonenumber, $email, $roomnumber, $description, $attachment);

        if (!mysqli_stmt_execute($stmt))
        {
            DIE ("Execute error!");
        }
    }
}

if (isset($_POST['submit']))
{
    $phonenumber = $_POST['phonenumber'];
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
    $roomnumber = $_POST['roomnumber'];
    $description = $_POST['description'];
    $attachment = $_FILES['attachment'];
}

if (validateFile($attachment, "create_ticket.php") == 1)
{
    $target = "../img/ticketassets/" . $attachment['name'];
    move_uploaded_file($attachment["tmp_name"], $target);
}