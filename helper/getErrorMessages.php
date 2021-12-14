<?php
    function getErrorMessages($error) 
    {
        if ($error == "emptyField") 
        {
            return "Vul alle velden in";
        }
        if ($error == "invalidEmail")
        {
            return "Vul een geldig emailadres in";
        }
        if ($error == "matchError")
        {
            return "De opgegeven naam en het opgegeven emailadres horen niet bij elkaar";
        }
    }