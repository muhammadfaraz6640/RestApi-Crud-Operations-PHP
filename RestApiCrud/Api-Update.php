<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Content-Type, Authorization, X-Requested-With');

include "Config.php";
//$desired_data is the array now
$Inserted_data = json_decode(file_get_contents("php://input"), true);
//Inserting Records
$id = $Inserted_data['id'];
$name = $Inserted_data['name'];
$age = $Inserted_data['age'];
$gender = $Inserted_data['gender'];
$class = $Inserted_data['class'];

$query = "UPDATE Student SET name = '{$name}',Age = {$age},Gender = '{$gender}',Class = '{$class}' WHERE Sid = {$id} ";

if(mysqli_query($conn,$query)){
    echo json_encode(array('message' => 'Record Updated Successfully', 'status' => true));
}
else{
    echo json_encode(array('message' => 'Record Not Updated Successfully', 'status' => false));
}



//get read data
//post insert data
//put update data
//delete data
?>