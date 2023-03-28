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

$book_name = $_POST['book_name'];
$technology = $_POST['technology'];
$semester = $_POST['semester'];

?>

<!-- HTML File -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Update Semester</title>

</head>

<body>

    <?php
    include '../../inc/navbar.php';
    ?>
    <div class="container text-center">
        <a class="text-decoration-none" href="../../">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
        </a>
        <p class="fs-4">Fill the marks form and save for publish result.</p>
        <hr>
    </div>

    <div class="container text-center">
        <?php

        echo '<h5>' . "Technology: " . $technology . '</h5>';
        echo '<h5>' . "Semester: " . $semester . '</h5>';
        echo '<h5>' . "Subject: " . $book_name . '</h5>';

        ?>
    </div>

    <div class="container">

        <table class="table table-striped table-hover" id="table">

            <?php

            if (isset($_POST['semester'])) {
                $search_technology = $_POST['technology'];
                $search_semester = $_POST['semester'];
                $sql = "SELECT * FROM `student_list` WHERE current_semester='$search_semester' && technology ='$search_technology' ORDER BY id ASC";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo '<hr>
                    <table class="table table-striped table-hover" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Roll No</th>
                                <th scope="col">Collage Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Year</th>
                                <th scope="col">C. Semester</th>
                                <th scope="col">Marks</th>
                            </tr>
                        </thead>
                        <tbody>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <tr>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['user_id'] . '</td>
                            <td>' . $row['roll_no'] . '</td>
                            <td>' . $row['clg_id'] . '</td>
                            <td>' . $row['user_name'] . '</td>
                            <td>' . $row['technology'] . '</td>
                            <td>' . $row['admision_Year'] . '</td>
                            <td>' . $row['current_semester'] . '</td>
                            <td>
                                <form method="POST" id="marks_form_' . $row['user_id'] . '">
                                    <input type="hidden" name="user_id" value="' . $row['user_id'] . '">
                                    <input type="hidden" name="user_name" value="' . $row['user_name'] . '">
                                    <input type="hidden" name="roll_no" value="' . $row['roll_no'] . '">
                                    <input type="hidden" name="current_semester" value="' . $row['current_semester'] . '">
                                    <input type="hidden" name="technology" value="' . $row['technology'] . '">
                                    <input type="hidden" name="subject" value="' . $book_name . '">
                                    <input type="number" name="marks">
                                    <button type="submit" name="submit_marks">Save</button>
                                </form>
                            </td>
                        </tr>';
                    }

                    echo '</tbody></table>';
                } else {
                    echo 'Data not found in the database';
                }
            }
            ?>
        </table>
    </div>


    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- AJAX script -->
    <script>
        $(document).ready(function () {
            $('form[id^="marks_form"]').submit(function (event) {
                event.preventDefault(); // prevent default form submission behavior

                // get form data
                var formData = $(this).serialize();

                // send form data to server
                $.ajax({
                    type: 'POST',
                    url: 'result_process_marks.php', // specify the URL of the server-side script that handles form data
                    data: formData,
                    success: function (response) {
                        console.log(response); // display response from server in console
                        alert('Data saved successfully!'); // show success message
                    },
                    error: function () {
                        alert('Error occurred while saving data!'); // show error message
                    }
                });
            });
        });
    </script>


    <!-- Bootstrap Script Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Script Link -->
</body>

</html>