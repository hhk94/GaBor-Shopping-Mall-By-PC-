
<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Administrator-->
<!-- * Date: 2017/12/12-->
<!-- * Time: 11:19-->
<!-- */-->


<?php
require_once "./../down/checkLogin.php";
require_once "./../down/connectDb.php";




$username=$_POST['username'];
$password=$_POST['password'];
$rights=$_POST["rights"];
$ip=$_SERVER["REMOTE_ADDR"];
//echo $username.$password.$rights;

$admin= new DbMysql();

$admin->sql("select * from mall_admin where username='$username'");
$count= $admin->affected();
if($count>0){
    echo "<script>alert('你建立的账号\《$username\》已经存在,请更换一个');location.href='./../adminAdd.php'</script>";
    exit;

}




$admin->sql("insert into mall_admin (id,username,password,rights,loginTime,ip,loginSum) values (null,'$username','$password','$rights',".  time().",'$ip','0')");

$isOk= $admin->affected();

if($isOk==1){
    echo "<script>alert('创建成功');location.href='./../adminAdmin.php'</script>";
}else{
    echo "<script>alert('创建失败');location.href='./../adminAdmin.php'</script>";
}

?>

