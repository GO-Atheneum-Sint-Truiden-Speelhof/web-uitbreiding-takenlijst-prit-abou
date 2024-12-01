<!doctype html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="all">
    <link rel="stylesheet" type="text/css" href="opmaak/bootstrap.css">
    <title>To-Do Lijst</title>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/bootstrap.js"></script>
    <link rel="icon" type="image/png" href="favicon/lijstfoto.webp">
    <h1 class="text-center mb-4">To-Do List</h1>
</head>

<body>
<form method="post" action="post.php">
    <div class="input-group">
        <input type="text" name="task" class="form-control" placeholder="Voeg een taak toe" required>
        <button type="submit" class="btn btn-dark">Toevoegen</button>
    </div>
</form>
</body>
</html>
