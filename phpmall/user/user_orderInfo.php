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

$order=new order();

$id=@$_GET['id'];

$sql="select * from mall_productOrder where username= '".UID."' and id= '$id'";
$result=$db->select($sql,1);
$infocount=$db->affected();


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

        .fenye{
            text-align: center;
            font-size: 20px;}
        .info{
            text-align: right;}
        .dingdantitle{
            background: #f0f0f0;
            padding:10px 0;
            font-size: 20px;    }

        .main_middle_onsale>div{
            text-indent:24px;
            font-size: 16px;
            margin-bottom:10px;
        }
        thead td{
            text-align: left!important;}
        .right>li{
            text-align: right;}
    </style>
</head>
<body>


<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>订单详情 <span>my Detail</span></h3>
        <h2 class="dingdantitle">订单号： <span><?php echo $result['orderID']?></span><br>下单时间： <span><?php echo date("Y-m-s H:i:s",$result['addtime'])?></span> 当前订单状态： <span><?php echo $order->getOrderState($result['orderState'])?></span></h2>
        <blockquote>
            <p>收货信息</p>
        </blockquote>
        <div>收&nbsp;&nbsp;货&nbsp;&nbsp;人： <span><?php echo $result['shren'];?></span></div>
        <div>收货地址： <span><?php echo $result['shdizhi'];?></span></div>
        <div>手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机： <span><?php echo $result['mobile'];?></span></div>
        <blockquote>
            <p>支付及配送信息</p>
        </blockquote>
        <div>支付方式： <span>
                <?php if($result['payment']==1){
                        echo "在线支付";
                }else if($result['payment']==2){
                    echo "银行汇款";
                } ;?>
            </span></div>
        <div>配送方式： <span>城市快递</span></div>
        <div>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;费： <span>￥<?php echo $result['yunfei']?>元</span></div>
        <div>送货时间： <span><?php echo $result['dTime']?></span></div>
        <blockquote>
            <p>商品清单</p>
        </blockquote>
        <table class="table table-hover">
            <thead>
            <tr class=" info">
                <td>商品</td>
                <td>购买价</td>
                <td>数量</td>

                <td>发货仓库</td>
            </tr>
            </thead>

            <tbody>
                <?php
                    $qd=$order->getOrderList($result['orderID']);
                    foreach ($qd as $rows){
                ?>
                <tr>
                    <td><a href="../user_product/product.php?id=<?php echo $rows['pid'];?>" target="_blank">
                            <img src='<?php echo str_replace('../../','../',$rows['picurl'])?>' style='width:40px;height:40px;display:inline-block'>
                        </a>
                    </td>
                    <td>￥<?php echo $rows['unitPrice']?></td>
                    <td>￥<?php echo $rows['total']?></td>
                    <td>长沙</td>

                </tr>
                <?php
                }
                ?>
            </tbody>

         </table>
        <ul class="right">
            <li>购买金额: <span>￥<?php echo $result['price'];?>元</span></li>
            <li>运费:￥<?php echo $result['yunfei'];?></li>
            <li>优惠:￥<?php echo $result['youhui'];?></li>
            <li>支付金额：￥<?php echo $result['price'];?>元</li>
        </ul>
    </div>


</body>



</html>
