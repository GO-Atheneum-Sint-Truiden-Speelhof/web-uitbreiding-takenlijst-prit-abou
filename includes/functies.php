<?php
// maakt verbinding met data base
function maakVerbinding()
{
    $servername = 'localhost';
    $database = 'gebruikers';
    $gebruikersnaam = 'taak';
    $wachtwoord = '123';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_errno) {
        die('Databaseverbinding mislukt: ' . $conn->connect_error);
    }

    return $conn;
}
// gebruiker zoeken
function haalGebruikerOp($gebruikersnaam)
{
    $conn = maakVerbinding();
    $gebruikersnaam = $conn->real_escape_string($gebruikersnaam);
}