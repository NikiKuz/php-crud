<?php 
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

if (!isset($_GET['id'])) {
    die("Review ID is missing.");
}

$reviewId = $_GET['id'];

$review = getById('reviews', $reviewId);

if (!$review) {
    die("Review not found.");
}

delete('reviews', $reviewId);
header("Location: /?app=reviews&view=list");
exit();
?>
