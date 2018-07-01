<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/13
 * Time: 10:43
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$typename = $_POST['typename'];
$leixing=$_POST['leixing'];
$add=new DbMysql();
$add->sql("select typename from mall_articleType where typename = '$typename'");
$isok1=$add->affected();

if($isok1>0){
    echo "<script>alert('已经存在');location.href='./../article/articleListAdd.php'</script>";
}else {


    $add->sql("insert into mall_articleType(typename,leixing) values('$typename','$leixing')");
    $isok=$add->affected();



    if($isok==1){
        echo "<script>alert('创建成功');location.href='./../article/articleList.php'</script>";
    }else{
        echo "<script>alert('创建');location.href='./../article/articleListAdd.php'</script>";
    }


}

