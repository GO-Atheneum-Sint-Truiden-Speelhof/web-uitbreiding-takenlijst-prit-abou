
<?php
include 'includes/functies.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];

    if (valideerGebruiker($gebruikersnaam, $wachtwoord)) {
        echo "<h3>Login succesvol!</h3>";
    } else {
        echo "<h3>Ongeldige gebruikersnaam of wachtwoord.</h3>";
    }
}
?>

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
    <?php include 'includes/nav.php' ?>
</head>
<body>
<h1 class="text-center mb-4">To-Do List</h1>
<form method="post" action="" class="form">
    <label for="gebruikersnaam">Gebruikersnaam: </label>
    <input name="gebruikersnaam" class="form-control" id="gebruikersnaam" type="text" required>
    <label for="wachtwoord">Wachtwoord: </label>
    <input name="wachtwoord" class="form-control" id="wachtwoord" type="password" >
    <div class="text-center">
        <button type="submit" class="btn btn-dark">Login</button>
    </div>
</form>
</body>
</html>