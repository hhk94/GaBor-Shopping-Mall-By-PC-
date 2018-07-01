
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:48-->
<!-- */-->

<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/productType.class.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addChange.css">
    <script src="../../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>

<body>
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：添加分类 </h2>
    <h3>分类基本信息</h3>
    <form action="./../deal/productListDeal.php" method="post">
        <div>
            <label for="tid">所属分类：</label>
            <select name="tid" id="tid" style="border: 1px solid rgba(86,61,124,.6);" >
                <option value="0">一级分类</option>
                <?php
                $ptype=new ProductType();

                $menu=$ptype->floption(0);
                echo $menu;

                ?>

            </select>
        </div>

        <div>
            <label for="typename">添加新分类</label>
            <input type="text" name="typename" style="border: 1px solid rgba(86,61,124,.6);" required>
        </div>

        <button class="btn btn-primary" type="submit">创建</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>


</html>