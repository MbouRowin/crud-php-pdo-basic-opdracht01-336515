<?php

/**
 * We gaan contact maken met de mysql server
 */
require('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        // echo "Er is een verbinding met de mysql-server";
    } else {
        echo "Er is een interne server-error, neem contact op met de beheerder";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

/**
 * We gaan een insert-query maken voor het wegschrijven van de formuliergegevens
 */
$sql = "INSERT INTO Persoon (Voornaam
                            ,Tussenvoegsel
                            ,Achternaam
                            ,Haarkleur
                            ,Telefoonnummer
                            ,Straatnaam
                            ,Huisnummer
                            ,Woonplaats
                            ,Postcode
                            ,Landnaam)
                            VALUES
                            (:voornaam
                            ,:tussenvoegsel
                            ,:achternaam
                            ,:haarkleur
                            ,:telefoonnummer
                            ,:straatnaam
                            ,:huisnummer
                            ,:woonplaats
                            ,:postcode
                            ,:landnaam)";

// We bereiden de sql-query voor met de method prepare
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
$stmt->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
$stmt->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
$stmt->bindValue(':haarkleur', $_POST['haircolor'], PDO::PARAM_STR);
$stmt->bindValue(':telefoonnummer', $_POST['telefoonnummer'], PDO::PARAM_STR);
$stmt->bindValue(':straatnaam', $_POST['straatnaam'], PDO::PARAM_STR);
$stmt->bindValue(':huisnummer', $_POST['huisnummer'], PDO::PARAM_INT);
$stmt->bindValue(':woonplaats', $_POST['woonplaats'], PDO::PARAM_STR);
$stmt->bindValue(':postcode', $_POST['postcode'], PDO::PARAM_STR);
$stmt->bindValue(':landnaam', $_POST['landnaam'], PDO::PARAM_STR);

// We vuren de sql-query af op de database

$result = $stmt->execute();

if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh: 3; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh: 3; url=read.php');
}
