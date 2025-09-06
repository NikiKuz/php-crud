<?php

$user = 'root';
$pass = 'root';

$host = 'localhost';
$db = 'app_db';
$port = 3306;
$charset = 'utf8mb4';
$dsn = "mysql:dbname=$db;host=$host;port=$port;charset=$charset";

$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'pdo' . DIRECTORY_SEPARATOR;

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
