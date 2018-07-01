<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 17:51
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";



$id=@$_POST['id'];

if(count($id)<1){
    echo "<script>alert('请选择一个要删除的信息');location.href='./../article/article.php'</script>";

    exit;
}

$del=new DbMysql();
    foreach($id as $row){
        $sql="delete from mall_article where id = $row";

        $del->sql($sql);
    }
echo "<script>alert('删除成功');location.href='./../article/article.php'</script>";
