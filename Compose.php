<?php
require_once 'functions.php';
require_once 'sseHelpers.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: text/plain');
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$res = array('result' => 'success');
$mailText = $data['content'];
sendMailText($mailText);
echo json_encode($res)

?>