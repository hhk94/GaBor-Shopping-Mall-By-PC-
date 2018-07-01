<?php

require_once "../public/init.php";

if(!ISLOGIN){
    webAlter('请先登录','login.php');
}

if(empty($_SESSION['productCart'])){
    webAlter('请选购商品','../index.php');
}

$cart=new cart();
$cartList=$cart->cartInfo();
$orderID=time().rand(100,999);
//echo $orderID;
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
    
    .inputLine label>span{color: #e00000;
        }
    .inputLine{

        margin:10px 0 10px 50px;

        font-size: 20px;}
    .inputLine input{
        background: #f0f0f0;}
    .dizhi>input{
        width: 50%;}
    .borderBottomCart>h3{
        text-indent:30px;
        font-size: 18px;
        font-weight:bold;
    }
    .borderBottomCart>h2>a{
        color: #00b3ee;
        font-style: normal;
        font-size: 12px;
        display: inline-block;}
    .zongjie{
        text-align: right;
        font-size: 14px;}
    .zongjie>span{
        color: #e00000;
        font-size: 20px;}
    .heji{
        text-align: right;
        font-size: 16px;
    }
    .CARTnumber>input{
        text-align: center;
        margin-top: 24px;
        width: 50px;
        border: 1px solid #666;
    }
    .lineH{
        line-height:71px!important;}
    .heji>span{
        font-size: 26px;
        color: #e00000;
    }
    .tijiao{
        font-size: 20px;
        margin:50px 20px 50px 10px;
        float: right;}

.warn{
    color: #e00000;
}
    #zhifu>span{
        color: #e00000;
    }
    .mainbody{
        position: relative;}
    #time>span{
        color: #e00000;
    }
    .rotate{
        display: none;
        position: absolute;
        width: 200px;
        height: 50px;
        bottom:45px;
        right:-75px;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
    }
    .rotate>div{
        width: 50px;
        float: left;}
    .rotate>p{
        font-weight:bold;
        line-height: 50px;
        font-size: 20px;
        float: right;}
    .rotating{
        -webkit-animation:rotateAll  800ms infinite linear;
        -o-animation:rotateAll  800ms infinite linear;
        animation:rotateAll  800ms infinite linear;;
    }

    @keyframes rotateAll {
        0%   { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .opcity{
        opacity:0;
    }

</style>
<body>
<?php
include webdir."/include/header.php";
?>

<form action="" id="form_checkout">
    <div class="mainbody">
        <div class="container" style="position: relative;">
        <h2 class="Carttitle">我的购物车 > <span>填写订单信息</span> > 成功提交订单</h2>
        <h1 class="main_title" id="mian_title">填写核对订单信息 <span>填写并确认一下信息，然后提交订单</span></h1>
        <div class="borderCart">

            <div class="borderBottomCart">
                <h2 id="first">1.收货地址</h2>
                <div class="inputLine ">
                    <label for=""><span></span>一键&nbsp;&nbsp;填写:</label>
                    <select name="allIn" id="allIn" class="form-control">
                        <?php
                        $sql=" select * from mall_receive where username = '".UID."' ";
                        $receive=$db->select($sql);
                        foreach($receive as $row){
                            ?>

                            <option shren="<?php echo $row['shouhuoren'];?>" shdizhi="<?php echo $row['shdizhi'];?>" mobile="<?php echo $row['mobile'];?>" youbian="<?php echo $row['youbian'];?>"><?php echo "收货人:".$row['shouhuoren']." - 收货地址:".$row['shdizhi']." - 手机:".$row['mobile']." - -邮政编码:".$row['youbian']?></option>

                            <?php
                        }

                        ?>
                    </select>
                </div>

                <div class="inputLine">
                    <label for=""><span>*</span>收&nbsp; 货 &nbsp;人:</label>
                    <input type="text" class="shren form-control" name="shren">
                    <input type="hidden" name="orderid" value="<?php echo $orderID;?>">
                    <input type="hidden" name="price" value="<?php echo $_SESSION["cartPrice"];?>">
                    <span class="warn"></span>
                </div>


                <div class="inputLine dizhi">
                    <label for=""><span>*</span>收货地址:</label>
                    <input type="text" class="shdizhi form-control" name="shdizhi">
                    <span class="warn"></span>
                </div>
                <div class="inputLine">
                    <label for=""><span>*</span>邮政编码:</label>
                    <input type="text" class="youbian form-control" name="youbian">
                    <span class="warn"></span>
                </div>
                <div class="inputLine">
                    <label for=""><span>*</span>手&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机:</label>
                    <input type="text" class="mobile form-control" name="mobile">
                    <span class="warn"></span>
                </div>

            </div>

            <div class="borderBottomCart">
                <h2 id="zhifu">2.支付方式 <span></span></h2>
                <div class="inputLine ">
                    <label for=""><span>*</span>在线支付:</label>
                    <input type="radio" name="delivery_id" value="1">
                    <span>可使用支付宝、微信付款</span>
                </div>
                <div class="inputLine">
                    <label for=""><span>*</span>银行汇款:</label>
                    <input type="radio" name="delivery_id" value="2">

                </div>
                <h3 id="time">送货时间 <span></span></h3>
                <div class="inputLine">
                    <input type="radio" name="delivery_time" value="工作日、双休日、假日均可送货">
                    <span>工作日、双休日、假日均可送货</span>
                </div>
                <div class="inputLine">
                    <input type="radio"  name="delivery_time" value="只工作日送货">
                    <span>只工作日送货</span>
                </div>
                <div class="inputLine">
                    <input type="radio"  name="delivery_time" value="只双休日、假日送货">
                    <span>只双休日、假日送货</span>
                </div>
            </div>
            <div class="borderBottomCart">
                <h2>3.商品清单 <a href="">[返回购物车，修改订单商品]</a></h2>
                <table class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>商品名称</td>
                        <td>市场价</td>
                        <td>商城价</td>

                        <td>商品数量</td>
                        <td>小计</td>
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
                                    <a href="../user_product/product.php?id=<?php echo $k?>">
                                        <p><?php echo $v['title'];?></p>
                                        <p><?php echo $v['numbers'];?></p>
                                    </a>
                                </td>
                                <td class="lineH">￥<?php echo $v['yprice'];?>元</td>
                                <td  class="lineH">￥<?php echo $v['unitPrice'];?>元</td>

                                <td class="lineH">

                                    <?php echo $v['total']?>
                                </td>
                                <td  class="lineH Price<?php echo $k;?>"><?php echo $v['Price'];?></td>
                            </tr>




                            <?php
                        }}else{
                        echo "<td>您购物车还没有添加商品</td>
<td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td><td>您购物车还没有添加商品</td>";
                    }
                    ?>






                    </tbody>
                </table>
            </div>

            <div  class="borderBottomCart">
                <h2>4.结算信息</h2>
                <h4 class="zongjie">商品件数：<span><?php echo $_SESSION['cartCount']?></span>件 商品金额： <span>￥<?php echo $_SESSION['cartPrice']?></span> </h4>
                <h5 class="heji">应付总金额： ￥<span><?php echo $_SESSION['cartPrice']?> </span> 元</h5>
                <h3>订单留言</h3>
                <textarea name="message" id="message" class="form-control" style="resize: none; font-size: 14px;width: 100%;"></textarea>
            </div>
        </div>

            <input type="submit" value="确认无误，提交订单" class="tijiao btn btn-danger">

            <div class="rotate">
                <div class="rotating"><img src="../img/rotate.png" alt=""></div>
                <p>系统正在处理中</p>
                <br style="clear: both;">
            </div>
</div>


    </div>
</form>


<?php

include webdir."/include/footer.php";
?>

</body>

<script>
    $(function(){

        function warn(e,f){
            e.parent('div').find('.warn').text(f);
        }
        function hide(e){
            e.blur(function(){

                if(e.val()!=""){

                    e.parent('div').find('.warn').text(" ");
                }
            })
        }

        hide($('.shren'));
        hide($('.shdizhi'));
        hide($('.youbian'));
        hide($('.mobile'));

        $('.tijiao').click(function(){
            if(!$('.shren').val()){
                warn($('.shren'),'请填写收货人');
                location.href='orderCart.php#first';
                return false;
            }
            if(!$('.shdizhi').val()){
                warn($('.shdizhi'),'请填写收货地址');
                location.href='orderCart.php#first';
                return false;
            }
            if(!$('.youbian').val()){
                warn($('.youbian'),'请填写邮编');
                location.href='orderCart.php#first';
                return false;
            }
            if(!$('.mobile').val()){
                warn($('.mobile'),'请填写手机号');
                location.href='orderCart.php#first';
                return false;
            }

            if($('input[name=delivery_id]:checked').length<1){

                $('#zhifu>span').text('请选择付款方式');
                location.href='orderCart.php#zhifu';
                return false;
            }
            if($('input[name=delivery_time]:checked').length<1){

                $('#time>span').text('请选择付款方式');
                location.href='orderCart.php#time';
                return false;
            }

            $('.rotate').show();
            $('.tijiao').addClass('opcity');

            $.ajax({
                url:"../ajax/orderSava.php",
                type:"POST",
                data:$('#form_checkout').serialize(),
                success:function(data){
//                    console.log(data)
                    if(data==1){
                        location.href='orderCartOk.php?id=<?php echo $orderID;?>';
                    }
                },
                error:function(){
                    alert('错误');
                }
            })
            return false;
        })
    })
</script>

<script>


    $('#allIn').change(function(){
        var options=$("#allIn option:selected");
       var shren=options.attr('shren');
       var shdizhi=options.attr('shdizhi');
       var youbian=options.attr('youbian');
       var mobile=options.attr('mobile');

        $('.shren').val(shren);
        $('.shdizhi').val(shdizhi);
        $('.youbian').val(youbian);
        $('.mobile').val(mobile);
    })


    function del(id){


        $.ajax({
            url:'../ajax/ajax_delCart.php',
            type:"POST",
            data:"id="+id,
            success:function(data){
                if(data=='1'){
                    location.href='cart.php';

//                   $('.'+id).html(" ");
                }
            },
            error:function(){
                alert('错误');
            }
        })
    }
</script>

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