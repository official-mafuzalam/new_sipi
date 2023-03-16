<?php

include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $id = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM teacher WHERE sno=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $id_post = $_POST['sno'];
    $user_name = $_POST['user_name'];
    $technology = $_POST['technology'];
    $position = $_POST['position'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    // update the data in the database
    $sql = "UPDATE teacher SET  user_name='$user_name', technology='$technology', position='$position', mobile_number='$mobile_number', email='$email' WHERE sno='$id_post'";


    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Data Update Successfully"); window.location.href = "../index.php";</script>';

    } else {
        echo "Error updating record ";
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

    <title>Teacher Data</title>
</head>

<body>


    <!--  -->
    <div id="Tab2" class="tabcontent">
        <div class="container text-center">
            <h2 class="text-center">Teacher Data Update System</h2>
        </div>
        <a class="text-decoration-none" href="../">
            <h1 class="text-center">Home</h1>
        </a>

        <div class="container text-center">
            <form class="form-inline" action="update_teacher_details.php" method="POST">
                <div class="input-group">
                    <input type="text" name="sno" id="sno" class="form-control" value="<?php echo $row['sno']; ?>"
                        readonly>
                </div>
                <br>
                <div class="input-group">
                    <select name="technology" id="technology" class="cars form-control" required>
                        <option value="" selected>Select a Technology</option>
                        <option value="Computer" <?php if ($row['technology'] == 'Computer')
                            echo 'selected'; ?>>Computer
                        </option>
                        <option value="Graphic" <?php if ($row['technology'] == 'Graphic')
                            echo 'selected'; ?>>Graphic
                        </option>
                        <option value="RAC" <?php if ($row['technology'] == 'RAC')
                            echo 'selected'; ?>>RAC</option>
                        <option value="Civil" <?php if ($row['technology'] == 'Civil')
                            echo 'selected'; ?>>Civil</option>
                        <option value="Electronic" <?php if ($row['technology'] == 'Electronic')
                            echo 'selected'; ?>>
                            Electronic</option>
                        <option value="Electrical" <?php if ($row['technology'] == 'Electrical')
                            echo 'selected'; ?>>
                            Electrical</option>
                        <option value="Architecture" <?php if ($row['technology'] == 'Architecture')
                            echo 'selected'; ?>>
                            Architecture</option>
                        <option value="Mechanical" <?php if ($row['technology'] == 'Mechanical')
                            echo 'selected'; ?>>
                            Mechanical</option>
                        <option value="Others" <?php if ($row['technology'] == 'Others')
                            echo 'selected'; ?>>Others
                        </option>
                    </select>

                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="user_name" id="name" class="form-control" placeholder="Name" required
                        value="<?php echo $row['user_name']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="position" id="position" class="form-control" placeholder="Position"
                        required value="<?php echo $row['position']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="mobile_number" id="mobile_number" class="form-control"
                        placeholder="Mobile number" required value="<?php echo $row['mobile_number']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="email" id="name" class="form-control" placeholder="Email" required
                        value="<?php echo $row['email']; ?>">
                </div>
                <br>
                <input class="submit btn btn-success save-btn" type="submit" value="Save">

            </form>
        </div>

    </div>

</body>

</html>