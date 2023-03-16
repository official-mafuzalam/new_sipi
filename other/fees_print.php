<?php

include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $deposit_challan_no = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM fees_deposit WHERE deposit_challan_no=$deposit_challan_no";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

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

    <title>Student Data Update</title>
</head>

<body>

    <div class="container">
        <div class="container text-center">
            <h2 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h2>
            <a class="text-decoration-none" href="../home.php">
                <h5 class="text-center">Fees Deposit Slip</h5>
            </a>
        </div>
        <hr>
    </div>

    <!--  -->
    <div>
        <div class="container">
            <div class="row text-center">
                <p>Student Copy</p>
                <div class="col">
                    <p class="fs-4 fw-bold text-info">Challan No :
                        <?php echo $row['deposit_challan_no']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">User id :
                        <?php echo $row['user_id']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Technology :
                        <?php echo $row['technology']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Date :
                        <?php echo $row['insert_date']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Year :
                        <?php echo $row['admission_year']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Semester :
                        <?php echo $row['current_semester']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Name :
                        <?php echo $row['user_name']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Collage Id :
                        <?php echo $row['clg_id']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Roll No :
                        <?php echo $row['roll_no']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Mobile Number :
                        <?php echo $row['mobile_number']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Deposit Category :
                        <?php echo $row['deposit_category']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Deposit Amount :
                        <?php echo $row['deposit_amount']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Comment :
                        <?php echo $row['comment']; ?>
                    </p>
                </div>
            </div>
        </div>
        <hr>
        <div class="container">
            <div class="row text-center">
                <p>Collage Copy</p>
                <div class="col">
                    <p class="fs-4 fw-bold text-info">Challan No :
                        <?php echo $row['deposit_challan_no']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">User id :
                        <?php echo $row['user_id']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Technology :
                        <?php echo $row['technology']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Date :
                        <?php echo $row['insert_date']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Year :
                        <?php echo $row['admission_year']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Semester :
                        <?php echo $row['current_semester']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Name :
                        <?php echo $row['user_name']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Collage Id :
                        <?php echo $row['clg_id']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Roll No :
                        <?php echo $row['roll_no']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Mobile Number :
                        <?php echo $row['mobile_number']; ?>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="fw-bold">Deposit Category :
                        <?php echo $row['deposit_category']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Deposit Amount :
                        <?php echo $row['deposit_amount']; ?>
                    </p>
                </div>
                <div class="col">
                    <p class="fw-bold">Comment :
                        <?php echo $row['comment']; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="container text-center">
            <button class="btn btn-info" onclick="window.print()">Print</button>
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