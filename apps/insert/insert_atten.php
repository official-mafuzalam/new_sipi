<?php

include '../../inc/conn.php';

$user_id = $_GET['user'];
$att_date = $_GET['d'];
$roll = $_GET['r'];
$name = $_GET['n'];
$atten_status = $_GET['s'];
$att_month = $_GET['m'];
$att_year = $_GET['y'];
$inserter_id = $_GET['i_u_id'];

$sql = "INSERT INTO stu_atten (user_id, att_date, roll_no, stu_name, atten_status, att_month, att_year, inserter_id) 
	VALUES('$user_id', '$att_date', '$roll', '$name', '$atten_status', '$att_month', '$att_year', '$inserter_id') ";
$result = mysqli_query($con, $sql);

if ($result)
	echo "\n Data inserted successfully!";
else
	echo "Query error!";

?>