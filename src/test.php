<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta charset="UTF-8">

        <?php
        include "../helper/countStatus.php";
        // $result = getCountStatus();

        $countOpen = 3;
        $countClosed = 6;
        $countInProgress = 9;
        ?>

        <script>

            window.onload = function () {
            
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                data: [{
                    type: "doughnut",
                    startAngle: 60,
                    //innerRadius: 60,
                    indexLabelFontSize: 7,
                    indexLabel: "{label} - #percent%",
                    toolTipContent: "<b>{label}:</b> {y} (#percent%)",
                    dataPoints: [
                        { y: <?=$countOpen?>, label: "open" },
                        { y: <?=$countClosed?>, label: "closed" },
                        { y: <?=$countInProgress?>, label: "in progress" }
                    ]
                }]
            });
            chart.render();
            
            }
        </script>
    </head>

    <body>
        <div id="chartContainer" style="height: 100px; width: 20%;"></div>
        <script src="../js/jquery.canvasjs.min.js"></script>
    </body>
</html>