<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <link rel="stylesheet" type="text/css" href="opmaak/bootstrap.css">
    <title>To-Do Lijst</title>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/bootstrap.js"></script>
    <link rel="icon" type="image/png" href="favicon/lijstfoto.webp">
    <h1 class="text-center mb-4">To-Do Lijst</h1>
</head>

<body>
<h1>Login</h1>
<?php
// Controleer of de gebruikersnaam is ingevuld
if (isset($_POST["gebruikersnaam"]) && !empty($_POST["gebruikersnaam"])) {
    // Databasegegevens
    $servername = 'localhost';
    $gebruikersnaam = 'taak';
    $wachtwoord = '123';
    $database = 'takenlijst';

    // Maak verbinding met de database
    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    // Controleer of de verbinding is gelukt
    if ($conn->connect_errno) {
        die('Databaseverbinding mislukt: ' . $conn->connect_error);
    }

    // Verkrijg de gebruikersnaam en ontsnap eventuele speciale tekens
    $username = $conn->real_escape_string($_POST["gebruikersnaam"]);

    // Query om het wachtwoord van de gebruiker op te halen
    $query = "SELECT wachtwoord FROM gebruikers WHERE gebruikersnaam = '$username'";
    $result = $conn->query($query);

    // Als een resultaat wordt gevonden
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["wachtwoord"];

        // Controleer of het ingevoerde wachtwoord overeenkomt met het gehashte wachtwoord
        if (password_verify($_POST["wachtwoord"], $hashed_password)) {
            echo "<h3>Login succesvol!</h3>";
        } else {
            echo "<h3>Ongeldig wachtwoord.</h3>";
        }
    } else {
        echo "<h3>Gebruikersnaam niet gevonden.</h3>";
    }

    // Sluit de verbinding
    $conn->close();
} else {
    ?>
    <!-- Formulier voor het inloggen -->
    <form method="post" action="login.php" class="form">
        <label for="gebruikersnaam">Gebruikersnaam: </label>
        <input name="gebruikersnaam" class="form-control" id="gebruikersnaam" type="text" required>
        <label for="wachtwoord">Wachtwoord: </label>
        <input name="wachtwoord" class="form-control" id="wachtwoord" type="password" required>
        <div class="text-center">
        <button type="submit" class= "btn btn-dark">Login</button>
        </div>
    </form>
    <?php
}
?>
<?php include 'includes/functies.php'; ?>
</body>
</html>
