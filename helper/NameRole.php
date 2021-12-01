<?php
    function getName($email) 
    {
        $split = explode('@', $email);
        $name = explode('.', $split[0]);
        return $name[0];
    }

    function isStudent($email) 
    {
        $split = explode('@', $email);
        $role = explode('.', $split[1]);
        if ($role[0] == "student") {
            return True;
        }
        else 
        {
            return False;
        }
    }