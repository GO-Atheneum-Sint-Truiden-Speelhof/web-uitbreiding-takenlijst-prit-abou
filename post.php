<!DOCTYPE html>
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

<?php
// Check if a new task is submitted and add it to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task'])) {
    $servername = 'localhost';
    $gebruikersnaam = 'taak';
    $wachtwoord = '123';
    $database = 'takenlijst';

    //  connectie met de database
    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    // controleerd connectie
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $task = $conn->real_escape_string($_POST['task']);

    $sql = "INSERT INTO tasks (taak, status, created_at) VALUES ('$task', 'Nog te doen', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Nieuwe taak toegevoegd!</p>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<form method="POST" action="post.php">
    <div class="input-group">
        <input type="text" name="task" class="form-control" placeholder="Voeg een taak toe" required>
        <button type="submit" class="btn btn-dark">Toevoegen</button>
    </div>
</form>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-dark">
            <thead class="thead-dark">
                <tr>
                    <th>Nr</th>
                    <th>Taak</th>
                    <th>Status</th>
                    <th>Gemaakt op</th>
                </tr>
            </thead>
            <tbody id="taak-lijst">
                <?php
                // Fetch tasks from the database
                $servername = 'localhost';
                $gebruikersnaam = 'taak';
                $wachtwoord = '123';
                $database = 'takenlijst';

                $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Select all tasks from the database
                $sql = "SELECT * FROM tasks";
                $result = $conn->query($sql);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['taak']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Geen taken gevonden.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
