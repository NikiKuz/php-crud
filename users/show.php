<?php
include_once __DIR__ . '/../pdo/db.php';

$id = isset($_GET['id']) ? (string)$_GET['id'] : '';
if ($id === '') {
    header('Location: /users/error.php');
    exit();
}

// Получаем пользователя
$user = getById('users', $id);

// Если пользователь не найден
if (!$user) {
    header('Location: /users/error.php'); // можно заменить на /error.php
    exit();
}
?>
<h2>User Details</h2>
<table class="table">
  <tr class="table__row">
    <td class="table__cell">Username</td>
    <td class="table__cell">Age</td>
    <td class="table__cell">Password</td>
  </tr>
  <tr class="table__row">
    <td class="table__cell"><?= htmlspecialchars($user['username']) ?></td>
    <td class="table__cell"><?= htmlspecialchars($user['age']) ?></td>
    <td class="table__cell"><?= htmlspecialchars($user['password']) ?></td>
  </tr>
</table>

<a href="?app=<?= $app ?>&view=update&id=<?= $user['id'] ?>">Update</a>

<form action="/users/delete.php" method="post" style="display:inline;">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <button type="submit" onclick="return confirm('Are you sure you want to delete this user?');">
        Delete
    </button>
</form>
