
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




$ptype= new ProductType();


$_SESSION['file_info']=array();
//添加一些东西
$_SESSION['urlfile_info']=array();//保存url

$_SESSION['fileid']='';

$productID=time();
$productID.=rand(333,555)*1000;


$edit=new DbMysql();
$result=$edit->select("select * from mall_product where id = '$id'",1);

$title= $result['title'];
$productID=$result['numbers'];
$typeid=$result['typeid'];
$hot=$result['hot'];
$drops=$result['drops'];
$recommend=$result['recommend'];
$kucun=$result['kucun'];
$hits=$result['hits'];
$picurl=$result['pic'];
$content=$result['content'];
$picurls=$result['picurls'];
$ppid=$result['ppid'];
$yprice=$result['yprice'];
$price=$result['price'];
$shortShow=$result['shortShow'];
$tuijianword=$result['tuijianword'];
//echo $picurls;
$picurlArray=array_filter(explode("#",$picurls));

$style=$result['style'];

$menu=$ptype->floption(0,$typeid);
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
    <script src="../swfupload/swfupload.js"></script>
    <script src="../swfupload/handlers.js"  charset="utf-8"  type="text/javascript"></script>
    <style>
        body{
            font-family:"微软雅黑"!important;}

    </style>
    <script type="text/javascript">
        var swfu;
        window.onload = function () {
            swfu = new SWFUpload({
                // Backend Settings
                upload_url: "uploadPics.php",
                post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

                // File Upload Settings
                file_size_limit : "6 MB",	// 2MB
                file_types : "*.jpg",
                file_types_description : "JPG Images",
                file_upload_limit : "0",

                // Event Handler Settings - these functions as defined in Handlers.js
                //  The handlers are not part of SWFUpload but are part of my website and control how
                //  my website reacts to the SWFUpload events.
                file_queue_error_handler : fileQueueError,
                file_dialog_complete_handler : fileDialogComplete,
                upload_progress_handler : uploadProgress,
                upload_error_handler : uploadError,
                upload_success_handler : uploadSuccess,
                upload_complete_handler : uploadComplete,

                // Button Settings
                button_image_url : "images/SmallSpyGlassWithTransperancy_17x18.png",
                button_placeholder_id : "spanButtonPlaceholder",
                button_width: 180,
                button_height: 18,
                button_text : '<span class="button">Select Images <span class="buttonSmall">(2 MB Max)</span></span>',
                button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
                button_text_top_padding: 0,
                button_text_left_padding: 18,
                button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
                button_cursor: SWFUpload.CURSOR.HAND,

                // Flash Settings
                flash_url : "../swfupload/swfupload.swf",

                custom_settings : {
                    upload_target : "divFileProgressContainer"
                },

                // Debug Settings
                debug: false
            });
        };
        function imgdel(pid)
        {
            // 移动到 thumbnails 容器下
            // altok _ pid
            // 移除
            var ydiv = document.getElementById('altok'+pid);
            document.getElementById("thumbnails").removeChild(ydiv);
            // 不光要移动视觉上的删除
            //还要删除session
            // 删除服务器上图片
            $.ajax({
                type:"post",
                url:"delimg.php?id="+pid
            });
        }
        function editimgdel(id){
            var ydiv=document.getElementById('editimg'+id);
            document.getElementById('editimg').removeChild(ydiv);
        }
    </script>
</head>
<style>
    .imgshow{
        float: left;
        border:1px solid #666;
        margin:5px 2px;
    }
</style>

<body>
<div class="logBackground">
    <div class="logTop">
        <h1>商品管理</h1>
        <br style="clear: both;">
    </div>

    <h2>当前位置 ：修改商品 </h2>
    <h3>商品基本信息</h3>
    <form action="./../deal/productChangeDeal.php?id=<?php echo $id;?>" method="post" name="article" id="article" onsubmit="return test();">
        <div>
            <label for="numbers">商品编号: &nbsp;</label>
            <input type="text" name="numbers" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $productID;?>">

        </div>
        <div>
            <label for="title">商品名称: &nbsp;</label>
            <input type="text" name="title" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $title;?>">

        </div>

        <div>
            <label for="style">风格: &nbsp;</label>
            <select name="style" id="style">
                <option value=""></option>
                <option value="欧式" <?php if($style=='欧式'){echo 'selected';}?>>欧式</option>
                <option value="美式" <?php if($style=='美式'){echo 'selected';}?>>美式</option>
                <option value="中式" <?php if($style=='中式'){echo 'selected';}?>>中式</option>
                <option value="现代简约" <?php if($style=='现代简约'){echo 'selected';}?>>现代简约</option>
                <option value="田园" <?php if($style=='田园'){echo 'selected';}?>>田园</option>
                <option value="北欧" <?php if($style=='北欧'){echo 'selected';}?>>北欧</option>
                <option value="新中式" <?php if($style=='新中式'){echo 'selected';}?>>新中式</option>
            </select>

        </div>


        <div>
            <label for="title">一句话标题: &nbsp;</label>
            <input type="text" name="tuijianword" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $tuijianword;?>">

        </div>

        <div>
            <label for="title">市场价格: &nbsp;</label>
            <input type="text" name="yprice" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $yprice;?>">

        </div>

        <div>
            <label for="title">网络专享: &nbsp;</label>
            <input type="text" name="price" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $price;?>">

        </div>
        <div>
            <label for="ppid">商品品牌: &nbsp;</label>
            <select name="ppid" id=""  style="border: 1px solid rgba(86,61,124,.6);width: 218.89px;">
                <option value="">无品牌</option>
                <?php
                $ra=$edit->select("select * from mall_productPP order by pporder");
                foreach($ra as $row){
                    if($ppid==$row['id']){
                        echo "<option value='".$row['id']."' selected>".$row['ppname']."</option>";
                    }else{
                    echo "<option value='".$row['id']."'>".$row['ppname']."</option>";
                }
                }

                ?>
            </select>

        </div>
        <div>
            <label for="typeid">商品分类: &nbsp;</label>
            <select name="typeid" id=""  style="border: 1px solid rgba(86,61,124,.6);width: 218.89px;">
                <option value="">请选择分类</option>
                <?php echo $menu;?>
            </select>

        </div>


        <div style="font-size: 20px;">
            <label for="author">商品属性: &nbsp;</label>
            <input type="checkbox" name="hot" style="border: 1px solid rgba(86,61,124,.6);" value="1" <?php if($hot==1){echo "checked"; };?>>热销
            <input type="checkbox" name="drop1" style="border: 1px solid rgba(86,61,124,.6);"  value="1" <?php if($drops==1){echo "checked";}?>>降价
            <input type="checkbox" name="recommend" style="border: 1px solid rgba(86,61,124,.6);"  value="1" <?php if($recommend==1){echo "checked";}?>>推荐
        </div>


        <div>
            <label for="author">商品库存: &nbsp;</label>
            <input type="text" name="kucun" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $kucun;?>">
        </div>

        <div>
            <label for="author">简短说明: &nbsp;</label>
            <input type="text" name="shortShow" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $shortShow;?>">
        </div>
        <div>
            <label for="hits">浏览数量: &nbsp;</label>
            <input type="text" name="hits" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $hits;?>" >

        </div>


        <div>
            <label for="picurl">缩略图 ： &nbsp;</label>
            <input type="text" name="picurl" id="picurl" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $picurl;?>">
            <iframe src="upload.php" frameborder="0" style="float: right;height: 28px;"></iframe>
            <br  style="clear: both">
        </div>


        <div style="overflow: hidden;">
            <label for="" style="display: block;">已有图集：</label>
           <div id="editimg">
            <?php
            foreach ($picurlArray as $key=>$v){
                $imginfo=explode('@',$v);

                echo "<div class='imgshow' id='editimg$key'><img src='$imginfo[1]' width='100' height='100'>";
//                echo $v."<hr>";
                echo "<a href='javascript:editimgdel
($key)'>删除</a> <div style='margin-top:5px'>描述：<input type='text' style='width:57px' value='$imginfo[0]' name='editimginfo$key'></div></div>";

            }
            ?>
           </div>

        </div>




        <div>
            <label for="logoUrl">商品图集：</label>
            <?php
            if( !function_exists("imagecopyresampled") ){
                ?>
                <div class="message">
                    <h4><strong>Error:</strong> </h4>
                    <p>Application Demo requires GD Library to be installed on your system.</p>
                    <p>Usually you only have to uncomment <code>;extension=php_gd2.dll</code> by removing the semicolon <code>extension=php_gd2.dll</code> and making sure your extension_dir is pointing in the right place. <code>extension_dir = "c:\php\extensions"</code> in your php.ini file. For further reading please consult the <a href="http://ca3.php.net/manual/en/image.setup.php">PHP manual</a></p>
                </div>
                <?php
            } else {
                ?>

                <div style="display: inline; border: solid 1px #7FAAFF; background-color: #C5D9FF; padding: 2px;">
                    <span id="spanButtonPlaceholder"></span>
                </div>

                <?php
            }
            ?>
            <div id="divFileProgressContainer" style="height: 75px;"></div>
            <div id="thumbnails" style="overflow: hidden;">

            </div>


        </div>



        <div style="position: relative;left:-74%;width: 198%;">
            <label for="content" style="display: block;">商品介绍: &nbsp;</label>
            <textarea  id="myEditor content" class="ckeditor" name="content"  style="border: 1px solid rgba(86,61,124,.6);resize: none; " > <?php echo $content;?></textarea>

            <!--            <textarea id="myEditor">这里是原始的textarea中的内容，可以从数据中读取</textarea>-->

        </div>


        <button class="btn btn-primary" type="submit">修改</button> <button class="btn btn-primary">重置</button>
    </form>



</div>
</body>
<script>


</script>
<script>
    function test(){
        if(document.article.numbers.value=="" ||document.article.title.value=="" ||document.article.kucun.value==""  || document.article.hits.value==""){
            alert('请填写完整的商品信息');
            return false;
        }

        if(CKEDITOR.instances.content.getData()==""){
            alert('请填写商品内容');
            return false;
        }

        return true;
    }



</script>

</html>