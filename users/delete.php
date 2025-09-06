<?php 
include_once $dbPath . 'db.php';
include_once $secPath . 'token.php';

if (!isset($_GET['id'])) {
    die("User ID is missing.");
}

$userId = $_GET['id'];
$user = getById('users', $userId);

if (!$user) {
    die("User not found.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['token']) || !validateToken($_POST['token'])) {
        die("Invalid CSRF token.");
    }

    delete('users', $userId);
    header("Location: /?app=$app&view=list");
    exit();
}
?>

<h2>Delete User</h2>
<p>Are you sure you want to delete user <strong><?= htmlspecialchars($user['username']); ?></strong>?</p>

<form action="" method="post" onsubmit="return confirm('Are you sure you want to delete this user?');">
    <input type="hidden" name="token" value="<?= generateToken(); ?>">
    <button type="submit">Delete</button>
</form>

<a href="/?app=users&view=list">Cancel</a>
