<?php

$cat = $_GET['c'] ?? '';
$title = $_GET['t'] ?? '';
$des = $_GET['d'] ?? '';

// Check if any of the required form fields are empty
if (empty($cat) || empty($title) || empty($des)) {
    echo "Error: Missing form data";
    exit;
}

// Read the existing JSON object from the file, or create a new empty array if file does not exist
$json_data = file_exists("../../json/data_notice.json") ? file_get_contents("../../json/data_notice.json") : "[]";
$data = json_decode($json_data, true);

// Check if the JSON decoding was successful
if ($data === null) {
    echo "Error: Invalid JSON data";
    exit;
}

// Add the new form data to the object
$data[] = array(
    'cat' => $cat,
    'title' => $title,
    'des' => $des
);

// Convert the modified object to a JSON object
$json_data = json_encode($data);

// Save the JSON object to the file
if (file_put_contents("../../json/data_notice.json", $json_data) === false) {
    echo "Error: Failed to save JSON data";
    exit;
}

echo "Data added successfully";
?>
