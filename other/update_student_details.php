<?php

include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $id = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM student_list WHERE id=$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $id_post = $_POST['id'];
    $roll_no = $_POST['roll_no'];
    $clg_id = $_POST['clg_id'];
    $user_name = $_POST['user_name'];
    $technology = $_POST['technology'];
    $admission_year = $_POST['admission_year'];
    $current_semester = $_POST['current_semester'];
    $mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];

    // update the data in the database
    $sql = "UPDATE student_list SET  roll_no='$roll_no', clg_id='$clg_id', user_name='$user_name', technology='$technology', admision_year='$admission_year', current_semester='$current_semester', mobile_number='$mobile_number', email='$email' WHERE id='$id_post'";


    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Data Update Successfully"); window.location.href = "../home.php";</script>';

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

    <title>Student Data Update</title>
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
            <form class="form-inline" action="update_student_details.php" method="POST">
                <div class="input-group">
                    <input type="text" name="id" id="id" class="form-control" value="<?php echo $row['id']; ?>"
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
                    <select name="admission_year" id="admisionYear" class="cars form-control" required>
                        <option value="" selected>Select Seasons</option>
                        <option value="18-19" <?php if ($row['admision_Year'] == '18-19')
                            echo 'selected'; ?>>18-19
                        </option>
                        <option value="19-20" <?php if ($row['admision_Year'] == '19-20')
                            echo 'selected'; ?>>19-20
                        </option>
                        <option value="20-21" <?php if ($row['admision_Year'] == '20-21')
                            echo 'selected'; ?>>20-21
                        </option>
                        <option value="21-22" <?php if ($row['admision_Year'] == '21-22')
                            echo 'selected'; ?>>21-22
                        </option>
                        <option value="22-23" <?php if ($row['admision_Year'] == '22-23')
                            echo 'selected'; ?>>22-23
                        </option>
                        <option value="Others" <?php if ($row['admision_Year'] == 'Others')
                            echo 'selected'; ?>>Others
                        </option>
                    </select>

                </div>
                <br>
                <div class="input-group">
                    <select name="current_semester" id="semester" class="cars form-control" required>
                        <option value="" selected>Select Semester</option>
                        <option value="1st" <?php if ($row['current_semester'] == '1st')
                            echo 'selected'; ?>>1st</option>
                        <option value="2nd" <?php if ($row['current_semester'] == '2nd')
                            echo 'selected'; ?>>2nd</option>
                        <option value="3rd" <?php if ($row['current_semester'] == '3rd')
                            echo 'selected'; ?>>3rd</option>
                        <option value="4th" <?php if ($row['current_semester'] == '4th')
                            echo 'selected'; ?>>4th</option>
                        <option value="5th" <?php if ($row['current_semester'] == '5th')
                            echo 'selected'; ?>>5th</option>
                        <option value="6th" <?php if ($row['current_semester'] == '6th')
                            echo 'selected'; ?>>6th</option>
                        <option value="7th" <?php if ($row['current_semester'] == '7th')
                            echo 'selected'; ?>>7th</option>
                        <option value="8th" <?php if ($row['current_semester'] == '8th')
                            echo 'selected'; ?>>8th</option>
                        <option value="Others" <?php if ($row['current_semester'] == 'Others')
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
                    <select name="gender" id="gender" class="cars form-control" required>
                        <option value="" selected>Select Gender</option>
                        <option value="Male" <?php if ($row['gender'] == 'Male')
                            echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($row['gender'] == 'Female')
                            echo 'selected'; ?>>Female</option>
                        <option value="Others" <?php if ($row['gender'] == 'Others')
                            echo 'selected'; ?>>Others</option>
                    </select>

                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="clg_id" id="clgId" class="form-control" placeholder="Collage ID" required
                        value="<?php echo $row['clg_id']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="number" name="roll_no" id="Roll" class="form-control" placeholder="Roll no" required
                        value="<?php echo $row['roll_no']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="mobile_number" id="name" class="form-control" placeholder="Mobile number"
                        required value="<?php echo $row['mobile_number']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="email" id="name" class="form-control" placeholder="Email" required
                        value="<?php echo $row['email']; ?>">
                </div>
                <br>
                <input class="submit btn btn-success save-btn" type="submit" value="Update">

            </form>
        </div>

    </div>

</body>

</html>