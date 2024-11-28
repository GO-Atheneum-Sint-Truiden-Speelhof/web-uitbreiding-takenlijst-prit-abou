<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="opmaak/bootstrap.css">
    <title>To-Do Lijst</title>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/bootstrap.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">To-Do List</h1>
        <form id="add-task-form" class="mb-4">
            <div class="input-group">
                <input type="text" id="task-name" name="task" class="form-control" placeholder="Nieuwe taak" required>
                <button type="submit" class="btn btn-dark">Toevoegen</button>
            </div>
        </form>
        <div class="mb-3">
            <label for="filter-status" class="form-label">Filter taken:</label>
            <select id="filter-status" class="form-select">
                <option value="all">Alle</option>
                <option value="completed">Voltooid</option>
                <option value="pending">Niet voltooid</option>
            </select>
        </div>
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Taak</th>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody id="task-list">
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function () {
            // Functie om taken te laden
            function loadTasks(filter = 'all') {
                $.ajax({ url: 'post.php', method: 'GET', data: { filter: filter }, success: function (response)
					{
                        $('#task-list').html(response);
                    }
                });
            }
            loadTasks();
            $('#filter-status').change(function () {
                loadTasks($(this).val());
            });

            $('#add-task-form').submit(function (e) {
                e.preventDefault();
                const task = $('#task-name').val();

                $.ajax({ url: 'post.php', method: 'POST', data: { task: task, action: 'add' },
                    success: function () {
                        $('#task-name').val('');
                        loadTasks();
                    }
                });
            });
        });
    </script>
</body>
</html>
