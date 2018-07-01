
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


$db=new DbMysql();
$_SESSION['file_info']=array();
//添加一些东西
$_SESSION['urlfile_info']=array();//保存url

$_SESSION['fileid']='';

$id=@$_GET['id'];

$sql="select * from mall_product where id = '$id'";
$result=$db->select($sql,1);

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
$zhutu=@$result['zhutu'];
//echo $picurls;
$picurlArray=array_filter(explode("#",$zhutu));

var_dump($zhutu);

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

    <h2>当前位置 ：添加主图 </h2>
    <h3>商品基本信息</h3>
    <form action="./zhutuDeal.php" method="post" name="article" id="article" onsubmit="return test();">
        <div>
            <label for="numbers">商品编号: &nbsp;</label>
            <input type="text" name="numbers" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $result['numbers'];?>">

        </div>
        <div>
            <label for="numbers">id: &nbsp;</label>
            <input type="text" name="id" style="border: 1px solid rgba(86,61,124,.6);" value="<?php echo $id;?>">

        </div>

        <div>
            <label for="title">商品名称: &nbsp;</label>
            <input type="text" name="title" style="border: 1px solid rgba(86,61,124,.6);"  value="<?php echo $result['title']?>">

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






        <button class="btn btn-primary" type="submit">添加</button> <button class="btn btn-primary">重置</button>
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