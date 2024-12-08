<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <link rel="stylesheet" type="text/css" href="opmaak/bootstrap.css">
    <title>To-Do Lijst</title>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/bootstrap.js"></script>
    <link rel="icon" type="image/png" href="favicon/lijstfoto.webp">
    <?php include 'includes/nav.php' ?>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Login</h1>
        <form method="post" action="login.php">
            <div class="mb-3">
                <label for="gebruikersnaam" class="form-label">Gebruikersnaam</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="wachtwoord" class="form-label">Wachtwoord</label>
                <input type="password" id="wachtwoord" name="wachtwoord" class="form-control">
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
        </form>
    </div>
</body>
</html>
