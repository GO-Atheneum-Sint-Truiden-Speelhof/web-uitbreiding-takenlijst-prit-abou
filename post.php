<!DOCTYPE html>
<html lang="en">
<head>
    <h1 class="text-center mb-4">To-Do List</h1>
</head>
<body>

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
            $gebruikersnaam = 'taak';
            $wachtwoord = '123';
            $database = 'takenlijst';

            $conn = new mysqli($servername, $username, $password, $dbname);

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
            </tbody>
            
        </div>
</div>
</body>










</html>

