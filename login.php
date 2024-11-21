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
	<h1 class="text-center mb-4">To-Do List</h1>
</head>

<body>
<h1>Login</h1>
<?php
if (isset($_POST["gebruikersnaam"]) && !empty($_POST["gebruikersnaam"])) {
    $servername = 'localhost';
    $database = "gebruikers";
    $gebruikersnaam = "taak";
    $wachtwoord = "123";

    $conn = new mysqli($servername, $database, $gebruikersnaam, $wachtwoord);

    if ($conn->connect_errno) {
        die('Databaseverbinding mislukt: ' . $conn->connect_error);
    }

    $username = $conn->real_escape_string($_POST["gebruikersnaam"]);
    $query = "SELECT wachtwoord FROM gebruikers WHERE gebruikersnaam = '$username'";
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
    <form method="post" action="index.php">
        <label for="username">Gebruikersnaam: </label>
        <input name="username" id="username" type="text" required>
        <label for="Wachtwoord">Wachtwoord: </label>
        <input name="Wachtwoord" id="Wachtwoord" type="password" required>
        <button type="submit">Login</button>
    </form>
    <?php
    }
?>
</body>
</html>