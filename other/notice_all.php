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

    if (isset($_POST['delete_notice'])) {

        $file = fopen('../json/data_notice.json', 'w');
        fseek($file, 0);
        ftruncate($file, 0);
        fwrite($file, '[]');
        fclose($file);

        echo "<script>alert('Successfully Deleted all Notice data!');
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
    <title>Search Student</title>
</head>

<body>

    <?php
    include '../inc/navbar.php';
    ?>

    <div class="container text-center">
        <a class="text-decoration-none" href="../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">All Notice List</p>
        <hr>
    </div>

    <div class="container text-center">

        <?php
        $json_data = file_get_contents('../json/data_notice.json');
        $data = json_decode($json_data, true);
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="col">U_No</th>
                    <th class="col">Category</th>
                    <th class="col">Title</th>
                    <th class="col">Description</th>
                    <th class="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($data as $row) { ?>
                    <tr>
                        <td>
                            <?php echo $row['inserter_id']; ?>
                        </td>
                        <td>
                            <?php echo $row['cat']; ?>
                        </td>
                        <td>
                            <?php echo $row['title']; ?>
                        </td>
                        <td>
                            <?php echo $row['des']; ?>
                        </td>
                        <td>
                            <button id="delete-<?php echo $i; ?>" class="dlt-notice">Delete</button>
                        </td>
                    </tr>
                    <?php
                    $i++;
                } ?>
            </tbody>
        </table>
        <hr>
    </div>
    <div class="text-center">
        <form action="" method="post">
            <div>
                <input type="hidden" name="delete_notice" value="1">
                <input class="btn btn-danger" type="submit" value="Delete All Notice">
            </div>
        </form>
    </div>



    <!-- Notice Item Delete -->
    <script>
        var deleteButtons = document.getElementsByClassName("dlt-notice");
        for (var i = 0; i < deleteButtons.length; i++) {
            deleteButtons[i].onclick = function () {
                var id = this.id.split("-")[1];
                var btn = 'hos';
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "../delete/dlt_notice.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === "success") {
                            alert("Selected Item Delete Successfully");
                            location.reload();
                        } else {
                            alert("Error deleting item");
                        }
                    }
                }
                xhr.send("id=" + id);
            }
        }
    </script>


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