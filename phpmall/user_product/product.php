<?php

require_once "../public/init.php";
$id=$_GET['id'];


$sql=" select * from mall_product inner join mall_productList on mall_product.typeid=mall_productList.id where mall_product.id= '$id' ";

//echo $sql;
//exit;
$result=$db->select($sql,1);

if(empty($result)){
    weberror();
}
//echo $sql;

$weizhi= $action->getWeizhi($result['idpath']."_".$result['typeid']);

//echo $result['picurls'];
preg_match_all("/(.*?)@(.+?)#/is",$result['picurls'],$arr,PREG_SET_ORDER);

preg_match_all("/(.*?)@(.+?)#/is",$result['zhutu'],$zhutuarr,PREG_SET_ORDER);

//var_dump($arr);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $result['title']?> - <?php echo $result['typename']?> - <?php echo $webtitle?></title>
</head>
<link rel="stylesheet" href="css/swiper.min.css">
<script src="js/swiper.min.js"></script>
<script src="../js/jquery.min.js"></script>
<!--<script src="js/mubandetail.js"></script>-->
<link rel="stylesheet" href="css/detail.css">
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">

<link href="./css/tabStyle.css" rel="stylesheet" type="text/css">
<script src="./js/tabScript.js" type="text/javascript"></script>

<script type="text/javascript">

    var images = new Array()
    function preload() {
        for (i = 0; i < preload.arguments.length; i++) {
            images[i] = new Image()
            images[i].src = preload.arguments[i]
        }
    }
    preload(
        <?php
        foreach($arr as $k=>$v){


            echo "'".str_replace("../../","../",$arr[$k][2])."',";


        }
        ?>
        "img/muban/09.png"
    )

</script>
<script>

    $(function(){

        loadTab();

    });

</script>
<style>
body{
    font-family:"微软雅黑"!important;
}
.weizhi{
    color: black;
    line-height:60px;
    float: left;}
.weizhi>a{
    font-size:16px;
    font-weight:bold;
}


.select{
    float: right;
}
.weizhi>a{color: black;}
    .weizhi>a:hover{
        color: #c9302c;;}

    .section4>.containerBanner{
        width: 790px;
        margin:0 auto;

    }
    .procontainer{
        width: 1120px;
        margin:0 auto;
        overflow: hidden;
        
    }

    .containerBanner>img{
        width: 100%;}
    .price1{
        text-decoration: line-through;}
    .showTab{margin-top:20px;}

    .numbers>input{
        text-align: center;
        height: 50px;
        border:1px solid #e0e0e0;
        font-size: 30px;
        width: 100px;}

    .warmNum{
        font-size: 30px;
        line-height:50px;
        color: #ef0000;
    }
    .detailbutton{
        cursor: pointer;}

    .consult{
        width: 80%;
        margin:10px auto;
        line-height:26px;
        letter-spacing: 2px;
    }
    .reconsult{
        width: 60%;
        margin:10px auto!important;
        font-size: 16px;
        border:2px solid #ff5900;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        padding:10px ;
    }

    .consultleibie{
        float: right;
        font-size: 12px;
        background: #ff5900;
        color: white;
        padding:5px 10px;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
    }
    .none{
        width: 80%;
        height: 40px;
        border-bottom:1px dashed #ff5900;
        margin:0 auto 15px auto;
    }

    .assess{
        width: 80%;
        margin:0 auto;
        padding:2px 20px;
        line-height:25px;

    }
    .assessStar{
        float: right;
        margin-right:130px!important;
    }
    .assessStar>span{
        font-size: 16px;}
    .assessuser{
        font-size: 16px;
        margin-left:10%;
        margin-bottom:0!important;
    }
    .assessLine{
        width: 86%;
        margin:36px auto 0 auto;
        height: 2px;
        background: #ff5900;
        position: relative;
    }

    .assessLinet::after{
        position: absolute;
        content: '';
        left:0;
        top:0;
        width: 2px;
        height: 50px;
        background: #ff5900;
    }

    .assessLineb::after{
        position: absolute;
        content: '';
        right:0;
        bottom:0;
        width: 2px;
        height: 50px;
        background: #ff5900;
    }
    .assessLineb{
        margin-bottom:20px;
    }

    .tiaozhuanTM{
        color: white;
        font-size: 20px;
        line-height: 60px;
        /*margin-right:10px;*/
        text-align: center;
        float: right;
        margin-top: 20px;
        width: 144px;
        height: 60px;
        background: #f37122;
    }

    .tiaozhuanTM:hover{
        -webkit-box-shadow: 0 0 10px #666 ;
        -moz-box-shadow: 0 0 10px #666 ;
        box-shadow: 0 0 10px #666 ;
    }
    .shoucang:hover{
        -webkit-box-shadow: 0 0 10px #666 ;
        -moz-box-shadow: 0 0 10px #666 ;
        box-shadow: 0 0 10px #666 ;
    }
    .detailbutton:hover{
        -webkit-box-shadow: 0 0 10px #666 ;
        -moz-box-shadow: 0 0 10px #666 ;
        box-shadow: 0 0 10px #666 ;
    }


    .detailList>li{
        cursor: pointer;
    }

    .kefu{
        display: block;
        font-size: 25px;
        margin-top:20px;
    }


#sidebar-tab {
    /*border:1px solid #ccf;*/
    margin-bottom:1.5em;
    overflow:hidden;
    width:100%
}
#tab-title h3 {
    padding-left:20px;
    color:#666;
    font-size:15px;
    font-weight:400;
    width: 100%;
    height: 68px;
    background: #f2f2f2;
}
#tab-title h3>span{
    font-size: 16px;
    color: black;
    margin:0 21px;
    height: 68px;
    line-height:68px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding-bottom:16px;

}

#tab-title .selected {

    border-bottom:8px solid #fe9249;

}
/*标题被选中时的样式*/
#tab-title span {
    padding:5px 9px 5px 10px;

    border-right:0px;
    margin-left:-1px;
    cursor:pointer;
}
#tab-content .hide {
    display:none;
}
/*默认让第一块内容显示，其余隐藏*/
#tab-content ul {
    padding:5px 10px;
    overflow:hidden;
}
#tab-content ul li {
    padding-top:5px;
    /*height:20px;*/
}
#tab-content ul li>img{
    margin:0 auto;
}

    .pingjia>div{
        float: left;
    }
.pingjia>.buttonpingjia{
    float: right;
    width: 124px;
    height: 40px;
    color: white;
    background: #fe9249;
    text-align: center;
    font-size: 12px;
    line-height: 40px;;
}

    .yinxiang>h1{
        font-size: 16px;
        color: black;
    }
.yinxiang>div{
    margin-top:17px;
}
.yinxiang>div>span{
    font-size: 12px;
    height: 30px;
    line-height:30px;
    padding:5px 10px;
    text-align: center;
    color: black;
    background: #e6e6e6;
    cursor: pointer;

}
.yinxiang>div>span+span{
    margin-left:12px;
}

.yinxiang>div>span:hover{
    background: #fe9249;
    color: white;
}
</style>

<body>
<?php

include webdir."/include/header.php";
////?>


<!--内容-->

<section class="section1">
    <div class="procontainer">
        <h3 class="weizhi">



            <?php  echo $weizhi;;?>
            ><a href="#"><?php echo $result['title']?></a>
        </h3>

        <ul class="select">
            <li><a >配件参数</a></li>
            <li><a >图集</a></li>
            <li><a >用户评价</a></li>
        </ul>

    </div>
</section>

<!--x图片-->
<section class="section2">
    <div class="procontainer">
        <div class="detailShow">
            <div class="swiper-container swiper-container1">
                <div class="swiper-wrapper">
                    <!--                    <div class="swiper-slide swiper-slide1"><img src="--><?php //echo str_replace("../../","../",$result['pic']) ?><!--" alt=""></div>-->
                    <!--                    -->
                    <?php
                    foreach($zhutuarr as $k=>$v){
                        ?>
                        <div class="swiper-slide swiper-slide1">
                            <img src="
<?php echo str_replace("../../","../",$zhutuarr[$k][2]);?>" alt='<?php echo $zhutuarr[$k][1];?>'>
                        </div>

                        <?php
                    }
                    ?>

                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination swiper-pagination1"></div>
            </div>


        </div>
        <form action="" class="detailForm">
            <h1><?php echo $result{'title'}?></h1>
            <h2><?php echo $result{'shortShow'}?></h2>




<!--            <div class="shoucang" >加入收藏</div>-->

<!--            <h3>市场价：-->
<!--                <span class="price1">--><?php //echo $result{'yprice'}?><!--</span>元</h3>-->

            <h1 style="color:#ef0000;font-size: 30px;margin-top:20px;border-bottom:2px solid #b3b3b3;padding-bottom:17px;"><?php echo $result{'price'}?><span style="font-size: 16px;">元</span></h1>

            <div class="click1">
                <h4>商品价格</h4>
                <ul>
                    <li>特惠套餐价格：<span  class="price2"><?php echo $result{'price'}?></span>元</li>
                    <li>预定金：200元</li>
                </ul>
            </div>
            <div class="click1">
                <h4>可选类目</h4>
                <ul>
                    <li>颜色可上门自选</li>
                    <li>拉手样式上门自选</li>
                </ul>
            </div>
<!--            <div class="click1 numbers">-->
<!--                <h4>购买数量</h4>-->
<!--                <input type="number" value="1" id="number">-->
<!--                <span class="warmNum"></span>-->
<!--            </div>-->

<!--            <a href="http://www2.53kf.com/webCompany.php?arg=10133101&style=2&kflist=off&kf=19680502&zdkf_type=3&language=cn&charset=GBK" class="kefu" target="_blank">咨询客服</a>-->
            <div class="gray">
                <ul>
                    <li> <em>奥斯卡橱柜套餐</em> <i>元/件</i><span  class=""><?php echo $result{'price'}?></span> </li>
                </ul>


                <h4>总计： <i>元/件</i><span class=""><?php echo $result{'price'}?></span></h4>
            </div>
<!--            <h4 style="float: left;margin-top:20px;">浏览数量：--><?php //echo $result['hits']?><!--</h4>-->

<!--            <div class="detailbutton" ><p>立即购买</p></div>-->

            <a class="tiaozhuanTM" target="_blank" href="<?php
            switch ($id){
                case "32":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.50.2a8f1074AoMCNO&id=551847156829&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "31":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.56.2a8f1074AoMCNO&id=557129040275&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "35":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.53.2a8f1074AoMCNO&id=565767115031&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "37":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.62.2a8f1074AoMCNO&id=551900025138&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "41":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.65.2a8f1074AoMCNO&id=551845268146&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "38":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.68.2a8f1074AoMCNO&id=565643261680&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "36":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.71.2a8f1074AoMCNO&id=556852373300&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "49":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.74.2a8f1074AoMCNO&id=551941874618&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "44":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.77.2a8f1074AoMCNO&id=551846536221&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "47":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.80.2a8f1074AoMCNO&id=551905005336&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "42":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.83.2a8f1074AoMCNO&id=551861472043&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "39":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.86.2a8f1074AoMCNO&id=557217085482&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "43":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.92.2a8f1074AoMCNO&id=551920393304&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "51":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.95.2a8f1074AoMCNO&id=551841444274&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "45":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.98.2a8f1074AoMCNO&id=551954730843&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "40":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.101.2a8f1074AoMCNO&id=551902801201&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "46":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.104.2a8f1074AoMCNO&id=551953338633&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "48":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.107.2a8f1074AoMCNO&id=551862060907&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "50":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.110.2a8f1074AoMCNO&id=551931566521&rn=955d0b2c9d3a4796c789ef74bf2b38e1&abbucket=18";
                    break;
                case "22":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.51.4a971074YHM36m&id=557566152512&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "13":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.57.4a971074YHM36m&id=553478060078&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "19":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.60.4a971074YHM36m&id=557602297944&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "12":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.63.4a971074YHM36m&id=553544133596&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "15":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.66.4a971074YHM36m&id=557711831276&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "14":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.69.4a971074YHM36m&id=557708536774&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "21":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.72.4a971074YHM36m&id=557515060265&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "10":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.75.4a971074YHM36m&id=557510260120&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=29112:97926;168560996:438478676";
                    break;
                case "20":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.78.4a971074YHM36m&id=557649450385&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "17":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.81.4a971074YHM36m&id=553578994180&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "16":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.93.4a971074YHM36m&id=553622287048&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "11":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.96.4a971074YHM36m&id=553582106704&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "18":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.99.4a971074YHM36m&id=553090274889&rn=21ff50d02629e8d88cf062e95c1dd0a6&abbucket=18&sku_properties=168560996:438478676";
                    break;
                case "3":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.53.25381074eRUD0Q&id=558943805935&rn=004c02c7b2bed361899e853e98b2ef36&abbucket=18&sku_properties=29112:97926;15551590:3292081;168560996:438478676";
                    break;
                case "4":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.56.25381074eRUD0Q&id=559061943721&rn=004c02c7b2bed361899e853e98b2ef36&abbucket=18&sku_properties=29112:97926;15551590:3292081;168560996:438478676";
                    break;
                case "5":
                    echo "https://detail.tmall.com/item.htm?spm=a1z10.15-b.w4011-18217027631.68.25381074eRUD0Q&id=551959754828&rn=004c02c7b2bed361899e853e98b2ef36&abbucket=18&sku_properties=11773557:792448904";
                    break;
                default:
                    echo "https://jiabaochugui.tmall.com/category-1321316082.htm?spm=a1z10.15-b.w14210285-16708615291.3.25381074eRUD0Q&tsearch=y&sid=418666413&pageId=1458629747&scene=taobao_shop#TmshopSrchNav";
                    break;


            }

            ?>">立即购买</a>


        </form>

    </div>

</section>


<!--搭配购买-->
<section class="section3">
    <div class="procontainer">
        <h1 class="detailTitle">推荐购买</h1>
        <ul class="detailList">
            <?php
            $productList=$action->getProduct(1,6);


            foreach($productList as $row){
                ?>
                <li onclick="javascript:location.href='?id=<?php echo $row['id'];?>'">
                    <div class="dList"><img src="<?php echo str_replace("../../","../",$row['pic']) ?>" alt=""></div>
                    <h5><?php echo strindex($row['title'],7,"...")?></h5>
                    <p><?php echo $row['price']?></p>
                </li>
                <?php
            }
            ?>


        </ul>
    </div>
</section>


<div class="section4">
    <div class="procontainer">
        <div id="sidebar-tab">
            <div id="tab-title">
                <h3>
                    <span class="selected">商品详情</span>
                    <span>参数规格</span>
                    <span>评价晒单</span>
                    <span>售后服务</span>
                    <span>帮助中心</span>

                </h3>
            </div>
            <div id="tab-content">
                <ul>
                    <li>
                        <?php
                        foreach($arr as $k=>$v){
                            ?>
                            <img src="
<?php echo str_replace("../../","../",$arr[$k][2]);?>" alt='<?php echo $arr[$k][1];?>'>

                            <?php
                        }
                        ?>

                    </li>
                </ul>
                <ul >
                    <li></li>
                </ul>
                <ul >
                    <li>
                        <div class="pingjia clearfix">
                            <div class="yinxiang">
                                <h1>大家印象</h1>
                                <div>
                                    <span>全部(560)</span>
                                    <span>设计美观(86)</span>
                                    <span>材料优质(209)</span>
                                    <span>材料优质(209)</span>
                                </div>
                            </div>
                            <div class="buttonpingjia">我要评价</div>
                        </div>

                    </li>
                </ul>
                <ul class="hide">
                    <li></li>
                </ul>
                <ul class="hide">
                    <li></li>
                </ul>


            </div>
        </div>
    </div>
</div>


<script>
    $('#tab-title span').click(function() {
        $(this).addClass("selected").siblings().removeClass(); //removeClass就是删除当前其他类；只有当前对象有addClass("selected")；siblings()意思就是当前对象的同级元素，removeClass就是删除；
        $("#tab-content > ul").hide().eq($('#tab-title span').index(this)).show();
    });
</script>


<?php

include webdir."/include/footer.php";
////?>
</body>

<script>


    $(function(){
        $('.select').click(function(){
            $("html,body").animate({scrollTop: $("#sidebar-tab").offset().top}, 1000);
        });




        $('#number').blur(function(){

            if($('#number').val()<0){
                $('#number').val(0);
            }

        });


        $('.shoucang').click(function(){
            $.ajax({
                url:"../ajax/shoucang.php",
                type:"POST",
                data:"id=<?php echo $id;?>",
                success:function(data){
                    switch(data){
                        case "nologin":
                            alert('请先登录');
                            location.href="../user/login.php";
                            break;
                        case '3':
                            alert('已收藏');
                            break;
                        case '0':
                            alert('收藏失败');
                            break;
                        case '1':
                            alert('收藏成功');
                            break;
                        default:
                            alert(data);
                    }
                },
                error:function(){
                    alert('错误');
                }
            })
        })

        $('.detailbutton').click(function(){
            if(!$('#number').val()){
                $('.warmNum').html('请输入要购买的数量');

            }else{
                $('.warmNum').html('');
            }

            $.ajax({
                url:"../ajax/ajax_cart.php",
                type:"POST",
                data:"id=<?php echo $id;?>&sum="+$('#number').val()+"",
                success:function(data){
                    switch(data){
                        case "nologin":
                            alert('请先登录');
                            location.href="../user/login.php";
                            break;
                        case "2":
                            alert('库存不足');

                            break;
                        case "1":

                            alert('添加成功，请到购物车查看');
                            location.href="product.php?id=<?php echo $id?>";
                            break;
                        default:
                            alert(data);

                    }
                },
                error:function(){
                    alert('错误');
                }
            })

        })

    })
</script>


<script>



    var swiper = new Swiper('.swiper-container1', {
        pagination: '.swiper-pagination1',
        paginationClickable: true,
//        loop:true
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