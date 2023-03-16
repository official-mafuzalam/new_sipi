<?php

include '../../inc/conn.php';

header('Content-Type: application/json');

$roll = $_GET['roll'];
$att_month = $_GET['m'];
$att_year = $_GET['y'];

$query = "SELECT COUNT(*) AS day_count, SUM(atten_status) total_atten FROM stu_atten WHERE user_id = $roll and att_month = $att_month and att_year = $att_year";
$result = mysqli_query($con, $query);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}

$json = json_encode($rows);
echo $json;

$con->close();
?>