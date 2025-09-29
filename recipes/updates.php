<?php
include_once __DIR__ . '/../pdo/db.php';

$recipe = getById('recipes', $_GET['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('Invalid CSRF token');
  }
  $title = $_POST['title'];
  $description = $_POST['description'];
  $kcal = $_POST['kcal'];
  $now = (new DateTime())->format('Y-m-d H:i:s');
  update('recipes', [
    'id' => $_GET['id'],
    'title' => $title,
    'description' => $description,
    'kcal' => $kcal,
    'updated_at' => $now
  ]);
  header("Location: /?app=recipes&view=show&id=" . $_GET['id']);
  exit;
}
?>
<h2>Update Recipe</h2>
<form action="" method="post" class="form">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <div class="form__field">
    <label for="title" class="form__label">Title:</label>
    <input type="text" id="title" name="title" class="form__input" value="<?= htmlspecialchars($recipe['title']) ?>" required>
  </div>
  <div class="form__field">
    <label for="description" class="form__label">Description:</label>
    <textarea id="description" name="description" class="form__input" required><?= htmlspecialchars($recipe['description']) ?></textarea>
  </div>
  <div class="form__field">
    <label for="kcal" class="form__label">Kcal:</label>
    <input type="number" id="kcal" name="kcal" class="form__input" value="<?= htmlspecialchars($recipe['kcal']) ?>" required>
  </div>
  <button type="submit">Send</button>
</form>
