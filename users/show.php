<?php 

include_once $dbPath .  'db.php';

$user = getById('users', $_GET['id']);
?>
<h2>
  User Details
</h2>
<table class="table">
  <tr class="table__row">
    <td class="table__cell">Username</td>
    <td class="table__cell">Age</td>
    <td class="table__cell">Created</td>
  </tr>
  <tr class="table__row">
    <td class="table__cell"><?= $user['username'] ?></td>
    <td class="table__cell"><?= $user['age'] ?></td>
    <td class="table__cell"><?= $user['created_at'] ?></td>
  </tr>
</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $user['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $user['id'] ?>">Delete</a>
