
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
include '../lgCheck.php';
require_once "./../down/connectDb.php";


$add=new DbMysql();
$result=$add->select("select * from logType ");
?>

<?php /*echo $_SESSION['uid'];*/?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link rel="stylesheet" href="../css/inital.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="css/addChange.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../ckeditor/ckeditor.js"></script>

</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>
<body>
<div class="logBackground">
    <div class="logTop">
        <h1>日志管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：添加日志 </h2>
    <h3>日志基本信息</h3>
    <form action="deal/articleAddDeal.php" method="post" name="article" id="article" onsubmit="return test();">
<!--        <div>-->
<!--            <label for="title">文章标题: &nbsp;</label>-->
<!--            <input type="text" name="title" style="border: 1px solid rgba(86,61,124,.6);" >-->
<!--            文章的标题，用于前台展示-->
<!--        </div>-->
        <div>
            <label for="typeid">分类: &nbsp;</label>
            <select name="typeid" id=""  style="border: 1px solid rgba(86,61,124,.6);width: 218.89px;">
                <option value="">请选择分类</option>
                <?php
                if($_SESSION['uid']=="1000"){

                ?>
                <option value="1"><?php echo $_SESSION['name'];?></option>
                <?php
                }else if($_SESSION['uid']=="2000"){

                ?>
                <option value="2"><?php echo $_SESSION['name'];?></option>
                <?php
                }else if($_SESSION['uid']=="999") {
                    ?>
                    <option value="3"><?php echo $_SESSION['name']; ?></option>
                    <?php
                }
                ?>
            </select>
            所属分类
        </div>
        <div>
            <input type="text" value="<?php echo $_SESSION['uid'];?>" style="display: none;">
            <label for="author">日志写入员: &nbsp;</label>
            <input type="text" name="inputer" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $_SESSION['name'];?>" >
        </div>


        <div style="position: relative;left:-74%;width: 198%;">
            <label for="content" style="display: block;">文章内容: &nbsp;</label>
            <textarea class="ckeditor" name="content" id="content" style="border: 1px solid rgba(86,61,124,.6);resize: none; " ></textarea>
        </div>


        <button class="btn btn-primary" type="submit">添加</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
<script>
    function test(){
        if(document.article.typeid.value=="" ||document.article.inputer.value=="" ){
            alert('请填写完整的文章信息');
            return false;
        }

        if(CKEDITOR.instances.content.getData()==""){
            alert('请填写文章内容');
            return false;
        }

        return true;
    }

</script>

</html>