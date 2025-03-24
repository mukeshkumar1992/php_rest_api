<?php
header('Content-Type:application/json');
header('Acess-Control-Allow-Origen: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$id = $data['sid'];
$name = $data['sname'];
$fname = $data['sfname'];
$mobile = $data['smobile'];
$email = $data['semail'];
$course = $data['scourse'];
$addres = $data['saddres'];
include('config.php'); 
$sql = "UPDATE ajaxcrud SET name = '{$name}', fname = '{$fname}', mobile = '{$mobile}', email = '{$email}', course = '{$course}', addres = '{$addres}' WHERE id = {$id}";
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message'=>'Record Updated Successfully.','status'=>true));
}
else
{
    echo json_encode(array('message'=>'Updated Failed.','status'=>false));
}
?>