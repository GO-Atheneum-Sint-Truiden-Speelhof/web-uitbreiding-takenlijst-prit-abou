<!DOCTYPE html>
<html lang="en">
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
    
<?php
$servername = 'localhost';
$gebruikersnaam = 'root';
$wachtwoord = '';
$database = 'takenlijst';

$conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['task-name'])) {
    $taskName = mysqli_real_escape_string($conn, $_POST['task-name']);

    if (!empty($taskName)) {
        $sql = "INSERT INTO tasks (taak, status, created_at) VALUES ('$taskName', 'open', NOW())";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "De taaknaam mag niet leeg zijn.";
    }
}

// taken ophalen
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>

<?php
if (isset($_POST['task-name'])) {
    echo htmlspecialchars($_POST['task-name']); 
}
?>
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
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['taak']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Geen taken gevonden.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>