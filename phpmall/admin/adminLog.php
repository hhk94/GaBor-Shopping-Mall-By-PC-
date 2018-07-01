
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 11:23-->
<!-- */-->
<?php

require_once ('./down/checkLogin.php');
require_once ('./down/connectDb.php');
require_once ('./down/page.class.php');
$log=new DbMysql();
$resulot=$log->sql(" select * from mall_adminLog ");

$infocount=$log->affected();

$pagesize=10;
$page=new page($infocount,$pagesize);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../css/inital.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>
<style>
    .logTop{

        background: linear-gradient(45deg,#020031 0,#6d3353 100%);
        border-bottom:4px solid #2e6da4;
    }
    .logTop>h1{
        font-weight:bold;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        height:40px;
        line-height:40px;
        text-align: center;
        width: 100px;
        float: left;
        margin-left:25px;
        margin-bottom:-7px;
        font-size:20px;;
        color: black;
        background: #eee;}
    .logBackground{
        margin-top:10px;
        background:  #eee;;
        border:2px solid #d4d4dc;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 6px 0 #cfcfd4 ;
        -moz-box-shadow: 0 6px 0 #cfcfd4 ;
        box-shadow: 0 6px 0 #cfcfd4 ;;}

    .logBackground>h2{
        font-size: 18px;
        padding: 10px 0;
        margin:10px 15px;
        border-bottom:1px solid black;
    }
    .table{margin:10px }
    .table>thead>tr{
        font-weight:bold;
        font-size: 18px;}
    .table>tbody>tr{
        font-size: 16px;}
    td{
        font-size: 20px;}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>用户管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：查看后台管理员登录日志 </h2>

    <table class="table table-bordered" style="margin:0">
        <thead>
        <tr class="success" >
            <td>登录账号</td>
            <td>登录密码</td>
            <td>登录时间</td>
            <td>登录IP</td>
            <td>状态</td>
            <td>操作</td>
        </tr>

        </thead>

        <tbody>
        <?php

            $log=new DbMysql();
            $result=$log->select("select * from mall_adminLog order by id desc ".$page->limit());

//        echo $_SESSION["rights"];

            foreach($result as $row ){

        ?>

        <tr>
            <td><?php echo "第 ".$row['id']." 位 ".$row['username'] ?></td>
            <td><?php echo $row['password'] ?></td>
            <td><?php echo date("Y-m-d h:i:s",$row['addtime']) ?></td>
            <td><?php echo $row['ip'] ?></td>
            <td><?php if($row['state']==1){
                            echo "正常登陆";

                      }else if($row['state']==-1){
                            echo "<i>密码错误</i>";
                      }else{
                            echo "<b>账户不存在</b>";
                      }

                        ?></td>
            <td>
                <?php
                if($_SESSION["rights"]!=1){
                    echo "<i>删除</i>";
                }else{

                ?>


                <a href="./deal/adminLogDel.php?id=<?php echo $row['id']; ?>">删除</a>

                <?php

                }
                ?>


            </td>
        </tr>
        <?php
            }
        ?>

        </tbody>

    </table>
    <?php


    ?>
    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php

        echo $page->show();

         ?></h1>
</div>
</body>
</html>