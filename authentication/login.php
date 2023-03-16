<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

$message = '';

if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    // Check if the username and password are correct
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'conn.php';

    $stmt = $con->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['account_type'] = $user['account_type']; // add account type to session
            if ($user['account_type'] == 'Type 1') {
                header("Location: type1.php");
            } else {
                header("Location: type2.php");
            }
        } else {
            $message = 'Invalid username or password';
        }
    } else {
        $message = 'Invalid username or password';
    }
}
?>

<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="container text-center col-md-6">
        <h2>Login</h2>
        <form action="" method="post" class="form-floating">
            <?php if ($message != '') { ?>
                <p>
                    <?php echo $message; ?>
                </p>
            <?php } ?>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" placeholder="user id">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="password">
                <label for="floatingInput">Password</label>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>

    <p>Don't have an account yet? <a href="register.php">Register here</a>.</p>

</body>

</html>