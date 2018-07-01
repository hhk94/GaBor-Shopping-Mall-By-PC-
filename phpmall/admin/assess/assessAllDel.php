<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/15
 * Time: 14:59
 */

//var_dump($_POST);

require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];
$del=new DbMysql();
if(count($id)==0){
    echo "<script>alert('请选择你要删除的信息');location.href='./assess.php'</script>";
exit();
}

foreach($id as $v){

    $sql="delete from mall_assess where id = '$v'";
    $del->sql($sql);
    if($del->affected()!=1){
        echo "<script>alert('删除 $v 发生错误');location.href='./assess.php'</script>";
    }

}

echo "<script>alert('批量删除成功');location.href='./assess.php'</script>";