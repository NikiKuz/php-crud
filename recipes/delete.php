<?php 

include_once $dbPath .  'db.php';

if(isset($_GET['id'])){
  delete('recipes', $_GET['id']);
  header("Location: /?app=$app&view=list");
}
