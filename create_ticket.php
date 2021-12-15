<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TicketGuru</title>
</head>
<body>
<form action="src/create_ticket.php" method="POST">
    <p>
        <label for="name">Naam:</label>
        <input type="text" name="name" id="name">
    </p>
    <p>
        <label for="phonenumber">Telefoonnummer:</label>
        <input type="tel" name="phonenumber" id="phonenumber">
    </p>
    <p>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email">
    </p>
    <p>
        <label for="department">Afdeling</label>
        <input type="text" name="department" id="department">
    </p>
    <p>
        <label for="branch">Vestiging</label>
        <select name="branch" id="branch">
            <option value="blank" selected></option>
            <option value="Leeuwarden">Leeuwarden</option>
            <option value="Emmen">Emmen</option>
            <option value="Groningen">Groningen</option>
            <option value="Meppel">Meppel</option>
            <option value="Zwolle">Zwolle</option>
            <option value="Terschelling">Terschelling</option>
            <option value="Assen">Assen</option>
            <option value="Amsterdam">Amsterdam</option>
        </select>
    </p>
    <p>
        <label for="roomnumber">Kamernummer</label>
        <input type="text" name="roomnumber" id="roomnumber">
    </p>
    <p>
        <label for="description">Kleine beschrijving</label>
        <input type="text" name="description" id="description">
    </p>
    <p>
        <label for="report">Melding</label>
        <input type="text" name="report" id="report">
    </p>
    <p>
        <label for="attachment">Bijlage</label>
        <input type="file" name="attachment" id="attachment" multiple>
    </p>

    <input type="submit" name="submit" value="inloggen">
</form>
</body>
</html>