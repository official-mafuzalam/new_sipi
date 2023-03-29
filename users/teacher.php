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

// Check if user has a Type 2 account, otherwise redirect to login page
if ($_SESSION['w_type'] != 3) {
    header("Location: ../index.php");
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];
$session_technology = $_SESSION['technology'];


// If any REQUEST_METHOOD work need use this

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     if (isset($_POST[''])) {

//     }

// }


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
    <link rel="stylesheet" href="../css/home.css">
    <link rel="shortcut icon" href="../images/sipi.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/b3e3482d82.css" crossorigin="anonymous"> -->

    <title>SIPI Management</title>
</head>

<body>

    <?php
    include '../inc/navbar.php';
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a class="tab nav-link" onclick="openTab(event, 'Tab1')" id="defaultOpen">
                                <i class="fs-4 bi-grid"></i>
                                <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab2')">
                                <i class="fs-4 bi-mortarboard"></i>
                                <span class="ms-1 d-none d-sm-inline">Student</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab3')">
                                <i class="fs-4 bi-bell"></i>
                                <span class="ms-1 d-none d-sm-inline">Notice</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab4')">
                                <i class="fs-4 bi-bar-chart-line-fill"></i>
                                <span class="ms-1 d-none d-sm-inline">Results</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab5')">
                                <i class="fs-4 bi-currency-dollar"></i>
                                <span class="ms-1 d-none d-sm-inline">Deposit Quarry</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab6')">
                                <i class="fs-4 bi-book"></i>
                                <span class="ms-1 d-none d-sm-inline">Book List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col py-3">

                <div id="Tab1" class="tabcontent">

                    <img src="../images/sipi.png" class="rounded mx-auto d-block" alt="...">
                    <h1 class="text-center fw-bold">Shyamoli Ideal Polytechnic Institute</h1>
                    <h3 class="text-center">Dhaka</h3>

                    <strong>
                        <p class="text-center fs-5" id="date"></p>
                    </strong>
                    <?php

                    // Total Student Count
                    $sql = "SELECT COUNT(*) as total FROM student_list";
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_assoc($result);
                    $total_students = $row['total'];

                    // 
                    $query_d = "SELECT COUNT(*) FROM student_list WHERE technology = '$session_technology'";
                    $result_d = mysqli_query($con, $query_d);
                    $row_d = mysqli_fetch_assoc($result_d);
                    $count_d = $row_d["COUNT(*)"];
                    // 
                    $query_t = "SELECT COUNT(*) FROM teacher WHERE technology = '$session_technology'";
                    $result_t = mysqli_query($con, $query_t);
                    $row_t = mysqli_fetch_assoc($result_t);
                    $count_t = $row_t["COUNT(*)"];

                    // echo "<p class='text-center fs-3'>Total Student : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . $total_students . "</span></p>";
                    
                    $sql_t = "SELECT COUNT(*) as total FROM teacher"; // using alias 'total' for clarity
                    $result = mysqli_query($con, $sql_t);

                    $row = mysqli_fetch_assoc($result); // fetch the result as an associative array
                    $total_teacher = $row['total']; // access the value using the alias
                    
                    // echo "<p class='text-center fs-3'>Total Teacher : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . $total_teacher . "</span></p>";
                    

                    // Image Slider Data
                    $json_data = file_get_contents("../json/data_notice.json");
                    $data = json_decode($json_data, true);

                    // echo "<p class='text-center fs-3'>Currently running notice : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . count($data) . "</span></p>";
                    
                    // Get the current date
                    // $current_date = date("Y-m-d");
                    
                    // // Query the database to get the sum of deposit amounts for the current date
                    // $sql = "SELECT SUM(deposit_amount) as total_amount FROM fees_deposit WHERE date = '$current_date'";
                    // $result = mysqli_query($con, $sql);
                    
                    // // Fetch the result as an associative array
                    // $row = mysqli_fetch_assoc($result);
                    
                    // // Access the sum using the alias
                    // $total_amount = $row['total_amount'];
                    
                    ?>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-primary bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Total Student</h5>
                                    <p class="card-text fs-3">
                                        <?php echo $total_students ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                        echo "$session_technology Total Students";
                                        ?>
                                    </h5>
                                    <p class="card-text fs-3">
                                        <?php
                                        echo $count_d;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-success bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Total Teacher</h5>
                                    <p class="card-text fs-3">
                                        <?php
                                        echo $total_teacher;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php
                                        echo "$session_technology Total Teacher";
                                        ?>
                                    </h5>
                                    <p class="card-text fs-3">
                                        <?php
                                        echo $count_t;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-danger bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Running Notice</h5>
                                    <p class="card-text fs-3">
                                        <?php echo count($data); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  -->
                <div id="Tab2" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Student Section</h3>
                    </div>

                    <hr>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/dep_teacher/student_add_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-person-fill-add"></i>
                                        <h5 class="card-title">Add Student</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-primary bg-opacity-50">
                                <a class="text-decoration-none"
                                    href="../other/dep_teacher/student_list_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-people"></i>
                                        <h5 class="card-title">All Student</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none" href="../other/dep_teacher/student_search.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-search"></i>
                                        <h5 class="card-title">Search Student</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-danger bg-opacity-75">
                                <a class="text-decoration-none"
                                    href="../other/dep_teacher/update_semester_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-pencil-square"></i>
                                        <h5 class="card-title">Update Semester</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none" href="../other/dep_teacher/attendance_history.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-pencil-square"></i>
                                        <h5 class="card-title">Attendance History</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab End -->

                <!--  -->
                <div id="Tab3" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Notice Section</h3>
                    </div>

                    <hr>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/notice_add.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-plus-circle-fill"></i>
                                        <h5 class="card-title">Add Notice</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none" href="../other/notice_all.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-table"></i>
                                        <h5 class="card-title">All Notice</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab End -->

                <!--  -->
                <div id="Tab4" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Result Section</h3>
                    </div>

                    <hr>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none"
                                    href="../other/dep_teacher/result_publish_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-pencil-square"></i>
                                        <h5 class="card-title">Result Publish</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none"
                                    href="../other/dep_teacher/result_check_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-bar-chart-line-fill"></i>
                                        <h5 class="card-title">Results</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab End -->

                <!--  -->
                <div id="Tab5" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Fees Deposit Section Section</h3>
                    </div>

                    <hr>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/dep_teacher/fees_deposit_history.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-currency-dollar"></i>
                                        <h5 class="card-title">Deposit Quarry</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab End -->


                <!--  -->
                <div id="Tab6" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Course Section</h3>
                    </div>

                    <hr>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/dep_teacher/book_list_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-book"></i>
                                        <h5 class="card-title">Book List</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab End -->
















                <!--  -->
                <button type="button" class="btn btn-danger btn-floating btn-lg" id="btn-back-to-top">
                    <i class="bi bi-arrow-up"></i>
                </button>

            </div>
        </div>
    </div>











    <script>
        function openTab(evt, tabName) {
            // Get all elements with class="tabcontent" and hide them
            let tabcontent = document.getElementsByClassName("tabcontent");
            for (let i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            // Get all elements with class="tab" and remove the class "active"
            let tablinks = document.getElementsByClassName("tab");
            for (let i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        // Open the default tab (Tab 1)
        document.getElementById("defaultOpen").click();
    </script>

    <script>
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerText = n;

    </script>

    <script>
        //Get the button
        let mybutton = document.getElementById("btn-back-to-top");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction();
        };

        function scrollFunction() {
            if (
                document.body.scrollTop > 20 ||
                document.documentElement.scrollTop > 20
            ) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }
        // When the user clicks on the button, scroll to the top of the document
        mybutton.addEventListener("click", backToTop);

        function backToTop() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
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