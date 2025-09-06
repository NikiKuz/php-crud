<?php 
session_start();
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

$recipe = getById('recipes', $_GET['id']);

if (!empty($_POST)) {
    if (!isset($_POST['token']) || !validateToken($_POST['token'])) {
        die("Invalid CSRF token.");
    }

    $title = $_POST['title'];
    $description = $_POST['description'];
    $kcal = $_POST['kcal'];
    $recipeId = $_GET['id'];

    $updatedAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Moscow'));
    $updatedAtFormatted = $updatedAt->format('Y-m-d H:i:s');

    update('recipes', [
        'id' => $recipeId,
        'title' => $title,
        'description' => $description,
        'kcal' => $kcal,
        'updated_at' => $updatedAtFormatted
    ]);

    header("Location: /?app=$app&view=show&id=$recipeId");
    exit();
}
?>

<h2>
  Update recipe
</h2>
<form action="" method="post" class="form">
  <div class="form__field">
    <label for="title" class="form__label">
      Recipe:
    </label>
    <input type="text" id="title" name="title" class="form__input" value="<?= htmlspecialchars($recipe['title']); ?>">
  </div>
  <div class="form__field">
    <label for="description" class="form__label">
     Description:
    </label>    
    <textarea id="description" name="description" rows="10" cols="70"><?= htmlspecialchars($recipe['description']); ?></textarea>
  </div>
  <div class="form__field">
    <label for="kcal" class="form__label">
     kcal:
    </label>
    <input type="number" id="kcal" name="kcal" class="form__input" value="<?= htmlspecialchars($recipe['kcal']); ?>">
  </div>

  <input type="hidden" name="token" value="<?= generateToken(); ?>">

  <button type="submit">Update recipe</button>
</form>
