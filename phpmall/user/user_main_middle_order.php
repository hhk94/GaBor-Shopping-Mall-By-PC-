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

$parm="  ";

$sql="select * from mall_productOrder where username= '".UID."'  ";
//
$attorder=@$_GET['attrorder'];

if($attorder=="1"){
    $parm.=" and orderState = '0' ";
}

if($attorder=="2"){
    $parm.=" and orderState = '2' ";
}


echo $attorder;

$sql.=$parm;
$db=new DbMysql();
$db->sql($sql);
$infocount=$db->affected();


$pagesize=5;

$page=new page($infocount,$pagesize);

$sql.=$page->limit();



$result=$db->select($sql);




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
    </style>
</head>
<body>


<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>我的订单 <span>my Order</span></h3>

        <table class="table table-hover">
            <thead>
                <tr class=" info">
                    <td>订单号</td>
                    <td>订单商品</td>
                    <td>收货人</td>
                    <td>订单金额</td>
                    <td>下单时间</td>

                    <td>支付状态</td>
                    <td>订单状态</td>
                    <td>操作</td>
                </tr>
            </thead>

            <tbody>
            <?php
                if($infocount!=""){
                foreach ($result as $row){
            ?>
                <tr>
                    <td><?php echo $row['orderID']?></td>
                    <td><?php
                        $infos=$order->getOrderList($row['orderID']);

                        foreach ($infos as $rows) {
                            echo "<img src='".str_replace('../../','../',$rows['picurl'])."' style='width:40px;height:40px;display:inline-block'>";
                        }
                       ?></td>
                    <td><?php echo $row['shren']?></td>
                    <td><?php echo $row['price']?></td>
                    <td><?php echo date("Y-m-d",$row['addtime']) ?><br><?php echo date("H:i:s",$row['addtime']) ?></td>

                    <td><?php echo $order->getPaymentState($row['paymentState']) ?></td>
                    <td><?php echo $order->getOrderState($row['orderState']) ?></td>
                    <td><a href="user_orderInfo.php?id=<?php echo $row['id']?>">订单详情</a></td>
                </tr>
            <?php
                }}else{
                    echo "<td>暂无订单</td>";
                }
            ?>
            </tbody>
        </table>
        <h4 class="info">共有 <span style="color: #e00000;"><?php echo $infocount;?></span>个订单</h4>
        <h3 class="fenye">分页:<?php echo $page->show(1)?></h3>
    </div>


</body>



</html>
