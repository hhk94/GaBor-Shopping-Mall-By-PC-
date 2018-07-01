
<?php
require_once "public/init.php";




?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="嘉宝橱柜网络部 4535292@qq.com" />
    <meta name="Keywords" content="<?php echo $webkey?>" />
    <meta name="Description" content="<?php echo $webDescription?>" />
    <meta http-equiv='X-UA-Compatible' content='chrome=1' />
    <title><?php echo $webtitle;?> </title>
    <link rel="stylesheet" href="css/initail.css">
    <link rel="stylesheet" href="css/comment.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/idangerous.swiper.css">

    <!–[if IE]>
    <script src="js/html5.js"></script>
    <![endif]–>

    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/idangerous.swiper.js"></script>
    <script src="js/jquery.SuperSlide.2.1.1.js"></script>
    <script src="js/index.js"></script>

    <script>
        $(function(){ $('input, textarea').placeholder(); });
    </script>

</head>
<!–[if IE]>
<script src="js/html5.js"></script>
<![endif]–>

<style>


    html,body{
        font-family: '微软雅黑'!important;
        background: #f7f8fa!important;
        
    }


    .cricle>img{
        width: 100%;}

    /*长条动画*/
    .show>li:hover{    box-shadow: 0 0 10px rgba(0,0,0,.16)}
    /*热卖推荐动画*/
    .IndSection3>.container>ul>li:hover div>img{
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);}

    /*case动画*/
    /*.IndSection7 a:hover>img{*/
        /*transform:scale(1.1);*/
    /*}*/


    /*.IndSection7{margin-top:45px;}*/

    .title>a{
        font-size: 16px;
        background: transparent!important;
        float: right!important;}




    .quanwu .bodyRightBottom{
        overflow: hidden;}

    .quanwu .bodyRightBottom>div{
        /*background: #f2f2f2;*/
        height: 146px;
        /*width: 98.8%;margin:20px .1% 0 .1%;*/
        width: 100%;

    }


    .indexForm_2 .txtMarquee-top .infoList li a{
        font-size: 18px;
        margin-left:10px;margin-right:10px;
    }
    .indexForm_2 .tempWrap{
        height: 207px!important;
    }

    .indexForm_2 .txtMarquee-top .infoList li{ height:36px; line-height:36px;   }

    /*滚动评论*/

    .txtMarquee-top{ width:100%;  overflow:hidden; position:relative;  ;   }


    .txtMarquee-top .bd{ padding:15px 5px 15px 5px;  }
    .txtMarquee-top .infoList li{ height:24px; line-height:24px;   }
    .txtMarquee-top .infoList li .date{ float:right; color:#999;  }
    .txtMarquee-top .infoList li a{
        font-size: 12px;}


    .bd li{text-overflow: ellipsis;
        white-space: nowrap;    overflow: hidden;}

    /*衣柜？*/
    .sideMenu{  border:1px solid #ddd;  }
    .sideMenu h3{
        color: black;
        font-size: 14px;height:36px; line-height:36px; padding-left:10px;  background:#f4f4f4; cursor:pointer;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border-bottom:1px solid #cccccc;
        letter-spacing: 1px;
    ;
    }
    .sideMenu h3 em{ float:right; display:block; width:40px; height:32px;   background: 16px 12px no-repeat; cursor:pointer; }
    .sideMenu h3.on em{ background-position:16px -57px; }
    .sideMenu ul{ color:#999; display:none; /* 默认都隐藏 */ }

    .bodyRight>h1{
        font-size: 28px;
        color: white;
        text-align: center;
        letter-spacing: 2px;
        background: #fe9249;
        line-height: 50px;}
    .sideMenu li>a>div{
        width: 100%;
        height: 178px;
        background: pink;}
    .sideMenu li>a>p{
        font-size: 14px;
        text-align: left;
        width: 90%;margin:15px 5%;
        text-indent:20px;}


    .IndSection6 .swiper-pagination-switch{
        background: white;
    }
    .IndSection6 .swiper-active-switch{
        background: #344a5d;}

    .fix{
        display: none;
        width: 100%;
        height: 100%;
        position: fixed;
        top:0;left:0;
        z-index:9998;
        /*background: rgba(0,0,0,0.1);*/
    }
    .fixBG{
        background: rgb(0,0,0);
        opacity:0.6;
        left:0;
        top:0;
        width: 100%;
        height: 100%;
        position:absolute;
        filter:alpha(opacity=80);
        z-index: -1;

    }

    .fix_juzhong{
        position: absolute;
        top:25%;
        left:25%;

    }
    .fix_close{
        width: 48px;
        height: 48px;
        position: absolute;
        top:10px;
        right:10px;
        z-index:9999;
    }
    .IndSection2 .button{
        margin-left:13%;
    }





    .tabs .a1{
        background: url(img/chugui/tab/yzx1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a1:hover{
        background: url(img/chugui/tab/yzx2.png) ;
    }

    .tabs .a2{
        background: url(img/chugui/tab/langx1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a2:hover{
        background: url(img/chugui/tab/langx2.png) ;
    }
    .tabs .a3{
        background: url(img/chugui/tab/lx1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a3:hover{
        background: url(img/chugui/tab/lx2.png) ;
    }
    .tabs .a4{
        background: url(img/chugui/tab/ux1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a4:hover{
        background: url(img/chugui/tab/ux2.png) ;
    }


    .tabs2 .a1{
        background: url(img/yigui/tab/pkm1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a1:hover{
        background: url(img/yigui/tab/pkm2.png) ;
    }

    .tabs2 .a2{
        background: url(img/yigui/tab/ym1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a2:hover{
        background: url(img/yigui/tab/ym2.png) ;
    }
    .tabs2 .a3{
        background: url(img/yigui/tab/ymj1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a3:hover{
        background: url(img/yigui/tab/ymj2.png) ;
    }

    .tabs3 .a1{
        background: url(img/mumen/tab/ym1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs3 .a1:hover{
        background: url(img/mumen/tab/ym2.png) ;
    }
    .tabs3 .a2{
        background: url(img/mumen/tab/sm1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs3 .a2:hover{
        background: url(img/mumen/tab/sm2.png) ;
    }

    .tabs4 .a1{
        background: url(img/quanwu/tab/ttm1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a1:hover{
        background: url(img/quanwu/tab/ttm2.png) ;
    }

    .tabs4 .a2{
        background: url(img/quanwu/tab/jiugui1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a2:hover{
        background: url(img/quanwu/tab/jiugui2.png) ;
    }

    .tabs4 .a3{
        background: url(img/quanwu/tab/ysg1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a3:hover{
        background: url(img/quanwu/tab/ysg2.png) ;
    }
    .tabs4 .a4{
        background: url(img/quanwu/tab/sg1.png) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a4:hover{
        background: url(img/quanwu/tab/sg2.png) ;
    }

    /*.indexForm_1{*/

    /*border-top:1px solid #34495e;*/
    /*border-bottom:1px solid #34495e;*/
    /*}*/
    /*.IndSection2 form{*/

    /*border-top:1px solid #34495e;*/
    /*border-bottom:1px solid #34495e;*/
    /*}*/
    /*.indexForm_2{*/
    /*border-top:1px solid #34495e;*/
    /*border-bottom:1px solid #34495e;*/
    /*border-right:1px solid #34495e;*/
    /*}*/
    .wood-slide a{
        width: 256px;
        height: 151px;}

    .Indwood .DesLeft>a>div{
        line-height:50px;

        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        height:0;
        background:#fe9249;
    }








    .Indwood .DesLeft>a:hover>div{
        height: 50px;

    }




    .Indwood .DesLeft div>h1{
        margin-top:9px;
    }
    .wood-slide a{
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
    }
    .wood-slide a>h1{
        position: absolute;
        left:0;
        bottom:0;
        width: 100%;
        height: 40px;
        background: #fe9249;
        color: white;
        line-height:40px;
    }
    .indexJoin{
        position: fixed;
        left:0;
        bottom:0;
        z-index:9900;
        height: 347px;
        width: 100%;

        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .joinbg{
        z-index:-1;
        background: rgb(0,0,0);
        opacity:0.6;
        left:0;
        top:0;
        width: 100%;
        height: 100%;
        position:absolute;
        filter:alpha(opacity=80);
    }


    .joinContainer{
        z-index:9901;
        width: 960px;
        margin:0 auto;

        position: relative;
        background: white;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 -4px 0 #ffba56 ;
        -moz-box-shadow: 0 -4px 0 #ffba56 ;
        box-shadow: 0 -4px 0 #ffba56 ;
    }
    .joinContainer1{
        margin-top:50px;
        z-index:9901;
    }
    .joinYuyue{
        width: 312px;
        position: absolute;
        left:0;
        bottom:0;
        -webkit-transition: all 0.6s ;
        -moz-transition: all 0.6s ;
        -ms-transition: all 0.6s ;
        -o-transition: all 0.6s ;
        transition: all 0.6s ;
    }
    .joinYuyue>img{

    }

    .joinRight>h1{
        margin-top:15px;
        text-align: center;
        font-weight:bold;
        color: #0dbace;
        font-size: 24px;
        margin-bottom:6px;
        letter-spacing: 2px;
    }
    .joinRight{

        float: right;
        width: 650px;
    }
    .joinInput>span{
        font-size: 16px;}
    .joinInput{
        margin-top:10px;
        margin-left:20px;
    }
    .joinInput>input{
        text-align: center;

        width: 158px;
        height: 30px;
        border:1px solid #999999;
        font-size: 12px;
        line-height: 32px;

    }
    .radio{
        position: relative;
    }
    .radio>input{
        margin-left:18px;
        width: 16px;
        height: 16px;
        position: relative;
        top:2px;
    }
    .yuyuebutton{
        display: inline-block;
        width: 160px;
        height: 32px;
        background: #0dbace;
        text-align: center;
        color: white;
        font-size: 12px;
        line-height:32px;

        cursor: pointer;
    }
    .jiantou{
        position: absolute;
        right:0;
        top:5px;
    }
    .jointop{
        position: absolute;
        right:100px;
        top:5px;
        width: 471px;
        height: 40px;
    }

    .joinTitle{
        margin-right:16px;
    }

    .joinH{
        height: 46px;
    }
    .joinRight>h5{
        text-align: center;
        margin-bottom:8px;
    }

    .joinH .joinYuyue{
        bottom:300px;
    }

    .joinH .jiantou{

        animation:move  0.4s linear infinite alternate;
    }
    .joinH .jiantou>img{
        transform:rotate(180deg);
        -ms-transform:rotate(180deg); 	/* IE 9 */
        -moz-transform:rotate(180deg); 	/* Firefox */
        -webkit-transform:rotate(180deg); /* Safari 和 Chrome */
        -o-transform:rotate(180deg); 	/* Opera */
    }

    @keyframes move {
        0% {
            -webkit-transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
            -o-transform: translateY(0px);
            transform: translateY(0px);  }
        100% {
            -webkit-transform: translateY(-5px);
            -moz-transform: translateY(-5px);
            -ms-transform: translateY(-5px);
            -o-transform: translateY(-5px);
            transform: translateY(-5px);
        }

    }

    .formLine{
        position: relative;
    }
    .formLine::after{
        content: '';
        display: block;
        position: absolute;
        top:28px;left:0;
        width: 100%;
        height: 2px;
        background: #ff0000;
    }
    .formLine::before{
        content: '';
        display: block;
        position: absolute;
        bottom:28px;left:0;
        width: 100%;
        height: 2px;
        background: #ff0000;
    }


    /*.hotabs{*/
        /*position: absolute;*/
        /*left:0;*/
        /*top:195px;*/
    /*}*/
    .kouhao{
        margin-top:10px;
        text-align: center;
        font-weight:bold;
        font-size: 24px;
    }
    .kouhao>span{
        color: #ff0000;
    }

    .newform{
        margin-top:30px;
        margin-bottom:20px;
    }
    .newform>.container{
        width: 1200px;
        background: white;
        height: 390px;
        border:1px solid #a3a3a3;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        box-sizing: border-box;
    }
    .newformLeft{
        margin-top:54px;
        margin-left:42px;
        float: left;}
    .newformmid{
        width: 380px;
        margin-top:73px;
        float: left;
    }
    .newformmid>img{
        width: 100%;
    }
    .formRight{
        float: right;
        width: 300px;
        height: 368px;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow:0 0 10px #a3a3a3 ;
        -moz-box-shadow: 0 0 10px #a3a3a3 ;
        box-shadow: 0 0 10px #a3a3a3 ;
        margin-top:11px;
        margin-right:37px;
    }
    .Rtop{
        width: 256px;
        margin:10px auto 0 auto;
    }

    .formRight>input{
        width: 240px;
        height:44px;
        background: #eeeeee;
        -webkit-border-radius:15px;
        -moz-border-radius:15px;
        border-radius:15px;
        margin:9px auto;
        display: block;
        text-indent:20px;
        font-size: 17px;
        outline:none;
    }
    .indexName{
        margin-top:35px!important;
    }

    .newform .button{
        width: 242px;
        height: 36px;
        -webkit-border-radius:36px;
        -moz-border-radius:36px;
        border-radius:36px;
        line-height:36px;
        font-size: 24px;
        font-weight:bold;
        text-align: center;
        color: white;
        background: linear-gradient(176deg,#fd9140,#fd4646);
        margin:21px auto 0 auto;
    }

    .newformleftBom{
        margin-top:18px;
        width: 326px;
        height: 178px;
        -webkit-border-radius:20px;
        -moz-border-radius:20px;
        border-radius:20px;
        overflow: hidden;

    }
    .newformleftBom li>a{
        text-align: center;
        width: 100%;
        display: block;
    }
    .newformleftBom li:nth-of-type(odd){
        background: #fdbb94;
    }
    .newformleftBom li:nth-of-type(even){
        background: #f4f4f4;
    }
    .newformleftBom .txtMarquee-top .bd{
        padding:0!important;;
    }



    /*change1.0*/
    /*.hotabs{*/
        /*position: absolute;*/
        /*left:0;*/
        /*top:195px;*/
    /*}*/

    .IndSection3 li>a {
        position: relative;
        width: 100%;
        height: 100%;
        display: block;
    }
    .tabs .a1{
        background: url(img/chugui/tab/yzx1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a1:hover{
        background: url(img/chugui/tab/yzx2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs .a2{
        background: url(img/chugui/tab/langx1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a2:hover{
        background: url(img/chugui/tab/langx2.png?tempid=<?php echo rand()?>) ;
    }
    .tabs .a3{
        background: url(img/chugui/tab/lx1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a3:hover{
        background: url(img/chugui/tab/lx2.png?tempid=<?php echo rand()?>) ;
    }
    .tabs .a4{
        background: url(img/chugui/tab/ux1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs .a4:hover{
        background: url(img/chugui/tab/ux2.png?tempid=<?php echo rand()?>) ;
    }


    .tabs2 .a1{
        background: url(img/yigui/tab/pkm1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a1:hover{
        background: url(img/yigui/tab/pkm2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs2 .a2{
        background: url(img/yigui/tab/ym1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a2:hover{
        background: url(img/yigui/tab/ym2.png?tempid=<?php echo rand()?>) ;
    }
    .tabs2 .a3{
        background: url(img/yigui/tab/ymj1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs2 .a3:hover{
        background: url(img/yigui/tab/ymj2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs3 .a1{
        background: url(img/mumen/tab/ym1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs3 .a1:hover{
        background: url(img/mumen/tab/ym2.png?tempid=<?php echo rand()?>) ;
    }
    .tabs3 .a2{
        background: url(img/mumen/tab/sm1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs3 .a2:hover{
        background: url(img/mumen/tab/sm2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs4 .a1{
        background: url(img/quanwu/tab/ttm1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a1:hover{
        background: url(img/quanwu/tab/ttm2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs4 .a2{
        background: url(img/quanwu/tab/jiugui1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a2:hover{
        background: url(img/quanwu/tab/jiugui2.png?tempid=<?php echo rand()?>) ;
    }

    .tabs4 .a3{
        background: url(img/quanwu/tab/ysg1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a3:hover{
        background: url(img/quanwu/tab/ysg2.png?tempid=<?php echo rand()?>) ;
    }
    .tabs4 .a4{
        background: url(img/quanwu/tab/sg1.png?tempid=<?php echo rand()?>) ;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .tabs4 .a4:hover{
        background: url(img/quanwu/tab/sg2.png?tempid=<?php echo rand()?>) ;
    }



    .show h3{
        text-align: center;
        text-decoration: line-through;
    }
    .wood-slide a{
        width: 256px;
        height: 151px;}

   
    .Indwood .DesLeft div>h1{
        margin-top:9px;
    }
    .wood-slide a{
        position: relative;
        display: block;
        width: 97%;
        overflow: hidden;
        height: 100%;
    }


    .indexJoin{
        position: fixed;
        left:0;
        bottom:0;
        z-index:9900;
        height: 347px;
        width: 100%;

        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .joinbg{
        z-index:-1;
        background: rgb(0,0,0);
        opacity:0.6;
        left:0;
        top:0;
        width: 100%;
        height: 100%;
        position:absolute;
        filter:alpha(opacity=80);
    }


    .joinContainer{
        z-index:9901;
        width: 960px;
        margin:0 auto;

        position: relative;
        background: white;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 -4px 0 #ffba56 ;
        -moz-box-shadow: 0 -4px 0 #ffba56 ;
        box-shadow: 0 -4px 0 #ffba56 ;
    }
    .joinContainer1{
        margin-top:50px;
        z-index:9901;
    }
    .joinYuyue{
        width: 312px;
        position: absolute;
        left:0;
        bottom:0;
        -webkit-transition: all 0.6s ;
        -moz-transition: all 0.6s ;
        -ms-transition: all 0.6s ;
        -o-transition: all 0.6s ;
        transition: all 0.6s ;
    }
    .joinYuyue>img{

    }

    .joinRight>h1{
        margin-top:15px;
        text-align: center;
        font-weight:bold;
        color: #0dbace;
        font-size: 24px;
        margin-bottom:6px;
        letter-spacing: 2px;
    }
    .joinRight{

        float: right;
        width: 650px;
    }
    .joinInput>span{
        font-size: 16px;}
    .joinInput{
        margin-top:10px;
        margin-left:20px;
    }
    .joinInput>input{
        text-align: center;

        width: 158px;
        height: 30px;
        border:1px solid #999999;
        font-size: 12px;
        line-height: 32px;

    }
    .radio{
        position: relative;
    }
    .radio>input{
        margin-left:18px;
        width: 16px;
        height: 16px;
        position: relative;
        top:2px;
    }
    .yuyuebutton{
        display: inline-block;
        width: 160px;
        height: 32px;
        background: #0dbace;
        text-align: center;
        color: white;
        font-size: 12px;
        line-height:32px;

        cursor: pointer;
    }
    .jiantou{
        position: absolute;
        right:0;
        top:5px;
    }
    .jointop{
        position: absolute;
        right:100px;
        top:5px;
        width: 471px;
        height: 40px;
    }

    .joinTitle{
        margin-right:16px;
    }

    .joinH{
        height: 46px;
    }
    .joinRight>h5{
        text-align: center;
        margin-bottom:8px;
    }



    .joinH .jiantou{

        animation:move  0.4s linear infinite alternate;
    }
    .joinH .jiantou>img{
        transform:rotate(180deg);
        -ms-transform:rotate(180deg); 	/* IE 9 */
        -moz-transform:rotate(180deg); 	/* Firefox */
        -webkit-transform:rotate(180deg); /* Safari 和 Chrome */
        -o-transform:rotate(180deg); 	/* Opera */
    }

    @keyframes move {
        0% {
            -webkit-transform: translateY(0px);
            -moz-transform: translateY(0px);
            -ms-transform: translateY(0px);
            -o-transform: translateY(0px);
            transform: translateY(0px);  }
        100% {
            -webkit-transform: translateY(-5px);
            -moz-transform: translateY(-5px);
            -ms-transform: translateY(-5px);
            -o-transform: translateY(-5px);
            transform: translateY(-5px);
        }

    }

    .wood-slide .touxiang h1{
        font-size: 16px;
    }
    .Indwood .swiper-slide7-1wood{
        /*background: #e0e0e0;*/
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border-bottom:6px solid white;
        overflow: hidden;
        position: relative;

    }

    .swiper-slide7-1wood>h5{
        position: absolute;
        display: none;
        margin:0;
        right:0;
        top:0;
        height: 144px;
        width: 18px;
        background: url(img/woodactive.png) no-repeat center center /cover;

    }
    .swiper-slide7-1wood.active>h5{
        display: block;
    }

    .llist img{
        width: 100%;
    }
    .swiper-slide3>div+div{margin-left:15px;}
    .container{
        width: 1200px!important;}

    .IndSection6 .swiper-container7-1{
        height: 435px;
    }
    .IndSection6 .swiper-container7-1wood{
        height: 435px;
        overflow: hidden;
    }

    .IndSection6 .swiper-container7-2{
        height: 500px;
    }
section .swiper-container{
    height: 516px;
}

    .IndSection6 .bodyCenter{
        height: 528px;
    }

    .xinpinList{
        position: relative;
        height: 210px;
        width: 350px;margin:20px;
        overflow: hidden;

    }
    .xinpinList>h1{
        position: absolute;
        bottom:0;
        left:0;
        width: 100%;
        height: 40px;
        line-height:40px;
        text-align: center;
        color: white;
        font-weight:bold;
        font-size: 20px;
        background: rgba(252,145,73,0.9);
    }
    .xinpinList>img{
        width: 100%;
    }

    .title{margin:48px auto 10px auto;
        width: 280px;
    }

    .indexmore{
        text-align: right;
        width: 100%;
        display: block;
        color: black;
    }



    .device {
        width: 100%;
        position: relative;

    }
    .indexcase .swiper-container-case {
        width: 100%;
        height: 520px;
        padding-top:10px;
        /*padding-bottom:10px;*/
        color: #fff;
        /*background: #222;*/
        text-align: center;
    }
    .indexcase .swiper-slide-case {
        height: 500px!important;

        opacity: 0.4;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -ms-transition: 300ms;
        -o-transition: 300ms;
        transition: 300ms;
        -webkit-transform: scale(0);
        -moz-transform: scale(0);
        -ms-transform: scale(0);
        -o-transform: scale(0);
        transform: scale(0);
    }
    .indexcase .swiper-slide-visible {
        opacity: 0.5;
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
        -o-transform: scale(0.8);
        transform: scale(0.8);
    }
    .indexcase .swiper-slide-active {
        top: 0;
        opacity: 1;
        width: 800px;
        -webkit-transform: scale(1);
        -moz-transform: scale(1);
        -ms-transform: scale(1);
        -o-transform: scale(1);
        transform: scale(1);
    }

    .indexcase .swiper-slide .title {
        font-style: italic;
        font-size: 42px;
        margin-top: 80px;
        margin-bottom: 0;
        line-height: 45px;
    }
    .indexcase .pagination-case {
        position: absolute;
        z-index: 20;
        left: 50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        /*width: 100%;*/
        text-align: center;
        bottom: 5px;
    }
    .indexcase .swiper-pagination-switch {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 8px;
        background: #aaa;
        margin-right: 8px;
        cursor: pointer;
        -webkit-transition: 300ms;
        -moz-transition: 300ms;
        -ms-transition: 300ms;
        -o-transition: 300ms;
        transition: 300ms;
        opacity: 0;
        position: relative;
        top: -50px;
    }
    .indexcase .swiper-visible-switch {
        opacity: 1;
        top: 0;
        background: #aaa;
    }
    .indexcase .swiper-active-switch {
        background: #fff;
    }


    .Indwood .designerLeft .arrow-left{
        width: 258px;left:0;
    }
    .Indwood .designerLeft .arrow-right{
        width: 258px;left:0;
    }
     .swiper-slide-case.swiper-slide-active{
         -webkit-box-shadow: 0 0  20px #666;
         -moz-box-shadow: 0 0  20px #666;
         box-shadow: 0 0  20px #666;
     }

    .device .arrow-left {
        z-index:9999;
        position: absolute;
        left: 10px;
        top: 50%;
        margin-top: -15px;
        width: 30px;
        height: 30px;
    }
    .device .arrow-left>img{
        width: 100%;}
    .device .arrow-right {
        z-index:9999;
        position: absolute;
        right: 10px;
        top: 50%;
        margin-top: -15px;
        width: 30px;
        height: 30px;
    }
    .device .arrow-right>img{
        width: 100%;}

.allout{
    overflow: hidden;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index:9997;
    top:0;left:0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    -ms-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
    .allBG{
        position: absolute;
        left:0;
        top:0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.1);
    }
    .allContent{
        position: absolute;
        left:50%;
        top:50%;
        -webkit-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -o-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
        width: 600px;
        height: 504px;
        background: url(img/out/outBG.png) no-repeat center center /cover;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        overflow: hidden;
    }
    .allgo{
        width: 264px;
        height: 50px;
        position: absolute;
        left:50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        bottom:37px;
    }


    .allbaoming{
        position: absolute;
        left:50%;
        top:50%;
        -webkit-transform: translate(-50%,-50%);
        -moz-transform: translate(-50%,-50%);
        -ms-transform: translate(-50%,-50%);
        -o-transform: translate(-50%,-50%);
        transform: translate(-50%,-50%);
        width: 600px;

        background: url(img/out/baomingBG.png) no-repeat center center /cover;
        -webkit-transition: all 0.3s;
        -moz-transition: all 0.3s;
        -ms-transition: all 0.3s;
        -o-transition: all 0.3s;
        transition: all 0.3s;
        overflow: hidden;

        height:0;
    }

    .buttonout{
        width: 284px;
        height: 52px;
        position: absolute;
        left:50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        bottom:37px;
        cursor: pointer;
        z-index: 9999;
    }

    .allbaoming input{
        width: 398px;
        height: 48px;border:1px solid #e2004c;
        margin-left:100px;
        text-indent:13px;
        font-size: 16px;
    }
    .input1{
        margin-top:223px!important;
    }
    .input2{
        margin-top: 15px!important;
    }
</style>
<body>
<?php

include webdir."/include/header.php";
////?>

<!--轮播图-->
<section class="IndSection" id="section1">
    <!-- Swiper -->

    <div class="swiper-container swiper-container2">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-slide2"><a href="zhuanti/618back/index.html" target="_blank"><img src="indexImg/topBanner/1.jpg?tempid=<?php echo rand()?>" alt=""></a></div>


            <div class="swiper-slide swiper-slide2"><a href="user_about/about.php" target="_blank"><img src="indexImg/topBanner/dingzhi.jpg?tempid=<?php echo rand()?>" alt=""></a></div>


        </div>
        <div class="pagination pagination2"></div>
    </div>

    <div class="container container1 ">
        <div >
            <br style="clear: both;">
            <h1>商品分类</h1>
            <ul class="listShow">
                <?php

                $menu=$action->getProductType(" and tid = '0' ");
                foreach($menu as $row){
                ?>
                    <li onclick="javascript:location.href='user_productList/productList.php?id=<?php echo $row['id'];?>'" target="_blank"><?php echo $row['typename'];?><span></span></li>
                <?php
                }
                ?>

<!--                <li onclick="javascript:location.href='productShow/chuguiShow.php'">厨房/整体橱柜<span></span></li>-->
<!--                <li onclick="javascript:location.href='productShow/yiguiShow.php'">卧室/衣柜/衣帽间<span></span></li>-->
<!--                <li onclick="javascript:location.href='productShow/yiguiShow.php'">客厅/餐厅/电视柜<span></span></li>-->
<!--                <li onclick="javascript:location.href='productShow/yiguiShow.php'">功能房/书房/榻榻米<span></span></li>-->
<!--                <li onclick="javascript:location.href='productShow/quanwuShow.php'">全屋套餐<span></span></li>-->
<!--                <li onclick="javascript:location.href='productShow/mumenShow.php'">嘉宝木门<span></span></li>-->



            </ul>
            <ol class="listShowCon">
                <li>
                    <h2>风格</h2>
                    <a href="user_productList/productList.php?id=38" target="_blank">欧式风格</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">新中式风格</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">现代简约风格</a>
                    <h2>布局</h2>
                    <a href="user_productList/productList.php?id=38" target="_blank">一字型</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">L型</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">U型</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">廊型</a>
                    <a href="user_productList/productList.php?id=38" target="_blank">岛型</a>
                    <div><img src="indexImg/list1.png" alt=""></div>
                </li>
                <li>
                    <h2>风格</h2>
                    <a href="user_productList/productList.php?id=39" target="_blank">欧式风格</a>
                    <a href="user_productList/productList.php?id=39" target="_blank">新中式风格</a>
                    <a href="user_productList/productList.php?id=39" target="_blank">现代简约风格</a>
                    <!--<h2>布局</h2>-->
                    <!--<a href="#">一字型</a>-->
                    <!--<a href="#">L型</a>-->
                    <!--<a href="#">U型</a>-->
                    <!--<a href="#">廊型</a>-->
                    <!--<a href="#">岛型</a>-->
                    <div><img src="indexImg/list2.jpg" alt=""></div>
                </li>
                <li>
                    <h2>风格</h2>
                    <a href="user_productList/productList.php?id=46" target="_blank">欧式风格</a>
                    <a href="user_productList/productList.php?id=46" target="_blank">新中式风格</a>
                    <a href="user_productList/productList.php?id=46" target="_blank">现代简约风格</a>
                    <!--<h2>布局</h2>-->
                    <!--<a href="#">一字型</a>-->
                    <!--<a href="#">L型</a>-->
                    <!--<a href="#">U型</a>-->
                    <!--<a href="#">廊型</a>-->
                    <!--<a href="#">岛型</a>-->
                    <div><img src="indexImg/list3.jpg" alt=""></div></li>
                <li>
                    <h2>风格</h2>
                    <a href="user_productList/productList.php?id=40" target="_blank">欧式风格</a>
                    <a href="user_productList/productList.php?id=40" target="_blank">新中式风格</a>
                    <a href="user_productList/productList.php?id=40" target="_blank">现代简约风格</a>
                    <!--<h2>布局</h2>-->
                    <!--<a href="#">一字型</a>-->
                    <!--<a href="#">L型</a>-->
                    <!--<a href="#">U型</a>-->
                    <!--<a href="#">廊型</a>-->
                    <!--<a href="#">岛型</a>-->
                    <div><img src="indexImg/list4.jpg" alt=""></div>
                </li>
<!--                <li>-->
<!--                    <h2>风格</h2>-->
<!--                    <a href="productShow/quanwuShow.php">欧式风格</a>-->
<!--                    <a href="productShow/quanwuShow.php">新中式风格</a>-->
<!--                    <a href="productShow/quanwuShow.php">现代简约风格</a>-->
<!--                    <!--<h2>布局</h2>-->
<!--                    <!--<a href="#">一字型</a>-->
<!--                    <!--<a href="#">L型</a>-->
<!--                    <!--<a href="#">廊型</a>-->
<!--                    <!--<a href="#">岛型</a>-->
<!--                    <div><img src="indexImg/list5.jpg" alt=""></div>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <h2>风格</h2>-->
<!--                    <a href="productShow/mumenShow.php">欧式风格</a>-->
<!--                    <a href="productShow/mumenShow.php">新中式风格</a>-->
<!--                    <a href="productShow/mumenShow.php">现代简约风格</a>-->
<!--                    <!--<h2>布局</h2>-->
<!--                    <!--<a href="#">一字型</a>-->
<!--                    <!--<a href="#">L型</a>-->
<!--                    <!--<a href="#">U型</a>-->
<!--                    <!--<a href="#">廊型</a>-->
<!--                    <!--<a href="#">岛型</a>-->
<!--                    <div><img src="indexImg/list6.jpg" alt=""></div>-->
<!--                </li>-->
            </ol>
        </div>
    </div>
</section>
<!--表单-->
<section class="newform" id="newform">
    <div class="container">
        <div class="newformLeft">
            <div><img src="img/newform/newformleft.png" alt=""></div>

            <div class="newformleftBom">
                <div class="txtMarquee-top txtMarquee-top1" >

                    <div class="bd bd1">
                        <ul class="infoList">
                            <?php
                            $list=$action->getArticle(" and typeid = 22 ",$order=" order by id desc ",$limit="  ");
                            foreach ($list as $row){
                                ?>
                                <li><a href="user_article/show.php?id=<?php echo $row['id']?>" target="_blank"><?php echo $row['title']?></a></li>
                                <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>

            </div>



        </div>
        <div class="newformmid">
            <img src="img/newform/newformmid.png" alt="">
        </div>

        <form action="" class="formRight">
            <div class="Rtop"><img src="img/newform/newformRtop.png" alt=""></div>

            <input  type="text" name="indexName" class="indexName" placeholder="姓名：">
            <input type="text" name="indexNum" class="indexNum" placeholder="电话：">
            <input type="text" name="indexLocal" class="indexLocal" placeholder="楼盘地址：">
            <div class="button" style="">立即预约</div>
        </form>

        <br style="clear: both;">
    </div>
</section>


<!--新增长条-->
<section class="IndSection2-2">
    <div class="container">
        <h1 class="title"><img src="img/title/titleremai.png" alt=""></h1>
    </div>
    <ul class="show container">

        <?php
        $productList=$action->getProduct(3,4);

        foreach($productList as $row){
        ?>
            <li>
                <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank">
                    <p><?php echo strindex($row['tuijianword'],12,"...")?></p>
                    <div><img src="<?php echo str_replace("../../","",$row['toindex']) ?>" alt=""></div>
                    <div class="fontBG">
                        <h3>￥<span><?php echo $row['yprice']?></span></h3>
                        <h1><span>￥</span><?php echo $row['price']?></h1>

                    </div>
                    <br style="clear: both;">
                </a>
            </li>
        <?php
        }
        ?>


        <br style="clear: both;">
    </ul>

</section>

<!--商品品牌-->
<section class="indexPP" style="display: none;">
    <div class="container">
        <h1 class="title">品牌一览<span>Brand</span></h1>

        <?php
        $ppresult =$action->getPP(" and recommend = '1' ");
        foreach($ppresult as $row){
        ?>
            <a href="user_productList/productSearch.php?ppid=<?php echo $row['id']?>">
                <div><img src="<?php echo str_replace("../../../","",$row['picurl']) ?>" alt=""></div>
                <h5><?php echo $row['ppname'];?></h5>
            </a>
        <?php
        }
        ?>


    </div>
</section>
<!--热卖推荐-->

<section class="IndSection3" id="IndSection3" style="display: none;">
    <div class="container">
        <h1 class="title" style="color: #e30909;">热卖推荐 <span style="color: #f97070;">Hot Sale</span></h1>

        <ul>
            <?php
            $productList=$action->getProduct(2,3);

            foreach($productList as $row){
                ?>
                <li>
                    <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" target="_blank">
                        <div><img src="<?php echo str_replace("../../","",$row['pic']) ?>" alt=""></div>

<!--                        <h1 class="hotabs"><img src="img/hot/hotAbsolute.png" alt=""></h1>-->
                        <ul class="hotFont">
                            <li>
                                <h1><?php echo strindex($row['title'],12,"...")?></h1>

                                <p>纳米抗菌防水柜</p>
                                <p >兔宝宝多层实木(可选升级)</p>
                            </li>
                            <li>
                                <div>￥<?php echo $row['price']?></div>
                                <p>立即预约></p>
                            </li>
                            <br style="clear: both;">
                        </ul>
                    </a>
                </li>
                <?php
            }
            ?>






            <br style="clear: both;">
        </ul>
    </div>

</section>

<!--新品-->
<section class="IndSection4" style="margin-top:-10px">

    <div class="container">
        <h1 class="title"><img src="img/title/titlexinpin.png" alt=""></h1>

        <div class="swiper-container swiper-container3" style="height: 380px;margin-top:20px;">
            <div class="swiper-wrapper swiper-wrapper3">
                <div class="swiper-slide swiper-slide3">

                    <?php
                    $productList=$action->getProduct(1,3);
//                        var_dump($productList);


                    foreach($productList as $row){
                        preg_match_all("/(.*?)@(.+?)#/is",$row['zhutu'],$zhutuarr,PREG_SET_ORDER);


                        ?>
                        <div>
                            <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>">
                                <div class="xinpinList">

                                    <img src="<?php echo str_replace("../../","",$row['toindex']) ?>" alt="">
                                    <h1><?php echo strindex($row['tuijianword'],12,"...")?></h1>

                                </div>



                                <div class="llist">
                                    <ul>
                                        <?php
                                        foreach($zhutuarr as $k=>$v){
                                            if($k<3){
                                            ?>

                                        <li>
                                                <img src="
<?php echo str_replace("../../","",$zhutuarr[$k][2]);?>" alt='<?php echo $zhutuarr[$k][1];?>'>
                                        </li>

                                            <?php


                                            }else{
                                                break;
                                            }
                                        }
                                        ?>



                                        <br style="clear: both;">
                                    </ul>
                                    <div onclick="javascript:top.location.href='productList/productList.php'">
                                        <img src="img/newList/litter/litterright.png" alt="">

                                    </div>
                                    <br style="clear: both;">
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>





                </div>
                <!--<div class="swiper-slide swiper-slide3">-->

                <!--<div>-->
                <!--<a href="">-->
                <!--<img src="img/newList/big/big1.jpg" alt="">-->
                <!--<h1>小厨房必备！少花钱大空间！</h1>-->
                <!--<p>这是一个即使是小厨房叶梦作出收纳的设计，即使身处小户型，也有身处豪宅的感觉！</p>-->
                <!--<div class="llist">-->
                <!--<ul>-->
                <!--<li></li>-->
                <!--<li></li>-->
                <!--<li></li>-->
                <!--<br style="clear: both;">-->
                <!--</ul>-->
                <!--<div></div>-->
                <!--<br style="clear: both;">-->
                <!--</div>-->
                <!--</a>-->
                <!--</div>-->
                <!--&lt;!&ndash;第二个&ndash;&gt;-->
                <!--<div>-->
                <!--<a href="">-->
                <!--<img src="img/newList/big/big2.jpg" alt="">-->
                <!--<h1>拯救脏乱差！收纳有条理！</h1>-->
                <!--<p>这是一个即使是小厨房叶梦作出收纳的设计，即使身处小户型，也有身处豪宅的感觉！</p>-->
                <!--<div class="llist">-->
                <!--<ul>-->
                <!--<li></li>-->
                <!--<li></li>-->
                <!--<br style="clear: both;">-->
                <!--</ul>-->
                <!--<div></div>-->
                <!--<br style="clear: both;">-->
                <!--</div>-->
                <!--</a>-->
                <!--</div>-->
                <!--&lt;!&ndash;第三个&ndash;&gt;-->
                <!--<div>-->
                <!--<a href="">-->
                <!--<img src="img/newList/big/big3.jpg" alt="">-->
                <!--<h1>用它打造三代人都满意的家！</h1>-->
                <!--<p>据调查显示：这样装修婆媳关系更融洽！</p>-->
                <!--<div class="llist">-->
                <!--<ul>-->
                <!--<li></li>-->
                <!--<li></li>-->
                <!--<br style="clear: both;">-->
                <!--</ul>-->
                <!--<div></div>-->
                <!--<br style="clear: both;">-->
                <!--</div>-->
                <!--</a>-->
                <!--</div>-->
                <!--</div>-->

            </div>


            <!--<div class="pagination3 pagination">-->


            <!--</div>-->
        </div>


    </div>
</section>

<!--橱柜专区-->
<section class="IndSection5">
    <div class="container">
        <h1 class="title"><img src="img/title/titlechugui.png" alt=""></h1>
        <a href="user_productList/chugui/chugui.php" class="indexmore">更多 +</a>
        <div class="body">
            <div class="bodyLeft">
                <div class="bodyLeftPic"><img src="img/chugui/left.png?tempid=<?php echo rand()?>" alt=""></div>
                <div class="tabs">
                    <a  href="tabs/yzxing.html" target="_blank" class="active a1"></a>
                    <a class="a2" href="tabs/langxing.html" style=""  target="_blank"></a>
                    <a class="a3"  href="tabs/Lxing.html"  target="_blank"></a>
                    <a class="a4"  href="tabs/Uxing.html"  target="_blank"></a>
                </div>
            </div>
            <div class="bodyCenter">
                <div class="swiper-container4 swiper-container">
                    <div class="swiper-wrapper swiper-wrapper4">
                        <div class="swiper-slide swiper-slide4">
                            <div class="content-slide">
                                <a href="user_productList/chugui/chugui.php"   target="_blank" class="bigShow">
                                    <img src="img/chugui/yzx/big/big2.jpg" alt="">
                                    <div>
                                        <h1>北欧清新环保橱柜 &nbsp;防虫抗潮</h1>
                                        <h2>开放漆的木纹理赋予橱柜生命力，简单的线条没有过多的装饰，简约而大气。从人体工学角度合理
                                            分区，节约厨房操作的时间，减少操作压力。

                                        </h2>
                                    </div>
                                </a>
                                <div class="litterShow">
                                    <a href="user_productList/chugui/chugui.php"  target="_blank">
                                        <img src="img/chugui/yzx/litter/l4.jpg" alt="">
                                        <p>空间利用合理，设计美观实用</p>
                                    </a>
                                    <a href="user_productList/chugui/chugui.php"  target="_blank">
                                        <img src="img/chugui/yzx/litter/l5.jpg" alt="">
                                        <p>岛型设计，操作方便</p>
                                    </a>
                                    <a href="user_productList/chugui/chugui.php"  target="_blank">
                                        <img src="img/chugui/yzx/litter/l6.jpg" alt="">
                                        <p>原木色橱柜，尽显时尚大方</p>
                                    </a>
                                    <br style="clear: both;">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="bodyRight">
                <div class="bodyRightPic"><a href="#newform"><img src="img/chugui/right.jpg?tempid=<?php echo rand()?>" alt=""></a></div>
                <div class="bodyRightBottom"><img src="img/chugui/rightBot.jpg" alt=""></div>

            </div>
            <br style="clear: both;">
        </div>

    </div>
</section>

<!--衣柜专区-->
<section class="IndSection6">
    <div class="container">
        <h1 class="title"><img src="img/title/titleyigui.png" alt=""></h1>
        <a class="indexmore" href="user_productList/productList.php?id=38"  target="_blank">更多 +</a>
        <div class="body">
            <div class="bodyLeft">
                <div class="bodyLeftPic">
                    <img src="img/yigui/left.jpg?tempid=<?php echo rand()?>" alt="">
                </div>
                <div class="tabs2">
                    <a  href="tabs/pingkaimen.html" target="_blank" class="active a1"></a>
                    <a class="a2"  href="tabs/yimen.html" target="_blank" style=""></a>
                    <a class="a3"  href="tabs/yimaojian.html" target="_blank" style="width: 220px;"></a>


                </div>
            </div>
            <div class="bodyCenter">
                <div class="swiper-container5 swiper-container">
                    <div class="swiper-wrapper swiper-wrapper5">
                        <div class="swiper-slide swiper-slide5">
                            <div class="content-slide">
                                <a href="user_productList/yigui/yigui.php"  target="_blank" class="bigShow">
                                    <img src="img/yigui/pkm/big/big2.jpg" alt="">
                                    <div>
                                        <h1>自然木纹理 &nbsp;环保板式大衣柜</h1>
                                        <h2>移门设计，美观气派又节省活动空间。一柜到顶，使不常用的衣服有了自己的去处。
                                            欧标E0级环保板材，甲醛释放量低于苹果。
                                        </h2>
                                    </div>
                                </a>
                                <div class="litterShow">
                                    <a href="user_productList/yigui/yigui.php"  target="_blank">
                                        <img src="img/yigui/pkm/litter/l4.jpg" alt="">
                                        <p>独家工厂，做工精致</p>
                                    </a>
                                    <a href="user_productList/yigui/yigui.php"  target="_blank">
                                        <img src="img/yigui/pkm/litter/l5.jpg" alt="">
                                        <p>0污染，0噪音安装体验</p>
                                    </a>
                                    <a href="user_productList/yigui/yigui.php"  target="_blank">
                                        <img src="img/yigui/pkm/litter/l6.jpg" alt="">
                                        <p>米兰顶尖设计大师倾力设计</p>
                                    </a>
                                    <br style="clear: both;">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="bodyRight">
                <h1>衣柜热销排行榜</h1>
                <div class="sideMenu" style="margin:0 auto">
                    <h3 class="on"><em></em>Top1.简约银边平开门衣柜</h3>
                    <ul>

                        <li><a href="user_product/product.php?id=13" target="_blank">
                                <div><img src="img/yigui/list/ph1.jpg" alt=""></div>
                                <p>本款热销衣柜采用皮革外包面板，更好的防止内里材质的损耗，皮革材质也使衣柜显得更加大气古朴。</p>
                            </a></li>

                    </ul>

                    <h3><em></em>Top2.棕色装饰大移门衣柜</h3>
                    <!-- 假设当前频道为“幻灯片/焦点图系列”，手动或后台程序添加titOnClassName类名（默认是'on'），相当于设置参数defaultIndex:1。若设置参数returnDefault:true，则鼠标移出.sideMen0.3秒可以返回当前频道 -->
                    <ul>
                        <li><a href="user_product/product.php?id=12" target="_blank">
                                <div><img src="img/yigui/list/ph2.jpg" alt=""></div>
                                <p>本款采用皮革外包面板，更好的防治内里材质的损耗，皮革材质也使衣柜显得更加大气古朴。</p>
                            </a></li>

                    </ul>
                    <h3><em></em>Top3.欧式高贵平开门衣柜</h3>
                    <ul>
                        <li><a href="user_product/product.php?id=11" target="_blank">
                                <div><img src="img/yigui/list/ph3.jpg" alt=""></div>
                                <p>本款避免用胶，从源头严格杜绝甲醛。匠心之作，健康之选。</p>
                            </a></li>

                    </ul>
                    <h3><em></em>Top4.简欧风淡雅储物衣柜</h3>
                    <ul>
                        <li><a href="user_product/product.php?id=21" target="_blank">
                                <div><img src="img/yigui/list/ph4.jpg" alt=""></div>
                                <p>本款衣柜采用皮革外包面板，更好的防治内里材质的损耗，皮革材质也使衣柜显得更加大气古朴。</p>
                            </a></li>

                    </ul>
                    <h3><em></em>Top5.北欧小清新板式衣柜</h3>
                    <ul>
                        <li><a href="user_product/product.php?id=20" target="_blank">
                                <div><img src="img/yigui/list/ph5.jpg" alt=""></div>
                                <p>本款衣柜采用皮革外包面板，更好的防治内里材质的损耗，皮革材质也使衣柜显得更加大气古朴。</p>
                            </a></li>

                    </ul>

                </div>

            </div>
            <br style="clear: both;">
        </div>

    </div>
</section>

<!--木门专区-->
<section class="IndSection6 inMumen" style="display: none;">
    <div class="container">
        <h1 class="title">木门专区<span>Wooden Door Zone</span><a href="user_productList/quanwu/quanwu.php" target="_blank">查看更多</a></h1>
        <div class="body">
            <div class="bodyLeft">
                <div class="bodyLeftPic"><img src="img/mumen/left.png" alt=""></div>
                <div class="tabs3">
                    <a href="tabs/yuanmu.html" target="_blank" class="active a1"></a>
                    <a href="tabs/shimu.html" target="_blank" class="a2" style="margin:0 17px"></a>


                </div>
            </div>
            <div class="bodyCenter">
                <div class="swiper-container6 swiper-container">
                    <div class="swiper-wrapper swiper-wrapper6">
                        <div class="swiper-slide swiper-slide6">
                            <div class="content-slide">
                                <a href="user_productList/quanwu/quanwu.php" target="_blank" class="bigShow">
                                    <img src="img/mumen/ym/big/big1.jpg" alt="">
                                    <div>
                                        <h1>
                                            原木深雕红橡木门
                                        </h1>
                                        <h2>门扇与门框的紧致贴合，高于行业标准的切面高度。触感光滑，表层贴面，边缘牢固无脱胶现象，
                                            防噪性能极强，关上门静享好时光。</h2>
                                    </div>
                                </a>
                                <div class="litterShow">
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/mumen/ym/litter/litter1.jpg" alt="">
                                        <p>深沉本色</p>
                                    </a>
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/mumen/ym/litter/litter2.jpg" alt="">
                                        <p>质感跃升</p>
                                    </a>
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/mumen/ym/litter/litter3.jpg" alt="">
                                        <p>无瑕梦境</p>
                                    </a>
                                    <br style="clear: both;">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="bodyRight">
                <div class="bodyRightPic"><img src="img/mumen/right.jpg" alt=""></div>
                <div class="bodyRightBottom"><a href="http://www2.53kf.com/webCompany.php?arg=10133101&style=2&kflist=off&kf=19680502&zdkf_type=3&language=cn&charset=GBK" target="_blank"><img src="img/mumen/rightbottom.png" alt="" ></a></div>

            </div>
            <br style="clear: both;">
        </div>

    </div>
</section>

<!--全屋专区-->
<section class="IndSection6 quanwu" style="margin-top:-10px">
    <div class="container">
        <h1 class="title"><img src="img/title/titlequanwu.png" alt=""></h1>
        <a class="indexmore" href="user_productList/quanwu/quanwu.php" target="_blank">更多 +</a>
        <div class="body">
            <div class="bodyLeft">
                <div class="bodyLeftPic"><img src="img/quanwu/left.png?tempid=<?php echo rand()?>" alt=""></div>
                <div class="tabs4">
                    <a href="tabs/tatami.html" class="active a1" target="_blank"></a>
                    <a href="tabs/jiugui.html"  target="_blank" class="a2"></a>
                    <a href="tabs/yushigui.html" target="_blank" class="a3"></a>
                    <a href="tabs/shugui.html" target="_blank" class="a4"></a>
                </div>
            </div>
            <div class="bodyCenter">
                <div class="swiper-container7 swiper-container">
                    <div class="swiper-wrapper swiper-wrapper7">
                        <div class="swiper-slide swiper-slide7">
                            <div class="content-slide">
                                <a href="user_productList/quanwu/quanwu.php" target="_blank" class="bigShow">
                                    <img src="img/quanwu/ttm/big/big2.jpg" alt="">
                                    <div>
                                        <h1>
                                            轻奢风格全屋定制
                                        </h1>
                                        <h2>在奢华的同时营造舒适自然的氛围。针对业主特别要求，设计师进行储物收纳规划，让柜体既美观
                                            又能满足储物需求。</h2>
                                    </div>
                                </a>
                                <div class="litterShow">
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/quanwu/ttm/litter/l4.jpg" alt="">
                                        <p>专属定制，每一处都是风景</p>
                                    </a>
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/quanwu/ttm/litter/l5.jpg" alt="">
                                        <p>省力省心，一站式购齐</p>
                                    </a>
                                    <a href="user_productList/quanwu/quanwu.php" target="_blank">
                                        <img src="img/quanwu/ttm/litter/l6.jpg" alt="">
                                        <p>开放漆木纹，简单大气</p>
                                    </a>
                                    <br style="clear: both;">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="bodyRight">
                <div class="bodyRightPic"><a href="#newform"><img src="img/quanwu/right.jpg?tempid=<?php echo rand()?>" alt=""></a></div>
                <div class="bodyRightBottom">
                    <div style="margin-top: 15px;">
                        <div class="txtMarquee-top txtMarquee-top2">

                            <div class="bd bd2">
                                <ul class="infoList">

                                    <?php
                                    $list=$action->getArticle(" and typeid = 22 ",$order=" order by id desc ",$limit="  ");
                                    foreach ($list as $row){
                                    ?>
                                        <li><a href="user_article/show.php?id=<?php echo $row['id']?>" target="_blank"><?php echo $row['title']?></a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br style="clear: both;">
        </div>

    </div>
</section>

<!--原木-->
<section class="IndSection6 Indwood">
    <div class="container">
        <h1 class="title"><img src="img/title/titlewood.png" alt=""></h1>
        <a class="indexmore" href="user_design/design.php">更多 +</a>
        <div>
            <div class="designerLeft tabs5wood">
                <a class="arrow-left" href=""></a>
                <a class="arrow-right" href=""></a>
                <div class="swiper-container swiper-container7-1wood wood-slide" style="margin-top: 34px;">
                    <div class="swiper-wrapper swiper-wrapper7-1wood  tabs5wood">
                        <div class="swiper-slide swiper-slide7-1wood  active">
                            <a href="#" class="active touxiang" >
                                <img src="img/wood/woodBig1-R.png" alt="">
                                <h1>中式风格 - 提亚纳湾</h1>

                            </a>
                            <h5></h5>
                        </div>
                        <div class="swiper-slide swiper-slide7-1wood ">
                            <a href="#" class="active touxiang" >
                                <img src="img/wood/woodBig2-R.png" alt="">
                                <h1>欧式风格 - 湘江壹号</h1>
                            </a>
                            <h5></h5>
                        </div>
                        <div class="swiper-slide swiper-slide7-1wood ">
                            <a href="#" class="active touxiang" >
                                <img src="img/wood/woodBig3-R.png" alt="">
                                <h1>美式风格- 金茂梅溪湖</h1>
                            </a>
                            <h5></h5>
                        </div>


                    </div>
                    <div class="pagination pagination7-1wood" style="display: none;"></div>
                </div>
            </div>
            <div class="designRight">
                <div class="swiper-container7-2wood swiper-container">
                    <div class="swiper-wrapper swiper-wrapper6wood">
                        <div class="swiper-slide swiper-slide7-2wood">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9398&from=groupmessage" target="_blank">
                                        <img src="img/wood/woodBig1.png" alt="">
                                        <div>
                                            <h1>提亚纳湾样板房实例</h1>
                                            <!--<h2>点击观看全景案例</h2>-->
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9398&from=groupmessage" target="_blank"><img src="img/wood/woodBig1-1.png" alt="">
                                            <p> 木门展示</p>
                                        </a>
                                    </div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9398&from=groupmessage" target="_blank"><img src="img/wood/woodBig1-2.png" alt="">
                                            <p> 茶室展示</p></a></div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9398&from=groupmessage" target="_blank"><img src="img/wood/woodBig1-3.png" alt="">
                                            <p>酒柜展示</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2wood">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9399&from=groupmessage" target="_blank">
                                        <img src="img/wood/woodBig3.png" alt="">
                                        <div>
                                            <h1>湘江壹号样板房实例</h1>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9399&from=groupmessage" target="_blank"><img src="img/wood/woodBig2-1.png" alt="">
                                            <p> 衣帽间展示</p>
                                        </a>
                                    </div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9399&from=groupmessage" target="_blank"><img src="img/wood/woodBig2-2.png" alt="">
                                            <p> 卧室展示</p></a></div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9399&from=groupmessage" target="_blank"><img src="img/wood/woodBig2-3.png" alt="">
                                            <p>茶室展示</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2wood">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9258" target="_blank">
                                        <img src="img/wood/woodBig2.png" alt="">
                                        <div>
                                            <h1>金茂梅溪湖样板房实例</h1>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9258" target="_blank"><img src="img/wood/woodBig3-1.png" alt="">
                                            <p> 衣帽间展示</p>
                                        </a>
                                    </div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9258" target="_blank"><img src="img/wood/woodBig3-2.png" alt="">
                                            <p> 卧室展示</p></a></div>
                                    <div><a href="http://cs.jimiec.com/index.php?a=s&s=case&id=9258" target="_blank"><img src="img/wood/woodBig3-3.png" alt="">
                                            <p>茶室展示</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>


                    </div>
                </div>

            </div>
            <br style="clear: both;">
        </div>
    </div>
</section>
<!--设计风采-->
<section class="IndSection6">
    <div class="container">
        <h1 class="title"><img src="img/title/titledesign.png" alt=""></h1>
        <a class="indexmore" href="user_design/design.php">更多 +</a>
        <div>
            <div class="designerLeft tabs5">
                <a class="arrow-left" href=""></a>
                <a class="arrow-right" href=""></a>
                <div class="swiper-container swiper-container7-1 " style="margin-top:34px">
                    <div class="swiper-wrapper swiper-wrapper7-1  tabs5">


                        <?php

                        $sql=" select mall_design.*,mall_designfenlei.fenleiname from mall_design inner join mall_designfenlei on mall_design.fenlei=mall_designfenlei.id ";
                        $parm=" where 1 limit 0,6";


                        $db=new DbMysql();
                        $sql.=$parm;
                        $sql.="  ";


                        $result=$db->select($sql);

                        //var_dump($result);

                        foreach ($result as $info) {
                            ?>
                            <div class="swiper-slide swiper-slide7-1 ">
                                <a href="#" class="active touxiang">
                                    <div class="cricle"><img src="<?php echo str_replace("../../","",$info['touxiang']);?>" alt=""></div>
                                    <div>
                                        <h1><?php echo $info['designName'] ?></h1>
                                        <h2><?php echo $info['zhiwei'] ?></h2>
                                        <h2><?php echo $info['wtime'] ?></h2>

                                    </div>
                                    <br style="clear: both;">
                                </a>
                            </div>


                            <?php
                        }
                        ?>


                    </div>
                    <div class="pagination pagination7-1"></div>
                </div>
            </div>
            <div class="designRight">
                <div class="swiper-container7-2 swiper-container">
                    <div class="swiper-wrapper swiper-wrapper6">
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big1.jpg" alt="">
                                        <div>
                                            <h1>大储物 灵活动线 操作方便 享受下厨</h1>
                                            <p>这是一个关于小厨房、大收纳的设计。即使是小户型，也有身处豪宅的感觉。本案例使
                                                用美式风格的原木装，豪华大气，与户主房屋装修搭配和谐。</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter1.jpg" alt="">
                                            <p> 一日三餐，与众不同</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter2.jpg" alt="">
                                            <p> 恋上厨房，恋上一个家</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter3.jpg" alt="">
                                            <p>品质追求，定制幸福生活</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big2.jpg" alt="">
                                        <div>
                                            <h1>云湖天都</h1>
                                            <p>在最简单的空间设计中，我们也应该把这种意识贯穿始终，遵循艺术表现形式的一些共性。即共性与个性的表现。这里所讲的共性与个性，可以理解为空间及功能的划分要松紧对比舒适。色彩的选择上要做到含蓄与彰显的充分结合。造型语言上要大小得当，横竖交错生辉。</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter4.jpg" alt="">
                                            <p> 一屋，两人，三餐，四季</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter5.jpg" alt="">
                                            <p> 家在哪里，胃最知道</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter6.jpg" alt="">
                                            <p>所谓家的味道，就是饭菜飘香</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big3.jpg" alt="">
                                        <div>
                                            <h1>檀香湾</h1>
                                            <p>采用简约主义的设计风格则更具生命力，同时也更符合现代人时尚和求静、追求自然明了的心态。</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter7.jpg" alt="">
                                            <p>优秀的卧室设计，拒绝同床异梦</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter8.jpg" alt="">
                                            <p>认真睡一觉，忘记现实尘土飞扬</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter9.jpg" alt="">
                                            <p>越收纳，越整洁，越舒适</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big4.jpg" alt="">
                                        <div>
                                            <h1>正阳佳景</h1>
                                            <p>是一个即使是小厨房也能做出大收纳的设计，即使身处小户型，也有身处豪宅的感觉！本案例使
                                                用美式风格的原木装，豪华大气，与户主房屋装修搭配和谐.</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter10.jpg" alt="">
                                            <p>万千世界不如家门视野</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter11.jpg" alt="">
                                            <p>孤独有时，热闹无境</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter12.jpg" alt="">
                                            <p>客厅多功能，生活情趣才丰富</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big6.jpg" alt="">
                                        <div>
                                            <h1>凤畔雅苑</h1>
                                            <p>是一个即使是小厨房也能做出大收纳的设计，即使身处小户型，也有身处豪宅的感觉！本案例使
                                                用美式风格的原木装，豪华大气，与户主房屋装修搭配和谐.</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter13.jpg" alt="">
                                            <p> 一日三餐，与众不同</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter14.jpg" alt="">
                                            <p> 恋上厨房，恋上一个家</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter15.jpg" alt="">
                                            <p>品质追求，定制幸福生活</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide7-2">
                            <div class="content-slide designCenter">
                                <div class="DesLeft"><a href="user_design/designList.php" target="_blank">
                                        <img src="img/design/big/big5.jpg" alt="">
                                        <div>
                                            <h1>凤栖家园</h1>
                                            <p>造型优雅，线条简约，低调优雅，产品经典永恒又富有变化。设计灵感大多来源于灵感板.水彩画.自然界。</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="DesRight">
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter16.jpg" alt="">
                                            <p> 一日三餐，与众不同</p>
                                        </a>
                                    </div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter17.jpg" alt="">
                                            <p> 恋上厨房，恋上一个家</p></a></div>
                                    <div><a href="user_design/designList.php" target="_blank"><img src="img/design/litter/litter18.jpg" alt="">
                                            <p>品质追求，定制幸福生活</p></a></div>


                                </div>
                                <br style="clear: both;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <br style="clear: both;">
        </div>
    </div>
</section>

<!--精彩案例-->
<section class="IndSection7 indexcase">
    <div class="container">
        <h1 class="title"><img src="img/title/titlecase.png" alt=""></h1>
        <a href="" class="indexmore">更多 +</a>
        <div class="device">
            <a class="arrow-left arrow-left-case" href="#"><img src="img/arrows2-2.png" alt=""></a>
            <a class="arrow-right arrow-right-case" href="#"><img src="img/arrows2.png" alt=""></a>
            <div class="swiper-container swiper-container-case">
                <div class="swiper-wrapper swiper-wrapper-case ">
                    <div class="swiper-slide swiper-slide-case ">
                        <img src="img/case/round/1.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide-case ">
                        <img src="img/case/round/2.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide-case">
                        <img src="img/case/round/3.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide-case ">
                        <img src="img/case/round/4.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide-case">
                        <img src="img/case/round/5.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide-case ">
                        <img src="img/case/round/6.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="pagination pagination-case"></div>
        </div>
    </div>
</section>

<!--联系我们-->

<section style="margin-top:45px;">

</section>
<section class="IndSection10">
    <div class="container">

        <div class="lianxiBG">

            <div class="vedio">
                <video src="http://cloud.video.taobao.com/play/u/3244903357/p/1/e/6/t/1/50011842386.mp4" controls  id="bgAudio" class="video1">您的电脑不适合video</video>
            </div>


            <div>
                <ul>
                    <li>售前热线：400-0188-608</li>
                    <li>售后热线：0731-88334455</li>
                    <li>公司地址：湖南省长沙市芙蓉区</li>
                    <li>值班时间：7 * 24 小时/周</li>
                </ul>
                <ol>
                    <li>
                        <img src="indexImg/indexerweima1.png" alt="">
                        <div><img src="indexImg/indexerweima1-1.png" alt=""></div>
                    </li>
                    <li>
                        <img src="indexImg/indexerweima2.png" alt="">
                        <div><img src="indexImg/indexerweima2-1.png" alt=""></div>
                    </li>
                    <li>
                        <img src="indexImg/indexerweima3.png" alt="">
                        <div><img src="indexImg/indexerweima3-1.png" alt=""></div>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php
include webdir."/include/footer.php";
?>


<div class="indexJoin joinH">
    <div class="joinContainer">
        <div class="jiantou">
            <img src="img/baoming/jiantou.png" alt="">
        </div>
        <div class="jointop"><img src="img/baoming/indexJointop.png" alt=""></div>
    </div>

    <div class="joinbg"></div>

    <div class="joinContainer joinContainer1">
        <div class="joinYuyue">
            <img src="img/baoming/indexJoin2.png" alt="">
        </div>


        <form class="joinRight">
            <h1>算算您的定制需要多少钱</h1>

            <div class="joinInput">
                <span class="joinTitle">定制面积</span>
                <input type="text" placeholder="橱柜长度 米">
                <input type="text" placeholder="衣柜面积 ㎡">

            </div>

            <div class="joinInput">
                <span class="joinTitle">定制城市</span>
                <input type="text" placeholder="所在城市">
                <input type="text" placeholder="楼盘地址" style="width: 323px;">
            </div>

            <div class="joinInput radio">
                <span class="joinTitle">定制材质</span>
                <input type="radio" name="1"><span> 实木颗粒</span>
                <input type="radio" name="1"><span> 实木多层</span>
                <input type="radio" name="1"><span> 原木</span>

            </div>

            <div class="joinInput radio">
                <span class="joinTitle">定制风格</span>
                <input type="radio" name="2"><span> 现代简约</span>
                <input type="radio" name="2"><span> 欧式风格</span>
                <input type="radio" name="2"><span> 美式风格</span>
                <input type="radio" name="2"><span> 中式风格</span>
                <input type="radio" name="2"><span> 其他风格</span>

            </div>

            <div class="joinInput">
                <span class="joinTitle">您的称呼</span>
                <input type="text" name="indexName" class="indexName" placeholder="先生/女士">
                <input type="text" name="indexNum" class="indexNum" placeholder="您的手机号码">
                <div class="yuyuebutton" >发送报价到手机</div>
            </div>
            <h5>*您的信息将被严格保密。</h5>
        </form>
        <br style="clear: both;">
    </div>

</div>




<!--全屏弹窗-->
<div class="allout">
    <div class="allBG"></div>
    <div class="allContent">
        <div class="allgo"><img src="img/out/allgo.png" alt=""></div>
    </div>

    <div class="allbaoming">
        <form action="">

            <input type="text" name="indexName" class="indexName input1" placeholder="姓名：">
            <input type="text" name="indexNum" class="indexNum input2" placeholder="电话：">
            <div class="buttonout" style=""><img src="img/out/baomignanniu.png" alt=""></div>
        </form>
    </div>


</div>
</body>


<script>
    $(function(){
        $('.allgo').click(function(){
            $('.allContent').css({'height':'0px'});

            $('.allbaoming').css({'height':'504px'});

        })
        $('.allBG').click(function(){
            $('.allout').css({'height':'0px'});



        })

    })

</script>

<script>



    $('.jiantou').click(function(){
        $('.indexJoin').toggleClass("joinH");
        $('.joinYuyue').find('img').attr('src', 'img/baoming/indexJoin.png');
        $('.joinH>.joinContainer1>.joinYuyue').find('img').attr('src', 'img/baoming/indexJoin2.png');
    });
    $('.jointop').click(function(){
        $('.indexJoin').toggleClass("joinH");
        $('.joinYuyue').find('img').attr('src', 'img/baoming/indexJoin.png');
        $('.joinH>.joinContainer1>.joinYuyue').find('img').attr('src', 'img/baoming/indexJoin2.png');
    });




//
//    $('.fix').hide();
//
//    var t=setTimeout("$('.fix').slideDown(2000);",2000);
//
//    $('.fix_close').click(function(){
//        $('.fix').slideUp(2000);
//    })
//    var t2=setTimeout("$('.fix').slideUp(2000);",10000);
</script>
<script>

    document.getElementById("bgAudio").volume = 0.2;

$(function(){
    $('.tabs5').children('.swiper-slide7-1').eq(0).addClass('active');
})


</script>

<script>

    $(function(){
        //导航
        $('.headerRbottom>li').eq(0).addClass('navActive');
        $('.headerRbottom>li').mouseover(function(){
            $(this).addClass('navActive').siblings('li').removeClass('navActive');
        });

        //        banner悬浮选项
        $(".listShow>li").hover(function(){
            var i =$(this).index();
            $('.listShowCon>li').eq(i).addClass('activeClass').siblings('li').removeClass('activeClass');
        });
        $('.container1').mouseleave(function(){
            $('.listShowCon>li').removeClass('activeClass');
        });
        //x新品速递
        $(".designtopleft li").hover(function(){
            var t=$(this).index();
            $(this).addClass('digleftActive').siblings('li').removeClass('digleftActive');
            $(".designtopright>li").eq(t).addClass('digleftActive').siblings('li').removeClass('digleftActive');
            $(".designBottom>li").eq(t).addClass('digleftActive').siblings('li').removeClass('digleftActive');
        });



    })






</script>

<!--case-->
<script>





    var mySwipercase = new Swiper('.swiper-container-case',{
        pagination: '.pagination-case',
        paginationClickable: true,
        centeredSlides: true,
        slidesPerView: 1.5,initialSlide: 1,
        watchActiveIndex: true

    })

    $('.arrow-right-case').on('click', function(e){
        e.preventDefault()
        mySwipercase.swipePrev()
    })
    $('.arrow-left-case').on('click', function(e){
        e.preventDefault()
        mySwipercase.swipeNext()
    })
</script>



<!--轮播图-->
<script>
    $(function(){
        var mySwiper = new Swiper('.swiper-container2',{
            pagination: '.pagination',
            paginationClickable: true,
            loop: true,
            autoplay : 5000
        })
    });
</script>

<!--新品-->
<script>
    $(function(){
        var mySwiper2 = new Swiper('.swiper-container3',{
//            pagination: '.pagination3',
            paginationClickable: true,

//            autoplay : 5000
        });

    });


</script>
<!--橱柜-->
<script>
    var tabsSwiper = new Swiper('.swiper-container4',{
        onlyExternal : true,
        speed:500
    });
//    $(".tabs a").on('touchstart mousedown',function(e){
//        e.preventDefault();
//        $(".tabs .active").removeClass('active');
//        $(this).addClass('active');
//        tabsSwiper.swipeTo( $(this).index() )
//    });
//    $(".tabs a").click(function(e){
//        e.preventDefault()
//    });


    var tabsSwiper2 = new Swiper('.swiper-container5',{
        onlyExternal : true,
        speed:500
    });
//    $(".tabs2 a").on('touchstart mousedown',function(e){
//        e.preventDefault();
//        $(".tabs2 .active").removeClass('active');
//        $(this).addClass('active');
//        tabsSwiper2.swipeTo( $(this).index() )
//    });
//    $(".tabs2 a").click(function(e){
//        e.preventDefault()
//    });

    var tabsSwiper3 = new Swiper('.swiper-container6',{
        onlyExternal : true,
        speed:500
    });
//    $(".tabs3 a").on('touchstart mousedown',function(e){
//        e.preventDefault();
//        $(".tabs3 .active").removeClass('active');
//        $(this).addClass('active');
//        tabsSwiper3.swipeTo( $(this).index() )
//    });
//    $(".tabs3 a").click(function(e){
//        e.preventDefault()
//    });

    var tabsSwiper4 = new Swiper('.swiper-container7',{
        onlyExternal : true,
        speed:500
    });
//    $(".tabs4 a").on('touchstart mousedown',function(e){
//        e.preventDefault();
//        $(".tabs4 .active").removeClass('active');
//        $(this).addClass('active');
//        tabsSwiper4.swipeTo( $(this).index() )
//    });
//    $(".tabs4 a").click(function(e){
//        e.preventDefault()
//    })

</script>
<!--设计师-->
<script>
    var mySwiper71 = new Swiper('.swiper-container7-1',{
        pagination: '.pagination7-1',
        paginationClickable: true,
        slidesPerView: 3,
        mode: 'vertical'
    })
    $('.tabs5 .arrow-right').on('click', function(e){
        e.preventDefault();
        mySwiper71.swipePrev()
    })
    $('.tabs5 .arrow-left').on('click', function(e){
        e.preventDefault();
        mySwiper71.swipeNext()
    })



    var tabsSwiper72 = new Swiper('.swiper-container7-2',{
        onlyExternal : true,
        speed:500
    });
    $(".tabs5 .swiper-slide").on('touchstart mousedown',function(e){
        e.preventDefault();
        $(".tabs5 .active").removeClass('active');
        $(this).addClass('active');
//        console.log($(this).index() )
        tabsSwiper72.swipeTo( $(this).index() )
    });
    $(".tabs5 .swiper-slide").click(function(e){
        e.preventDefault()
    })

</script>

<!--wood-->
<script>
    var mySwiper71wood = new Swiper('.swiper-container7-1wood',{
        pagination: '.pagination7-1wood',
        paginationClickable: true,
        slidesPerView: 3,
        mode: 'vertical'
    })
    $('.tabs5wood .arrow-left').on('click', function(e){
        e.preventDefault();
        mySwiper71wood.swipePrev()
    })
    $('.tabs5wood .arrow-right').on('click', function(e){
        e.preventDefault();
        mySwiper71wood.swipeNext()
    })



    var tabsSwiper72wood = new Swiper('.swiper-container7-2wood',{
        onlyExternal : true,
        speed:500
    });
    $(".tabs5wood .swiper-slide").on('touchstart mousedown',function(e){
        e.preventDefault();
        $(".tabs5wood .active").removeClass('active');
        $(this).addClass('active');
//        console.log($(this).index() )
        tabsSwiper72wood.swipeTo( $(this).index() )
    });
    $(".tabs5wood .swiper-slide").click(function(e){
        e.preventDefault()
    })

</script>
<!--quanwu-->
<script type="text/javascript">

    jQuery(".txtMarquee-top1").slide({mainCell:".bd1 ul",autoPlay:true,effect:"topMarquee",vis:8,interTime:50,loop:true});

    jQuery(".txtMarquee-top2").slide({mainCell:".bd2 ul",autoPlay:true,effect:"topMarquee",vis:5,interTime:50,loop:true});
</script>


<!--衣柜-->
<script type="text/javascript">
    jQuery(".sideMenu").slide({
        titCell:"h3", //鼠标触发对象
        targetCell:"ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
        effect:"slideDown", //targetCell下拉效果
        delayTime:300 , //效果时间
        triggerTime:150, //鼠标延迟触发时间（默认150）
        defaultPlay:true,//默认是否执行效果（默认true）
//        returnDefault:true,
        trigger:"click" //鼠标从.sideMen移走后返回默认状态（默认false）
    });
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