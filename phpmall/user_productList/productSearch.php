<?php
require_once "../public/init.php";

$sql=" select title,id,price,yprice,pic from mall_product ";
$parm=" where 1 ";




$k=@$_GET['key'];
$sk="华尔兹";

if($k!=""){
    $parm.=" and title like '%$k%' ";
    $sk=$k;
}



$pp=@$_GET['ppid'];
if($pp!=""){
    $parm.=" and ppid = '$pp' ";
}

$sql.=$parm;
//属性条件
$attr=@$_GET['attr'];

switch ($attr){
    case 1:

        $sql.=" and hot = '1' " ;
        break;
    case 2:

        $sql.=" and recommend = '1' " ;
        break;
    case 3:
        $sql.=" and drops = '1' " ;
        break;

    default:
        $order=0;

        break;
}





$order=@$_GET['order'];
//p排序
switch ($order){
    case 1:

        $sql.=" order by hits desc " ;
        break;
    case 2:

        $sql.=" order by id desc " ;
        break;
    case 3:
        $sql.=" order by price desc " ;
        break;
    case 4:
        $sql.=" order by price " ;
        break;
    default:
        $order=2;
        $sql.=" order by id desc " ;
        break;
}


$db->sql($sql);
$infocount=$db->affected();
$pagesize=6;
$page=new page($infocount,$pagesize);
$sql.=$page->limit();
//echo $sql;

$result=$db->select($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>产品搜索</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<script src="jQueryPage/pager.js">  </script>
<link rel="stylesheet" href="jQueryPage/pager.css"/>
<style>
    .section1{
        width: 100%;
        background: green;
        height:400px;}

    .container1{
        width: 1280px!important;}
    .container1>ul{margin-top:66px;margin-left:142px;margin-bottom:56px;
    }
    .container1 li{
        width: 198px;
        height: 48px;border:1px solid #34495e;
        float: left;}
    .container1 li a{
        font-size: 20px;
        width: 198px;
        font-weight:bold;
        display: block;
        color: #34495e;
        text-align: center;
        line-height:50px;}
    .productOn{
        color: white!important;
        background: #34495e;}
    /*产品*/
    .section2 .container2 a{
        margin:10px 13px 68px 13px;
        position: relative;
        width: 400px;
        height: 400px;
        display: block;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
        overflow: hidden;
        /*float: left;*/
    }
    .section2 .container2 a>div{
        height: 100%;
        background: pink;
        width: 100%;}
    .section2 .container2 a>h1{
        position: absolute;
        left:0;bottom:0;
        width: 100%;
        height: 60px;
        line-height:60px;
        text-align: center;
        background: #34495e;opacity: .8;
        color: white;}
    .section2 .container2 a>h1>span{
        font-size: 18px;
        color: #ff9b00;
    }

    .section2{
        position: relative;}


    footer{margin-top:50px;}

    .texing{
        overflow: hidden;
        border-bottom:1px solid #e0e0e0;
        padding-bottom:10px;
    }

    .texing>h3>span{
        background: #F0F0F0;
        padding:5px 10px;
        margin: 0 2px;
        display: inline-block;
        cursor: pointer;

    }
    .texing>h3{
        font-size: 20px;
        float:left;}
    .texing>h4{margin-right:20px;
        font-size: 20px;
        float: right;}
    .texing>h4>span{
        background: #F0F0F0;
        padding:5px 10px;
        margin: 0 2px;
        display: inline-block;
        cursor: pointer;

    }
    .texing>h5{
        line-height:36px;
        float: right;}
    .texing>h5>span{
        color: #c9302c;}
    .containerProduct{
        overflow: hidden;
        margin-top:40px!important;
        width: 1280px!important;}


    .containerProduct2>div{
        float: right;}
    .containerProduct2>div>h1{
        font-size: 18px;
        float: left;
        margin-right:20px;}

    .containerProduct2>div>h1>a{
        margin:0 2px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border:1px solid #e0e0e0;
        padding:5px 10px;
    }
    .containerProduct2>div>h1>a.activePro{
        color:white;
        background: #f5605c;
    }
    .nextNav>li{
        cursor: pointer;
    }

    .nextNav ul{

        position: absolute;
        top:49px;
        left:0;
    }
    .nextNav ul>li{
        cursor: pointer;
        height: 30px;
        line-height: 30px;
        border:1px solid white;
        text-align: center;
        font-size: 16px;
        color: white;
        background: #34495e;

    }
    .section2 .container2 a>div>img{
        width: 100%;
        height: 100%;
        -webkit-transition: all 0.3s ;
        -moz-transition: all 0.3s ;
        -ms-transition: all 0.3s ;
        -o-transition: all 0.3s ;
        transition: all 0.3s ;
    }
    .section2 .container2 a:hover>div>img{
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    .section2 .container2 a:hover{
        box-shadow: 0 0 20px #777;
    }
    .board>a:hover{
        color: #f5605c;
    }

    .order>span.down{
        color: white;
        background:  #f5605c;}
    .order>span.up{
        color: white;
        background:  #f5605c;}
    .order>span:hover{
        color: white;
        background:  #f5605c;
    }
    .chakan>span:hover{
        color: white;
        background:  #f5605c;
    }

    .chakan>span.down{
        color: white;
        background:  #f5605c;}

    #search{
        float: right;}
    #search>input{
        height: 30px;
        line-height:30px;
        font-size: 20px;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        border:1px solid #e0e0e0;}
    #tijiao{padding:0 5px}

    .list{float: right;width: 860px;}
    .tuijian{
        float: left;
        width: 420px;

    }
    .tuijian>h3{
        border-bottom:2px solid #e0e0e0;
        padding-bottom:4px;
    }
    .section2 .container2 .tuijian>a{
        width: 200px;
        height: 200px;
        margin:10px 5px;
        float: left;
    }

    .list>a{
        float: left;}

    .section2 .container2 .tuijian >a>h1{
        background: #F40!important;
        height: 30px;
        line-height: 30px;
        font-size: 18px;
    }
    .section1{
        overflow: hidden;}
    .section1>img{
        width: 100%;}
</style>
<body>
<?php

include webdir."/include/header.php";
?>
<section class="section1">
    <img src="../img/topBanner/1.jpg" alt="">
</section>

<section class="section2">
    <div class="container container1">
        <ul class="nextNav">

            <li >
                <a href="productList.php" class="productOn">全部产品</a>

            </li>


            <?php
            $menu=$action->getProductType(" and tid = '0' ");
            foreach ($menu as $row){
                ?>
                <li style="position: relative;">
                    <a ><?php echo $row['typename']?></a>

                    <ul>
                        <li  onclick="javascript:location.href='<?php echo $webdir."/user_productList/productList.php?id={$row['id']}"?>'">全部<?php echo $row['typename']?></li>
                        <?php
                        $menus=$action->getProductType(" and tid = '{$row['id']}' ");
                        foreach ($menus as $row) {
                            ?>
                            <li  onclick="javascript:location.href='<?php echo $webdir."/user_productList/productList.php?id={$row['id']}"?>'"><?php echo $row['typename'];?></li>

                            <?php
                        }
                        ?>
                        <li class="up">收起</li>

                    </ul>

                </li>

                <?php
            }
            ?>



            <br style="clear: both;">
        </ul>

        <div class="texing" style="margin-bottom:10px;">





            <!--            <span style="font-size: 20px;">平开门</span>-->
            <!--            <span style="font-size: 20px;">移门</span>-->
            <form action="productSearch.php" id="search">
                <input type="text" name="key" required value="<?php echo $sk;?>">
                <input type="submit" value="查找" id="tijiao">
            </form>
        </div>
        <div class="texing">
            <h3 class="order">排序:
                <span   onclick="javascript:location.href='<?php echo $page->pageurl2('order')?>1'"  class="<?php if($order==1){echo "down";}?>">关注↓</span>
                <span    onclick="javascript:location.href='<?php echo $page->pageurl2('order')?>2'" class="<?php if($order==2){echo "down";}?>">新品↓</span>
                <span    onclick="javascript:location.href='<?php echo $page->pageurl2('order')?>3'" class="<?php if($order==3){echo "down";}else if($order==4){echo "up";}?>"><?php if($order==4){echo "价格↑";}else{echo "价格↓";}?></span>
                <span  onclick="javascript:location.href='<?php echo $page->pageurl2('order')?>4'" class="<?php if($order==4){echo "up";}?>">按价格从低到高排序</span>
            </h3>
            <h5>找到 <span style="color: #f5605c;"><?php echo $infocount?></span>个相关物品</h5>

            <h4 class="chakan">查看：
                <span  class="<?php if($attr==0){echo "down";}?>" onclick="javascript:location.href='<?php echo $page->pageurl2('attr')?>0'">全部</span>
                <span class="<?php if($attr==1){echo "down";}?>"  onclick="javascript:location.href='<?php echo $page->pageurl2('attr')?>1'">热销</span>
                <span class="<?php if($attr==3){echo "down";}?>" onclick="javascript:location.href='<?php echo $page->pageurl2('attr')?>3'">降价</span>
                <span class="<?php if($attr==2){echo "down";}?>" onclick="javascript:location.href='<?php echo $page->pageurl2('attr')?>2'">推荐</span>
            </h4>

        </div>
    </div>

    <div class="container container2 containerProduct">

        <div style="" class="tuijian">
            <h3>热销推荐</h3>




            <?php
            $productList=$action->getProduct(1,6);

            foreach($productList as $row){
                ?>
                <a href='<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>' target="_blank">
                    <div><img src='<?php echo str_replace("../../","../",$row['pic']) ?>' alt=''></div>
                    <h1><?php echo strindex($row['title'],6,"...")?></h1>
                </a>
                <?php
            }
            ?>




        </div>


        <div style="" class="list">
        <?php
        if($result){
            foreach ($result as $row){
                ?>

                <a href='<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>' target="_blank">
                    <div><img src='<?php echo str_replace("../../","../",$row['pic']) ?>' alt=''></div>
                    <h1><?php echo strindex($row['title'],6,"...")?> <span>￥<?php echo $row['price']?></span></h1>
                </a>

                <?php
            }}else{
            echo '暂无';
        }
        ?>
        </div>
        <br style="clear: both;">
    </div>

    <div class="container containerProduct2">
        <div>
            <h1>共有 <span style="color: #f5605c;"><?php echo $infocount?></span>个商品</h1>
            <h1>当前第 <span ><?php echo $page->currpage();?></span>页/共 <span><?php echo $page->pageCount()?></span>页 </h1>
            <h1>分页：
                <?php
                echo $page->showStyle()
                ?>


            </h1>
            <br style="clear: both;">
        </div>
        <br style="clear: both;">
    </div>
</section>




<?php

include webdir."/include/footer.php";
?>


</body>

<script>
    $('.nextNav>li>ul').hide();

    $('.nextNav>li').click(function(){

        $(this).children('ul').slideDown();
    });

    $('.up').click(function(){

        $(this).parent('ul').slideUp();
        event.stopPropagation();
    });


</script>


<script>
    $('.nextNav>li').click(function(){
        $(this).children('a').addClass('productOn');
        $(this).siblings('li').children('a').removeClass('productOn');
        $(this).siblings('li').children('ul').slideUp();

    });

</script>

<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>



</html>