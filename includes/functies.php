<?php
function maakVerbinding() //maakt verbinding met de database
{
    $servername = 'localhost';
    $database = 'gebruikers';
    $gebruikersnaam = 'taak';
    $wachtwoord = '123';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
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
?>
