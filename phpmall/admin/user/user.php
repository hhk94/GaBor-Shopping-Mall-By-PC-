
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

$sql="select * from mall_user ";//基本语法
$parm=" where 1 ";//条件

//条件增加

$zt=@$_GET['zt'];


if($zt!=""){
    $parm.=" and zt = '$zt' ";
}

//判断名称搜索
$key=@$_GET['key'];
 $stype=@$_GET['stype'];

if($key!=""){
    $parm.=" and ".$stype." like '%$key%'";
}





$sql.=$parm;
$db->sql($sql);
$infocount= $db->affected();  //信息总数量
$pagesize=10;  //每页显示数量
$page=new page($infocount,$pagesize);
$sql.=" order by id desc ";
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
    <script src="../../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<style>
    .logTop{

        background: linear-gradient(45deg,#020031 0,#6d3353 100%);
        border-bottom:4px solid #2e6da4;
    }
    .logTop>h1{
        font-weight:bold;
        -webkit-border-radius:5px;
        -moz-border-radius:5px;
        border-radius:5px;
        height:40px;
        line-height:40px;
        text-align: center;
        width: 100px;
        float: left;
        margin-left:25px;
        margin-bottom:-7px;
        font-size:20px;;
        color: black;
        background: #eee;}
    .logBackground{
        margin-top:10px;
        background:  #eee;;
        border:2px solid #d4d4dc;
        -webkit-border-radius:10px;
        -moz-border-radius:10px;
        border-radius:10px;
        -webkit-box-shadow: 0 6px 0 #cfcfd4 ;
        -moz-box-shadow: 0 6px 0 #cfcfd4 ;
        box-shadow: 0 6px 0 #cfcfd4 ;;}

    .logBackground>h2{
        font-size: 18px;
        padding: 10px 0;
        margin:10px 15px;
        border-bottom:1px solid black;
    }
    /*.table{margin:10px }*/
    .table>thead>tr{
        font-weight:bold;
        font-size: 18px;}
    .addAdmin{margin-bottom:10px;
        display: block;
        overflow: hidden;}
    .addAdmin>div{margin-left:10px;
        width: 26px;
        float: left;}
    .addAdmin>span{
        font-size: 20px;
        float: left;}
    .addAdmin img{
        width: 100%;}
    td{
        font-size: 20px;}


    .logBackground>h3{margin-left:15px;margin-right: 15px;font-weight: bold;
        background: #6f5499;
        color: white;letter-spacing: 3px;
        text-indent:10px;
        line-height:40px;
        font-size: 20px;}

    .logBackground>h3>a{
        color: white; margin-left:20px;}
    .search{margin-top:20px;margin-left:50%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        width: 400px;}
    .search input{margin-top:20px;margin-left:50%;-webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);}

    .search #key{border:1px solid #666!important;}
    .search label{margin-left:50%;;-webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        font-size: 20px;
        -o-transform: translateX(-50%);
        transform: translateX(-50%);}


    #stype{
        font-size: 18px;border:1px solid black}
</style>
<script>
//    function zt(){
//        document.userinfo.action="userZt.php";
//        document.userinfo.submit();
//    }
//    function ztWait(){
//        document.userinfo.action="userZtWait.php";
//        document.userinfo.submit();
//    }

    function plzt(id){
//        alert(id);
        document.userinfo.zt.value=id;
        document.userinfo.action="userZtWait.php";
        document.userinfo.submit();



    }

</script>
<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>会员管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：会员列表 </h2>

    <h3>查看: <a href="user.php">全部</a>
        <a href="?zt=1">待审核</a>
        <a href="?zt=2">正常</a>
        <a href="?zt=3">锁定</a>

<!--        --><?php
//        $type=$db->select("select * from malluser");
//        foreach($type as $row){
//
//            $p1="<a href ='?zt=".$row['zt']."'>";
//            $p2="</a>";
//            if($row['zt']==1){
//                $p3="待审核";
//            }else if($row['zt']==2){
//                $p3="正常";
//            }else if($row['zt']==3){
//                $p3="锁定";
//            }
//
//
//            echo $p1.$p3.$p2;
//
//        }
//
//        ?>

    </h3>
    <form action="./userAllDel.php" method="post" name="userinfo">


    <a href="userAdd.php" class="addAdmin">
        <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>
        <span>添加会员</span>
    </a>
    <table class="table table-bordered">
        <thead>
        <tr class="success" >
            <td>ID</td>
            <td>登录账号</td>
            <td>状态</td>
            <td>邮箱</td>
            <td>姓名</td>
            <td>手机号码</td>
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
                    <input type="checkbox" name="id[]" value="<?php echo $row['id']?>">
                    <?php echo $row['id'];?>
                </td>

                <td>

                    <?php echo $row['username'];?>
                </td>
                <td><?php
                    switch ($row['zt']){
                        case "1";
                            echo "<span style='color:#f0ad4e'>待审核</span>";
                            break;
                        case "2";
                            echo "<span style='color:#5cb85c'>正常</span>";
                            break;
                        case "3";
                            echo "<span style='color:#d9534f'>锁定</span>";
                            break;

                    }

                    ?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['xingming'].$row['sex'];?></td>
                <td><?php echo $row['mobile'];?></td>
                <td><a href="./userDel.php?id=<?php echo $row['id'];?>">删除</a> <a href="./userChange.php?id=<?php echo $row['id'];?>">修改</a></td>
            </tr>
            <?php
        }}else {

            ?>
            <tr class="success">
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


        <input type="button" value="批量审核" class="btn btn-danger" onclick="plzt(2)">
        <input type="button" value="批量待审核" class="btn btn-danger" onclick="plzt(1)">
        <input type="button" value="批量锁定" class="btn btn-danger" onclick="plzt(3)">
        <input type="hidden" class="zt" name="zt" style="display: none;">
</form>

    <form action="user.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 查询关键词：</label>

        <select name="stype" id="stype" >
            <option value="username">用户名</option>
            <option value="email">邮箱</option>
            <option value="xingming">真实姓名</option>
            <option value="mobile">手机</option>

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