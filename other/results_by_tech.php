<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
include '../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header("Location: ../login.php");
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];

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
    <title>Search Results</title>

</head>

<body>

    <div class="container text-center">
        <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
        <p class="fs-4">Find result by semester & technology & subject.</p>
        <a class="text-decoration-none" href="../">
            <h3 class="text-center">Home</h3>
        </a>
        <hr>
    </div>

    <div class="container text-center">
        <form class="row g-3 d-flex" role="search" method="POST">
            <div class="col-md-4">
                <div class="input-group">
                    <select name="semester" id="semester" class="cars form-control" required>
                        <option value="" selected>Select Semester</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <select name="technology" id="technology" class="cars form-control" required>
                        <option value="" selected>Select a Technology</option>
                        <option value="Computer">Computer</option>
                        <option value="Graphic">Graphic</option>
                        <option value="RAC">RAC</option>
                        <option value="Civil">Civil</option>
                        <option value="Electronic">Electronic</option>
                        <option value="Electrical">Electrical</option>
                        <option value="Architecture">Architecture</option>
                        <option value="Mechanical">Mechanical</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <button name="submit_search" type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>
    </div>

    <div class="container">

        <?php
        // Retrieve the book names from the database based on the search query
        if (isset($_POST['submit_search'])) {
            $search_technology = $_POST['technology'];
            $search_semester = $_POST['semester'];
            $sql = "SELECT book_name FROM `subject_by_semester` WHERE technology ='$search_technology' && semester='$search_semester' ORDER BY s_no ASC";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<form method="POST">';
                echo '<input type="hidden" name="technology" value="' . $search_technology . '">';
                echo '<input type="hidden" name="semester" value="' . $search_semester . '">';
                echo '<select class="cars form-control" name="book_name" id="book_name">';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['book_name'] . '">' . $row['book_name'] . '</option>';
                }
                echo '</select>';
                echo '<br>';
                echo '<button type="submit" class="btn btn-primary" name="submit_result">Submit</button>';
                echo '</form>';
            } else {
                echo 'No books found.';
            }


        }
        ?>


    </div>

    <div class="container">

        <table class="table table-striped table-hover" id="table">

            <?php

            if (isset($_POST['submit_result'])) {
                $search_technology = $_POST['technology'];
                $search_semester = $_POST['semester'];
                $search_book_name = $_POST['book_name'];
                $sql = "SELECT * FROM `marks_db` WHERE semester='$search_semester' && technology ='$search_technology' && subject ='$search_book_name' ORDER BY id ASC";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo '
                    <table class="table table-striped table-hover" id="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Roll No</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Technology</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Marks</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['user_id'] . '</td>
                                <td>' . $row['roll_no'] . '</td>
                                <td>' . $row['user_name'] . '</td>
                                <td>' . $row['technology'] . '</td>
                                <td>' . $row['semester'] . '</td>
                                <td>' . $row['subject'] . '</td>
                                <td>' . $row['marks'] . '</td>
                                <td>
                                    <button type="button" class="btn btn-warning">
                                        <a class="text-decoration-none" href="update_result.php?id=' . $row['id'] . '">Edit</a>
                                    </button>
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