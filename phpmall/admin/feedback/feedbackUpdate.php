<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/21
 * Time: 10:30
 */


require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
//var_dump($_POST);
$id=@$_POST['id'];

if($id==""){

    echo "<script>alert('请选择你要修改的信息');location.href='./feedback.php'</script>";
    exit();
}

$db=new DbMysql();
$ziduan=$_POST['ziduan'];
$zt=$_POST['infozt'];

foreach ($id as $item) {
    $db->sql("select * from mall_feedback where id = '$item'");
    if($db->affected()!=1){

        echo "<script>alert('ID不存在');location.href='./feedback.php'</script>";
        exit();
    }

    $sql="update feedback set $ziduan = '$zt' where id = '$item' ";
    $db->sql($sql);

}

echo "<script>alert('批量操作成功');location.href='./feedback.php'</script>";