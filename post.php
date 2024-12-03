<!DOCTYPE html>
<html lang="en">
<head>
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="scripts/bootstrap.js"></script>
    <link rel="icon" type="image/png" href="favicon/lijstfoto.webp">
    
</head>
<?php include 'includes/nav.php'; ?>
<body>
    <h1 class="text-center mb-4">To-Do List</h1>

    <?php
    $servername = 'localhost';
    $gebruikersnaam = 'root';
    $wachtwoord = '';
    $database = 'takenlijst';

    $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // taken toevoegen
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task-name'])) {
        $taskName = mysqli_real_escape_string($conn, $_POST['task-name']);

        if (!empty($taskName)) {
            $sql = "INSERT INTO tasks (taak, status, created_at) VALUES ('$taskName', 'open', NOW())";

            if (!mysqli_query($conn, $sql)) {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<div class='alert alert-danger'>De taaknaam mag niet leeg zijn.</div>";
        }
    }

    // taken verwijderen
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $sql = "DELETE FROM tasks WHERE id = $id";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
        }
    }


    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);
    ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>Nr</th>
                        <th>Taak</th>
                        <th>Status</th>
                        <th>Gemaakt op</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody id="taak-lijst">
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['taak']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td>
                                <a href='?delete=" . $row['id'] . "' class='btn btn-danger btn-sm'>Verwijderen</a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Geen taken gevonden.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <form method="POST" action="">
                <input type="text" name="task-name" placeholder="Nieuwe taak" class="form-control mb-2">
                <button type="submit" class="btn btn-dark">Toevoegen</button>
            </form>
        </div>
    </div>

</body>
</html>
