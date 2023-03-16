<?php

// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
include '../inc/conn.php';

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
    <title>Daily Deposit</title>

</head>

<body>

    <div class="container text-center">
        <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
        <p class="fs-4">Find Daily Total Deposit by Date.</p>
        <a class="text-decoration-none" href="../home.php">
            <h3 class="text-center">Home</h3>
        </a>
    </div>

    <div class="container text-center">
        <form class="row g-3 d-flex" role="search" method="POST">
            <div class="col-md-2 offset-md-4">
                <input name="date" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
            </div>
            <div class="col-md-2">
                <button name="submit_search" type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>

    </div>

    <div class="container">
        <hr>
        <p class="fs-4 fw-bold text-center">All Transaction</p>

        <table class="table table-striped table-hover">

            <?php

            if (isset($_POST['submit_search'])) {

                $date = $_POST['date'];

                $sql = "SELECT * FROM `fees_deposit` WHERE date ='$date' ORDER BY s_no ASC";
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
                                <th scope="col">C. Semester</th>
                                <th scope="col">Deposit Category</th>
                                <th scope="col">Deposit Amount</th>
                                <th scope="col">Comment</th>
                                <th scope="col">Challan No</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>';

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                            <tr>
                                <td>' . $row['s_no'] . '</td>
                                <td>' . $row['user_id'] . '</td>
                                <td>' . $row['roll_no'] . '</td>
                                <td>' . $row['user_name'] . '</td>
                                <td>' . $row['current_semester'] . '</td>
                                <td>' . $row['deposit_category'] . '</td>
                                <td>' . $row['deposit_amount'] . '</td>
                                <td>' . $row['comment'] . '</td>
                                <td>' . $row['deposit_challan_no'] . '</td>
                                <td>
                                    <button type="button" class="btn btn-warning">
                                        <a class="text-decoration-none" href="fees_print.php?id=' . $row['deposit_challan_no'] . '">Print</a>
                                    </button>
                                </td>
                            </tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo 'No Transaction found in the database';
                }
            }

            ?>

        </table>

    </div>
    <div class="container">
        <button onclick="getSumValue()" class="btn btn-info">Total Deposit</button>
        <p class="fs-3" id="value"></p>
    </div>



    <script>

        function getSumValue() {
            var table = document.getElementById("table");
            var total = 0;
            for (var i = 1; i < table.rows.length; i++) {
                var depositAmount = parseFloat(table.rows[i].cells[6].innerHTML);
                if (!isNaN(depositAmount)) {
                    total += depositAmount;
                }
            }
            document.getElementById("value").innerHTML = "Total Deposit Amount: " + total;
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