<?php
include_once __DIR__ . '/../pdo/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!isset($_POST['token']) || $_POST['token'] !== $_SESSION['token']) {
    die('Invalid CSRF token');
  }
  $title = $_POST['title'];
  $description = $_POST['description'];
  $kcal = $_POST['kcal'];
  $now = (new DateTime())->format('Y-m-d H:i:s');
  $id = create('recipes', [
    'title' => $title,
    'description' => $description,
    'kcal' => $kcal,
    'created_at' => $now,
    'updated_at' => $now
  ]);
  if ($id) {
    header("Location: /?app=recipes&view=show&id=$id");
    exit;
  } else {
    echo 'Error';
  }
}
?>
<h2>Create Recipe</h2>
<form action="" method="post" class="form">
  <input type="hidden" name="token" value="<?= htmlspecialchars($GLOBALS['token']) ?>">
  <div class="form__field">
    <label for="title" class="form__label">Title:</label>
    <input type="text" id="title" name="title" class="form__input" required>
  </div>
  <div class="form__field">
    <label for="description" class="form__label">Description:</label>
    <textarea id="description" name="description" class="form__input" required></textarea>
  </div>
  <div class="form__field">
    <label for="kcal" class="form__label">Kcal:</label>
    <input type="number" id="kcal" name="kcal" class="form__input" required>
  </div>
  <button type="submit">Send</button>
</form>
