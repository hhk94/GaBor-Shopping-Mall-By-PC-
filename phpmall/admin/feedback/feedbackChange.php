
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2018/03/13-->
<!-- * Time: 10:48-->
<!-- */-->

<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2018/03/13-->
<!-- * Time: 10:28-->
<!-- */-->
<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";

$db=new DbMysql();

$id=$_GET['id'];
$db->sql("select * from mall_feedback where id = '$id'");

if($db->affected()!=1){
    echo "<script>alert('不存在的信息，请检查');location.href='./feedback.php'</script>";
    exit();

}




$result=$db->select("select * from mall_feedback where id = '$id'",1);

 $typeid=$result['typeid'];
$issh=$result['issh'];
$ishf=$result['ishf'];
$content=$result['content'];
$recontent=$result['recontent'];;
$usernameshow=$result['usernameshow'];
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
        position: relative;
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
    .table{margin:10px }
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
    .logBackground>h3{margin-left:15px;margin-right: 15px;font-weight: bold;
        background: #6f5499;
        color: white;letter-spacing: 3px;
        text-indent:10px;
        line-height:40px;
        font-size: 20px;}

    form label,form input,form span,form select,form option{
        font-size: 18px;
    }
    form select{
        height:30px;}
    form{margin:50px 0 20px 50%;

        -webkit-transform: translateX(-25%);
        -moz-transform: translateX(-25%);
        -ms-transform: translateX(-25%);
        -o-transform: translateX(-25%);
        transform: translateX(-25%);
        position: relative;}
    form button{margin-left:80px;margin-top:20px;}
    form>div{margin-bottom:20px;
        font-size: 18px;
        font-weight:bold;}

    input[type=file]{
        font-size: 12px;
        display: inline-block;}

    textarea{
        width: 400px!important;
        height: 150px!important;}
</style>
<script>
    function test(){
        if(document.article.pid.value==""){
            alert("商品id不能为空");
            document.article.pid.focus();
            return false;
        }
        if(document.article.content.value==""){
            alert("评论内容不能为空");
            document.article.content.focus();
            return false;
        }
        if(document.article.usernameshow.value==""){
            alert("提交人不能为空");
            document.article.usernameshow.focus();
            return false;
        }

    }


</script>
<body>
<div class="logBackground">
    <div class="logTop">
        <h1>留言管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：留言修改 </h2>
    <h3>留言基本信息</h3>
    <form action="./feedbackChangeDeal.php" method="post" name="article" id="article" enctype="multipart/form-data" onsubmit="return test();">



        <div>
            <label for="typeid">所属分类</label>
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <select name="typeid" id="typeid" style="border:1px solid #666">
                <option value="">请选择分类</option>
                <?php
                $result=$db->select("select id,typename from mall_feedbackType where typezt = 1 order by typeorder ");



                foreach ($result as $row){

                    if($typeid==$row['id']){
                        echo "<option value='".$row['id']."' selected>".$row['typename']."</option>";
                    }else{
                        echo "<option value='".$row['id']."'>".$row['typename']."</option>";
                    }


                }

                ?>

            </select>

            <span style="float: right;">分类用于后台展示</span>
        </div>

        <div>信息状态&nbsp;&nbsp;&nbsp;

            <label for="issh">
                <input type="radio" name="issh"  value="0"  <?php
                if($issh==0){echo "checked";}
                ?>>待审核
            </label>
            <label for="">
                <input value="1" type="radio" name="issh"  <?php
                if($issh==1){echo "checked";}
                ?>>已审核
            </label>
        </div>

        <div>回复状态&nbsp;&nbsp;&nbsp;

            <label for="ishf">
                <input type="radio" name="ishf"  value="0"  <?php
                if($ishf==0){echo "checked";}
                ?>>待回复
            </label>
            <label for="">
                <input value="1" type="radio" name="ishf"  <?php
                if($ishf==1){echo "checked";}
                ?>>已回复
            </label>
        </div>









        <div>
            <label for="content">留言内容</label>
            <textarea  name="content" id="content"  style="width: 239px;height: 100px;border: 1px solid rgba(86,61,124,.6);resize: none; " required><?php echo $content;?></textarea>

        </div>


        <div>
            <label for="recontent">回复内容</label>
            <textarea  name="recontent" id="recontent"  style="width: 239px;height: 100px;border: 1px solid rgba(86,61,124,.6);resize: none; " required><?php echo $recontent;?></textarea>

        </div>



        <div>
            <label for="usernameshow">提交用户</label>
            <input type="text" name="usernameshow" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $usernameshow;?>">
            <span style="float: right;">前台显示提交人姓名，可以是虚拟人物</span>
        </div>



        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
</html>