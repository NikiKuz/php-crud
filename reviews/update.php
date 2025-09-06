<?php 
session_start();
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

$review = getById('reviews', $_GET['id']);

if (!empty($_POST)) {
    
  if (!isset($_POST['token']) || !validateToken($_POST['token'])) {
        die("Invalid CSRF token.");
    }
	
    if (isset($_POST['name'], $_POST['review'], $_POST['rate'], $_GET['id'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $reviewText = htmlspecialchars(trim($_POST['review']));
        $rate = (int) $_POST['rate'];
        $reviewId = (int) $_GET['id'];

        $updatedAt = new DateTimeImmutable('now', new DateTimeZone('Europe/Moscow'));
        $updatedAtFormatted = $updatedAt->format('Y-m-d H:i:s');

        if (!empty($name) && !empty($reviewText) && $rate >= 1 && $rate <= 5) {
            update('reviews', [
                'id' => $reviewId,
                'name' => $name,
                'review' => $reviewText,
                'rate' => $rate,
                'updated_at' => $updatedAtFormatted
            ]);

            header("Location: /?app=$app&view=show&id=$reviewId");
            exit();
        } else {
            echo "Пожалуйста, заполните все поля корректно.";
        }
    } else {
        echo "Некорректные данные.";
    }
}
?>

<h2>
  Update Review
</h2>
<form action="" method="post" class="form">
  <div class="form__field">
    <label for="name" class="form__label">Name:</label>
    <input type="text" id="name" name="name" class="form__input" value="<?= htmlspecialchars($review['name']); ?>">
  </div>
  <div class="form__field">
    <label for="review" class="form__label">Review:</label>
    <textarea id="review" name="review" rows="10" cols="70"><?= htmlspecialchars($review['review']); ?></textarea>
  </div>
  <div class="form__field">
    <label for="rate" class="form__label">Rate (1-5):</label>
    <input type="number" id="rate" name="rate" class="form__input" value="<?= (int) $review['rate']; ?>" min="1" max="5">
  </div>

  <input type="hidden" name="token" value="<?= generateToken(); ?>">
  
  <button type="submit">Update Review</button>
</form>
