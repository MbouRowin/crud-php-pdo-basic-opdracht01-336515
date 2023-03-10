<?php
// echo $_GET['Id'];
// Voeg de verbindingsgegevens toe in config.php
require('config.php');

// Maak de data sourcename string
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo =  new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        // echo "Er is een verbinding met de database";
    } else {
        echo "Interne server-error";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    var_dump($_POST);

    // Maak een sql update-query en vuur deze af op de database
    $sql = "UPDATE Persoon SET
    Voornaam = :voornaam,
    Tussenvoegsel = :tussenvoegsel,
    Achternaam = :achternaam,
    Haarkleur = :haarkleur,
    Telefoonnummer = :telefoonnummer,
    Straatnaam = :straatnaam,
    Huisnummer = :huisnummer,
    Woonplaats = :woonplaats,
    Postcode = :postcode,
    Landnaam = :landnaam
    WHERE Id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue("voornaam", $_POST["firstname"]);
    $stmt->bindValue("tussenvoegsel", $_POST["infix"]);
    $stmt->bindValue("achternaam", $_POST["lastname"]);
    $stmt->bindValue("haarkleur", $_POST["haircolor"]);
    $stmt->bindValue(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_STR);
    $stmt->bindValue(':straatnaam', $_POST['straatnaam'], PDO::PARAM_STR);
    $stmt->bindValue(':huisnummer', $_POST['huisnummer'], PDO::PARAM_INT);
    $stmt->bindValue(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
    $stmt->bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
    $stmt->bindValue(':landnaam', $_POST['landnaam'], PDO::PARAM_STR);
    $stmt->bindValue("id", $_POST["id"]);

    $stmt->execute();

    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    header('Refresh: 3; url=read.php');

    exit();
}

// Maak een sql-query voor de database
$sql = "SELECT * FROM Persoon WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);

// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <h1>PHP PDO CRUD</h1>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $_GET['Id'] ?>">

        <label for="firstname">Voornaam:</label><br>
        <input type="text" name="firstname" id="firstname" value="<?= $result->Voornaam; ?>"><br>
        <br>

        <label for="infix">Tussenvoegsel:</label><br>
        <input type="text" name="infix" id="infix" value="<?= $result->Tussenvoegsel; ?>"><br>
        <br>

        <label for="lastname">Achternaam:</label><br>
        <input type="text" name="lastname" id="lastname" value="<?= $result->Achternaam; ?>"><br>
        <br>

        <label for="haircolor">Haarkleur:</label><br>
        <input type="text" name="haircolor" id="haircolor" value="<?= $result->Haarkleur; ?>"><br>
        <br>

        <label for="telefoonnummer">Telefoonnummer:</label><br>
        <input type="text" name="telefoonnummer" id="telefoonnummer" value="<?= $result->Telefoonnummer; ?>"><br>
        <br>

        <label for="straatnaam">Straatnaam:</label><br>
        <input type="text" name="straatnaam" id="straatnaam" value="<?= $result->Straatnaam; ?>"><br>
        <br>

        <label for="huisnummer">Huisnummer:</label><br>
        <input type="text" name="huisnummer" id="huisnummer" value="<?= $result->Huisnummer; ?>"><br>
        <br>

        <label for="woonplaats">Woonplaats:</label><br>
        <input type="text" name="woonplaats" id="woonplaats" value="<?= $result->Woonplaats; ?>"><br>
        <br>

        <label for="postcode">Postcode:</label><br>
        <input type="text" name="postcode" id="postcode" value="<?= $result->Postcode; ?>"><br>
        <br>

        <label for="landnaam">Landnaam:</label><br>
        <input type="text" name="landnaam" id="landnaam" value="<?= $result->Landnaam; ?>"><br>
        <br>

        <input type="submit" value="Verstuur!">
    </form>
</body>

</html>