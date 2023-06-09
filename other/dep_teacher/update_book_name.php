<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
include '../../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header("Location: ../../login.php");
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $id = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM subject_by_semester WHERE s_no =$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $id_post = $_POST['s_no'];
    $book_name = $_POST['book_name'];

    // update the data in the database
    $sql = "UPDATE subject_by_semester SET book_name ='$book_name', inserter_id = '$session_user_id' WHERE s_no = '$id_post'";


    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Data Update Successfully"); window.location.href = "book_list.php";</script>';

    } else {
        echo "Error updating record: ";
    }

    $con->close();
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/home.css">
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/b3e3482d82.css" crossorigin="anonymous"> -->

    <title>Book Name Update</title>
</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Fill the form for update details.</p>
        <hr>
    </div>

    <div class="container text-center">
        <form class="form-inline" action="update_book_name.php" method="POST">
            <div class="input-group">
                <input type="text" name="s_no" class="form-control" value="<?php echo $row['s_no']; ?>" readonly>
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="technology" class="form-control" placeholder="Name" readonly
                    value="<?php echo $row['technology']; ?>">
            </div>
            <br>
            <div class="input-group">
                <input type="text" name="semester" class="form-control" placeholder="Name" readonly
                    value="<?php echo $row['semester']; ?>">
            </div>
            <br>
            <div class="input-group">
                <input type="tel" name="book_name" class="form-control" placeholder="Email" required
                    value="<?php echo $row['book_name']; ?>">
            </div>
            <br>
            <input class="submit btn btn-success save-btn" type="submit" value="Update">

        </form>
    </div>


</body>

</html>