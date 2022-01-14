<?php
    include_once "../config/config.php";
    include_once "../helper/validateFile.php";
    include_once "../helper/checkPhoneNumber.php";
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
        mysqli_stmt_close($statement);

        $order_id = mysqli_insert_id($conn);

        $query2 = "INSERT INTO `ticket` (User_Email, Order_ID, Phone_Number, `Description`, `File`, `Status`, Priority, `Location`, Ticket_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($statement2 = mysqli_prepare($conn, $query2))
        {
            //bron: https://stackoverflow.com/questions/20159655/how-to-get-gmt-date-in-yyyy-mm-dd-hhmmss-in-php
            $status = "nieuw";
            
            $date = date('Y-m-d H:i:s \G\M\T', time());

            mysqli_stmt_bind_param($statement2, 'siisssiss', $email, $order_id, $phoneNumber, $description, $file, $status, $priority, $location, $date);

            if (!mysqli_stmt_execute($statement2))
            {
                DIE("EXECUTE ERROR");
            }
            mysqli_stmt_close($statement2);
        }
    }

    if (isset($_POST['submit']))
    {
        $email = (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) ? $_POST['email'] : "invalid";
        $phoneNumber = $_POST['phonenumber'];
        $description = $_POST['description'];
        $priority = 3;
        $file = $_FILES['file'];
        $location = $_POST['location'];
        $price = $_POST['price'];

        if (empty($description) || empty($location) || empty($price))
        {
            header("location: ../pages/orderForm.php?error=emptyField");
        }
 
        //bron: https://stackoverflow.com/questions/946418/how-to-check-whether-the-user-uploaded-a-file-in-php
        if(file_exists($file['tmp_name']) || is_uploaded_file($file['tmp_name'])) 
        {
            if (validateFile($file, "orderForm.php") == 1) 
            {
                $target = "../img/ticketassets/" . $file['name'];
                move_uploaded_file($file["tmp_name"], $target);
            }
        } 
        else 
        {
            $file['name'] = NULL;
        }
        
        $location = $_POST['location'];
        $price = $_POST['price'];

        if (!checkPhoneNumber($phoneNumber))
        {
            header("location: ../pages/orderForm.php?error=invalidPhoneNumber");
            exit();
        }



        placeOrder($conn, $price, $email, $phoneNumber, $description, $file['name'], $priority, $location);
    }