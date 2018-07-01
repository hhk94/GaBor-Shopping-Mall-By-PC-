<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 17:18
 */

class receive{
    private $db;
    function __construct()
    {
        $this->db=new DbMysql();
    }
    function receiveAdd($info,$isok){
        $sql="insert into mall_receive(shouhuoren,shdizhi,youbian,tel,mobile,username) values('{$info['shouhuoren']}','{$info['shdizhi']}','{$info['youbian']}','{$info['tel']}','{$info['mobile']}','{$_SESSION['webusername']}')";
        if($isok=='ok'){

            if($this->db->sql($sql)){
                return true;
            }else{
                return false;
            }

        }else{
            return true;
        }

    }

    function receiveList($tj=""){
        $sql="select * from mall_receive ";
        $parm= " where 1 ".$tj;
        $sql.=$parm." order by id desc ";
//        echo $sql;
        return $this->db->select($sql);
    }


    function receiveEdit($infos,$isok){
        $sql=" update mall_receive set shouhuoren = '{$infos['shouhuoren']}',shdizhi ='{$infos['shdizhi']}',youbian = '{$infos['youbian']}',tel = '{$infos['tel']}',mobile = '{$infos['mobile']}' where id= '{$infos['id']}' and username = '{$_SESSION['webusername']}' ";

        if($isok=='ok'){
            if($this->db->sql($sql)){

                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }

    }

    function receiveDel($id){
        $sql="delete from mall_receive where id = '$id' and username = '{$_SESSION['webusername']}' ";
//        echo $sql;
        if($this->db->sql($sql)){
            return true;
        }else{
            return false;
        }

    }


}