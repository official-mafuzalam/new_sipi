<?php

// Set the timezone to Bangladesh
date_default_timezone_set('Asia/Dhaka');
include '../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header('Location: ../login.php');
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];
$session_technology = $_SESSION['technology'];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['notice_submit'])) {

        $category = $_POST['category'];
        $title = $_POST['title'];
        $des = $_POST['desc'];

        // Read the existing JSON object from the file
        $json_data = file_get_contents("../json/data_notice.json");
        $data = json_decode($json_data, true);

        // Add the new form data to the object
        $new_data = array(
            'inserter_id' => $session_user_id,
            'cat' => $category,
            'title' => $title,
            'des' => $des
        );

        // Add the new data to the beginning of the existing array
        array_unshift($data, $new_data);

        // Convert the modified object to a JSON object
        $json_data = json_encode($data);

        // Save the JSON object to the file
        file_put_contents("../json/data_notice.json", $json_data);

        echo "<script>alert('Successfully submitted Notice data');
    window.location.href = 'index.php';
    </script>";
    }
}

?>

<!-- HTML File -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Notice Add</title>
</head>

<body>

    <?php
    include '../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Fill the form for add a new Notice in database.</p>
        <hr>
    </div>


    <div class="container text-center">
        <div class="container text-center upload-section">
            <form action="" method="post">
                <div class="input-group">
                    <select name="category" class="cars form-control" required>
                        <option value="" selected>Select Category</option>
                        <option value="Admission">Admission</option>
                        <option value="Due Payment">Due Payment</option>
                        <option value="Form Fill-Up">Form Fill-Up</option>
                        <option value="Admit Card">Admit Card</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <input class="form-control" type="text" name="title" placeholder="Notice Title" required>
                </div>
                <br>
                <div class="input-group">
                    <textarea class="form-control" type="text" name="desc" placeholder="Notice Description"
                        required> </textarea>
                </div>
                <br>
                <input class="btn btn-success" name="notice_submit" type="submit" value="Submit">
            </form>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- Bootstrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
        </script>

    <!-- Bootstrap Script Link -->
</body>

</html>