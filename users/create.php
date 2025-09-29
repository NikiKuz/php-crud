<?php 
session_start();
include_once __DIR__ . '/../pdo/db.php';

if (!isset($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$GLOBALS['token'] = $_SESSION['token'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('Invalid CSRF token');
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $age = $_POST['age'];

  $id = create('users', [
    'username' => $username,
    'password' => $password,
    'age' => $age
  ]);

  if ($id) {
    header('Location: /users/show.php?id=' . $id);
    exit();
  } else {
    header('Location: error.php');
    exit();
  }
}
?>

<h2>Create User</h2>

<form action="" class="form" method="post">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <div class="form__field">
    <label for="username" class="form__label">
      Username:
    </label>
    <input type="text" id="username" name="username" class="form__input" required>
  </div>
  <div class="form__field">
    <label for="password" class="form__label">
      Password:
    </label>
    <input type="password" id="password" name="password" class="form__input" required>
  </div>
  <div class="form__field">
    <label for="age" class="form__label">
      Age:
    </label>
    <input type="number" id="age" name="age" class="form__input" required>
  </div>
  <button type="submit">Send</button>
</form>
