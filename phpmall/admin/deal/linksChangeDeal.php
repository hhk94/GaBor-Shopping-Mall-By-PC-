<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/31
 * Time: 11:47
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
$edit=new DbMysql();

$id=$_GET['id'];

$webname=$_POST['webName'];
$weburl=$_POST['webUrl'];
$styleid=$_POST['styleid'];
$intro=$_POST['intro'];
$fifel=$_FILES['logoUrl'];


if($fifel["name"]!=""){

    $ftype=$fifel['type'];
    $fsize=$fifel['size'];

    if($fsize<1048576){

    }else{
        echo "<script>alert('上传文件不满足条件');location.href='../links/links.php'</script>";
        exit;
    };

    move_uploaded_file($fifel["tmp_name"],"../../upload/".$fifel['name']);
    $logourl="upload/".$fifel['name'];
    $edit->sql("update mall_links set logourl = '$logourl' where id = '$id'");
    $isok=$edit->affected();

    if($isok==1){

    }else{
        echo "<script>alert('修改失败');location.href='../links/linksChange.php?id=$id'</script>";
        exit;

    }

}else{
    echo "<script>alert('无需更新');location.href='../links/linksChange.php?id=$id'</script>";
}





$isok=$edit->sql("update mall_links set webname='$webname',weburl='$weburl',styleid='$styleid',intro='$intro' where id = '$id'");



if($isok==1){
    echo "<script>alert('修改成功');location.href='../links/links.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='../links/linksChange.php?id=$id'</script>";
}