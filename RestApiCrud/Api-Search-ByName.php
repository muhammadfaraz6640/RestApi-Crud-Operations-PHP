<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "Config.php";
//$desired_data is the array now
$desired_data = json_decode(file_get_contents("php://input"), true);
$std_name = $desired_data['Sname'];

$query = "SELECT * FROM Student WHERE name LIKE '%{$std_name}%'";
$result = mysqli_query($conn,$query) or die("SQL Query Faied");

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else{
    echo json_encode(array('message' => 'No Record Found', 'status' => false));
}

?>