<?php

class adminLogin{

    private $db;
    function __construct() {
        $this->db= new DbMysql();
    }


    function isLogin($username,$userpsd){

//        $db=new DbMysql();
        $result=$this->db->select("select * from admin where username='$username'",1);
        $state;
        $ip=$_SERVER["REMOTE_ADDR"];
//        echo $ip;
        if($result!=false){
//            var_dump($result);
//            echo $result["password"];
            if($result["password"]!=$userpsd){
//                密码错误
                $state= -1;
            }else{
                $this->db->sql("update admin set loginTime='".  time()."',ip='$ip',loginSum=loginSum+1 where username='$username'");

                $_SESSION["rights"]=$result["rights"];
//            账号密码全对
                $state= 1;

            }



        }else{
//            没有用户名
            $state= -2;
        };

        $this->db->sql("insert into adminLog(username,password,addtime,ip,state) value ('$username','$userpsd','".  time()."','$ip','$state')");



            return $state;


    }
}

?>