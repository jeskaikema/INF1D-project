<?php
    function validateFile()
    {
        if($_FILES['file']['error'] > 0)
        {
            header("location: ../orderForm.php?error=uploadError");
            exit();
        }

        if ($_FILES['file']['size'] < 6300000)
        {
            $fileTypes = ['image/jpeg', 'image/png', "image/svg+xml", 'application/pdf', 'text/plain'];
            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES["file"]["tmp_name"]);

            if (in_array($uploadedFileType, $fileTypes))
            {
                if (file_exists("../img/ticketimg/" . $_FILES['file']['name']))
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