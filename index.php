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
</head>
<body>
    
    <?php include 'includes/nav.php'; ?>

    <div class="container mt-4">
        <h1 class="text-center mb-4">Login</h1>
        <form method="post" action="authenticate.php">
            <div class="mb-3">
                <label for="username" class="form-label">Gebruikersnaam</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Wachtwoord</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-dark">Login</button>
        </form>
    </div>
</body>
</html>
