
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
$result=$db->select("select * from mall_assess where id = '$id'",1);

$pid=$result['pid'];
$issh=$result['issh'];
$istop=$result['istop'];
$recommend=$result['recommend'];
$pinglun=$result['pinglun'];
$content=$result['content'];
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
        <h1>售前咨询</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：咨询修改 </h2>
    <h3>咨询基本信息</h3>
    <form action="./assessChangeDeal.php?id=<?php echo $id;?>" method="post" name="article" id="article" enctype="multipart/form-data" onsubmit="return test();">


        <div>
            <label for="pid">所属商品</label>
            <input type="text" name="pid" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $pid;?>">
            <span style="float: right;">关联的是商品的ID号</span>
        </div>

        <div>信息状态&nbsp;&nbsp;&nbsp;

            <label for="issh">
                <input type="radio" name="issh"  value="0" <?php if($issh==0){echo "checked";}?>>待审核
            </label>
            <label for="">
                <input value="1" type="radio" name="issh"  <?php if($issh==1){echo "checked";}?>>已审核
            </label>
            <span style="float: right;">待审核信息在前台不显示</span>
        </div>

        <div>置顶状态&nbsp;&nbsp;&nbsp;

            <label for="istop">
                <input type="radio" name="istop"  value="0" <?php if($istop==0){echo "checked";}?>>待置顶
            </label>
            <label for="">
                <input value="1" type="radio" name="istop"  <?php if($istop==1){echo "checked";}?>>已置顶
            </label>
        </div>

        <div>推荐状态&nbsp;&nbsp;&nbsp;

            <label for="recommend">
                <input type="radio" name="recommend"  value="0" <?php if($recommend==0){echo "checked";}?>>待推荐
            </label>
            <label for="">
                <input value="1" type="radio" name="recommend"  <?php if($recommend==1){echo "checked";}?>>已推荐
            </label>
        </div>



        <div>
            <label for="pinglun">评论等级</label>
            <select name="pinglun" id="typeid">
                <option value="">请选择</option>
                <option value="1" <?php if($pinglun==1){echo "selected";}?>>一星</option>
                <option value="2" <?php if($pinglun==2){echo "selected";}?>>二星</option>
                <option value="3" <?php if($pinglun==3){echo "selected";}?>>三星</option>
                <option value="4" <?php if($pinglun==4){echo "selected";}?>>四星</option>
                <option value="5" <?php if($pinglun==5){echo "selected";}?>>五星</option>

            </select>
            <span style="float: right;"></span>
        </div>






        <div>
            <label for="content">评价内容</label>
            <textarea  name="content" id="content"  style="width: 239px;height: 100px;border: 1px solid rgba(86,61,124,.6);resize: none; " ><?php echo $content;?></textarea>

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