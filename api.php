<?php
include_once 'include/template.php';

$data = getData("select * from ArPictures where isPass=1 and isDeleted=0");

if(count($data)){
     $result["result"] = $data;
     json_encode($result);
}
else {
    $result["result"] = "null";
    json_encode($result);
}
