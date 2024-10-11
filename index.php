<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-App</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <header class="header">
        <nav>
            <h2>TodoList</h2>
        </nav>
    </header>
    <div class="task">    
        <input type="text" placeholder="Task Title">
        <button type="submit" name="value" class="add">Add</button>
    </div>
    <div class="list">
        <div class="todo success">
            <span>Study English</span>
            <div class="manipulate-task">
                <button type="submit" name="action">undo</button>
                <button type="submit" name="action">X</button>
            </div>
         </div>
        <div class="todo warning">
            <span>Follow git&github course</span>
            <div class="manipulate-task">
                <button type="submit" name="action">done</button>
                <button type="submit" name="action">X</button>
            </div>
         </div>
        <div class="todo warning">
            <span>Arroser les plants</span>
            <div class="manipulate-task">
                <button type="submit" name="action">done</button>
                <button type="submit" name="action">X</button>
            </div>
         </div>
        <div class="todo success">
            <span>Acheve le riz de lait</span>
            <div class="manipulate-task">
                <button type="submit" name="action">Undo</button>
                <button type="submit" name="action">X</button>
            </div>
         </div>
    </div>
</body>
</html>