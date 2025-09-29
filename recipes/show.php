<?php
include_once __DIR__ . '/../pdo/db.php';
$recipe = getById('recipes', $_GET['id']);
?>
<h2>Recipe Details</h2>
<table class="table">
  <tr><td>Title</td><td><?= htmlspecialchars($recipe['title']) ?></td></tr>
  <tr><td>Description</td><td><?= htmlspecialchars($recipe['description']) ?></td></tr>
  <tr><td>Kcal</td><td><?= htmlspecialchars($recipe['kcal']) ?></td></tr>
  <tr><td>Created at</td><td><?= $recipe['created_at'] ?></td></tr>
  <tr><td>Updated at</td><td><?= $recipe['updated_at'] ?></td></tr>
</table>
<a href="?app=recipes&view=update&id=<?= $recipe['id'] ?>">Update</a>
<form action="?app=recipes&view=delete&id=<?= $recipe['id'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Are you sure?');">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <button type="submit">Delete</button>
</form>
