<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 17:03
 */

//var_dump($_POST);

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];

 $ziduan=@$_POST['ziduan'];
 $zt=@$_POST['zt'];



$db=new DbMysql();






if($id==""){
    echo "<script>alert('请选择你要操作的分类');location.href='./consultType.php'</script>";
    exit;
}else{


foreach($id as $v){
    $nr=$_POST['order'.$v];

    if($ziduan=="typezt"){
        $nr=$zt;

    }
     $sql=" update mall_consultType set $ziduan = '$nr' where id = '$v' " ;



    $isok=$db->sql($sql);

    if($isok!=1){
        echo "<script>alert('未知错误');location.href='./consultType.php'</script>";
    }

    echo "<script>alert('批量修改成功');location.href='./consultType.php'</script>";
}}