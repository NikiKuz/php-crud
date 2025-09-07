<?php 
include_once $dbPath .  'db.php';
$users = getAll('users');
?>

<h2>
  All Users
</h2>
<table style="width:80%" cellpadding="5" cellspacing="0" border="1">
 <thead>
    <tr bgcolor="lightgray">
      <th>id</th>
      <th>username</th>
      <th>age</th>
      <th>created</th>
      <th>updated</th>
      <th>action</th>
    </tr>
  </thead>
<?php foreach($users as $user): ?>
  <tr>
    <td>
      <a href="/?app=<?= $app ?>&view=show&id=<?= $user['id'] ?>"><?= $user['id'] ?> </a>
    </td>
    <td>
      <?= $user['username'] ?>
    </td>
    <td>
      <?= $user['age'] ?>
    </td>
    <td>
      <?= $user['created_at'] ?>
    </td>
    <td>
      <?= $user['updated_at'] ?>
    <td>
      <a href="/?app=users&view=delete&id=<?= $user['id'] ?>" onclick="return confirm('Вы уверены, что хотите удалить этого пользователя?');">Удалить</a>
    </td>
  </tr>
<?php endforeach; ?>
</table>
<?php ?>
