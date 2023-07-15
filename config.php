<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teatri_db"; // Nome do banco de dados

$dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("An error ocurred during connection try: " . $e->getMessage());
}
?>