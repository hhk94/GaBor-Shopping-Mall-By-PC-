
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
include '../lgCheck.php';
require_once "./../down/connectDb.php";
require_once "./../down/page.class.php";


$db=new DbMysql();

$uid=$_SESSION['uid'];
$rights=$_SESSION['power'];
$username=$_SESSION['name'];
$sql="select log.*,logType.typename from log inner join logType on log.typeid=logType.id";  //基本执行查询语句
$parm=" where 1";                          //存储条件参数


$typeid=@$_GET['typeid']; //获取分类

$keyword=@$_GET['key'];


//
//echo $rights;
//echo "<br>";
//echo "uid".$uid."<br>";

//if($rights!=0){
//    $parm.=" and inputer = '$username'";
//}

if($typeid!=""){
    $parm.=" and typeid='$typeid'";
}

if($keyword!=""){
    $parm.=" and content like '%$keyword%'";
}

if($uid!=777){
    $parm.=" and uid='$uid'";
}












//分页开始
$sql.=$parm." order by id desc ";
$db->sql($sql);
$infocount=$db->affected();//信息总数量
$pagesize=3;//每页数量
$page=new page($infocount,$pagesize);
//f分页结束

//
//echo "信息总数".$infocount;
//echo "<br>";
//echo $sql;
//echo "<br>";





$sql.=$page->limit();
//echo $sql;

$result = $db->select($sql);





//echo "<br>";
//echo "zh真是查询出来的数量".count($result);
//
//echo "<br>";
//echo $page->pageurl();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../css/inital.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/article.css">
    <script src="../js/jquery.min.js"></script>
</head>
<style>
    body{
        font-family:"微软雅黑"!important;}
    .table{margin:0}
</style>

<body style="background:  #eee;">
<div class="logBackground">
    <div class="logTop">
        <h1>日志管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：日志管理 </h2>
    <h3>查看: <a href="log.php">全部</a>
        <?php
        $type=$db->select("select * from logType");
        foreach($type as $row){
            echo "<a href ='?typeid=".$row['id']."'>".$row['typename']."</a>";

        }

        ?>

    </h3>

    <form action="./../deal/articleAllDel.php" method="post">
        <select name="" id="" style="float: right;font-size: 18px;width: 200px;height: 30px;border: 1px solid rgba(86,61,124,.6);<?php if($uid==777){echo 'display:block;';}else{echo 'display: none;';};?>" onchange="javascript:location.href=this.options[selectedIndex].value" >
            <option value="log.php">全部日志</option>

            <?php



            foreach($type as $row){
                if($typeid==$row['id']){

                    echo "<option value='?typeid=".$row['id']."' selected>".$row['typename']."</option>";
                }else{

                    echo "<option value='?typeid=".$row['id']."'>".$row['typename']."</option>";
                }
            }

            ?>

        </select>
        <a href="logAdd.php" class="addAdmin">
<!--            <div><img src="./../../img/adminImg/adminAdmin_1.png" alt=""></div>-->
            <span>添加日志</span>
        </a>
        <table class="table table-bordered">
            <thead>


            <tr class="success" >
                <td>

                    ID
                </td>



                <td>录入员</td>
                <td>内容</td>
                <td>录入时间</td>



            </tr>

            </thead>

            <tbody>

            <?php


            if($infocount>=1){
                foreach($result as $row){
                    ?>

                    <tr>

                        <td>
<!--                            <input name='id[]' type="checkbox" value="--><?php //echo $row['id'];?><!--">-->
                            <?php echo $row['id'];?>
                        </td>

                        <td><?php echo $row['typename'];?></td>

                        <td style="overflow: hidden;max-width: 800px;"><?php echo $row['content'];?></td>

                        <td><?php echo  $row['addtime'];?></td>


                    </tr>

                    <?php
                }
            }else{
                echo " <tr>
                
                <td>暂无数据</td>
                <td>暂无数据</td>
                <td>暂无数据</td>
                <td>暂无数据</td>
                
               
            </tr>";
            }
            ?>

            </tbody>

        </table>


<!--        <button class="btn btn-danger">删除所选</button>-->
    </form>





    <form action="log.php" class="search" method="get" name="search" id="formsearch" target="">
        <label class="control-label" for="key" style=""> 内容关键字：</label>
        <input type="text" name="key" class="form-control" id="key" required>
        <input type="submit" value="查询" class="btn btn-primary">



    </form>



    <h1 style="text-align: center;font-size: 20px;">分页:
        <?php echo $page->show(2);?>
    </h1>
</div>
</body>
</html>