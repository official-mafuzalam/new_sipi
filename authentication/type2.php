<?php

include 'conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if user has a Type 2 account, otherwise redirect to login page
if ($_SESSION['account_type'] != 'Type 2') {
    header("Location: login.php");
    exit();
}

$user_name = $_SESSION['username'];
$sql = "SELECT account_type FROM users WHERE username = '$user_name'";
$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $account_type = $row['account_type'];
} else {
    echo "Error retrieving password: " . mysqli_error($con);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Type 2</title>
</head>

<body>
    <h1>
        <?php echo $user_name ?>
    </h1>
    <h1>
        <?php echo count($_SESSION) ?>
    </h1>
    <?php
    foreach ($_SESSION as $key => $value) {
        echo "$key => $value<br>";
    }
    ?>

    <a href="logout.php">Logout</a>
</body>

</html>