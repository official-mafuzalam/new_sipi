<?php

include '../inc/conn.php';

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    $id = $_GET['id'];

    // query the database for the selected row
    $query = "SELECT * FROM subject_by_semester WHERE s_no =$id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // get the values from the form
    $id_post = $_POST['s_no'];
    $book_name = $_POST['book_name'];

    // update the data in the database
    $sql = "UPDATE subject_by_semester SET book_name='$book_name' WHERE s_no='$id_post'";


    if ($con->query($sql) === TRUE) {
        echo '<script>alert("Data Update Successfully"); window.location.href = "book_list.php";</script>';

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

    <title>Book Name Update</title>
</head>

<body>


    <!--  -->
    <div id="Tab2" class="tabcontent">
        <div class="container text-center">
            <h3 class="fw-bold">Shyamoli Ideal Polytechnic Institute</h3>
            <p class="fs-4">Fill the form for update details.</p>
            <a class="text-decoration-none" href="../">
                <h3 class="text-center">Home</h3>
            </a>
        </div>

        <div class="container text-center">
            <form class="form-inline" action="update_book_name.php" method="POST">
                <div class="input-group">
                    <input type="text" name="s_no" class="form-control" value="<?php echo $row['s_no']; ?>" readonly>
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="technology" class="form-control" placeholder="Name" readonly
                        value="<?php echo $row['technology']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="text" name="semester" class="form-control" placeholder="Name" readonly
                        value="<?php echo $row['semester']; ?>">
                </div>
                <br>
                <div class="input-group">
                    <input type="tel" name="book_name" class="form-control" placeholder="Email" required
                        value="<?php echo $row['book_name']; ?>">
                </div>
                <br>
                <input class="submit btn btn-success save-btn" type="submit" value="Update">

            </form>
        </div>

    </div>

</body>

</html>