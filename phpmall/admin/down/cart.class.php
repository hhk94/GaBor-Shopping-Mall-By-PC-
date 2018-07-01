<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/20
 * Time: 16:39
 */

class cart{
    private $db;
    function __construct()
    {
        $this->db=new DbMysql();
    }


    //添加
    function addCart($id,$sum){
        if(!isset($_SESSION['productCart'])){
            $_SESSION['productCart']=array();
        }

        $_SESSION['productCart'][$id]['total']=$sum;

        return true;

    }

    //xian显示
    function cartInfo(){
        $_SESSION['cartCount']=0;
        $_SESSION['cartPrice']=0;


        if(!isset($_SESSION['productCart'])){
            return null;


        }else{

            if(empty($_SESSION['productCart'])) return null;

            $keys=array_keys($_SESSION['productCart']);
            $ids=implode(",",$keys);

            $sql="select * from mall_product where id in($ids) ";
            $result=$this->db->select($sql);



            foreach ($result as $item) {
               $_SESSION['productCart'][$item['id']]['total'];

                $_SESSION['productCart'][$item['id']]['title']=$item['title'];
                $_SESSION['productCart'][$item['id']]['unitPrice']=$item['price'];
                $_SESSION['productCart'][$item['id']]['Price']=$item['price']*$_SESSION['productCart'][$item['id']]['total'];

                $_SESSION['productCart'][$item['id']]['picurl']=$item['pic'];
                $_SESSION['productCart'][$item['id']]['numbers']=$item['numbers'];
                ;
                $_SESSION['productCart'][$item['id']]['yprice']=$item['yprice'];


                $_SESSION['cartCount']+=$_SESSION['productCart'][$item['id']]['total'];
                $_SESSION['cartPrice']+=$_SESSION['productCart'][$item['id']]['Price'];

            }
            return $_SESSION['productCart'];

        }

    }

    //删除
    function delCart($id){
        if(!isset($_SESSION['productCart'][$id])){
            return false;
        }
        unset($_SESSION['productCart'][$id]);
        return true;
    }

}