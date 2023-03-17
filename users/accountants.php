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
        $data[] = array(
            "inserter_id" => $session_user_id,
            "cat" => $category,
            "title" => $title,
            "des" => $des
        );

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
                                <i class="fs-4 bi-person-fill-add"></i>
                                <span class="ms-1 d-none d-sm-inline">Add Student</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab3')">
                                <i class="fs-4 bi-people"></i>
                                <span class="ms-1 d-none d-sm-inline">All Student</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" href="../other/student_list.php">
                                <i class="fs-4 bi-search"></i>
                                <span class="ms-1 d-none d-sm-inline">Search Student</span>
                            </a>
                        </li>
                        <hr>
                        <li>
                            <a class="tab nav-link" onclick="openTab(event, 'Tab9')">
                                <i class="fs-4 bi-bell"></i>
                                <span class="ms-1 d-none d-sm-inline">Notice Board</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" href="../other/results_by_tech.php">
                                <i class="fs-4 bi-bar-chart-line-fill"></i>
                                <span class="ms-1 d-none d-sm-inline">Results</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" href="../other/fees_depositor_find.php">
                                <i class="fs-4 bi-currency-dollar"></i>
                                <span class="ms-1 d-none d-sm-inline">Fees Deposit</span>
                            </a>
                        </li>
                        <li>
                            <a class="tab nav-link" href="../other/daily_deposit_quarry.php">
                                <i class="fs-4 bi-currency-dollar"></i>
                                <span class="ms-1 d-none d-sm-inline">Deposit Quarry</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col py-3">

                <div id="Tab1" class="tabcontent">
                    <h1 class="text-center fw-bold">Shyamoli Ideal Polytechnic Institute</h1>
                    <h3 class="text-center">Dashboard</h3>

                    <strong>
                        <p class="text-center fs-5" id="date"></p>
                    </strong>
                    <?php

                    $sql = "SELECT COUNT(*) as total FROM student_list"; // using alias 'total' for clarity
                    $result = mysqli_query($con, $sql);

                    $row = mysqli_fetch_assoc($result); // fetch the result as an associative array
                    $total_students = $row['total']; // access the value using the alias
                    
                    // echo "<p class='text-center fs-3'>Total Student : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . $total_students . "</span></p>";
                    
                    // $sql_t = "SELECT COUNT(*) as total FROM teacher"; // using alias 'total' for clarity
                    // $result = mysqli_query($con, $sql_t);
                    
                    // $row = mysqli_fetch_assoc($result); // fetch the result as an associative array
                    // $total_teacher = $row['total']; // access the value using the alias
                    
                    // echo "<p class='text-center fs-3'>Total Teacher : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . $total_teacher . "</span></p>";
                    

                    // Image Slider Data
                    $json_data = file_get_contents("../json/data_notice.json");
                    $data = json_decode($json_data, true);

                    // echo "<p class='text-center fs-3'>Currently running notice : <span class='text-center fs-4 fw-bold badge text-bg-info'>" . count($data) . "</span></p>";
                    
                    // Get the current date
                    $current_date = date("Y-m-d");

                    // Query the database to get the sum of deposit amounts for the current date
                    $sql = "SELECT SUM(deposit_amount) as total_amount FROM fees_deposit WHERE date = '$current_date'";
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
                                        <?php echo $total_students ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="card text-center bg-success bg-opacity-75">
                                <div class="card-body">
                                    <h5 class="card-title">Total Teacher</h5>
                                    <p class="card-text fs-3">
                                        <?php
                                        // echo $total_teacher
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div> -->
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
                                    <h5 class="card-title">Today Deposit Amount</h5>
                                    <p class="card-text fs-3">
                                        <?php echo $total_amount ?>
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

                    <div class="container text-center">
                        <form class="form-inline" action="accountants.php" method="POST">
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
                            <br>
                            <div class="input-group">
                                <select name="admision_Year" id="admisionYear" class="cars form-control" required>
                                    <option value="" selected>Select Seasons</option>
                                    <option value="18-19">18-19</option>
                                    <option value="19-20">19-20</option>
                                    <option value="20-21">20-21</option>
                                    <option value="21-22">21-22</option>
                                    <option value="22-23">22-23</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <br>
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
                            <br>
                            <div class="input-group">
                                <input type="text" name="user_name" id="name" class="form-control" placeholder="Name"
                                    required>
                            </div>
                            <br>
                            <div class="input-group">
                                <select name="gender" id="admisionYear" class="cars form-control" required>
                                    <option value="" selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="text" name="clg_id" id="clgId" class="form-control"
                                    placeholder="Collage ID" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="number" name="roll_no" id="Roll" class="form-control" placeholder="Roll no"
                                    required>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="tel" name="mobile_number" id="name" class="form-control"
                                    placeholder="Mobile number" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <input type="tel" name="email" id="name" class="form-control" placeholder="Email"
                                    required>
                            </div>
                            <br>
                            <input class="submit btn btn-success save-btn" name="student_submit" type="submit"
                                value="Save">

                        </form>
                    </div>

                </div>

                <!-- Tab End -->


                <div id="Tab3" class="tabcontent">

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

                </div>

                <!--  -->
                <div id="Tab9" class="tabcontent">
                    <div class="container text-center">
                        <h3 class="text-center">Notice Board</h3>
                        <p class="fs-4">Fill the form for add a New Notice for student's.</p>
                        <hr>
                    </div>
                    <div class="container text-center upload-section">
                        <form action="accountants.php" method="post">
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
                                <input class="form-control" type="text" name="title" placeholder="Notice Title"
                                    required>
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
                    <div class="container text-center">

                        <p class="fs-4">All Notice</p>
                        <hr>

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
                        <form action="accountants.php" method="post">
                            <div>
                                <input type="hidden" name="delete_notice" value="1">
                                <input class="btn btn-danger" type="submit" value="Delete All Data">
                            </div>
                        </form>
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