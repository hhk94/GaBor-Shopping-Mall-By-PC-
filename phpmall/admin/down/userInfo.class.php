<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/22
 * Time: 18:44
 */

class UserInfo{
    function __construct()
    {
        $this->db=new DbMysql();
    }

    function isok(){
        $zt=2;
        $uid=@$_SESSION['webusername'];
        $pwd=@$_SESSION['webpassword'];

        $sql="select * from mall_user where username = '$uid' and password = '$pwd' ";
        $result=$this->db->select($sql,1);
        if($this->db->affected()!=1){
            $zt=4;
            weberror("",'用户不存在');
        };


        return $result['zt'];
    }



    function islogin($uid,$pwd,$code){
        $pwd=md5($pwd);
        $zt=2;
        if($code!=$_SESSION['code']){
            $zt=0;
            return $zt;

        }
        $sql="select * from mall_user where username = '$uid'";
        $result=$this->db->select($sql,1);

        if($this->db->affected()!=1){
            //如果该账号没存在
            $zt=-1;
            return $zt;
        }

        if($pwd!=$result['password']){
//            如果密码错误
            $zt=-2;
            return $zt;
        }
        if($result['zt']==1){
            //账号未审核
            $zt=1;
            return $zt;
        }
        if($result['zt']==3){
            //账号被锁定
            $zt=3;
            return $zt;
        }

        if($zt==2){
            $_SESSION['webusername']=$uid;
            $_SESSION['webpassword']=$pwd;
        }
        return $zt;
    }
}