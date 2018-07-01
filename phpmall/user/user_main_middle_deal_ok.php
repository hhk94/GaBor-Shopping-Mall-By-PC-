<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/28
 * Time: 10:38
 */
require_once "../public/init.php";
$userinfo = new UserInfo();

$zt= $userinfo->isok();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $webdir?>css/initail.css">
    <link rel="stylesheet" href="<?php echo $webdir?>css/comment.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $webdir?>css/idangerous.swiper.css">
    <script src="<?php echo $webdir?>/js/jquery-1.11.3.min.js"></script>

    <title>Document</title>
    <style>

        .main_middle{max-width: 640px}
        /*中间*/

        /*中间促销*/
        .main_middle_onsale>h3>span{
            font-size: 14px;
            color: #e0e0e0;}
        .main_middle_onsale>h3{border-bottom:1px solid #f0f0f0}

        .changePassword{
            background: #e0e0e0;}
        .changePassword h4{padding-left:20px;
            line-height:50px;}
        .changePassword form{margin-left:180px;}
        form span{
            color: #c9302c;}
        .changePassword>a{
            font-size:20px ;margin-left:20px;}
    </style>
</head>
<body>
<div class="main_middle">
    <div class="main_middle_onsale">
        <h3><?php echo $title;?> <span></span></h3>

    </div>

    <div class="changePassword">
        <h4><?php echo $info;?></h4>
        <a href="<?php echo $url;?>">返回</a>
    </div>

</div>
</body>

<script>

</script>
</html>
