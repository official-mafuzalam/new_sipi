<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

require_once 'conn.php';
if (isset($_POST['register']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['account_type'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $account_type = $_POST['account_type'];
    $sql = "INSERT INTO users (username, password, account_type) VALUES ('$username', '$password', '$account_type')";
    if (mysqli_query($con, $sql)) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}
mysqli_close($con);
?>

<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="conteiner text-center col-md-6">
        <h2>Register</h2>
        <form action="" method="post" class="form-floating">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" placeholder="User Name">
                <label for="floatingInput">User Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" placeholder="password">
                <label for="floatingInput">Password</label>
            </div>
            <select name="account_type" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option value="Type 1">Type 1</option>
                <option value="Type 2">Type 2</option>
            </select>


            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>

</html>