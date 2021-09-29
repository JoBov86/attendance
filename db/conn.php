<?php
    // development local connection
    // $host = "localhost";
    // $db = "attendance_db";
    // $user = "root";
    // $pass = "";
    // $charset = "utf8mb4";

    // remote database connection
    $host = "sql4.freesqldatabase.com";
    $db = "sql4441010";
    $user = "sql4441010";
    $pass = "nMQVgtUv7N";
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
require_once "user.php";
$crud = new Crud($pdo);
$user = new User($pdo);

$user->insertUser("admin", "password");
?>