<?php
include_once "../config/config.php";
include_once "../helper/checkPhoneNumber.php";

function reserveRoom($conn, $room, $email, $phoneNumber, $description, $priority, $location, $begintime, $endtime, $date)
{
    $query = "INSERT INTO `room` (Room_Number, location, White_Board, Monitor, Size, Begin_Time, End_Time, Room_Date) VALUES (?,?,?,?,?,?,?,?)";

    if ($statement = mysqli_prepare($conn, $query))
    {
        mysqli_stmt_bind_param($statement, 'ssiissss', $room);
    }

    if (!mysqli_stmt_execute($statement))
    {
        DIE("EXECUTE ERROR");
    }

    $begintime = $_POST['Begintijd'];
    $endtime = $_POST['Eindtijd'];
    $date = $_POST['Datum'];
    $room_id = mysqli_insert_id($conn);

    $query2 = "INSERT INTO `ticket` (User_Email, Room_ID, Phone_Number, `Description`, `Status`, Priority, `Location`, Ticket_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($statement2 = mysqli_prepare($conn, $query2))
    {
        $status = "nieuw";
        $date = date('Y-m-d H:i:s \G\M\T', time());

        mysqli_stmt_bind_param($statement2, 'siississ', $email, $room_id, $phoneNumber, $description, $status, $priority, $location, $date);

        if (!mysqli_stmt_execute($statement2))
        {
            DIE("EXECUTE ERROR");
        }
    }
}

if (isset($_POST['submit']))
{
    $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
    $phoneNumber = $_POST['phonenumber'];
    $description = $_POST['description'];
    $priority = 3;
    $location = $_POST['location'];
    $room = $_POST['room'];
    $begintime = $_POST['Begintijd'];
    $endtime = $_POST['Eindtijd'];
    $date = $_POST['Datum'];

    if (!checkPhoneNumber($phoneNumber))
    {
        header("location: ../orderForm.php?error=invalidPhoneNumber");
        exit();
    }



    reserveroom($conn, $room, $email, $phoneNumber, $description, $priority, $location, $begintime, $endtime, $date);
}