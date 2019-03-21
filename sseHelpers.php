<?php


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

function getEnquiryCount()
{
    $enquiryCountReq = queryMysql("Select count(*) from enquiries");
    $enquiryCount = $enquiryCountReq->fetch_array(MYSQLI_BOTH);
    return $enquiryCount[0];
}

function getEnquiriesJSON(){
    $result = queryMysql("Select * from enquiries");
    $num    = $result->num_rows;
    $enquiries = [];
    for ($j = 0 ; $j < $num ; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_BOTH);
        $name=$row['Name'];
        $email=$row['Email'];
        $city=$row['City'];
        $movein=$row['MoveIn'];
        $teamsize=$row['TeamSize'];
        $moveindate=$row['MoveInDate'];
        $company=$row['Company'];
        $phone=$row['phone'];
        $location=$row['Location'];
        $additionalnotes=$row['AdditionalNotes'];
        $seen = $row['Seen'];
        $id = $row['id'];

        $builtEnquiry = array(
            'name'=>$name,
            'email'=> $email,
            'city'=> $city,
            'movein'=> $movein,
            'teamsize'=> $teamsize,
            'moveindate'=> $moveindate,
            'company'=> $company,
            'phone'=> $phone,
            'location'=> $location,
            'additionalnotes'=> $additionalnotes,
            'seen'=> $seen,
            'id' => $id
        );

        $enquiries[$j] = $builtEnquiry;
    }
    $enquiryList = array(
        'type'=>'enquiries',
        'enquiries'=> $enquiries
    );
    return json_encode($enquiryList);
}


function getContactUsCount()
{
    $contactCountReq = queryMysql("Select count(*) from contactUs");
    $contactCount = $contactCountReq->fetch_array(MYSQLI_BOTH);
    return $contactCount[0];
}

function getContactsJSON(){
    $result = queryMysql("Select * from contactUs");
    $num    = $result->num_rows;
    $contacts = [];
    for ($j = 0 ; $j < $num ; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_BOTH);
        $name=$row['Name'];
        $subject=$row['Subject'];
        $email=$row['Email'];
        $phone=$row['Phone'];
        $message=$row['Message'];
        $seen = $row['Seen'];
        $id = $row['id'];

        $builtContacts = array(
            'name'=>$name,
            'email'=> $email,
            'subject'=> $subject,
            'phone'=> $phone,
            'message'=> $message,
            'seen'=> $seen,
            'id' => $id
        );

        $contacts[$j] = $builtContacts;
    }
    $contactList = array(
        'type'=>'contacts',
        'contacts'=> $contacts
    );
    return json_encode($contactList);
}


function getStatusJSON(){
    $result = queryMysql("Select * from status");
    $num    = $result->num_rows;
    $status = [];
    for ($j = 0 ; $j < $num ; ++$j)
    {
        $row = $result->fetch_array(MYSQLI_BOTH);
        $changed=$row['changed'];
        $enquiries=$row['enquiries'];
        $mailingList=$row['mailingList'];
        $contactUs=$row['contactUs'];


        $builtStatus= array(
            'changed'=>$changed,
            'enquiries'=>$enquiries,
            'mailingList'=>$mailingList,
            'contactUs'=>$contactUs,
        );

        $status[$j] = $builtStatus;
    }
    $statusList = array(
        'type'=>'contacts',
        'contacts'=> $status
    );
    return json_encode($statusList);
}

?>