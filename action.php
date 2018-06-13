<?php
include_once 'include/template.php';

$action = post("Action");
if($action=="Update"){
    $id = post("Id");
    $flag = post("Flag");
    $re =  query("update tempDB.ArPictrues set isPass=".$flag." where  picId=".$id." and IsDeleted=0");
    if (isset($re)){
        printResultByMessage("", "0");
    }
    else {
        printResultByMessage("审核失败", "1");
    }
}
