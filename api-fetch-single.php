<?php
include 'config.php';


header('Content-Type: application/json');
header('AccessControl-Allow-Origin: *');

//decoding json format to array format
$data = json_decode(file_get_contents('php://input'), true);


$student_id = $data['stuid'];
$sql = "SELECT * FROM students WHERE id = $student_id";
$result = mysqli_query($conn, $sql) or die("Sql query failed");

if (mysqli_num_rows($result) > 0) {
     $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
     echo json_encode($output);
}else{
    echo json_encode(array('message' => 'No Record Found', 'Status' => false));
}