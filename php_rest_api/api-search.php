<?php 
header('Content-Type:application/json');
header('Acess-Control-Allow-Origen: *');
$data = json_decode(file_get_contents("php://input"),true);
$search_value = $data['search'];
include('config.php'); 
$sql = "SELECT * FROM ajaxcrud WHERE name LIKE '%{$search_value}%'";
$result = mysqli_query($conn, $sql) or die("No Record Found");
if(mysqli_num_rows($result) > 0)
{
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message'=>'No Record Found.','status'=>false));
}
?>