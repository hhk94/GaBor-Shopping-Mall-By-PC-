<?php
//require_once "../phpmall/admin/config/config.php";
//require_once "../phpmall/admin/down/userInfo.class.php";
//require_once "../phpmall/admin/down/connectDb.php";
require_once "../public/init.php";
$userinfo = new UserInfo();

$zt= $userinfo->isok();


$sql1="select * from mall_productOrder where username= '".UID."' and orderState = '0' ";
$db->select($sql1);
$ordernum=$db->affected();

$sql2="select * from mall_productOrder where username= '".UID."' and orderState = '2' ";
$db->select($sql2);
$fahuonum=$db->affected();

$sql3="select * from mall_productOrder where username= '".UID."' and orderState = '5' ";
$db->select($sql3);
$pingjianum=$db->affected();


$sql4=" select mall_favorites.*,mall_product.hot from mall_favorites inner join mall_product on mall_favorites.pid = mall_product.id where mall_favorites.username= '".UID."' and mall_product.hot= '1' ";
$db->select($sql4);
$favoritenum=$db->affected();

$sql5=" select mall_favorites.*,mall_product.drops from mall_favorites inner join mall_product on mall_favorites.pid = mall_product.id where mall_favorites.username= '".UID."' and mall_product.drops= '1' ";
$db->select($sql5);
$dropsnum=$db->affected();

$sql6=" select mall_favorites.*,mall_product.drops from mall_favorites inner join mall_product on mall_favorites.pid = mall_product.id where mall_favorites.username= '".UID."' and mall_product.recommend= '1' ";
$db->select($sql6);
$recommendnum=$db->affected();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/initail.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/idangerous.swiper.css">


    <title>Document</title>
    <style>

        .main_middle{max-width: 640px}
        /*中间*/
        .main_middle>div:nth-of-type(1){
            background: #f0f0f0;
            overflow: hidden;}
        .main_middle_pic{
            margin:38px 0 10px 20px;
            width: 100px;
            height: 100px;
            background: black;
            -webkit-border-radius:50%;
            -moz-border-radius:50%;
            border-radius:50%;
            float: left;}
        .main_middle_right{margin-left:20px;
            float: left}
        .main_middle_right>h1{
            font-size: 24px;}
        .main_middle_right>h1>a{margin-top:5px;
            /*display: inline-block;*/
            font-size: 16px;}
        .main_middle_right{
            width: 498px;}

        .main_middle_right_bg{
            margin-right:20px;
            margin-bottom:20px;
            background: white;}
        .main_middle_right_bg a{margin-left:10px;
            display: inline-block;}
        .main_middle_right_bg h6{padding:15px 10px 10px 10px;
            font-size: 16px;}
        .main_middle_right_bg h6:last-child{padding:0 10px 10px 10px;}
        /*中间促销*/
        .main_middle_onsale>h3>span{
            font-size: 14px;
            color: #e0e0e0;}
        .main_middle_onsale>h3{border-bottom:1px solid #f0f0f0}
        .main_middle_onsale ul{
            overflow: hidden;}

        /*促销产品*/
        .main_middle_onsale ul>li{
            box-sizing: border-box;

            float: left;
            width: 310px;margin:10px 5px;
            background: #f0f0f0;


        }
        .main_middle_onsale ul>li:nth-of-type(2n+1){ border-top:1px solid #d84340;}
        .main_middle_onsale ul>li:nth-of-type(2n){ border-top:1px solid #00a5bb}


        .main_middle_onsale ul>li>a>img{
            width: 260px;
            height: 180px;
            margin: 40px auto 16px auto;
            background: black;
        }
        .main_middle_onsale ul>li h4{margin-left:25px;}
        .main_middle_onsale ul>li h5{margin-right:25px;
            text-align: right;}

        .main_middle_onsale ul>li h5>span{
            color: #d84340;}

        .productList>li{
            -webkit-transition: all 0.3s ;
            -moz-transition: all 0.3s ;
            -ms-transition: all 0.3s ;
            -o-transition: all 0.3s ;
            transition: all 0.3s ;
        }
        .productList>li:hover{
            -webkit-transform: translateY(-2px);
            -moz-transform: translateY(-2px);
            -ms-transform: translateY(-2px);
            -o-transform: translateY(-2px);
            transform: translateY(-2px);

            -webkit-box-shadow: 0 2px 10px #666 ;
            -moz-box-shadow: 0 2px 10px #666 ;
            box-shadow: 0 2px 10px #666 ;
        }
    </style>
</head>
<body>
<div class="main_middle">
    <div>
        <div class="main_middle_pic">
            <img src="" alt="">
        </div>
        <div class="main_middle_right">
            <h1>欢迎您，<?php echo UID;?>
                <a href="user_main_middle_information.php">编辑个人信息</a></h1>

<!--            即将售完=降价-->
            <div class="main_middle_right_bg">
                <h6>交易提醒：<a href="user_main_middle_order.php?attrorder=1">待支付（<?php echo $ordernum;?>）</a><a href="user_main_middle_order.php?attrorder=2">已发货（<?php echo $fahuonum;?>）</a><a href="">待评价（<?php echo $pingjianum;?>）</a></h6>
                <h6>收藏提醒：<a href="user_main_middle_favorites.php?hot= 1">热卖中（<?php echo $favoritenum;?>）</a><a href="user_main_middle_favorites.php?drops= 1">即将售完（<?php echo $dropsnum;?>）</a><a href="user_main_middle_favorites.php?recommend= 1">新到货（<?php echo $recommendnum;?>）</a></h6>
            </div>



        </div>
    </div>
    <div class="main_middle_onsale">
        <h3>正在热卖 <span>onsale</span></h3>


        <ul class="productList">
            <?php
            $productList=$action->getProduct(2,4);

            foreach($productList as $row){
                ?>


                <li>
                    <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank">
                        <img src="<?php echo str_replace("../../","../",$row['pic']) ?>" alt="">
                        <h4><?php echo strindex($row['title'],12,"...")?></h4>
                        <h5>促销价：<span>￥<?php echo $row['price']?></span></h5>
                    </a>
                </li>
                <?php
            }
            ?>







        </ul>
    </div>
</div>
</body>
</html>