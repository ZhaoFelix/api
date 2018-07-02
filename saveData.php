<?php
include_once 'include/template.php';

$id = get("id");  
$value = get("value");

if(!isset($id) || !isset($value)){ 
    $arr = [
        "code" => "0",
        "result" => "Error"
    ];
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);  
}

else {
    
     $result = query("insert into tempDB.UserChickList values('".$value."',now(),'".$id."')");
        if(isset($result)){
            $arr = [
                 "code" => "2",
                "result" => "添加成功"
            ];
        }
        else {
            $arr = [
                 "code" => "3",
                "result" => "添加失败"
            ];
        }
         
   echo json_encode($arr,JSON_UNESCAPED_UNICODE);
}
