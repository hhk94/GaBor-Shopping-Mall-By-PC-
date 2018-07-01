
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
        <h1>文章管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：添加文章分类 </h2>
    <h3>分类基本信息</h3>
    <form action="./../deal/articleListAddDeal.php" method="post">
        <div>
            <label for="typename">添加新分类</label>
            <input type="text" name="typename" style="border: 1px solid rgba(86,61,124,.6);" required>
        </div>
        <div>
            <label for="typename">分类类型</label>
            <select name="leixing" id="">
                <option value="关于我们">关于我们</option>
                <option value="文章动态">文章动态</option>
                <option value="帮助中心">帮助中心</option>
                <option value="热门促销">热门促销</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">创建</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>