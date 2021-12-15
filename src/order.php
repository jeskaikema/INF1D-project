<?php
    include_once "../config/config.php";
    include_once "../helper/validateFile.php";
    //bron: https://stackoverflow.com/questions/4565195/mysql-how-to-insert-into-multiple-tables-with-foreign-keys
    function placeOrder($conn, $price, $email, $phoneNumber, $description, $file, $priority, $location)
    {
        $query = "INSERT INTO `order` (Price) VALUES (?)";

        if ($statement = mysqli_prepare($conn, $query))
        {
            mysqli_stmt_bind_param($statement, 'd', $price);
        }

        if (!mysqli_stmt_execute($statement))
        {
            DIE("EXECUTE ERROR");
        }

        $order_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO `ticket` (User_Email, Order_ID, Phone_Number, `Description`, `File`, Priority, `Location`, Ticket_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        if ($statement2 = mysqli_prepare($conn, $query2))
        {
            //bron: https://stackoverflow.com/questions/20159655/how-to-get-gmt-date-in-yyyy-mm-dd-hhmmss-in-php
            $date = date('Y-m-d H:i:s \G\M\T', time());

            mysqli_stmt_bind_param($statement2, 'siississ', $email, $order_id, $phoneNumber, $description, $file, $priority, $location, $date);

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
        $file = $_FILES['file'];
        if (validateFile($file) == 1) 
        {
            $target = "../img/ticketimg/" . $file['name'];
            move_uploaded_file($file["tmp_name"], $target);
        }
        $priority = $_POST['priority'];
        $location = $_POST['location'];
        $price = $_POST['price'];

        placeOrder($conn, $price, $email, $phoneNumber, $description, $file['name'],  $priority, $location);
    }