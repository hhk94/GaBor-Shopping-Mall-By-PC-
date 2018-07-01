
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../../down/checkLogin.php";
require_once "./../../down/connectDb.php";
require_once "./../../down/page.class.php";

$db=new DbMysql();

$sql=" select * from mall_productPP ";

$parm=" where 1 ";

$db->sql($sql);
$infocount=$db->affected();

$recommend=@$_GET['recommend'];

echo $recommend;
if($recommend!=""){
    $parm.=" and recommend = '$recommend' ";

}

$sql.=$parm;

$sql.=" order by pporder ";

$pagesize=10;





$page=new page($infocount,$pagesize);






$sql.=$page->limit();

//echo $sql;


$result=$db->select($sql);






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../../css/inital.css">
    <link rel="stylesheet" href="../../../css/bootstrap.min.css">
    <script src="../../../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<style>
    .logTop{

        background: linear-gradient(45deg,#020031 0,#6d3353 100%);
        border-bottom:4px solid #2e6da4;
    }
    .logTop>h1{
        font-weight:bold;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        height:40px;
        line-height:40px;
        text-align: center;
        width: 100px;
        float: left;
        margin-left:25px;
        margin-bottom:-7px;
        font-size:20px;;
        color: black;
        background: #eee;}
    .logBackground{
        margin-top:10px;
        background:  #eee;;
        border:2px solid #d4d4dc;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 6px 0 #cfcfd4 ;
        -moz-box-shadow: 0 6px 0 #cfcfd4 ;
        box-shadow: 0 6px 0 #cfcfd4 ;;}

    .logBackground>h2{
        font-size: 18px;
        padding: 10px 0;
        margin:10px 15px;
        border-bottom:1px solid black;
    }
    /*.table{margin:10px }*/
    .table>thead>tr{
        font-weight:bold;
        font-size: 18px;}
    .addAdmin{margin-bottom:10px;
        display: block;
        overflow: hidden;}
    .addAdmin>div{margin-left:10px;
        width: 26px;
        float: left;}
    .addAdmin>span{
        font-size: 20px;
        float: left;}
    .addAdmin img{
        width: 100%;}
    td{
        font-size: 20px;}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>


    <h2>当前位置 ：品牌列表 </h2>

    <h3>查看: <a href="productpp.php">全部</a>
        <a href="?recommend=1">推荐</a>
        <a href="?recommend=0">不推荐</a>




    </h3>
    <a href="productppAdd.php" class="addAdmin">
        <div><img src="./../../../img/adminImg/adminAdmin_1.png" alt=""></div>
        <span>添加新品牌</span>
    </a>
    <table class="table table-bordered">
        <thead>
        <tr class="success" >
            <td>排序</td>
            <td>品牌名称</td>
            <td>品牌logo</td>
            <td>是否推荐</td>

            <td>操作</td>
        </tr>

        </thead>

        <tbody>
        <?php




            foreach($result as $row) {
                ?>
                <tr>
                    <td><?php echo $row['pporder'];?></td>
                    <td><?php echo $row['ppname'];?></td>
                    <td><img src="<?php echo $row['picurl']; ?>" alt="" style="height: 45px;"></td>
                    <td><?php
                        if($row['recommend']==1){
                        echo "<span style='color:#c9302c'>推荐</span>";
                        }else{
                            echo "<span style='color:#5cb85c'>不推荐</span>";
                        }

                        ?></td>

                    <td><a href="productppDel.php?id=<?php echo $row['id'];?>">删除</a> <a href="./productppChange.php?id=<?php echo $row['id'];?>">修改</a></td>
                </tr>
                <?php
            }
        ?>
        </tbody>

    </table>



    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php
            echo $page->show(1);

        ?>

    </h1>
</div>
</body>
</html>