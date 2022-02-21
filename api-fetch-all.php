<?php
include 'config.php';

header('Content-Type: application/json');
header('AccessControl-Allow-Origin: *');

$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql) or die("Sql query failed");

if (mysqli_num_rows($result) > 0) {
     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
     echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
}