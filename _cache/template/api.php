<?php

echo "test";
die();
$data = getData("select * from tempDB.ArPictrues where isPass=1 and isDeleted=0");

if(count($data)>0){
     $result["result"] = $data;
     echo json_encode($result);
}
else {
    $result["result"] = "null";
    echo json_encode($result);
}
?>
