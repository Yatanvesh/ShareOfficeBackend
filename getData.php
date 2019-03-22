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

if ($data['type'] == 'mailingList') {
    $newCount = getMailCount();
    $oldCount = $data['count'];
    if ($oldCount != $newCount) {
        $mailingListJSON = getMailListJSON();
        echo $mailingListJSON;
    }
}

if ($data['type'] == 'enquiries') {
    $newCount = getEnquiryCount();
    $oldCount = $data['count'];
    if ($oldCount != $newCount) {
        $enquiryListJSON = getEnquiriesJSON();
        echo $enquiryListJSON;
    }
}
if ($data['type'] == 'contacts') {
    $newCount = getContactUsCount();
    $oldCount = $data['count'];
    if ($oldCount != $newCount) {
        $contactListJSON = getContactsJSON();
        echo $contactListJSON;
    }
}

if ($data['type'] == 'status') {
    $statusJSON  = getStatusJSON();
    echo $statusJSON;
}

if ($data['type'] == 'seen') {
    if($data['action'] == 'contactUs')
        $result = queryMysql("UPDATE status SET changed = 'true', contactUs = '0'");
    if($data['action'] == 'mailingList')
        $result = queryMysql("UPDATE status SET changed = 'true', mailingList = '0'");
    if($data['action'] == 'enquiries')
        $result = queryMysql("UPDATE status SET changed = 'true', enquiries = '0'");
}


?>