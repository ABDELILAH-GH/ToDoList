<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-App</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
// include the (erreur.php) for generate the errors of xampp
require_once "erreur.php";
// include the file of connexion
require_once "db_connect.php";
$tasks = [];

// generate the insertion, delete 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // verify if the action receives the SQL request
    $action = $_POST['action'] ?? '';
    // return the task from the form
    $task = $_POST['task'] ?? '';
    // return the id of the task if it was received
    $taskId = $_POST['id'] ?? 0;

    // if the action equals new and not empty, then add new task
    if ($action === 'new' && !empty($task)) {
        // insert new task
        $sql = "INSERT INTO todo (title) VALUES (:task)";
        // prepare the request to avoid SQL injection
        $stmt = $pdo->prepare($sql);
        // execute the request
        $stmt->execute(['task' => $task]);

        // Redirection pour éviter la duplication lors de l'actualisation
        header("Location: index.php");
        exit();  // Terminer l'exécution après la redirection

    // if the action equals delete and not empty, then delete the task
    } elseif ($action === 'delete' && !empty($taskId)) {
        // prepare the request to delete 
        $sql = "DELETE FROM todo WHERE id = :id";
        // prepare the execution of the request
        $stmt = $pdo->prepare($sql);
        // execute 
        $stmt->execute(['id' => $taskId]);

        // 
        header("Location: index.php");
        exit();

    // if the action equals toggle and not empty, then toggle the status of the task
    } elseif ($action === 'toggle' && !empty($taskId)) {
        // prepare the request to update 
        $sql = "UPDATE todo SET done = 1 - done WHERE id = :id";
        // prepare for execution
        $stmt = $pdo->prepare($sql);
        // execute 
        $stmt->execute(['id' => $taskId]);

        //
        header("Location: index.php");
        exit();
    }
}

// return the tasks, sorted by creation date in descending order
$sql = "SELECT * FROM todo ORDER BY created_at DESC";   
// execute the request to return the tasks 
$stmt = $pdo->query($sql);
// fetch all the tasks in the form of an associative array
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

    <header class="header">
        <nav>
            <h2>TodoList</h2>
        </nav>
    </header>

    <div class="task">   
        <form action="index.php" method="POST"> 
              <input type="hidden" name="action" value="new">
              <input type="text" name="task" placeholder="Task Title" required>
              <button type="submit" class="add">Add</button>
        </form>
    </div>

    <div class="list">
        <?php foreach ($tasks as $tache): ?>
            <!-- show one each of task -->
            <div class="todo  <?php echo $tache['done'] ? 'success line-through' : 'warning'; ?>">
                <!-- show the title of task -->
                <span><?php echo htmlspecialchars($tache['title']); ?></span>
                <div class="manipulate-task"> 
                    <!-- Form to toggle task status (done/undo) -->
                    <form method="POST" action="index.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $tache['id']; ?>">
                        <button type="submit" name="action" value="toggle" class="done">
                            <?php echo $tache['done'] ? 'Undo' : 'Done'; ?>
                        </button>
                    </form>
                    <!-- Form to delete task -->
                    <form method="POST" action="index.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $tache['id']; ?>">
                        <button type="submit" name="action" value="delete" class="delete">X</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
