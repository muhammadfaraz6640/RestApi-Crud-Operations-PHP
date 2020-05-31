<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

include "Config.php";
//$desired_data is the array now
$desired_data = json_decode(file_get_contents("php://input"), true);
$std_id = $desired_data['Sid'];

$query = "DELETE FROM Student WHERE Sid = {$std_id}";
$result = mysqli_query($conn,$query) or die("SQL Query Faied");

if(mysqli_query($conn,$query)){
    echo json_encode(array('message' => 'Record Deleted Successfully', 'status' => true));
}
else{
    echo json_encode(array('message' => 'Record Not Deleted Successfully', 'status' => false));
}




?>