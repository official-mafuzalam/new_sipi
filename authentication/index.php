<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

$pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare('SELECT account_type FROM users WHERE username = :username');
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['account_type'] == 'Type 1') {
    header("Location: type1.php");
} elseif ($user['account_type'] == 'Type 2') {
    header("Location: type2.php");
} else {
    header("Location: login.php");
    exit(); // Add this line to stop executing the rest of the script
}
?>