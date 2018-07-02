<?php
include_once 'include/template.php';

$id = get("id");  //用户名

if (!isset($id))
{
     $arr = [
        "code" => "0",
        "result" => "用户名或密码不存在"
    ];
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);  
}
else {
    $data = getData("select ListContent  from tempDB.UserChickList where UserId='".$id."' and IsDeleted=0");
   if(count($data)!=0){
        $arr = [
        "code" => "1",
        "result" => "成功",
         "data" => $data
    ];
     echo json_encode($arr,JSON_UNESCAPED_UNICODE); 
     
   }
   else {
      $arr = [
        "code" => "2",
        "result" => "没有数据"
    ]; 
     echo json_encode($arr,JSON_UNESCAPED_UNICODE);   
   }
}