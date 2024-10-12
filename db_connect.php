<?php
// parametres of connexion to the database
$host = 'localhost';
$dbname = 'todolist'; 
$username = 'root'; 
$password = ''; 


try {
    // conenect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // when we have an error we go to the page of errors 'erreur.php'
    header("Location: erreur.php");
    exit();
}
?>
