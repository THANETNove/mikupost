<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");

header("content-type:text/javascript;charset=utf-8");
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);

ini_set('max_execution_time', 7200); // ตั้งค่า max_execution_time เป็น 7200 วินาที (2 ชั่วโมง)


$file = basename($_FILES['image']['name']);
$tmp_name = $_FILES['image']['tmp_name'];
if(move_uploaded_file($tmp_name,"imageManga/episode/".$file)){

  echo json_encode([
    "Message" => "The file has been uploaded",
    "Status" => "succeeded"
    ]);
}else{
  echo json_encode([
    "Message" => "sorry",
    "Status" => "Error"
    ]);
}
?>