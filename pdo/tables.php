<?php

require_once 'connection.php';

try {
    
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY auto_increment,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        age VARCHAR(3) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP        
    )";

    $pdo->exec($sql);
    echo "Table 'users' created successfully.";
    
   $sql = "id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255) NOT NULL,
    kcal VARCHAR(3) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    echo "Table 'recipes' created successfully.";


    $sql = "CREATE TABLE IF NOT EXISTS reviews (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(50) NOT NULL,
        review TEXT NOT NULL,
        rate TINYINT UNSIGNED NOT NULL CHECK (rate BETWEEN 1 AND 5),
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    echo "Table 'reviews' created successfully.";

} catch (PDOException $e) {
    echo $e->getMessage();
}
