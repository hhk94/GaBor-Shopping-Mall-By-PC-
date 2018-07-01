
<?php
//require_once "./../../phpmall/admin/config/config.php";

$cart=new cart();


$cartList=$cart->cartInfo();
?>
<link rel="stylesheet" href="<?php echo $webdir?>/css/bootstrap.min.css">
<style>

    .headerContainer{
        width: 1200px;
        margin 0 auto;
    }

    .header_admin a{
        color: white;display: inline-block;
    }
    .header_admin a:hover{
        color: #fe9249;}

    .headerRtop a:hover{color: #fe9249}

    .headerRight{
        float: left;}


    .headerRbottom>li{
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        height: 48px;
    }
    .h1,.h2,.h3,h1,h2,h3{margin-top:0;margin-bottom:0}
    .listCart td{
        line-height:40px!important;}


    .containerheader{
        width: 1280px;margin:0 auto;
    }



</style>
<script>
    function addFavorite(sURL, sTitle)
    {
        try
        {
            window.external.addFavorite(sURL, sTitle);
        }
        catch (e)
        {
            try
            {
                window.sidebar.addPanel(sTitle, sURL, "");
            }
            catch (e)
            {
                alert("加入收藏失败，有劳您 ctrl+d 手动添加。");
            }
        }
    }
</script>


<div class="header"  style="">
    <div class="headerContainer" style="height: 115px; margin: 0 auto;">
        <div class="headerLeft"><?php if(ISLOGIN){?>
                <p class="header_admin">Hi,<a href="<?php echo $webdir?>/user/user_main.php" style=""><?php echo UID;?></a>,欢迎来到嘉宝橱柜！<a href="<?php echo $webdir ?>/user/login_out.php" >退出登录</a></p>
            <?php }else{?>
                <p><a href="<?php echo $webdir?>/user/login.php" style="color: white;">亲爱的游客您好，请先登录</a></p>
            <?php }?>
            <div class="logo">
                <a href="<?php echo $webdir?>/index.php">
                    <img src="<?php echo $webdir?>/img/logo.png" alt="" style="width: 161px;">
                </a>
            </div>
        </div>
        <div class="headerRight">
            <ul class="headerRtop">

                <li><a href="">个人中心</a></li>
                <li><a href="javascript:addFavorite('http://<?php echo $weburl;?>','<?php echo $webname;?>')">关注嘉宝</a></li>
                <li><a href="#">售前咨询热线：<?php echo $webtel;?></a></li>
                <li><a href="#">售后电话：0731-88334455</a></li>
                <li>
                    <?php if(!ISLOGIN) { ?>
                        <a href="<?php echo $webdir ?>/user/login.php">登录</a>
                        <?php
                    }else{
                        ?>
                        <a href="<?php echo $webdir ?>/user/login_out.php">退出</a>
                    <?php }?>
                </li>
                <li><a href="<?php echo $webdir?>/user/zhuce.php">注册</a></li>
                <li><a href="<?php echo $webdir?>/user/cart.php" target="_blank">购物车（<?php echo $_SESSION['cartCount']?>）</a></li>
            </ul>
            <ol class="headerRbottom">
                <li ><a href="<?php echo $webdir ?>/index.php">首页</a></li>
                <li><a href="<?php echo $webdir ?>/user_productList/chugui/chugui.php" >橱柜</a></li>
                <li><a href="<?php echo $webdir ?>/user_productList/yigui/yigui.php" >衣柜</a></li>
                <li><a href="<?php echo $webdir ?>/user_productList/quanwu/quanwu.php" >全屋</a></li>

                <li><a href="<?php echo $webdir ?>/user_design/designList.php?page=1">设计师</a></li>
                <li><a href="<?php echo $webdir ?>/user_process/process.php">定制流程</a></li>

                <li><a href="<?php echo $webdir ?>/user_about/about.php">关于嘉宝</a></li>
            </ol>
        </div>


    </div>
</div>


<script>
    $(function(){
        //导航
        $('.headerRbottom>li').mouseover(function(){
            $(this).addClass('navActive').siblings('li').removeClass('navActive');
        });
    });





</script>

<script>
//    $('.cartBuy').hover(function(){
//        $(this).children('div').slideDown(300);
//    },function () {
//        $('.listCart').stop(true,true).slideUp(300);
//    })
//
//
//    function del(id){
//
//
//        $.ajax({
//            url:'../ajax/ajax_delCart.php',
//            type:"POST",
//            data:"id="+id,
//            success:function(data){
//                if(data=='1'){
//                    location.reload();;
//
////                   $('.'+id).html(" ");
//                }
//            },
//            error:function(){
//                alert('错误');
//            }
//        })
//    }
</script>

