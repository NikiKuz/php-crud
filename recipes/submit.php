<?php
require_once 'token.php';

echo "<h2>POST dump_update</h2>";
var_dump($_POST);
echo "<hr>";

echo "<h2>Session dump</h2>";
var_dump($_SESSION);
echo "<hr>";

echo "<h2>Server dump</h2>";
var_dump($_SERVER);
echo "<hr>";

echo "<h2>Cookie dump</h2>";
var_dump($_COOKIE);
echo "<hr>";

echo "<h2>Request dump</h2>";
var_dump($_REQUEST);
echo "<hr>";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {	
	$token = $_POST['token'];

	if (validateToken($token)) {
    	echo "Form submitted successfully.<br>";
    	echo "description: " . htmlspecialchars($description) . "<br>";
    	echo "title: " . htmlspecialchars($title) . "<br>";
		echo "kcal: " . htmlspecialchars($kcal) . "<br>";		
	} else {
    	echo "Invalid CSRF token.";
	}
} else {
	echo "Invalid request method.";
}
?>
