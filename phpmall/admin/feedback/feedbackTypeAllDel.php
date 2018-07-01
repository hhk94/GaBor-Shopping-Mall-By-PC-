<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/19
 * Time: 15:29
 */

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

//var_dump($_POST);

$del=new DbMysql();
$id=@$_POST['id'];

if(count($id)==0){

    echo "<script>alert('请选择要删除的信息');location.href='./feedbackType.php'</script>";
    exit();
}

foreach ($id as $item) {
     $sql=" delete from mall_feedbackType where id = '$item' ";
        $del->sql($sql);



    if($del->affected()!=1){

        echo "<script>alert('删除失败，ID: $item ');location.href='./feedbackType.php'</script>";
        exit();
    }


}

echo "<script>alert('批量删除成功');location.href='./feedbackType.php'</script>";