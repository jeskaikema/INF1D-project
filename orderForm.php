<?php
    include_once "helper/session.php";
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
    <form action="src/order.php" method="POST" enctype="multipart/form-data">
        <label for="email2">email: </label>
        <input type="text" name="email" id="email2">
        <label for="phonenumber">phonenumber: </label>
        <input type="text" name="phonenumber" id="phonenumber">
        <label for="description">description: </label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <label for="file">Bestand: </label>
        <input type="file" name="file" id="file">
        <label for="priority">prioriteit: </label>
        <input type="text" name="priority" id="priority">
        <label for="location">locatie: </label>
        <input type="text" name="location" id="location">
        <label for="price">prijs: </label>
        <input type="text" name="price" id="price">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>