<?php

// Set the timezone to Bangladesh
date_default_timezone_set('Asia/Dhaka');
include '../../inc/conn.php';
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['w_type'])) {
    header('Location: ../../login.php');
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];
$session_technology = $_SESSION['technology'];

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
    include '../../inc/navbar.php';
    ?>

    <div class="container text-center">
        <h3 class="text-center">All Student List</h3>
        <hr>
    </div>

    <div class="container">

        <table class="table table-striped table-hover" id="table">

            <?php

            $sql = "SELECT * FROM student_list ORDER BY id ASC";
            // or bus_name like '%$search%'
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '
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
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                ';
                while ($row = mysqli_fetch_assoc($result)) {

                    echo '
                                    <tbody>

                                        <tr>

                                            <td>
                                                ' . $row['id'] . '
                                            </td>
                                            <td>
                                                ' . $row['user_id'] . '
                                            </td>
                                            <td>
                                                ' . $row['roll_no'] . '
                                            </td>
                                            <td>
                                                ' . $row['clg_id'] . '
                                            </td>
                                            <td>
                                                ' . $row['user_name'] . '
                                            </td>
                                            <td>
                                                ' . $row['technology'] . '
                                            </td>
                                            <td>
                                                ' . $row['admision_Year'] . '
                                            </td>
                                            <td>
                                                ' . $row['current_semester'] . '
                                            </td>
                                            <td>
                                                ' . $row['mobile_number'] . '
                                            </td>
                                            <td>
                                                ' . $row['email'] . '
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning">
                                                    <a class="text-decoration-none" href="../other/update_student_details.php?id=' . $row['id'] . '">Edit</a>
                                                </button>
                                            </td>

                                        </tr>

                                    </tbody>';
                }
                ;
            } else {
                echo 'Do not found in database';
            }

            ?>

        </table>

        <strong>
            <p class="fs-3" id="value"></p>
        </strong>

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