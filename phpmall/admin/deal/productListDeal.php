<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/27
 * Time: 10:25
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$typename=$_POST['typename'];
$tid=$_POST['tid'];
$sd=1;//默认深度
$idpath=$_POST['tid'];

$db=new DbMysql();
if($tid!=0){
//    echo "表示不是一级分类";
    $result=$db->select("select * from mall_productList where id = $tid",1);
//        echo $result['typename'].$result['sd'];
    $sd=$result['sd']+1;
    $idpath=$result['idpath']."_".$result['id'];
}


//echo $tid.$typename;

//echo "";
//echo $idpath;
//
//exit;


$db->sql("insert into mall_productList (tid,typename,sd,idpath) values ('$tid','$typename','$sd','$idpath')");

$isok=$db->affected();

if($isok==1){
    echo "<script>alert('商品分类创建成功');location.href='./../product/productList.php'</script>";
}else{
    echo "<script>alert('商品分类创建失败');location.href='./../product/productList.php'</script>";
}