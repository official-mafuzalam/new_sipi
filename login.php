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

    require_once 'authentication/conn.php';

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
                header("Location: users/administration.php");
            } else {
                header("Location: users/teacher.php");
            }
        } else {
            $message = 'Invalid username or password';
        }
    } else {
        $message = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form class="row g-3 col-md-6" action="" method="post">
            <?php if ($message != '') { ?>
                <p>
                    <?php echo $message; ?>
                </p>
            <?php } ?>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username</span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Password</span>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                    aria-describedby="basic-addon1">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" name="login" class="btn btn-primary">Sign in</button>
            </div>
            <div class="col-12 text-center mt-3">
                Don't have an account? <a href="register.php">Register here</a>.
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>