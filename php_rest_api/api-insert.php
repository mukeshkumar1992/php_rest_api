<?php
header('Content-Type:application/json');
header('Acess-Control-Allow-Origen: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$name = $data['sname'];
$fname = $data['sfname'];
$mobile = $data['smobile'];
$email = $data['semail'];
$course = $data['scourse'];
$addres = $data['saddres'];
$create_at = $data['screate_at'];
include('config.php'); 
$sql = "INSERT INTO ajaxcrud (name,fname,mobile,email,course,addres,create_at) VALUES ('{$name}','{$fname}','{$mobile}','{$email}','{$course}','{$addres}',NOW())";
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message'=>'Record Inserted Successfully.','status'=>true));
}
else
{
    echo json_encode(array('message'=>'Inserted Failed.','status'=>false));
}
?>