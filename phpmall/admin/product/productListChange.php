
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


$edit=new DbMysql();

$result=$edit->select("select * from mall_productList where id = $id",1);



$typename=$result['typename'];
$tid=$result['tid'];
$idpath=$result['idpath']

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

    <h2>当前位置 ：修改分类 </h2>
    <h3>分类基本信息</h3>
    <form action="./../deal/productListChangeDeal.php?id=<?php echo $id;?>" method="post">
        <div>
            <label for="tid">所属分类：</label>

            <input type="hidden" name="idpath" value="<?php echo $idpath;?>">
            <?php
                if($tid!=0) {
                    ?>

                    <select name="tid" id="tid" style="border: 1px solid rgba(86,61,124,.6);">


                        <option value="0">一级分类</option>
                        <?php
                        $ptype=new ProductType();

                        $menu =$ptype->floption(0, $tid);
                        echo $menu;

                        ?>

                    </select>

                    <?php
                }else{
                            echo "一级分类不允许修改<input type='hidden' value='$tid' name='tid'>";

                }
            ?>
        </div>

        <div>
            <label for="typename">修改分类</label>
            <input type="text" name="typename" style="border: 1px solid rgba(86,61,124,.6);" required value="<?php echo $typename;?>">
        </div>

        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>


</html>