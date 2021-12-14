<?php
    include_once "config/config.php";
    include_once "src/order.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="src/order.php" method="POST">
        <label for="email2">email: </label>
        <input type="text" name="email" id="email2">
        <label for="email2">email: </label>
        <input type="text" name="email" id="email2">
    </form>
</body>
</html>