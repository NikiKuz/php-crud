<?php 
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

if (!isset($_GET['id'])) {
    die("Recipe ID is missing.");
}

$recipeId = $_GET['id'];
$recipe = getById('recipes', $recipeId);

if (!$recipe) {
    die("Recipe not found.");
}

delete('recipes', $recipeId);
header("Location: /?app=recipes&view=list");
exit();
?>
