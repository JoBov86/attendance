<?php
    $host = "localhost";
    $db = "attendance_db";
    $user = "root";
    $pass = "";
    $charset = "utf8mb4";

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    // echo "Hello Database";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // echo "<h1 class='text-danger'>No Database Found!</h1>";
    throw new PDOException($e->getMessage());
}
require_once "crud.php";
$crud = new Crud($pdo);
?>