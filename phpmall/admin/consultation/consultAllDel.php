<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 11:11
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];

$db=new DbMysql();

if(count($id)==0){
    echo "<script>alert('请选择一个信息');location.href='./consult.php'</script>";
    exit;
}


foreach ($id as $v){

    $db->sql("select * from mall_consult where id ='$v'");

    if($db->affected()!=1){
        echo "<script>alert('不存在该信息');location.href='./consult.php'</script>";
        exit;

    }


    $sql="delete from mall_consult where id = '$v'";
    $isok=$db->sql($sql);

    if($isok!=1){
        echo "<script>alert('删除失败');location.href='./consult.php'</script>";
    }else{

        echo "<script>alert('删除成功');location.href='./consult.php'</script>";
    }

}