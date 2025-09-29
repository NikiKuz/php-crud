<?php
session_start();
include_once __DIR__ . '/../pdo/db.php';

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];

$id = $_GET['id'] ?? null;

$user = null;
if ($id !== null) {
    $user = getById('users', (string)$id);
}

if (!$user) {
    header('Location: /users/index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
        die('Invalid CSRF token');
    }

    $idToDelete = $_POST['id'] ?? null;
    if ($idToDelete === null) {
        header('Location: /users/index.php');
        exit();
    }

    delete('users', (string)$idToDelete);

    header('Location: /users/index.php');
    exit();
}
?>

<h2>Delete User</h2>
<p>Are you sure you want to delete user: <b><?= htmlspecialchars($user['username']) ?></b>?</p>

<form method="post" onsubmit="return confirm('Are you sure?');">
  <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
  <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
  <button type="submit">Delete</button>
</form>

<a href="/users/index.php">Cancel</a>
