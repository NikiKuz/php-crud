<?php 

include_once $dbPath .  'db.php';

if(isset($_GET['id'])){
  delete('reviews', $_GET['id']);
  header("Location: /?app=$app&view=list");
}
