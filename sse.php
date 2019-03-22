<?php
require_once 'functions.php';
require_once 'sseHelpers.php';

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');


$mailingListJSON=getMailListJSON();
$enquiryListJSON = getEnquiriesJSON();
$contactListJSON = getContactsJSON();


echo "data: {$mailingListJSON}\n\n";
echo "data: {$enquiryListJSON}\n\n";
echo "data: {$contactListJSON}\n\n";


ob_end_flush();
flush();

//$now = time();
//while (1) {
//    if ($now + 5 > time() )  {
//        $now = time();
//
//        $newMailingListCount = getMailCount();
//        if($newMailingListCount!= $InitialMailListCount)
//        {
//            $InitialMailListCount = $newMailingListCount;
//            $mailingListJSON=getMailListJSON();
//            echo "data: {$mailingListJSON}\n\n";
//            ob_end_flush();
//            flush();
//        }
//
//        if(false){
//            $time = date('r');
//            echo "data: {$mailingListJSON}\n\n"; // 2 new line characters
//
//            ob_end_flush();
//            flush();
//        }
//
//    }
//
//}

?>