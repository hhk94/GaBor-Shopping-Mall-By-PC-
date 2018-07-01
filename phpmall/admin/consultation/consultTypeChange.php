
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

$id=$_GET['id'];

$db=new DbMysql();

$result=$db->select("select * from mall_consultType where id = '$id'",1);
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
        <h1>售前咨询</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改售前咨询分类 </h2>
    <h3>售前咨询分类基本信息</h3>
    <form action="./consultTypeChangeDeal.php?id=<?php echo $id;?>" method="post">

        <div>
            <label for="typename">分类名称</label>
            <input type="text" name="typename" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $result['typename'];?>">
        </div>

        <div>
            <label for="typeorder">分类排序</label>
            <input type="text" name="typeorder" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $result['typeorder'];?>">
        </div>

        <div>
            <label for="typezt">分类状态</label>
            <input type="radio" name="typezt" style="border: 1px solid rgba(86,61,124,.6);" required value="1" <?php if($result['typezt']==1){echo "checked";}; ;?>> 开启
            <input type="radio" name="typezt" style="border: 1px solid rgba(86,61,124,.6);" required value="0"  <?php if($result['typezt']==0){echo "checked";}; ;?>>关闭
        </div>


        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>


</html>