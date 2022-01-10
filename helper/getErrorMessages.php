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
        if ($error == "diffEmail")
        {
            return "Gebruik alleen uw eigen emailadres";
        }
        if ($error == "matchError")
        {
            return "De opgegeven naam en het opgegeven emailadres horen niet bij elkaar";
        }
        if ($error == "invalidPhoneNumber")
        {
            return "Ongeldig telefoonnummer";
        }
        if ($error == "fileExists")
        {
            return "Het bestand bestaat al";
        }
        if ($error == "typeError")
        {
            return "Voer een bestand in van bestandtype jpeg, jpg, svg, pdf of txt";
        }
        if ($error == "sizeError")
        {
            return "Het ingevoerde bestand is groter dan 6.3 mb";
        }
        if ($error == "reactionError")
        {
            return "Het reactieveld mag niet leeg zijn";
        }
    }