<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $user_id = $_GET['user_id'];

    // query the database for the selected row
    $query = "SELECT * FROM student_list WHERE user_id=$user_id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $user_id = $_POST['user_id'];
    $technology = $_POST['technology'];
    $admission_year = $_POST['admission_year'];
    $current_semester = $_POST['current_semester'];
    $user_name = $_POST['user_name'];
    $clg_id = $_POST['clg_id'];
    $roll_no = $_POST['roll_no'];
    $mobile_number = $_POST['mobile_number'];
    $date = $_POST['date'];
    $deposit_category = $_POST['deposit_category'];
    $deposit_amount = $_POST['deposit_amount'];
    $comment = $_POST['comment'];


    // Generate a random number
    do {
        $random_num = rand(1000000, 99999999);
        $query = "SELECT deposit_challan_no FROM fees_deposit WHERE deposit_challan_no = '$random_num'";
        $result = mysqli_query($con, $query);
    } while (mysqli_num_rows($result) > 0);

    // Insert data into the database
    $sql = "INSERT INTO fees_deposit (date, user_id, technology, admission_year, current_semester, user_name, clg_id, roll_no, mobile_number, deposit_category, deposit_amount, comment, deposit_challan_no) 
            VALUES('$date', '$user_id','$technology', '$admission_year', '$current_semester' , '$user_name', '$clg_id' , '$roll_no', '$mobile_number', '$deposit_category', '$deposit_amount', '$comment', '$random_num') ";

    if ($con->query($sql) === TRUE) {

        echo '<script>alert("Your fees have been deposited successfully"); window.location.href = "fees_print.php?id=' . $random_num . '";</script>';

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
    <link rel="stylesheet" href="../css/home.css">
    <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/b3e3482d82.css" crossorigin="anonymous"> -->

    <title>Fees Deposit Form</title>
</head>

<body>


    <!--  -->
    <div id="Tab2" class="tabcontent">
        <div class="container text-center">
            <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
            <p class="fs-4">Fill the form for Deposit Student Fees.</p>
            <a class="text-decoration-none" href="../home.php">
                <h3 class="text-center">Home</h3>
            </a>
            <a class="text-decoration-none" href="fees_depositor_find.php">
                <h5 class="text-center">Back to Previous Page</h5>
            </a>
            <hr>
        </div>

        <div class="container text-center">
            <form class="row g-3 d-flex" action="fees_deposit_form.php" method="POST">
                <p class="fs-5">Student Details</p>
                <div class="col-md-4">
                    <input type="text" name="user_id" id="user_id" class="form-control"
                        value="<?php echo $row['user_id']; ?>" readonly>
                </div>
                <br>
                <div class="col-md-4">
                    <input type="text" name="technology" id="technology" class="form-control"
                        value="<?php echo $row['technology']; ?>" readonly>
                </div>
                <br>
                <div class="col-md-4">
                    <input type="text" name="admission_year" id="admission_year" class="form-control"
                        value="<?php echo $row['admision_Year']; ?>" readonly>

                </div>
                <br>
                <div class="col-md-4">
                    <input type="text" name="current_semester" id="current_semester" class="form-control"
                        value="<?php echo $row['current_semester']; ?>" readonly>

                </div>
                <br>
                <div class="col-md-4">
                    <input type="text" name="user_name" id="name" class="form-control" readonly
                        value="<?php echo $row['user_name']; ?>">
                </div>
                <br>
                <div class="col-md-4">
                    <input type="text" name="clg_id" id="clgId" class="form-control" readonly
                        value="<?php echo $row['clg_id']; ?>">
                </div>
                <br>
                <div class="col-md-4">
                    <input type="number" name="roll_no" id="Roll" class="form-control" readonly
                        value="<?php echo $row['roll_no']; ?>">
                </div>
                <br>
                <div class="col-md-4">
                    <input type="tel" name="mobile_number" id="name" class="form-control" readonly
                        value="<?php echo $row['mobile_number']; ?>">
                </div>
                <hr>
                <p class="fs-5">Fill the Deposit Form</p>

                <div class="text-center">
                    <div class="row">
                        <div class="col-md-2 offset-md-5">
                            <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"
                                required />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <select name="deposit_category" class="cars form-control" required onchange="changeValue()">
                        <option value="" selected>Select Fees Category</option>
                        <option value="Semester Fees" data-value="8500">Semester Fees</option>
                        <option value="Tuition Fees" data-value="12000">Tuition Fees</option>
                        <option value="Form Fill-Up Fees" data-value="2500">Form Fill-Up Fees</option>
                        <option value="Mid Term Fees" data-value="600">Mid Term Fees</option>
                        <option value="Referred Exam Fees" data-value="800">Referred Exam Fees</option>
                        <option value="Others" data-value="0">Others</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="number" name="deposit_amount" id="deposit_amount" value="" class="form-control"
                        required>
                </div>
                <div class="col-md-12">
                    <input type="text" name="comment" id="comment" placeholder="Comment" class="form-control" required>
                </div>

                <input class="submit btn btn-success" type="submit" value="Save">


            </form>
        </div>

    </div>









    <script>

        function changeValue() {
            var dropdown = document.getElementsByName("deposit_category")[0];
            var inputBox = document.getElementById("deposit_amount");
            inputBox.value = dropdown.options[dropdown.selectedIndex].getAttribute("data-value");
        }

    </script>

</body>

</html>