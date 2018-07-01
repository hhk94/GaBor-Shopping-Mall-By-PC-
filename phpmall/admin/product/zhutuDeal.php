<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/16
 * Time: 10:51
 */
require_once '../../public/init.php';


$id=$_POST['id'];

$result=$db->select("select * from mall_product where id = $id",1);


$time=time();


$picurlArray=array_filter(explode("#",$result['zhutu'])) ;

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


$sql="update mall_product set zhutu='$newpicurls$picurls' where id = '$id' ";

$result=$db->sql($sql);
$isok=$db->affected();

if($isok==1){
    echo "<script>alert('修改成功');location.href='./product.php'</script>";
}else{
    echo "<script>alert('修改失败');location.href='./product.php'</script>";
}