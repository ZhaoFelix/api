<?php
include_once 'include/template.php';


$data = getData("select * from tempDB.UserChickList order by CreateTime");
if(count($data)>0){
    $re = [
        "code"=>"1",
        "result"=>$data
    ];
    echo json_encode($re,JSON_UNESCAPED_UNICODE);//设置编码格式，确保中文不会乱码
}
else {
    $re = [
        "code"=>"0",
        "result"=>"没有数据"
    ];
     echo json_encode($re,JSON_UNESCAPED_UNICODE);    
}