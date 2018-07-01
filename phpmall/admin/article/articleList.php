
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
$list=new DbMysql();

$pagesize=5;
$list->sql("select * from mall_articleType");
$infocount=$list->affected();

$page = new page($infocount,$pagesize);
$result=$list->select("select * from mall_articleType order by id desc ".$page->limit());



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/list.css">
    <script src="../../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>文章管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：文章分类列表 </h2>
    <a href="articleListAdd.php" class="addAdmin">
        <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
        <span>添加新分类</span>
    </a>
    <table class="table table-bordered">
        <thead>
        <tr class="success" >
            <td>ID</td>
            <td>分类名称</td>
            <td>操作</td>

        </tr>

        </thead>

        <tbody>
            <?php
            if($infocount>=1){
            foreach ($result as $row){
            ?>

            <tr>

                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['typename']; ?></td>
                <td><a href="./../deal/articleListDel.php?id=<?php echo $row['id'];?>">删除</a>
                    <a href="./articleListChange.php?id=<?php echo $row['id'];?>">修改</a></td>
            </tr>
            <?php
            }}
            ?>
        </tbody>

    </table>



    <h1 style="text-align: center;font-size: 20px;">分页:
            <?php echo $page->show() ?>
    </h1>
</div>
</body>
</html>