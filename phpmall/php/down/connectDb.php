<?php
//链接数据库
class DbMysql {
    public $conn;
    function __construct(){
        $this->conn = new mysqli("120.24.83.142","test","Novellus2010","membersysbase");
        $this->conn->query("se names gb2312");
    }


//  表格
    function select($sql,$fanhui=2){
        $result=$this->conn->query($sql);
        if($result){
            $array=array();

          if($fanhui==1){
                $array=$result->fetch_array();

          }else{

            while($row=$result->fetch_array()){
                $array[]=$row;
            }
          }
            return $array;
        }else{
            return false;
        }

    }

    function sql($sql){
       return $this->conn->query($sql);
    }

    function affected(){
        return $this->conn->affected_rows;

    }

}
date_default_timezone_set("PRC");



?>