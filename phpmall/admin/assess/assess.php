
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


$db=new DbMysql();


$rights=$_SESSION['rights'];
$username=$_SESSION['username'];

$db=new DbMysql();

$sql="select mall_product.title,mall_assess.id,mall_assess.pid,mall_assess.issh,mall_assess.istop,mall_assess.recommend,mall_assess.pinglun,mall_assess.usernameshow,mall_assess.ip,mall_assess.addtime from mall_assess inner join mall_product on mall_assess.pid = mall_product.id ";

$parm=" where 1 ";

$issh=@$_GET['issh'];
if($issh!=""){
    $parm.=" and mall_assess.issh = '$issh' ";
}

$istop=@$_GET['istop'];
if($istop!=""){
    $parm.=" and mall_assess.istop = '$istop' ";
}

$recommend=@$_GET['recommend'];
if($recommend!=""){
    $parm.=" and mall_assess.recommend = '$recommend' ";
}



$key=@$_GET['key'];
$ziduan=@$_GET['ziduan'];

if($key!=""){
    $parm.=" and mall_assess.$ziduan like '%$key%' ";

}

$isadmin=@$_GET['isadmin'];
if($isadmin=="ok"){
    $parm.=" and mall_assess.ip = '管理员' ";
}

$sql.=$parm;






$sql.=" order by mall_assess.id desc ";

$db->sql($sql);
$infocount=$db->affected();


$pagesize=10;
$page=new page($infocount,$pagesize);

$sql.=$page->limit();

echo $sql;

$result=$db->select($sql);



















?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../../css/inital.css">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/article.css">
    <script src="../../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<script>
    function goinfo(str,ztid){
        document.consultInfo.ziduan.value=str;
        document.consultInfo.infozt.value=ztid;
        document.consultInfo.action="assessUpdate.php";
        document.consultInfo.submit();
    }


</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>评论管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：商品评论 </h2>
    <h3>查看:
        <a href="assess.php">全部</a>
        <a href="assess.php?issh=0">待审核</a>
        <a href="assess.php?issh=1">已审核</a>
        <a href="assess.php?istop=0">待置顶</a>
        <a href="assess.php?istop=1">已置顶</a>
        <a href="assess.php?recommend=0">待推荐</a>
        <a href="assess.php?recommend=1">已推荐</a>
        <a href="assess.php?isadmin=ok">管理员</a>

    </h3>





    <form action="./assessAllDel.php" method="post" name=consultInfo>




        <a href="assessAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加评论</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>

                    ID

                </td>
                <td>商品ID</td>
                <td>所属商品</td>
                <td>审核状态</td>
                <td>置顶状态</td>
                <td>推荐状态</td>
                <td>评论星级</td>

                <td>显示姓名</td>
                <td>提交时间</td>
                <td>IP地址</td>
                <td>操作</td>

            </tr>

            </thead>

            <tbody>

            <?php

            if($infocount>=1){

            foreach($result as $row) {
                ?>

                <tr>
                    <td>
                        <input type="checkbox" value="<?php echo $row['id'];?>" name="id[]">
                        <?php echo $row['id'];?>

                    </td>
                    <td><?php echo $row['pid'];?></td>
                    <td> <?php echo $row['title'];?></td>
                    <td> <?php  if($row['issh']==1){echo "<span style='color: #5cb85c'>已审核</span>";}else{echo "<span style='color:#c9302c'>待审核</span>"; };?></td>
                    <td> <?php  if($row['istop']==1){echo "<span style='color:#c9302c'>已置顶</span>";}else{echo "<span style='color:#5cb85c'>待置顶</span>"; };?></td>
                    <td> <?php  if($row['recommend']==1){echo "<span style='color: #c9302c'>已推荐</span>";}else{echo "<span style='color:#5cb85c'>待推荐</span>"; };?></td>

                    <td><img src="../../img/star/star<?php echo $row['pinglun'];?>.png" alt="" style="float: left;">
                       <span style="float: right;"><?php echo $row['pinglun'];?></span>
                    </td>
                    <td> <?php echo $row['usernameshow'];?></td>
                    <td> <?php echo date("y-m-d h:i",$row['addtime']);?></td>
                    <td> <?php echo $row['ip'];?></td>
                    <td>
                        <a href="assessChange.php?id=<?php echo $row['id'];?>">修改</a>
                        <a href="assessDel.php?id=<?php echo $row['id'];?>">删除</a>
                    </td>

                </tr>

                <?php
            }}else{
            ?>
            <td>

               暂无数据

            </td>

            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <td> 暂无数据</td>

            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <td> 暂无数据</td>
            <?php
            }
            ?>

            </tbody>

        </table>


        <button class="btn btn-danger">删除所选</button>

        <input type="button" value="批量审核" class="btn btn-success"  onclick="goinfo('issh',1)">
        <input type="button" value="批量待审核" class="btn btn-danger" onclick="goinfo('issh',0)">
        <input type="button" value="取消置顶" class="btn btn-success" onclick="goinfo('istop',0)">
        <input type="button" value="设置置顶" class="btn btn-danger" onclick="goinfo('istop',1)">
        <input type="button" value="设置推荐" class="btn btn-danger" onclick="goinfo('recommend',1)">
        <input type="button" value="取消推荐" class="btn btn-danger" onclick="goinfo('recommend',0)">

        <input type="hidden" name="ziduan">
        <input type="hidden" name="infozt">
    </form>





    <form action="assess.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 提问关键字：</label>
        <select name="ziduan" id="" style="font-size: 18px;line-height: 24px;width: 140px;height: 36px;" class="form-control input-sm">
            <option value="content">提问内容</option>

            <option value="pid" selected>商品ID</option>
            <option value="usernameshow">提交用户</option>

        </select>
        <input type="text" name="key" class="form-control" id="key" required>
        <input type="submit" value="查询" class="btn btn-primary">



    </form>



    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php
        echo $page->show(1);
        ?>
    </h1>
</div>
</body>
</html>