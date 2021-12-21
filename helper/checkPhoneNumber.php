<?php
    //bron: https://www.codespeedy.com/how-to-validate-phone-number-in-php/
    function checkPhoneNumber($phone)
    {
         // Allow +, - and . in phone number
         $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
         // Remove "-" from number
         $phoneNumber = str_replace("-", "", $filtered_phone_number);
         // Check the lenght of number
         // This can be customized if you want phone number from a specific country
         if (strlen($phoneNumber) < 8 || strlen($phoneNumber) > 11) {
            return false;
         } else {
           return true;
         }
    }