<?php
require_once 'functions.php';
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');

function getMailCount()
{
    $newMailingListCount = queryMysql("Select count(*) from mailingList");
    $mailCount = $newMailingListCount->fetch_array(MYSQLI_BOTH);
    return $mailCount[0];
}

function getMailListJSON(){
    $result = queryMysql("Select * from mailingList");
    $num    = $result->num_rows;
    $emails = [];
    for ($j = 0 ; $j < $num ; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_BOTH);
        $email=$row['email'];
        $emails[$j] = $email;
    }
    $mailingList = array(
        'type'=>'mailingList',
        'emails'=> $emails
    );
     return json_encode($mailingList);
}

$InitialMailListCount = getMailCount();
$mailingListJSON=getMailListJSON();


echo "data: {$mailingListJSON}\n\n";
ob_end_flush();
flush();

$now = time();
while (1) {
    if ($now + 5 > time() )  {
        $now = time();

        $newMailingListCount = getMailCount();
        if($newMailingListCount!= $InitialMailListCount)
        {
            $InitialMailListCount = $newMailingListCount;
            $mailingListJSON=getMailListJSON();
            echo "data: {$mailingListJSON}\n\n";
            ob_end_flush();
            flush();
        }

        if(false){
            $time = date('r');
            echo "data: {$mailingListJSON}\n\n"; // 2 new line characters

            ob_end_flush();
            flush();
        }

    }

}

?>