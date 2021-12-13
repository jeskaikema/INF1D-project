<?php
    include "../config/config.php";

    function getAllTickets() 
    {
        $query = "SELECT * FROM 'ticket' LEFT JOIN `order` ON ticket.id = ticket_id LEFT JOIN `Room` ON ticket.room_number = room.room_number";
    }

    function getAllOrders() 
    {
        $query = "SELECT `User_Email`, Room FROM `ticket`";
    }

    function getAllReservations() 
    {

    }

    function getAllIssues() 
    {

    }