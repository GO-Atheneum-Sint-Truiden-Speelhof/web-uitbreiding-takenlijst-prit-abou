<?php
// maakt verbinding met data base
function maakVerbinding()
{
    $servername = 'localhost';
    $database = 'tasks';
    $gebruikersnaam = 'taak';
    $wachtwoord = 'prit';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_errno) {
        die('Databaseverbinding mislukt: ' . $conn->connect_error);
    }
    else {
        echo 'Connectie succesvol: ';
    }
    return $conn;
}
// gebruiker zoeken
function haalGebruikerOp($gebruikersnaam)
{
    $conn = maakVerbinding();
    $gebruikersnaam = $conn->real_escape_string($gebruikersnaam);
    $query = "SELECT wachtwoord FROM gebruikers1 WHERE gebruikersnaam = '$gebruikersnaam'";
    $result = $conn->query($query);

    $conn->close();

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

