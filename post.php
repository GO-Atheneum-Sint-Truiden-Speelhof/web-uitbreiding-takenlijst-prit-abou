<!DOCTYPE html>
<html lang="en">
<head>
    <title>To Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <h1 class="text-center mb-4">To-Do List</h1>
    <?php
   
     '.$_POST["task-name"].'
     
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
                </tr>
            </thead>
            </table>

            <tbody id="taak-lijst">
            <?php

            $servername = 'localhost';
            $gebruikersnaam = 'root';
            $wachtwoord = '';
            $database = 'takenlijst';

            $conn = new mysqli($servername, $gebruikersnaam, $wachtwoord, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM tasks";
            $result = mysqli_query($conn, $sql);

            if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['taak'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['created_at'] . "</td>";
                    echo "</tr>";
                }
            } else {
                    echo "Error: " . mysqli_error($conn);
                }
                
                ?>
                <form method="POST" action="takenlijst.php">
                 <input type="text" name="task-name" placeholder="Nieuwe taak">
                <button type="submit">Toevoegen</button>
</form>
            </tbody>
            
        </div>
</div>
</body>










</html>

