<?php
include_once 'include/template.php';

$name = get("name");  //用户名
$pwd = get("pwd");// 密码

if(!isset($name) || !isset($pwd)){
    $arr = [
        "code" => "0",
        "result" => "用户名或密码不存在"
    ];
    echo urldecode(json_encode($arr));
            
}
else {
    $id = getRowData("select UserId from TempDB.UserList where UserName='".$name."' and Password='".$pwd."' and IsDeleed=0");
    if (isset($id)){
      $arr = [
        "code" => "1",
        "result" => "登录成功"
    ];
        
      echo urldecode(json_encode($arr));
    }
    else {
         $arr = [
        "code" => "1",
        "result" => "用户名或密码不正确"
    ];
    echo urldecode(json_encode($arr));
    }
}

?>