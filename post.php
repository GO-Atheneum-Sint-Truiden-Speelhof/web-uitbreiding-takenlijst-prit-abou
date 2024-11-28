
<?php
include 'includes/functies.php';

$conn = maakVerbinding();

$action = $_POST['action'] ?? $_GET['action'] ?? null;

if ($action === 'add' && isset($_POST['task'])) {
    $task = $_POST['task'];
    $stmt = $conn->prepare("INSERT INTO tasks (task, status, created_at) VALUES (?, 'pending', NOW())");
    $stmt->bind_param("s", $task);
    $stmt->execute();
    echo "Taak toegevoegd";
} elseif ($action === 'delete' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Taak verwijderd";
} elseif ($action === 'update' && isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("UPDATE tasks SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    echo "Taak bijgewerkt";
} else {
    $filter = $_GET['filter'] ?? 'all';
    $query = "SELECT * FROM tasks";
    if ($filter === 'completed') {
        $query .= " WHERE status = 'completed'";
    } elseif ($filter === 'pending') {
        $query .= " WHERE status = 'pending'";
    }
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['task']}</td>
                <td>{$row['status']}</td>
                <td>
                    <button class='btn btn-sm btn-success' onclick='markAsCompleted({$row['id']})'>Voltooid</button>
                    <button class='btn btn-sm btn-danger' onclick='deleteTask({$row['id']})'>Verwijderen</button>
                </td>
              </tr>";
    }
}

$conn->close();
