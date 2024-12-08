<?php
function maakVerbinding() {
    $servername = 'localhost';
    $database = 'takenlijst';
    $gebruikersnaam = 'taak';
    $wachtwoord = 'lijst';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_error) {
        die("Verbinding mislukt: " . $conn->connect_error);
    }

    return $conn;
}

function valideerGebruiker($gebruikersnaam, $wachtwoord) {
    $conn = maakVerbinding();
    $sql = "SELECT wachtwoord FROM gebruikers WHERE gebruikersnaam = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $gebruikersnaam);
    $stmt->execute();
    $result = $stmt->get_result();

    $conn->close();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return password_verify($wachtwoord, $row['wachtwoord']);
    }

    return false;
}
?>