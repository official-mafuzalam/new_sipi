<?php

include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $id = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM marks_db WHERE id=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $id = $_POST['id'];
    $marks = $_POST['marks'];

    // update the data in the database
    $sql = "UPDATE marks_db SET  marks = '$marks' WHERE id = '$id'";


    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Marks Update Successfully"); window.location.href = "../home.php";</script>';

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

    <title>Student Result Update</title>
</head>

<body>


    <!--  -->
    <div id="Tab2" class="tabcontent">
        <div class="container text-center">
            <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
            <p class="fs-4">Fill the form for update details.</p>
            <a class="text-decoration-none" href="../home.php">
                <h3 class="text-center">Home</h3>
            </a>
        </div>

        <div class="container text-center">
            <form class="form-inline" method="POST">
                <div class="input-group">
                    <input type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>" readonly>
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="user_id" class="form-control" disabled
                        value="<?php echo $row['user_id']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="roll_no" class="form-control" disabled
                        value="<?php echo $row['roll_no']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="user_name" class="form-control" disabled
                        value="<?php echo $row['user_name']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="technology" class="form-control" disabled
                        value="<?php echo $row['technology']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="semester" class="form-control" disabled
                        value="<?php echo $row['semester']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="subject" class="form-control" disabled
                        value="<?php echo $row['subject']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="marks" class="form-control" required value="<?php echo $row['marks']; ?>">
                </div>
                <br>
                <input class="submit btn btn-success save-btn" name="submit_marks" type="submit" value="Update">

            </form>
        </div>

    </div>

</body>

</html>