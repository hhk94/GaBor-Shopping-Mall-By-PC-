
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

$sql="select mall_feedback.id,mall_feedback.typeid,mall_feedback.issh,mall_feedback.ishf,mall_feedback.usernameshow,mall_feedback.addtime,mall_feedback.ip,mall_feedbackType.typename from mall_feedback inner join mall_feedbackType on mall_feedback.typeid=mall_feedbackType.id";

$parm=" where 1 ";

$issh=@$_GET['issh'];
if($issh!=""){
    $parm.=" and mall_feedback.issh= '$issh' ";
}

$ishf=@$_GET['ishf'];
if($ishf!=""){
    $parm.=" and mall_feedback.ishf= '$ishf' ";
}

$isadmin=@$_GET['isadmin'];
if($ishf=="ok"){
    $parm.=" and mall_feedback.ip= '管理员' ";
}

$typeid=@$_GET['typeid'];

if($typeid!=""){
    $parm.=" and mall_feedback.typeid= '$typeid' ";
}

$key=@$_GET['key'];
$ziduan=@$_GET['ziduan'];

if($key!=""){
    $parm.=" and mall_feedback.$ziduan like '%$key%' ";
}

$sql.=$parm;

$db->sql($sql);

$infocount=$db->affected();
$pagesize=10;

$page=new page($infocount,$pagesize);

$sql.=' order by id desc ';
$sql.=$page->limit();


//echo $sql;
$result=$db->select($sql);


//var_dump($result);









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
        document.info.ziduan.value=str;
        document.info.infozt.value=ztid;
        document.info.action="feedbackUpdate.php";
        document.info.submit();
    }


</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>留言管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：留言管理 </h2>
    <h3>查看:
        <a href="feedback.php">全部</a>
        <a href="feedback.php?issh=0">待审核</a>
        <a href="feedback.php?issh=1">已审核</a>
        <a href="feedback.php?ishf=0">待回复</a>
        <a href="feedback.php?ishf=1">已回复</a>
        <a href="feedback.php?isadmin=ok">管理员 </a>


    </h3>





    <form action="./feedbackAllDel.php" method="post" name=info>

        <select name="" id="" style="float: right;font-size: 18px;   width: 200px;height: 30px;border: 1px solid rgba(86,61,124,.6)" onchange="javascript:location.href=this.options[selectedIndex].value">
            <option value="feedback.php">全部留言</option>
            <?php
            $typeinfo=$db->select("select id,typename from mall_feedbackType where typezt =1 order by typeorder");
            foreach ($typeinfo as $row){
                if($typeid==$row['id']){

                    echo "<option value='?typeid=".$row['id']."' selected>".$row['typename']."</option>";
                }else{

                    echo "<option value='?typeid=".$row['id']."'>".$row['typename']."</option>";
                }
            }

            ?>

        </select>


        <a href="feedbackAdd.php" class="addAdmin">
            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
            <span>添加留言</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>

                    ID

                </td>
                <td>所属分类</td>
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
                if($infocount>=1){

                foreach ($result as $row) {

                    ?>

                    <tr>
                        <td>
                            <input type="checkbox" value="<?php echo $row['id']?>" name="id[]">

                            <?php echo $row['id']?>
                        </td>
                        <td>
                            <?php echo $row['typename'];?>

                        </td>
                        <td>
                            <?php
                            if($row['issh']==1){
                                echo "已审核";
                            }else{
                                echo "<span style='color: #d9534f'>待审核</span>";
                            }

                            ?>
                        </td>
                        <td>
                            <?php
                            if($row['ishf']==1){
                                echo "已回复";
                            }else{
                                echo "<span style='color: #d9534f'>待回复</span>";
                            }

                            ?>
                        </td>
                        <td> <?php echo $row['usernameshow']?></td>
                        <td><?php echo date("y-m-d h:i",$row['addtime']);?></td>
                        <td> <?php echo $row['ip'];?></td>



                        <td>
                            <a href="feedbackChange.php?id=<?php echo $row['id'];?>">修改</a>
                            <a href="feedbackDel.php?id=<?php echo $row['id'];?>">删除</a>
                        </td>

                    </tr>

                    <?php
                }}else {
                    ?>
                    <tr>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                        <td>暂无数据</td>
                    </tr>

                    <?php
                }
            ?>
            </tbody>

        </table>


        <button class="btn btn-danger">删除所选</button>

        <input type="button" value="批量审核" class="btn btn-success"  onclick="goinfo('issh',1)">
        <input type="button" value="批量待审核" class="btn btn-danger" onclick="goinfo('issh',0)">
        <input type="button" value="设置待回复" class="btn btn-success" onclick="goinfo('ishf',0)">
        <input type="button" value="设置回复" class="btn btn-danger" onclick="goinfo('ishf',1)">


        <input type="hidden" name="ziduan">
        <input type="hidden" name="infozt">
    </form>





    <form action="feedback.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 提问关键字：</label>
        <select name="ziduan" id="" style="font-size: 18px;line-height: 24px;width: 140px;height: 36px;" class="form-control input-sm">
            <option value="usernameshow">提交用户</option>
            <option value="content">留言内容</option>

            <option value="id" selected>ID</option>


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