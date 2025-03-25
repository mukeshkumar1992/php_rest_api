<?php 
header('Content-Type:application/json');
header('Acess-Control-Allow-Origen: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-headers: Access-Control-Allow-headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];
include('config.php'); 
$sql = "DELETE from ajaxcrud WHERE id = {$student_id}";
if(mysqli_query($conn, $sql))
{
    echo json_encode(array('message'=>'RECORD DELETED SUCCESSFULLY.','status'=>true));
}
else
{
    echo json_encode(array('message'=>'RECORD NOT DELETED.','status'=>false));
}
?>