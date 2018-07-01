<?php

require_once "../public/init.php";

if(!ISLOGIN){
    webAlter('请先登录','login.php');
    exit;

}



$cart=new cart();


$cartList=$cart->cartInfo();

//var_dump($cartList);

echo "<script>location.href='cart.php#mian_title';</script>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="嘉宝橱柜网络部 4535292@qq.com" />

    <meta http-equiv='X-UA-Compatible' content='chrome=1' />
    <title>购物车 - 嘉宝橱柜会员中心</title>
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
    .container{
        padding:0!important;
    }
    /*副导航   */
    a{text-decoration: none;
        display: block;}
    img{
        width: 100%;
        display: block;}


    /*个人中心主题*/
    .mainbody{margin-top:20px;}
    .main_title{margin-bottom:10px;
        border-bottom: 2px solid #666;
        font-size: 24px;}
    .main_title>span{
        font-size: 14px;
        color: #9e9e9e;
    }

    .cartButton>div{
        float: left;
        margin-top: 50px;
        font-size: 20px;
        text-align: center;
        display: block;

        color: black;
        padding:5px 10px;
        background: white;
        position: relative;
        border:1px solid #e0e0e0;
        margin-bottom: 20px;

    }
    .cartButton>div:hover{
        background: #e0e0e0;
    }
    .continue{
        cursor: pointer;

    }
    .cartButton>.Buy{
        float: right;
        cursor: pointer;

    }

    .cartTotal{
        font-size: 20px;
        text-align: right;}
    .cartTotal>span{
        color: #e00000;
        font-size: 24px;}
    .CARTnumber>input{
        text-align: center;
        margin-top: 24px;
        width: 50px;
        border: 1px solid #666;
    }
    .lineH{
        line-height:71px!important;}
    .Carttitle{
        text-align: right;}
    .Carttitle>span{
        color: #e00000;}
</style>
<body>
<?php
include webdir."/include/header.php";
?>


<div class="mainbody">
    <div class="container">
        <h2 class="Carttitle"><span>我的购物车</span> > 填写订单信息 > 成功提交订单</h2>
        <h1 class="main_title" id="mian_title">购物车 <span>请及时下单购买，商品价格以订单提交时的价格为准。</span></h1>
        <table class="table table-condensed table-hover">
            <thead>
            <tr>
                <td>#</td>
                <td>商品名称</td>
                <td>市场价</td>
                <td>商城价</td>
                <td>小计</td>
                <td>商品数量</td>
                <td>删除</td>
            </tr>
            </thead>
            <tbody>
                <?php
                    if(!empty($cartList)){
                    foreach($cartList as $k=>$v){
                ?>
                        <tr class="<?php echo $k;?>">
                            <td>
                                <a href="../user_product/product.php?id=<?php echo $k?>" style="display: block;;width: 60px;height: 60px;">
                                    <img style="width: 100%;height: 100%;" src="<?php echo str_replace('../../','../',$v['picurl']) ?>" alt="">
                                </a>
                            </td>
                            <td >
                                <a href="../user_product/product.php?id=<?php echo $k?>" target="_blank">
                                <p><?php echo $v['title'];?></p>
                                <p><?php echo $v['numbers'];?></p>
                                </a>
                            </td>
                            <td class="lineH">￥<?php echo $v['yprice'];?>元</td>
                            <td  class="lineH">￥<?php echo $v['unitPrice'];?>元</td>
                            <td  class="lineH Price<?php echo $k;?>"><?php echo $v['Price'];?></td>
                            <td class="CARTnumber">
                                <input type="number" id="productNumber" class="productNumber<?php echo $k;?>" value="<?php echo $v['total']?>" onblur="up(<?php echo $k;?>)">
                            </td>
                            <td  class="lineH lineH<?php echo $k;?>" onclick="del(<?php echo $k;?>)" >

                                 删除
                            </td>
                        </tr>




                <?php
                    }}else{
                        echo "<td>您购物车还没有添加商品</td>
<td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td>";
                    }
                ?>






            </tbody>
        </table>

        <p class="cartTotal">商品总金额(不包括运费): ￥<span class="totalPrice"><?php echo $_SESSION['cartPrice']?></span>元</p>
        <div class="cartButton">

            <div class="continue">继续购物</div>

            <?php
            if(!empty($cartList)) {
                ?>
                <div class="Buy"  onclick="javascript:location.href='orderCart.php'">立即购买</div>
                <?php
            }
            ?>

            <br style="clear: both;">
        </div>
    </div>
</div>

<script>

    function up(id){
        var sum =$('.productNumber'+id).val();
        if(sum<=0){
            del(id);
            return;
        }


        $.ajax({
            url:'../ajax/ajax_changeCart.php',
            type:"POST",
            data:"id="+id+"&sum="+sum,
            success:function(data){
//                console.log(data);
//                $('.totalPrice').text(data);
//                $('.Price'+id).text(data[2]);
                if(data=='1'){
                    location.href='cart.php';




                }
            },
            error:function(){
                alert('错误');
            }
        })

    }

    function del(id){


       $.ajax({
           url:'../ajax/ajax_delCart.php',
           type:"POST",
           data:"id="+id,
           success:function(data){
               if(data=='1'){
                   location.reload();

//                   $('.'+id).html(" ");
               }
           },
           error:function(){
               alert('错误');
           }
       })
    }



</script>

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