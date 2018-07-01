<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/25
 * Time: 10:13
 */

//echo "get";

require_once "../down/checkLogin.php";
require_once "../down/connectDb.php";
require_once "../down/config.class.php";

//var_dump($_POST);

$sava=new DbMysql();

$result=$sava->select("select * from mall_webconfig");

foreach($result as $row){
//   $sava->sql("update webconfig set ".$row['varvalue']."='".$_POST[$row['varname']]."'");

    $sql= "update mall_webconfig set varvalue = '".$_POST[$row['varname']]."' where varname ='".$row['varname']."'";

    $sava->sql($sql);
    $isok=$sava->affected();

}
$config=new config();
$config->configUp();

echo "<script>alert('修改完成');location.href='./settingChange.php'</script>";

