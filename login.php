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
    $id = getRowData("select UserId from tempDB.UserList where UserName='".$name."' and Password='".$pwd."' and IsDeleted=0");
    if (isset($id)){
      $arr = [
        "code" => "1",
        "result" => "登录成功",
         "userId" => $id
    ];
        
     echo json_encode($arr,JSON_UNESCAPED_UNICODE);
    }
    else {
         $arr = [
        "code" => "1",
        "result" => "用户名或密码不正确"
    ];
   echo json_encode($arr,JSON_UNESCAPED_UNICODE);
   }
}

?>
