<?php
    function validateFile($file)
    {
        if($_FILES['file']['error'] > 0)
        {
            header("location: ../orderForm.php?error=uploadError");
            exit();
        }

        if ($_FILES['file']['size'] < 60000)
        {
            $fileTypes = ['image/jpg', 'image/jpeg', 'image/png'];
            $target = "../img/ticketimg/" . basename($_FILES['file']['name']);
            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["file"]["tmp_name"]);

            if (in_array($uploadedFileType, $fileTypes))
            {
                if (file_exists($target))
                {
                    header("location: ../orderForm.php?error=fileExists");
                    exit();
                }
            }
            else
            {
                header("location: ../orderForm.php?error=typeError");
                exit();
            }
            return 1;
        }
        else
        {
            header("location: ../orderForm.php?error=sizeError");
            exit();
        }
    }