<!---->
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/10-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
include '../lgCheck.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <title>嘉宝橱柜后台管理</title>
    <link href="../css/table.css" rel="stylesheet"/>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <script src="../../js/jquery.min.js"></script>
    <script src="../js/closeLg.js"></script>
    <!--日历插件-->
    <script src="../js/laydate.dev.js"></script>
    <title>后台管理系统</title>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>

<frameset rows="54,*"  frameborder="NO" border="0" framespacing="0">
    <frame src="adminHeader.php" noresize="noresize" frameborder="NO" name="topFrame" scrolling="no" marginwidth="0" marginheight="0" target="main" />
    <frameset cols="180,*"  rows="*" id="frame" >
        <frame src="adminLeft.php" name="leftFrame" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" target="main" />
        <frame src="adminRight.php" name="main" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto" target="_self" />
    </frameset>

    <noframes>
        <body >您的浏览器不支持iframe</body>
    </noframes>


</html>