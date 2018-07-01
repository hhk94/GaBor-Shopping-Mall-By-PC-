<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15
 * Time: 16:16
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";


$id=@$_POST['id'];

if(count($id)==""){
    echo "<script>alert('请选择你要更新的信息');location.href='./product.php'</script>";
    exit();
}

$ziduan=$_POST['ziduan'];
$zt=$_POST['infozt'];
$db=new DbMysql();


foreach ($id as $v ){

    $db->sql("select * from mall_product where id = '$v'");
    if($db->affected()!=1){
        echo "<script>alert('ID错误');location.href='./product.php'</script>";
        exit;
    }


    $sql="update mall_product set $ziduan = '$zt' where id = '$v'";
    $isok=$db->sql($sql);


    if($isok==1){
        echo "<script>alert('批量修改成功');location.href='./product.php'</script>";
    }else{
        echo "<script>alert('批量修改失败');location.href='./product.php'</script>";
    }

}