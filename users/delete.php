<?php 
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

if (!isset($_GET['id'])) {
    die("User ID is missing.");
}

$userId = $_GET['id'];
$user = getById('users', $userId);

if (!$user) {
    die("User not found.");
}

delete('users', $userId);
header("Location: /?app=users&view=list");
exit();
?>
