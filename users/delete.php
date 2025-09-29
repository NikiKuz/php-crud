<?php
session_start();
include_once __DIR__ . '/../pdo/db.php';

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$GLOBALS['token'] = $_SESSION['token'];

$id = $_GET['id'] ?? null;
$user = getById('users', $id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Invalid CSRF token');
    }

    if (!isset($_POST['id']) || empty($_POST['id'])) {
        header('Location: /users/index.php');
        exit();
    }

    $id = (string)$_POST['id'];
    delete('users', $id);

    header('Location: /users/index.php');
    exit();
}
?>

<h2>Delete User</h2>
<p>Are you sure you want to delete user: <b><?= htmlspecialchars($user['username'] ?? '') ?></b>?</p>

<form method="post" onsubmit="return confirm('Are you sure?');">
  <input type="hidden" name="id" value="<?= htmlspecialchars($id ?? '') ?>">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <button type="submit">Delete</button>
</form>

<a href="/users/index.php">Cancel</a>
