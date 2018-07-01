<?php
require_once "../public/init.php";


$id=@$_GET['id'];
//echo $id;

$sql=" select * from mall_productList where id = '$id' ";

$listInfo=$db->select($sql,1);
//if(empty($listInfo)){
//    weberror();
//}

$weizhi= $action->getWeizhi($listInfo['idpath']."_".$id);
//var_dump($weizhi);


$xjid=$db->select("select id from mall_productList where idpath like '%_$id%' ");

$xjids=0;

foreach ($xjid as $k=>$v){
    $xjids.=",".$v['id'];
}




$sql=" select title,id,price,yprice,pic,tuijianword from mall_product ";
$parm=" where 1 ";
$parm.=" and (typeid = '$id' or typeid in ($xjids)) ";

$sql.=$parm;

//echo $sql;




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

$style="全部";
if(@$_GET['style']!="") {
    $style=@$_GET['style'];
}


switch (@$style){
    case '欧式':

        $sql.=" and style = '欧式' " ;
        break;
    case '美式':

        $sql.=" and style = '美式' " ;
        break;
    case '中式':
        $sql.=" and style = '中式' " ;
        break;
    case '现代简约':
        $sql.=" and style = '现代简约' " ;
        break;
    case '田园':
        $sql.=" and style = '田园' " ;
        break;
    case '北欧':
        $sql.=" and style = '北欧' " ;
        break;
    case '新中式':
        $sql.=" and style = '新中式' " ;
        break;
    case '全部':
        $sql.=" and style = 0 " ;
        break;

    default:

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
        $sql.=" order by price  desc " ;
        break;
    case 4:
        $sql.=" order by price " ;
        break;
    default:
        $order=2;
        $sql.=" order by id desc " ;
        break;
}

$nowpage1=1;

if(@$_GET['page']!=""){
    $nowpage1=$_GET['page'];
}


$db->sql($sql);
$infocount=$db->affected();
$pagesize=8;

$num=ceil($infocount/$pagesize);

$page=new page($infocount,$pagesize);
$sql.=$page->limit();
//echo $sql;

$result=$db->select($sql);

//var_dump($result);
//echo $page->pageurl2('page');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $listInfo['typename']?>-产品展示</title>
</head>
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="../css/initail.css">
<link rel="stylesheet" href="<?php echo $webdir?>/css/comment.css">
<link rel="stylesheet" href="src/jquery.page.css">

<style>

    body{
        font-family:"微软雅黑"!important;
        background: #f2f2f2!important;
    }
    .listContainer{
        width: 1200px;
        margin:0 auto;
    }
.casemenu{
    margin:24px 0 ;

}
    .casemenu>.listContainer{
        border:1px solid #e6e6e6; background: white;
    }

    .caseline{
        font-size: 16px;
        color: #808080;padding-left:40px;
        height: 60px;
        line-height:60px;
        border-bottom:1px solid #e6e6e6;
    }

    .casepick>a{
        color: #808080;
        font-size: 16px;padding:10px 20px;margin:0 10px;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
    }
    .casepick>a.active{
        color: white;
        background: #fe9249;
    }
    .casepick>a:hover{
        color: white;
        background: #fe9249;
    }

    .productInfo{
        float: left;
        width: 290px;
        border:1px solid #d6d6d6;
        display: block;
        background: white;
        margin:5px;
    }
    .productInfo>.pic{
        width: 270px;
        height: 270px;
        margin:10px;
        background: pink;
    }
    .pic>img{
        width: 100%;}
    .proTitle{
        overflow: hidden;
        margin:12px 10px;
    }
    .proTitle>h1{
        font-size: 14px;
        line-height:25px;
        color: black;
        float: left;}
    .proTitle>div{
        float: right;}

    .productInfo:hover{
        -webkit-box-shadow: 0 0 20px #d4d4d4;
        -moz-box-shadow: 0 0 20px #d4d4d4;
        box-shadow: 0 0 20px #d4d4d4;
    }

    .pagebox{
        margin-top:20px;
        margin-bottom:15px;
    }
</style>

<body>
<?php

include webdir."/include/header.php";
?>

<div class="casemenu">
    <div class="listContainer">
        <div class="caseline">您所在的位置： <?php echo $weizhi;?></div>
        <div class="caseline casepick">空间：
            <a href="productList.php" class="<?php if($id==0){echo "active";}?>">全部</a>
            <a href="<?php echo $page->pageurl2('id')?>39"  class="<?php if($id==39){echo "active";}?>">厨房</a>
            <a href="<?php echo $page->pageurl2('id')?>38"  class="<?php if($id==38){echo "active";}?>">卧室</a>
            <a href="<?php echo $page->pageurl2('id')?>44" class="<?php if($id==44){echo "active";}?>">衣帽间</a>
            <a href="<?php echo $page->pageurl2('id')?>52"  class="<?php if($id==52){echo "active";}?>">书房</a>
            <a href="<?php echo $page->pageurl2('id')?>46"  class="<?php if($id==46){echo "active";}?>">客餐厅</a>
        </div>
        <div class="caseline casepick">风格：
            <a href="<?php echo $page->pageurl2('style')?>全部" class="<?php if($style=='全部'){echo "active";}?>">全部</a>
            <a href="<?php echo $page->pageurl2('style')?>欧式" class="<?php if($style=='欧式'){echo "active";}?>">欧式</a>
            <a href="<?php echo $page->pageurl2('style')?>美式" class="<?php if($style=='美式'){echo "active";}?>">美式</a>
            <a href="<?php echo $page->pageurl2('style')?>中式" class="<?php if($style=='中式'){echo "active";}?>">中式</a>
            <a href="<?php echo $page->pageurl2('style')?>现代简约" class="<?php if($style=='现代简约'){echo "active";}?>">现代简约</a>
            <a href="<?php echo $page->pageurl2('style')?>田园" class="<?php if($style=='田园'){echo "active";}?>">田园</a>
            <a href="<?php echo $page->pageurl2('style')?>北欧"  class="<?php if($style=='北欧'){echo "active";}?>">北欧</a>
            <a href="<?php echo $page->pageurl2('style')?>新中式" class="<?php if($style=='新中式'){echo "active";}?>">新中式</a></div>
        <div class="caseline casepick">排序：
            <a href="<?php echo $page->pageurl2('attr')?>0" class="<?php if($attr==0){echo "active";}?>">默认</a>
            <a href="<?php echo $page->pageurl2('attr')?>2" class="<?php if($attr==2){echo "active";}?>">最新</a>
            <a href="<?php echo $page->pageurl2('attr')?>1" class="<?php if($attr==1){echo "active";}?>">最热</a></div>

    </div>
</div>


<div class="list">
    <div class="listContainer clearfix">
        <?php
        if($result){
            foreach ($result as $row){
                ?>

                <a href="<?php echo $webdir."/user_product/product.php?id={$row['id']}"?>" class="productInfo" target="_blank">
                    <div class="pic"><img src='<?php echo str_replace("../../","../",$row['pic']) ?>' alt=''></div>
                    <div class="proTitle">
                        <h1><?php echo strindex($row['tuijianword'],9,"...")?></h1>
                        <div><img src="newimg/buy2.png" alt=""></div>

                    </div>
                </a>

                <?php
            }}else{
            echo '暂无';
        }
        ?>





    </div>
</div>


<div class="listContainer pagebox">

    <div id="page"></div>

    <script type="text/javascript" src="src/jquery.page.js"></script>
    <script type="text/javascript">
        $(function(){
            $("#page").Page({
                totalPages: <?php echo $num;?>,//分页总数
                liNums: 7,//分页的数字按钮数(建议取奇数)
                firstPage: '首',//first button name
                lastPage: '末',
                activeClass: 'activP', //active 类样式定义
                callBack : function(page){
                    console.log(page)
                    location.href='productList.php?page='+page;

                }
            });

            <?php
            $nowpage=($nowpage1-1);
            echo "$('#page').children('ul').children('li').children('a').removeClass('activP');$('#page').children('ul').children('li').eq(".$nowpage.").children('a').addClass('activP');";
            ?>

        })
    </script>


</div>


<?php

include webdir."/include/footer.php";
?>


</body>


<!--53kf 客服系统模块 -->
<script>(function() {var _53code = document.createElement("script");_53code.src = "//tb.53kf.com/code/code/10133101/2";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(_53code, s);})();</script>



</html>