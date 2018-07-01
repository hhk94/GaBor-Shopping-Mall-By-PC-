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

$receive=new receive();
$tj=" and username = '".UID." '";

$receiveinfo=$receive->receiveList($tj);


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


    </style>
</head>
<body>
<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>收货地址 <span>receive</span></h3>

    </div>
    <a href="user_main_middle_receive_add.php" style="float: right;">添加新的收货地址</a>
   <div>
       <table class="table  table-hover">
           <thead>
           <tr>
               <td>ID</td>
               <td>收货人</td>
               <td>地址</td>
               <td>邮编</td>
               <td>电话</td>
               <td>手机</td>
               <td>操作</td>
           </tr>
           </thead>
           <tbody>
           <?php
           foreach ($receiveinfo as $row) {
               ?>
               <tr>
                   <td><?php echo $row['id'];?></td>
                   <td><?php echo $row['shouhuoren'];?></td>
                   <td><?php echo $row['shdizhi'];?></td>
                   <td><?php echo $row['youbian'];?></td>
                   <td><?php echo $row['tel'];?></td>
                   <td><?php echo $row['mobile'];?></td>
                   <td><a href="user_main_middle_receive_change.php?id=<?php echo $row['id'];?>" target="main">修改</a><a
                           href="user_main_middle_receive_add_deal.php?action=del&id=<?php echo $row['id'];?>">删除</a></td>
               </tr>
               <?php
           }
           ?>
           </tbody>
       </table>
   </div>

</div>
</body>

<script>

</script>
</html>
