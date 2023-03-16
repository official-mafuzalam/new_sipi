<?php
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if user has a Type 1 account, otherwise redirect to login page
if ($_SESSION['account_type'] != 'Type 1') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type 1</title>
</head>

<body>
    <h1>Type 1</h1>
    <a href="logout.php">Logout</a>
</body>

</html>