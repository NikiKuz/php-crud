<?php
include_once __DIR__ . '/../pdo/db.php';
$recipes = getAll('recipes');
?>
<h2>All Recipes</h2>
<?php foreach($recipes as $recipe): ?>
  <p>
    <a href="/?app=recipes&view=show&id=<?= $recipe['id'] ?>">
      <?= htmlspecialchars($recipe['title']) ?>
    </a>
  </p>
<?php endforeach; ?>
