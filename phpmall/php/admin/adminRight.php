
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 10:59-->
<!-- */-->
<?php
require_once ('../lgCheck.php')
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
        box-shadow: 0 6px 0 #cfcfd4 ;
    }
    .logBackground>h2{
        font-size: 18px;
        padding: 10px 0;
        margin:10px 15px 50px 15px;
        border-bottom:1px solid black;
    }
    .table{margin:10px }
    .table>thead>tr{
        font-weight:bold;
        font-size: 18px;}
    span{
        font-size: 12px;}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>欢迎界面</h1>
        <br style="clear: both;">
    </div>
    <h1 style="float: right;font-size: 18px;margin-right:50px;">今天是 <?php echo date("Y-m-d") ?> <br>&nbsp; 祝您有个好心情！ </h1>
    <h2>欢迎嘉宝橱柜后台管理系统 <br><span>当前版本 v3.1.1</span></h2>


</div>
</body>
</html>