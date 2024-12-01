<?php
function maakVerbinding() //maakt verbinding met de database
{
    $servername = 'localhost';
    $gebruikersnaam = 'taak';
    $wachtwoord = '123';
    $database = 'takenlijst';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }

    return $conn;
}


// gebruiker zoeken
function haalGebruikerOp($gebruikersnaam)
{
    $conn = maakVerbinding();
    $gebruikersnaam = $conn->real_escape_string($gebruikersnaam);
    $query = "SELECT wachtwoord FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam'";
    $result = $conn->query($query);

    $conn->close();

    if ($result && $result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}
?>
