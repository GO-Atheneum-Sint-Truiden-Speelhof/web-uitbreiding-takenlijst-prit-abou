<!doctype html>
<html lang="nl">

<head>
	<meta charset=utf-8>
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
if (isset($_POST["gebruikersnaam"]) && !empty($_POST["gebruikersnaam"])) {
    $servername = 'localhost';
    $gebruikersnaam = 'test';
    $wachtwoord = '123';
    $database = 'gebruikers';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_errno) {
        die('Databaseverbinding mislukt: ' . $conn->connect_error);
    }

    $gebruikersnaam = $conn->real_escape_string($_POST["gebruikersnaam"]);
    $query = "SELECT wachtwoord FROM gebruikers WHERE gebruikersnaam = '$gebruikersnaam'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["wachtwoord"];

        if (password_verify($_POST["wachtwoord"], $hashed_password)) {
            echo "<h3>Login succesvol!</h3>";
        } else {
            echo "<h3>Ongeldig wachtwoord.</h3>";
        }
    } else {
        echo "<h3>Gebruikersnaam niet gevonden.</h3>";
    }

    $conn->close();
} else {
    ?>
    <form method="post" action="index.php" class="form">
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
<?php include 'includes/functies.php';?>
</body>
</html>