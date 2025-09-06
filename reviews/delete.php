<?php 

include_once $dbPath .  'db.php';

if(isset($_GET['id'])){
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    delete('reviews', $_GET['id']);
    echo '<p>Отзыв успешно удалён.</p>';
    exit;
  }
    
  if (!isset($_POST['confirm'])) {
    echo '<form method="post">';
    echo '<p>Вы уверены, что хотите удалить этот отзыв?</p>';
    echo '<button type="submit" name="confirm" value="yes">Да, удалить</button> ';
    echo '<button type="submit" name="confirm" value="no">Нет, отменить</button>';
    echo '</form>';
    exit;
  }
  if ($_POST['confirm'] === 'no') {
    echo '<p>Удаление отменено.</p>';
    exit;
  }
    
}
