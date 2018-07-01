<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/21
 * Time: 17:51
 */


require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";
require_once "./../down/maig.class.php";

$maig=new maig();
$save=new DbMysql();


$id=$_GET['id'];

$result=$save->select("select * from mall_product where id = $id",1);

$picurlArray=array_filter(explode("#",$result['picurls'])) ;

$piccount=count($picurlArray);

//for($i=0;$i<$piccount;$i++){
//        echo $_POST['editimginfo'.$i];
//
//}


//读取的旧图片
$newpicurls="";
foreach($picurlArray as $key=>$v){

    $picinfo=explode("@",$v);


    if(isset($_POST['editimginfo'.$key])){
        $newpicurls.=$_POST['editimginfo'.$key]."@";
        $newpicurls.=$picinfo["1"];
        $newpicurls.="#";



    }else{

    }
    
}


//新上传的
$picurls="";

foreach($_SESSION['urlfile_info'] as $row=>$v){

    $picurls.=$_POST['picinfook'.$row]."@".$v;
    $picurls.="#";
}





//
//echo "+++".$picurls;
//echo "<hr>";
//echo $newpicurls;



//echo "new";
//echo $picurls;
////var_dump($picurls);
//echo "<hr> old:";
//echo $newpicurls;
////var_dump($newpicurls);
//
//exit;



$title=$maig->str($_POST['title']);


 $numbers=$_POST['numbers'];


 $typeid=$_POST['typeid'];


 $hot=empty($_POST['hot'])?0:$_POST['hot'];


 $drops=empty($_POST['drop1'])?0:$_POST['drop1'];


 $recommend=empty($_POST['recommend'])?0:$_POST['recommend'];


 $kucun=$_POST['kucun'];

$tuijianword=$_POST['tuijianword'];

$hits=$_POST['hits'];


 $picurl=$_POST['picurl'];


 $content=$_POST['content'];
 $shortShow=$_POST['shortShow'];

$ppid=$_POST['ppid'];
$yprice=$_POST['yprice'];
$price=$_POST['price'];
$style=$_POST['style'];

$sql="update mall_product set title = '$title',numbers = '$numbers',ppid = '$ppid',typeid= '$typeid',hot = '$hot',drops= '$drops',recommend = '$recommend',kucun = '$kucun',hits = '$hits',pic ='$picurl',picurls='$newpicurls$picurls',content = '$content',yprice= '$yprice',price = '$price',shortShow='$shortShow',tuijianword= '$tuijianword',style='$style'  where id = '$id'";


$isok=$save->sql($sql);

if($isok==1){
    echo "<script>alert('修改成功');location.href='./../product/product.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./../product/product.php'</script>";
}


