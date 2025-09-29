<?php 
session_start();
include_once __DIR__ . '/../pdo/db.php';

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$GLOBALS['token'] = $_SESSION['token'];

$user = getById('users', $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('Invalid CSRF token');
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $age = $_POST['age'];

  update('users',  [
    'id' => $_GET['id'],
    'username' => $username,
    'password' => $password,
    'age' => $age
  ]);   

  header("Location: /?app=users&view=show&id=" . $_GET['id']);
  exit;
}
?>

<h2>Update User</h2>

<form action="" method="post" class="form">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <div class="form__field">
    <label for="username" class="form__label">Username:</label>
    <input type="text" id="username" name="username" class="form__input" value="<?= htmlspecialchars($user['username']);?>" required>
  </div>
  <div class="form__field">
    <label for="password" class="form__label">Password:</label>
    <input type="password" id="password" name="password" class="form__input" value="<?= htmlspecialchars($user['password']);?>" required>
  </div>
  <div class="form__field">
    <label for="age" class="form__label">Age:</label>
    <input type="number" id="age" name="age" class="form__input" value="<?= htmlspecialchars($user['age']);?>" required>
  </div>

  <button type="submit">Send</button>
</form>
