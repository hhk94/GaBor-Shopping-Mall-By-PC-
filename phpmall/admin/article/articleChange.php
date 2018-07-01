
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


$add=new DbMysql();

$id=$_GET['id'];
$result=$add->select("select * from mall_article where id = '$id'",1);
$title= $result['title'];
$typeid=$result['typeid'];
$author=$result['author'];
$com=$result['com'];
$hits=$result['hits'];
$content=$result['content'];

$result=$add->select("select * from mall_articleType "); //读取
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
    <script src="../../ckeditor/ckeditor.js"></script>

</head>
<style>
    body{
        font-family:"微软雅黑"!important;}

</style>

<body>
<div class="logBackground">
    <div class="logTop">
        <h1>文章修改</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改文章 </h2>
    <h3>文章基本信息</h3>
    <form action="./../deal/articleChangeDeal.php?id=<?php echo $id;?>" method="post" name="article" id="article" onsubmit="return test();">
        <div>
            <label for="title">文章标题: &nbsp;</label>
            <input type="text" name="title" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $title;?>">
            文章的标题，用于前台展示
        </div>
        <div>
            <label for="typeid">文章分类: &nbsp;</label>
            <select name="typeid" id=""  style="border: 1px solid rgba(86,61,124,.6);width: 218.89px;">
                <option value="">请选择分类</option>
                <?php
                foreach ($result as $row){
                    if($typeid==$row['id']){

                    echo "<option value='".$row["id"]."' selected>".$row['typename']."</option>";

                    }else{


                    ?>


                    <option value="<?php echo $row['id'];?>"><?php echo $row['typename'];?></option>


                    <?php
                    }
                    }
                ?>
            </select>
            所属分类，用于前台归类
        </div>
        <div>
            <label for="author">文章作者: &nbsp;</label>
            <input type="text" name="author" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $author;?>">
        </div>
        <div>
            <label for="com">文章来源: &nbsp;</label>
            <input type="text" name="com" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $com;?>">
        </div>
        <div>
            <label for="hits">浏览数量: &nbsp;</label>
            <input type="text" name="hits" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $hits;?>">
            可以初始化一个数量，用于展示
        </div>
        <div style="position: relative;left:-74%;width: 198%;">
            <label for="content" style="display: block;">文章内容: &nbsp;</label>
            <textarea class="ckeditor" name="content" id="content" style="border: 1px solid rgba(86,61,124,.6);resize: none; " ><?php echo $content;?></textarea>
        </div>


        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
<script>
//    function test(){
//        if(document.article.title.value=="" ||document.article.typeid.value=="" ||document.article.author.value=="" ||document.article.com.value=="" || document.article.hits.value==""){
//            alert('请填写完整的文章信息');
//            return false;
//        }
//
//        if(CKEDITOR.instances.content.getData()==""){
//            alert('请填写文章内容');
//            return false;
//        }
//
//        return true;
//    }

</script>

</html>