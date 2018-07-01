
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/page.class.php";
require_once "./../down/productType.class.php";

$rights=$_SESSION['rights'];//当前登录管理员权限
$username=$_SESSION['username'];




$sql=" select mall_design.*,mall_designfenlei.fenleiname from mall_design inner join mall_designfenlei on mall_design.fenlei=mall_designfenlei.id ";
$parm=" where 1 ";



echo $sql;

$db=new DbMysql();
$db->sql($sql);
$pagesize=10;
$infocount=$db->affected();

$page=new page($infocount,$pagesize);

$sql.=" order by id desc ";
$sql.=$page->limit();

$result=$db->select($sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../product/css/product.css">
    <script src="../../js/jquery.min.js"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
</head>
<style>

</style>
<script>
    function goinfo(str,ztid){
        document.info.ziduan.value=str;
        document.info.infozt.value=ztid;
        document.info.action="productUpdate.php";
        document.info.submit();
    }


</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>设计师管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：设计师列表 </h2>




    <form action="./../deal/productAllDel.php" method="post" name="info">

        <a href="designAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加设计师</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>ID</td>

                <td>设计师名称</td>
                <td>职位</td>
                <td>分类</td>


            </tr>

            </thead>

            <tbody>
            <?php
            foreach ($result as $row){

            ?>

                <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['designName']?></td>
                <td><?php echo $row['zhiwei']?></td>
                <td><?php echo $row['fenleiname']?></td>

                </tr>
            <?php
            }

            ?>
            </tbody>

        </table>






    </form>








    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php
        echo $page->show(1);
        ?>

    </h1>
</div>
</body>
</html>