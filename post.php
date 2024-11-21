<!DOCTYPE html>
<html lang="en">
<head>
    <h1 class="text-center mb-4">To-Do List</h1>
</head>
<body>

    <?php
    $servername = "test"; 
    $username = "test";        
    $password = "abou";            
    $dbname = "tasks"; 

     '.$_POST["task-name"].'
     
    ?>

<div class="card shadow-sm">
            <div class="card-body">
            <table class="table">
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
				$sql = "SELECT * FROM tasks";
				$result = mysqli_query($sql);
				?>
            </tbody>
            </table>

</body>










</html>

