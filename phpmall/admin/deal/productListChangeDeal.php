<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/4
 * Time: 17:17
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/productType.class.php";

$editsava = new DbMysql();
$id=$_GET["id"];
$idpath=$_POST['idpath'];

$tid=$_POST["tid"];

$typename=$_POST["typename"];
//$result=$editsava->select("select * from productList where id ='$id'",1);

$sd=1;

//echo $sd;
//exit;




//$result=$editsave->select("select * from productList where id ='$id'",1);
//echo $result['tid'];


//echo "<br>";
$newpath="";

if($tid!=0){
//    echo "表示不是一级分类";
    $result=$editsava->select("select * from mall_productList where id = $tid",1);
//    echo $result['typename'].$result['sd'];
    $sd=$result['sd']+1;
    $newpath=$result['idpath']."_".$result['id'];


};

$xj=$idpath."_".$id;

$sql="update mall_productList set  tid = '$tid' where id = '$id' ";


$editsava->sql($sql);




//echo "原";
//echo $idpath;
//echo "<br>";
//echo $tid;
//echo "<br>";
//echo $newpath;
$sql=" update mall_productList set idpath=replace(idpath,'$idpath','$newpath') where (idpath like '%$idpath%' and id ='$id' ) or (idpath like '%$xj%') ";


//echo $newpath;
//echo "<br>";
//echo $sql;
//exit;
$ptype = new ProductType();

$ptype->updateSd($id, $sd);
//echo $ptype->updateSd($id, $sd);
//exit;
//"update productList set tid = '$tid',typename = '$typename',sd = '$sd' where id = '$id'"

$isok=$editsava->sql($sql);

if($isok==1){
    echo "<script>alert('修改成功');location.href='./../product/productList.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./../product/productList.php'</script>";
}