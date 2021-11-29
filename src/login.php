<?php
    if(isset($_POST['submit'])) 
    {
        $email = isset($_POST['email']) ? $_POST['email'] : NULL;
        $password = isset($_POST['password']) ? $_POST['password'] : NULL;
        if (empty($email) || empty($password)) 
        {
            echo "vul alle vakken in";
            return 1;
        }
    }