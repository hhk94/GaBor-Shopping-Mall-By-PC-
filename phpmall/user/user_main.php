<?php
//require_once "../phpmall/admin/config/config.php";
//require_once "../phpmall/admin/down/userInfo.class.php";
//require_once "../phpmall/admin/down/connectDb.php";
require_once "../public/init.php";



@$_SESSION['webusername'];
@$_SESSION['webpassword'];
$userinfo = new UserInfo();

$zt= $userinfo->isok();

//switch ($zt){
//    case "4":
//        echo "账号错误";
//        break;
//    case "3":
//        echo "<script>alert('账号被锁定');location.href='login.php';</script>";
//        exit();
//        break;
//    case "2":
//        echo "<script>alert('欢迎登录嘉宝官方商城');</script>";
//        break;
//    case "1":
//        echo "<script>alert('账号未审核');</script>";
//        break;
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="嘉宝橱柜网络部 4535292@qq.com" />

    <meta http-equiv='X-UA-Compatible' content='chrome=1' />
    <title>嘉宝橱柜会员中心 - <?php echo $weburl;?></title>
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
a{text-decoration: none;
    display: block;}
 img{
     width: 100%;
     display: block;}
 .twoheader{
     background: #666;}
.twoheader ul{
    overflow: hidden;
    float: left;}
 .twoheader ul>li{
     float: left;}
 .twoheader ul>li>a{padding:2px 10px;margin:12px 10px;
     display: block;
     height: 20px;
     line-height:20px;
     color: white;

     font-size: 20px;}
 .twoheader ul>li:hover>a{
     color: #00a6b9;}

 .twoheader ol{overflow: hidden;
     float: right;}

 .twoheader ol>li{
     float: left;}
 .twoheader ol>li>a{padding:2px 10px;margin:12px 10px;
     display: block;
     height: 20px;
     line-height:20px;
     color: #666;
     background: white;
     font-size: 20px;
     -webkit-transition: all 0.3s ;
     -moz-transition: all 0.3s ;
     -ms-transition: all 0.3s ;
     -o-transition: all 0.3s ;
     transition: all 0.3s ;
 }
 .twoheader ol>li:hover>a{
     background: #00a6b9;
     color: white;}
    /*广播*/
 .board{
     height: 30px;
     background: #f0f0f0;}
.board a{
    line-height: 30px;
    font-size: 16px;
    color: black;}
 .board a>span{

     height: 20px;
     line-height:30px;
     display: inline-block;}

    /*个人中心主题*/
    .mainbody{margin-top:20px;}
    .main_title{margin-bottom:10px;
        border-bottom: 2px solid #666;
        font-size: 24px;}


 .main_nav{
     width: 180px;}
 .main_nav>li{
     font-size: 20px;
     position: relative;
     text-align: center;}
 .main_navlist{left:0;top:100%;
     width: 100%;
     position:relative;}
 .main_navlist a{
     font-size:16px;
     ;;}
 .main_navlist>li{
     border-radius: 10px;;
     -webkit-transition: all 0.3s ;
     -moz-transition: all 0.3s ;
     -ms-transition: all 0.3s ;
     -o-transition: all 0.3s ;
     transition: all 0.3s ;}
 .main_navlist>li:hover{
     background: #5bc0de;}
 .main_left a{
     color: black;}
 .main_left a:hover{ text-decoration: none!important;}
   .main_nav li{ color: black;
       width: 100%;}

    .mainLeft_light{
        color: #d9534f;}

 .btn-success{
     border-color: #f0f0f0 !important;;
     background:  #f0f0f0!important;
 }


 .btn-success:hover{
     border-color:#bfbfbf!important;
     color: black!important;
     background: #e0e0e0!important;}
 .btn-success.active, .btn-success:active, .open>.dropdown-toggle.btn-success{
     background: #e0e0e0!important;
 }
.main_left{
    float: left;}
.main_middle{margin:0 10px;

    width: 640px;
    /*border:1px solid #bfbfbf;*/
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    box-sizing: border-box;
    float: left;}
.main_right{
    border:1px solid #bfbfbf;

    box-sizing: border-box;
    width: 300px;
    float: right;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
}
    
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


 .main_middle_onsale ul>li>img{
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
    /*右边活动*/
    .main_right>div{margin:0 0 80px 0;}
 .main_right>div>h1{margin:0;
        font-size: 20px;
        height:40px;
        line-height:40px;
     text-indent:10px;

        background: #F0F0F0;}
 .main_right>div>ul{margin:10px 0 10px 20px}
 .main_right>div>ul>li{


     font-size: 16px;}
 .main_right>div>ul>li>a{overflow: hidden;
     text-overflow:ellipsis;
     white-space: nowrap;}
 .main_right>div>a{
     background: #f0f0f0;
     float: right;
 padding:10px ;
     margin:5px ;
     -webkit-border-radius:4px;
     -moz-border-radius:4px;
     border-radius:4px;
 }
 .main_right>div>a:hover{
     background: #e0e0e0;
     text-decoration: none;
 }
    #mainIframe{margin:0 65px;

        width: 640px;
        /*border:1px solid #bfbfbf;*/
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:4px;
        box-sizing: border-box;
        float: left;}
    
</style>
<body>
<?php
include webdir."/include/header.php";
?>

<div class="twoheader" style="display: none;">
    <div class="container">
        <ul>
            <li><a href="">厨房</a></li>
            <li><a href="">卧室</a></li>
            <li><a href="">客厅</a></li>
            <li><a href="">功能房</a></li>
            <li><a href="">全屋套餐</a></li>
            <li><a href="">木门</a></li>

        </ul>

        <ol>
            <li><a href="">热销</a></li>
            <li><a href="">降价</a></li>
            <li><a href="">推荐</a></li>

        </ol>


        <br style="clear: both;">
    </div>
</div>

<div class="board">
    <div class="container">
        <ul>
            <li><a href=""><span><img src="../img/user_main/laba.png" alt=""></span> 这里是广播</a></li>
        </ul>
    </div>
</div>

<div class="mainbody">
    <div class="container">
        <h1 class="main_title">个人中心</h1>
        <div>
            <?php
            include "./user_main_left.php";
            ?>




                <iframe src="user_main_middle_default.php"  rows="*" noresize="noresize" marginwidth="0" marginheight="0" frameborder="0" scrolling="no" name="main" id="mainIframe" onload="setIframeHeight(this)"></iframe>





            <div class="main_right">
                <div class="main_right_active">
                    <h1>便捷通道</h1>
                    <ul>
                        <?php

                        $article=$action->getArticle(" and typeid = '32' ",' order by id desc');

                        if(count($article)>=1){
                            foreach($article as $row){
                        ?>

                        <li><a href="../user_productList/productList.php?attr=1&order=3" target="_blank"><?php echo $row['title']?></a></li>


                        <?php

                            }

                        }
                        ?>

                    </ul>
                    <a href="../user_productList/productList.php">更多产品</a>
                </div>






<!--                <div class="main_right_admin">-->
<!--                    <h1>热门促销活动</h1>-->
<!--                    <ul>-->
<!--                        <li><a href="">促销信息链接xxxxxxxxx</a></li>-->
<!--                        <li><a href="">促销信息链接xxxxxxxxxxxxx</a></li>-->
<!--                        <li><a href="">促销信息链接xxxxx</a></li>-->
<!--                        <li><a href="">促销信息链接xxxxxxxxxxxx</a></li>-->
<!--                        <li><a href="">促销信息链接xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</a></li>-->
<!--                    </ul>-->
<!--                    <a href="">更多促销活动</a>-->
<!--                </div>-->


            </div>

            <br style="clear: both">
        </div>


    </div>
</div>



<?php

include webdir."/include/footer.php";
?>

</body>


<script>

    // document.domain = "caibaojian.com";
    function setIframeHeight(iframe) {
        if (iframe) {
            var iframeWin = iframe.contentWindow || iframe.contentDocument.parentWindow;
            if (iframeWin.document.body) {
                iframe.height = iframeWin.document.documentElement.scrollHeight || iframeWin.document.body.scrollHeight;
            }
        }
    };

    window.onload = function () {
        setIframeHeight(document.getElementById('external-frame'));
    };
</script>
<script>

    $(function(){


    })






</script>


<script>
    $('.main_navlist').hide();



    $('.main_nav>li').click(function(){
//    var i=$(this).index;
        $(this).find('.main_navlist').slideDown();
        $(this).addClass('mainLeft_light')
    })

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