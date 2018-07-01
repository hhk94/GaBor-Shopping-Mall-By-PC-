<?php

require_once "../public/init.php";

unset($_SESSION['productCart']);


if(!ISLOGIN){
    webAlter('请先登录','login.php');
}

$orderID=@$_GET['id'];
//echo $orderID;
$sql="select * from mall_productOrder where orderID= '$orderID' ";
$orderInfo=$db->select($sql,1);
//var_dump($orderInfo);
if(empty($orderInfo)){
    weberror();
}

$order=new order();
$orderlist=$order->getOrderList($orderID);

//var_dump($orderlist);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="嘉宝橱柜网络部 4535292@qq.com" />

    <meta http-equiv='X-UA-Compatible' content='chrome=1' />
    <title>填写订单信息 - 嘉宝橱柜会员中心</title>
    <link rel="stylesheet" href="<?php echo $webdir?>/css/initail.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $webdir?>/css/idangerous.swiper.css">

    <!–[if IE]>
    <script src="<?php echo $webdir?>/js/html5.js"></script>
    <![endif]–>
    <script src="<?php echo $webdir?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo $webdir?>/js/jquery.placeholder.min.js"></script>
    <script src="<?php echo $webdir?>/js/idangerous.swiper.js"></script>
    <script src="<?php echo $webdir?>/js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="<?php echo $webdir?>/js/index.js"></script>

    <script>
        $(function(){ $('input, textarea').placeholder(); });
    </script>

</head>
<!–[if IE]>
<script src="../js/html5.js"></script>
<![endif]–>

<style>
    /*副导航   */
    .container{padding:0}
    a{text-decoration: none;
        display: block;}
    img{
        width: 100%;
        display: block;}

    .form-control{
        width:20%;
        display: inline-block;
    }
    /*个人中心主题*/
    .mainbody{margin-top:20px;}
    .main_title{margin-bottom:10px;
        border-bottom: 2px solid #666;
        color: #e00000;
        font-size: 30px;
        padding:5px 15px;
    }
    .main_title>span{
        font-size: 16px;
        color: #353535;
    }
    .borderCart{border:1px solid #e0e0e0}
    .borderBottomCart>h2{

        font-weight:bold;
        font-style: italic;
        color: #989898;
        letter-spacing: 2px;
        margin-bottom:20px;
    }
    .borderBottomCart{
        padding-bottom:10px;
        margin:10px 40px 20px 40px;
        border-bottom:1px dashed #e0e0e0;
    }
    .Carttitle{
        text-align: right;}
    .Carttitle>span{
        color: #e00000;}
    .table{
        font-size: 20px;
    }
    tbody td{
        line-height: 60px!important;}
    tbody td>img{
        display: inline-block;}

</style>
<body>
<?php
include webdir."/include/header.php";
?>

<form action="" id="form_checkout">
    <div class="mainbody">
        <div class="container" style="position: relative;">
            <h2 class="Carttitle">我的购物车 > <span>填写订单信息</span> > 成功提交订单</h2>
            <h1 class="main_title" id="mian_title">恭喜，您的订单已经提交成功，将在确认后发货，请尽快完成支付！ <span></span></h1>

            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <td>订单号</td>
                        <td>应付金额</td>
                        <td>配送方式</td>
                        <td>订单商品</td>

                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td><?php echo $orderID;?></td>
                        <td>￥<?php echo $orderInfo['price']?>元</td>
                        <td>城市配送</td>
                        <td>
                            <?php
                            foreach($orderlist as $row){
                                echo "<img src='".str_replace('../../','../',$row['picurl'])."' style='width:60px;height:60px'>";
                            }
                            ?>

                        </td>
                    </tr>

                </tbody>
            </table>



        </div>


    </div>
</form>


<?php

include webdir."/include/footer.php";
?>

</body>



<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>
<!--百度400电话 -->
<div style="height:0;display:none;overflow:hidden;">
    <script src="http://s22.cnzz.com/stat.php?id=5873751&web_id=5873751"></script>
    <script>
        document.write(unescape("%3Cscript src='" + "https:" +"hm.baidu.com/h.js%3F16b1a369d1392d8f7e8978b592e0139f' type='text/javascript'%3E%3C/script%3E"));
    </script>
</div>



</html>