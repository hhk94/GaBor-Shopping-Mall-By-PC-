<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/21
 * Time: 10:18
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
//var_dump($_POST);


$db=new DbMysql();
$id=@$_POST['id'];

if($id==""){

    echo "<script>alert('请选择你要删除的信息');location.href='./feedback.php'</script>";
    exit();
}

foreach ($id as $v){
    $sql="delete from mall_feedback where id = '$v'";
    $db->sql($sql);
    if($db->affected()!=1){
        echo "<script>alert('删除信息终端id： $v ');location.href='./feedback.php'</script>";
        exit();

    }
}

echo "<script>alert('删除成功 ');location.href='./feedback.php'</script>";
