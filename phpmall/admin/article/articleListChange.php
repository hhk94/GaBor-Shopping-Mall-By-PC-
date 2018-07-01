
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
$id=$_GET['id'];

$edit=new DbMysql();
$result=$edit->select("select * from mall_articleType where id='$id'",1);
$typename=$result['typename'];



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
        <h1>用户管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改文章分类 </h2>
    <h3>文章分类基本信息</h3>
    <form action="./../deal/articleListChangeDeal.php?id=<?php echo $id;?>" method="post">
        <div>
            <label for="typename">修改新分类</label>
            <input type="text" name="typename" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $typename;?>">
        </div>

        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>