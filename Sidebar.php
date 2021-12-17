<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TicketGuru</title>
	<link rel="stylesheet" href="css/style.css">
</head>
    <body>
    <?php $groep = "Docent";

    function getColor($groupcolor){
    
        // Is goup Student
        if($groupcolor== "Student") return "green";
    
        // Is group Docent
        if($groupcolor== "Docent") return "blue";
    
        // Is goup Manager
        if($groupcolor== "Manager") return "red";
    
        // Return default (black) for all other numbers
        return "black";
    }

    $color=getColor($groep);

    ?>
    <div class="page">
        <div class= "header">
            <div class= "top">
                <div class= "groep">
                    <div class= "groepskleur">
                        <div class="gkleur <?php echo $color; ?>"> <div class= "dot"></div> </div> 
                    </div>
                    <div class="groepsnaam"> <?php echo $groep; ?> </div>
                </div>
                <img src="img/mannelijk-silhouet-avatar-profielfoto.png" alt=avatar width="85px" height="85px" style="margin-top: 6px;">  
            </div>
        </div>

        <div class="Sidebar">      
            <img src="img/logo-nhl-stenden-2018 wit2.png" alt= witLogo width="133px" height="128px" style="margin-left:25px;margin-top:15px">
            <div class="S-1">
                <div class="S-Item">
                    <img src="img/dashboard.png" alt=Dashboard width="24.8px" height="25.6px" style="margin:auto; margin-left: 8px; margin-right: 20px;">
                    <a href="#"><h4>Dashboard</h4></a>
                </div>
                <div class="S-Item">
                    <img src="img/mijn tickets.png" alt=Mijn tickets width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;"> 
                    <a href="#"><h4>Mijn Tickets</h4></a>
                </div>
                <div class="S-Item">
                    <img src="img/maak melding.png" alt=Maak melding width="26px" height="28px" style="margin:auto; margin-left: 8px; margin-right: 18px;">
                    <a href="#"><h4>Maak melding</h4></a>
                </div>
                <div class="S-Item">
                    <img src="img/reserveren.png" alt=Reserveren width="32px" height="29px" style="margin:auto; margin-left: 8px; margin-right: 14px;">
                    <a href="#"><h4>Reserveren</h4></a>
                </div>
                <div class="S-Item">
                    <img src="img/privacy.png" alt=Privacy width="15px" height="26px" style="margin:auto; margin-left: 12px; margin-right: 26px;">
                    <a href="#"><h4>Data privacy</h4></a>
                </div>
                <div class="S-Item">
                    <img src="img/bestelling.png" alt=bestelling width="25px" height="27px" style="margin:auto; margin-left: 8px; margin-right: 22px;">
                    <a href="#"><h4>Bestellingen</h4></a>   
                </div>
            </div>
            

            <div class="S-2">
                <div class="S-Item">
                    <a href="#"><h4>Over ons</h4></a>
                </div>
                <div class="S-Item">
                    <a href="#"><h4>Need help?</h4></a>
                </div>
            </div>

            <div class="S-3">
                <div class="S-Item">
                    <a href="#"><h5>Uitloggen</h5></a>
                </div>   
            </div>   
        </div>
        
        <div class="main">

        </div>
    </div>

    </body>
</html>