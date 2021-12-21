<?php
    function validateFile($file, $page)
    {
        if($file['error'] > 0)
        {
            header("location: ../" . $page . "?error=uploadError");
            exit();
        }

        if ($file['size'] < 6300000)
        {
            $fileTypes = ['image/jpeg', 'image/png', "image/svg+xml", 'application/pdf', 'text/plain'];
            $uploadedFileType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file["tmp_name"]);

            if (in_array($uploadedFileType, $fileTypes))
            {
                if (file_exists("../img/ticketassets/" . $file['name']))
                {
                    header("location: ../" . $page . "?error=fileExists");
                    exit();
                }
            }
            else
            {
                header("location: ../" . $page . "?error=typeError");
                exit();
            }
            return 1;
        }
        else
        {
            header("location: ../" . $page . "?error=sizeError");
            exit();
        }
    }