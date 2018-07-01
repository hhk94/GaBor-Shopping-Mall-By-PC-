
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

$sql="select mall_consult.*,mall_product.title,mall_consultType.typename from mall_consult inner join mall_product on mall_product.id=mall_consult.pid inner join mall_consultType on mall_consultType.id = mall_consult.typeid ";
$parm=" where 1 ";

$typeid=@$_GET['typeid'];
$issh=@$_GET['issh'];
$ishf=@$_GET['ishf'];
$isadmin=@$_GET['isadmin'];
$key=@$_GET['key'];


if($typeid!=""){
    $parm.=" and mall_consult.typeid= '$typeid' ";
}

if($issh!=""){
    $parm.=" and mall_consult.issh= '$issh' ";
}

if($ishf!=""){
    $parm.=" and mall_consult.ishf= '$ishf' ";
}

if($isadmin=="yes"){
    $parm.=" and mall_consult.ip= '管理员' ";
}

$ziduan=@$_GET['ziduan'];

if($key!=""){

    $parm.=" and mall_consult.$ziduan like '%$key%' ";
}



$sql.=$parm;
//echo $sql;

$db->sql($sql);
$infocount=$db->affected();
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
        document.consultInfo.action="consultUpdate.php";
        document.consultInfo.submit();
    }


</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>售前咨询</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：咨询内容 </h2>
    <h3>查看:
        <a href="consult.php">全部</a>
        <a href="?isadmin=yes">管理员</a>
        <a href="?issh=1">已审核</a>
        <a href="?issh=0">待审核</a>
        <a href="?ishf=1">已回复</a>
        <a href="?ishf=0">待回复</a>

    </h3>

    <form action="./consultAllDel.php" method="post" name=consultInfo>
        <select name="" id="" style="float: right;font-size: 18px;   width: 200px;height: 30px;border: 1px solid rgba(86,61,124,.6)" onchange="javascript:location.href=this.options[selectedIndex].value">
            <option value="consult.php">全部分类</option>
            <?php
            $typename=$db->select("select * from mall_consultType where typezt = 1 order by typeorder ");




            foreach($typename as $row){
                if($typeid==$row['id']){

                    echo "<option value='?typeid=".$row['id']."' selected>".$row['typename']."</option>";
                }else{

                    echo "<option value='?typeid=".$row['id']."'>".$row['typename']."</option>";
                }
            }

            ?>


        </select>
        <a href="consultAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加咨询</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>

                    ID
                </td>
                <td>所属分类</td>
                <td>所属商品</td>
                <td>审核状态</td>
                <td>回复状态</td>

                <td>显示姓名</td>
                <td>提交时间</td>
                <td>IP地址</td>
                <td>操作</td>

            </tr>

            </thead>

            <tbody>

                <?php
                if($infocount>0){

                foreach($result as $row){
                ?>



                    <tr>

                        <td>

                            <input name='id[]' type="checkbox" value="<?php echo $row['id'];?>">
                           <?php echo $row['id'];?>
                        </td>
                        <td><?php echo $row['typename'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td><?php  if($row['issh']==1){
                            echo "<span style='color: #5cb85c'>已审核</span>";
                            }else{
                                echo "<span style='color:#c9302c'>待审核</span>";
                            };?></td>
                        <td><?php  if($row['ishf']==1){
                                echo "<span style='color: #5cb85c'>已回复</span>";
                            }else{
                                echo "<span style='color:#c9302c'>待回复</span>";
                            };?></td>

                        <td><?php echo $row['usernameshow'];?></td>
                        <td><?php echo date("Y-m-d,h:i a",$row['addtime']);?></td>
                        <td><?php echo $row['ip'];?></td>
                        <td>
                            <a href="./consultDel.php?id=<?php echo $row['id'];?>">删除</a>
                            <a href="./consultChange.php?id=<?php echo $row['id'];?>">修改</a></td>
                    </tr>


                <?php
                }}else{
                ?>
                    <tr class="success" >
                        <td>

                            暂无
                        </td>
                        <td>暂无</td>
                        <td>暂无</td>
                        <td>暂无</td>
                        <td>暂无</td>

                        <td>暂无</td>
                        <td>暂无</td>
                        <td>暂无</td>
                        <td>暂无</td>

                    </tr>
<?php
                }
?>

            </tbody>

        </table>


        <button class="btn btn-danger">删除所选</button>
        
        <input type="button" value="批量审核" class="btn btn-success"  onclick="goinfo('issh',1)">
        <input type="button" value="批量待审核" class="btn btn-danger" onclick="goinfo('issh',0)">
        <input type="button" value="批量已回复" class="btn btn-success" onclick="goinfo('ishf',1)">
        <input type="button" value="批量待回复" class="btn btn-danger" onclick="goinfo('ishf',0)">
        <input type="hidden" name="ziduan">
        <input type="hidden" name="infozt">
    </form>





    <form action="consult.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 提问关键字：</label>
        <select name="ziduan" id="" style="font-size: 18px;line-height: 24px;width: 140px;height: 36px;" class="form-control input-sm">
            <option value="content">提问内容</option>
            <option value="recontent">回复内容</option>
            <option value="pid">商品ID</option>
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