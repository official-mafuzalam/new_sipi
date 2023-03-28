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
if ($_SESSION['w_type'] != 4) {
    header("Location: ../index.php");
    exit();
}

$session_user_id = $_SESSION['user_id'];
$session_user_name = $_SESSION['username'];

// $sql = "SELECT * FROM teacher WHERE user_id = '$user_id'";
// $result = mysqli_query($con, $sql);

// if ($result) {
//     $row = mysqli_fetch_assoc($result);
//     $email = $row['email'];
// } else {
//     echo "Error retrieving password: " . mysqli_error($con);
// }



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['student_submit'])) {

        $technology = $_POST['technology'];
        $admision_Year = $_POST['admision_Year'];
        $semester = $_POST['semester'];
        $user_name = $_POST['user_name'];
        $gender = $_POST['gender'];
        $clg_id = $_POST['clg_id'];
        $roll_no = $_POST['roll_no'];
        $mobile_number = $_POST['mobile_number'];
        $email = $_POST['email'];

        if (mysqli_connect_errno())
            echo "Couldn't connect to Database! <br>";

        // Generate a random number
        do {
            $random_num = rand(1000, 9999);
            $query = "SELECT user_id FROM student_list WHERE user_id = '$random_num'";
            $result = mysqli_query($con, $query);
        } while (mysqli_num_rows($result) > 0);

        // Insert data into the database
        $sql = "INSERT INTO student_list (user_id, technology, admision_Year, current_semester, user_name, gender, clg_id, roll_no, mobile_number, email, inserter_id) 
        VALUES('$random_num','$technology', '$admision_Year','$semester' , '$user_name', '$gender' , '$clg_id' , '$roll_no', '$mobile_number', '$email', '$session_user_id') ";
        $result = mysqli_query($con, $sql);


        if ($result)
            echo "<script>alert('Student Data Inserted Successfully')
            window.location.href = 'index.php';
            </script>";
        else
            echo "Query error!";

    } elseif (isset($_POST['notice_submit'])) {

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

    } elseif (isset($_POST['delete_notice'])) {

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

    <nav class="navbar sticky-top bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-brand">

                <?php

                echo "User no: " . "<strong>" . $session_user_id . "</strong>";
                echo "  Name:" . " <strong>" . $session_user_name . "</strong>";

                ?>

            </div>
            <div class="d-flex" role="search">
                <a class="text-decoration-none" href="../logout.php">
                    <i class="fs-5 bi-box-arrow-right"></i>
                    <strong>Logout</strong>
                </a>
            </div>
        </div>
    </nav>

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
                            <a data-bs-toggle="collapse" class="tab nav-link" onclick="openTab(event, 'Tab2')">
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

                    // Total Teacher Count
                    $sql_t = "SELECT COUNT(*) as total FROM teacher";
                    $result = mysqli_query($con, $sql_t);

                    $row = mysqli_fetch_assoc($result);
                    $total_teacher = $row['total'];


                    // Notice Data
                    $json_data = file_get_contents("../json/data_notice.json");
                    $data = json_decode($json_data, true);


                    // Get the current date
                    $current_date = date("Y-m-d");

                    // Query the database to get the sum of deposit amounts for the current date
                    $sql = "SELECT SUM(deposit_amount) as total_amount FROM fees_deposit WHERE inserter_id = '$session_user_id' AND date = '$current_date'";
                    $result = mysqli_query($con, $sql);

                    // Fetch the result as an associative array
                    $row = mysqli_fetch_assoc($result);

                    // Access the sum using the alias
                    $total_amount = $row['total_amount'];

                    ?>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-primary bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Total Student</h5>
                                    <p class="card-text fs-3">
                                        <?php echo $total_students; ?>
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
                            <div class="card text-center bg-danger bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Running Notice</h5>
                                    <p class="card-text fs-3">
                                        <?php echo count($data); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Your Today Deposit Amount</h5>
                                    <p class="card-text fs-3">
                                        <?php
                                        if ($total_amount == null) {
                                            echo "0.00৳";
                                        } else {

                                            echo $total_amount . "৳";
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!--  -->
                <div id="Tab2" class="tabcontent">

                    <div class="container text-center">
                        <h3 class="text-center">Student Add System</h3>
                        <p class="fs-4">Fill the form for add a new student in database.</p>
                        <hr>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/student_add_dep_teacher.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-person-fill-add"></i>
                                        <h5 class="card-title">Add Student</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-primary bg-opacity-50">
                                <a class="text-decoration-none" href="../other/student_list.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-people"></i>
                                        <h5 class="card-title">All Student</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none" href="../other/student_list.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-search"></i>
                                        <h5 class="card-title">Search Student</h5>
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
                        <h3 class="text-center">Student Add System</h3>
                        <p class="fs-4">Fill the form for add a new student in database.</p>
                        <hr>
                    </div>

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
                        <h3 class="text-center">Student Add System</h3>
                        <p class="fs-4">Fill the form for add a new student in database.</p>
                        <hr>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-info bg-opacity-75">
                                <a class="text-decoration-none" href="../other/results_by_tech.php">
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
                        <h3 class="text-center">Student Add System</h3>
                        <p class="fs-4">Fill the form for add a new student in database.</p>
                        <hr>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/fees_depositor_find.php">
                                    <div class="card-body text-black">
                                        <i class="fs-4 bi-currency-dollar"></i>
                                        <h5 class="card-title">Fees Deposit</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-center bg-warning bg-opacity-75">
                                <a class="text-decoration-none" href="../other/daily_deposit_quarry.php">
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
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
        crossorigin="anonymous"></script>

    <!-- Bootstrap Script Link -->
</body>

</html>