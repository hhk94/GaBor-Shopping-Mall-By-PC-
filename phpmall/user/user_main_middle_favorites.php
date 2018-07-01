<!doctype html>

<?php
require_once "../public/init.php";


$sql="select mall_favorites.*,mall_product.title,mall_product.pic,mall_product.hot,mall_product.drops,mall_product.recommend from mall_favorites inner join mall_product on mall_favorites.pid = mall_product.id where mall_favorites.username= '".UID."' ";

$parm="  ";


$hot=@$_GET['hot'];
$drops=@$_GET['drops'];
$recommend=@$_GET['recommend'];

if(!empty($hot)){
    $parm.=" and hot = 1 ";
}
if(!empty($drops)){
    $parm.=" and drops = 1 ";
}
if(!empty($recommend)){
    $parm.=" and recommend = 1 ";
}

$sql.=$parm;
$db=new DbMysql();
$db->sql($sql);
$infocount=$db->affected();


$pagesize=5;

$page=new page($infocount,$pagesize);

$sql.=$page->limit();



$result=$db->select($sql);



?>
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
.info>td{
    text-align: left;}
.anniu{
    float: right;
    margin-bottom:10px;
}
    </style>
</head>
<body>
<div class="main_middle">
    <div class="main_middle_onsale">
        <h3>收藏商品 <span>my Product</span></h3>
        <div class="anniu">
            <a href="user_main_middle_favorites.php" class="btn btn-default" role="button">全部</a>
            <a href="user_main_middle_favorites.php?hot= 1" class="btn btn-default" role="button">热卖</a>
            <a href="user_main_middle_favorites.php?drops= 1" class="btn btn-default" role="button">新品</a>
            <a href="user_main_middle_favorites.php?recommend= 1" class="btn btn-default" role="button">推荐</a>
        </div>
        <table class="table table-hover">
            <thead>
            <tr class=" info">
                <td>商品名</td>
                <td>商品缩略图</td>
                <td>商品状态</td>

                <td>收藏时间</td>
                <td>操作</td>
            </tr>
            </thead>

            <?php
            if($result!=""){
                foreach ($result as $row){
            ?>
            <tbody>
                <tr>
                    <td><a href="../user_product/product.php?id=<?php echo $row['pid']?>" target="_blank"><?php echo strindex($row['title'],6,"...")?></a></td>
                    <td>
                        <a href="../user_product/product.php?id=<?php echo $row['pid']?>"  target="_blank"><?php  echo "<img src='".str_replace('../../','../',$row['pic'])."' style='width:40px;height:40px;display:inline-block'>";?></a>
                    </td>
                    <td><?php
                        if($row['hot']==1){
                            echo "热销 ";
                        }
                        if($row['drops']==1){
                            echo "新品 ";
                        }
                        if($row['recommend']==1){
                            echo "推荐 ";
                        }
                        ?></td>
                    <td>
                        <?php echo date("Y-m-s H:i:s",$row['addtime'])?>
                    </td>
                    <td>
                         <a href="user_main_middle_favorites_del.php?id=<?php echo $row['id'];?>">删除</a>
                    </td>

                </tr>

            <?php
                }
            }
            ?>
            </tbody>


        </table>
        <h4 class="info">共有 <span style="color: #e00000;"><?php echo $infocount;?></span>个订单</h4>
        <h3 class="fenye">分页: <?php echo $page->show(1)?></h3>
    </div>
</div>
</body>
</html>