<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/19
 * Time: 15:57
 */
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$id=@$_POST['id'];
$zt=@$_POST['zt'];

$ziduan=@$_POST['ziduan'];

$db=new DbMysql();

if($zt!=1 && $zt!=0){

    echo "<script>alert('出错');location.href='./feedbackType.php'</script>";
    exit();
}


if($id==""){

    echo "<script>alert('请选择你要更新的信息');location.href='./feedbackType.php'</script>";
    exit();
}


if($ziduan=='typeorder'){
//    echo $ziduan;
//    echo "<br>";



    foreach($id as $v){
        $nr=@$_POST['typeorder'.$v];

        $sql=" update mall_feedbackType set $ziduan = '$nr' where id = '$v' " ;


        $isok=$db->sql($sql);

        if($isok!=1){
            echo "<script>alert('未知错误');location.href='./feedbackType.php'</script>";
        }

        echo "<script>alert('批量修改成功');location.href='./feedbackType.php'</script>";
    }



}



foreach ($id as $item) {
    $db->sql("select * from mall_feedbackType where id = $item");

    if($db->affected()!=1){

        echo "<script>alert('不存在id ：$item ');location.href='./feedbackType.php'</script>";
        exit();
    }



    $sql="update mall_feedbackType set typezt = '$zt' where id = '$item' ";
    $isok=$db->sql($sql);


}

echo "<script>alert('批量修改成功 ');location.href='./feedbackType.php'</script>";





//var_dump($_POST);