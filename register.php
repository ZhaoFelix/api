<?php
include_once 'include/template.php';

$name = get("name");  //用户名
$pwd = get("pwd");// 密码
if(!isset($name) || !isset($pwd)){
    $arr = [
        "code" => "0",
        "result" => "用户名或密码不存在"
    ];
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);
            
}
else {
    $id = getRowData("select UserId from tempDB.UserList where UserName='".$name."' and IsDeleted=0");
    if (isset($id)){
      $arr = [
        "code" => "1",
        "result" => "用户名已存在",
    ];
        
     echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    }
    else {
        $result = query("insert into tempDB.UserList(UserName,Password,CreateTime) values('".$name."','".$pwd."',now())");
        if(isset($result)){
            $id = getSingleData("select UserId from tempDB.UserList where UserName='".$name."' and Password='".$pwd."' and IsDeleted=0");
            $arr = [
                 "code" => "2",
                "result" => "添加成功",
                "data" => $id["UserId"]
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
}



