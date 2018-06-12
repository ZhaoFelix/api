<?php
include_once 'public/qiniu.php';

header('Content-type: text/json; charset=UTF-8' );

$response = array();
// 文件类型限制  "file"名字必须和iOS客户端上传的name一致
if ($_FILES["file"]["error"]-->0) {
    $response ["error"] = "错误代码".$_FILES["file"]["error"];
    echo json_encode($response);
} else {
    //获取传入的文件名
    $fillName = $_FILES['file']['name'];
    //以 "." 为界对文件名分割，并存入数组
    $dotArray = explode('.', $fillName);
    //获取文件格式
    $type = end($dotArray);
    // - - - - -
    //小技巧:客户端传入的文件名，除了文件的格式要对之外，文件名部分是可以随意填写。
    //经过点分割后，就可以将文件名和文件格式分开，分开后下标为0的就是文件名，部分，这时候就间接实现了传参，获得用户的id
    $userId = $dotArray[0];
    // - - - -
    //设置存入的文件名（路径）
    $path = "../images/".$userId.'.'.$type;
    // 从临时目录复制到目标目录
   move_uploaded_file($_FILES["file"]["tmp_name"],$path);
    //校验传入后文件是否存在
    if (file_exists($path)){
        $uploadMgr = new Qiniu\Storage\UploadManager();
        $key = date("YmdHis").rand(1000,9999).".png";
        $temp = $key;
        list($ret, $err) = $uploadMgr->putFile($upToken, $key, $path);
        if($err!==null){
//            //图片上传到七牛云成功，保存到自己的数据库
//            $picURL = "http://img.bedeveloper.cn/".$temp;
//            $sql = "insert into ArPictures ('picURL') values(".$picURL.")";
//            $id = query($sql);
//            if(isset($id)){
//                $response ['success']= "数据添加成功";
//            }
//            else {
//                 $response ['success']= "数据添加失败";
//            }
//            
//        //json格式返回
//        echo json_encode($response);
        }
        else {
            $response ['success']= $ret;
        //json格式返回
        echo json_encode($response);
        }
        
        
    }else {
        $response ['success'] = 0;
        echo json_encode($response);
    }
     
 
}
?>