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
        <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
        <p class="fs-4">Find student by semester & technology.</p>
        <a class="text-decoration-none" href="../../">
            <h3 class="text-center">Home</h3>
        </a>
    </div>

    <div class="container text-center">
        <h3 class="text-center">Student Add System</h3>
        <p class="fs-4">Fill the form for add a new student in database.</p>
        <hr>
    </div>
    <div class="container text-center">
        <h3 class="text-center">All Teacher List</h3>
        <hr>
    </div>

    <div class="container">

        <table class="table table-striped table-hover" id="table">

            <?php

            $sql = "SELECT * FROM teacher ORDER BY sno ASC";
            // or bus_name like '%$search%'
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">User Id</th>
                                        <th scope="col">Teacher Name</th>
                                        <th scope="col">Technology</th>
                                        <th scope="col">Position</th>
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
                                                ' . $row['sno'] . '
                                            </td>
                                            <td>
                                                ' . $row['user_id'] . '
                                            </td>
                                            <td>
                                                ' . $row['user_name'] . '
                                            </td>
                                            <td>
                                                ' . $row['technology'] . '
                                            </td>
                                            <td>
                                                ' . $row['position'] . '
                                            </td>
                                            <td>
                                                ' . $row['mobile_number'] . '
                                            </td>
                                            <td>
                                                ' . $row['email'] . '
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-warning">
                                                    <a class="text-decoration-none" href="../other/update_teacher_details.php?id=' . $row['sno'] . '">Edit</a>
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