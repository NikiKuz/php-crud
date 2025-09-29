<?php
// файл db/connection.php

// Для подключения к СУБД MySQL можно задать такие настройки:

// $user = 'user'; //имя пользователя, по умолчанию это root
// $pass = 'user'; //пароль, по умолчанию пустой

// $host = 'localhost'; //имя или адрес хоста, где находится СУБД, на локальном компьютере это localhost
// $db = 'app_db'; //имя базы данных
// $port = 3306; // номер порта для СУБД MySQL по умолчанию - 3306, для СУБД PostggreSQL - 5432
// $charset = 'utf8mb4';
// $dsn = "mysql:dbname=$db;host=$host;port=$port;charset=$charset";


$user = 'root'; // имя пользователя MariaDB
$pass = 'root'; // пароль MariaDB
$host = 'localhost'; // обычно localhost
$db = 'app_db'; // имя вашей базы данных
$port = 3306; // порт MariaDB по умолчанию
$charset = 'utf8mb4';
$dsn = "mysql:dbname=$db;host=$host;port=$port;charset=$charset";

// try {
//     $pdo = new PDO($dsn, $user, $pass, [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,    
//     ]); // Для подключения к MariaDB
//     if(!isset($pdo) || !pdo){
//         die("PDO is not set");
//     }
//     // echo 'PDO DB connected'; // На этапе отладки можно раскомментировать эту строку. Тогда сообщение будет выведено на экран. В дальнейшем это сообщение будет мешать. 
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }


try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    if(!isset($pdo) || !$pdo){
        die("PDO is not set");
    }
} catch (PDOException $e) {
    die("DB connection failed: " . $e->getMessage());
}
