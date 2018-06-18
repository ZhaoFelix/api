<?php
include_once 'include/template.php';

$data = getData("select * from tempDB.ArPictrues where isPass=0 and isDeleted=0 order by CreateTime");
if (count($data)==0){
    exit("没有数据");
}
?>

<html>
    <head>
        <title>照片审核</title>
        {js/all.js}
    <style>
        .content {
            width: 98%;
            margin-left: 1%;
            background-color: gray;
        }
        .item {
            position: relative;
            width: 22%;
            height: 300px;
            margin-left: 2%;
            float: left;
            border: 1px solid lightgray;
            margin-bottom: 10px;
            
        }
        .item img {
            width: 100%;
            height: 300px;
        }
        .btns {
            
           
        }
        .YesBtn {
            width: 20%;
            float: left;
            height: 28px;
            margin-top: 1px;
            margin-left: 18%;
            background-color: green;
            color: white;
            border-radius: 5px;
        }
        .NoBtn {
            width: 20%;
            float: right;
            height: 28px;
            margin-top: 1px;
            margin-right: 18%;
            background-color: red;
            color: white;
            border-radius: 5px;
        }   
    </style>
    </head>
    <div>
        <div class="headr">
            
        </div>
        <div class="content">
           {foreach:$data as $d}
            <div class="item">
                <img src="{$d['picURL']}-scale">
                <div class="btns">
                    <button class="YesBtn" onclick="shenHe(2,{$d['picId']})">拒绝</button>
                    <button class="NoBtn" onclick="shenHe(1,{$d['picId']})">通过</button>
                </div>
            </div>
           {/foreach}
        </div>
    </div>
</html>

<script>
    function shenHe(flag,id){
        $.post("action.php",{
            "Action":"Update",
            "Id":id,
            "Flag":flag
        },function(e){
            arr = JSON.parse(e);
            if(arr.ErrorCode=="0"){
                window.location.reload();
            }
            else {
                alert(arr.ErrorMessage);
            }
        })
    }
</script>