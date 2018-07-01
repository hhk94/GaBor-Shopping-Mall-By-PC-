<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/29
 * Time: 17:17
 */
require_once '../public/init.php';
$id=$_POST['id'];

if(!ISLOGIN){
    echo "nologin";
    exit;
}

$addtime=time();


$sql="select * from mall_favorites where pid = '$id' and username = '".UID."' ";

$db->select($sql,1);

if($db->affected()>=1){
    echo 3;
    exit;
}



$sql=" insert into mall_favorites (id,pid,username,addtime) values(null,'$id','".UID."','$addtime') ";

$result=$db->sql($sql);

if(empty($result)){
    echo 0;
    exit;
}else{
    echo 1;
}