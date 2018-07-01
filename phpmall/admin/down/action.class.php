<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/30
 * Time: 15:07
 */
class action {
    private $db;
    function __construct()
    {
        $this->db=new DbMysql();
    }
    //h获取文章信息
    function getArticle($tj="",$order=" order by id desc ",$limit="  limit 0,4 "){
        $sql=" select title,addtime,id from mall_article ";
        $parm=" where 1 ".$tj.$order.$limit;
        $sql.=$parm;
//        echo $sql;
        return $this->db->select($sql);

    }

    function getArticleType($tj='',$order=' order by id desc ',$limit=' limit 0,4 '){
        $sql="select * from mall_articleType ";
        $parm=" where 1 ".$tj.$order.$limit;
        $sql.=$parm;
        //   echo $sql;
        return $this->db->select($sql);
    }


    //友情链接
    function getLinks($tj=" ",$order=" order by id desc ",$limit=" "){
        $sql=" select * from mall_links ";
        $parm=" where 1 ".$tj;
        $sql.=$parm.$order.$limit;
//        echo $sql;
        return $this->db->select($sql);
    }


    //获取商品
    function getProduct($zt,$limit){
        $sql=" select id,title,price,yprice,picurls,pic,zhutu,toindex,tuijianword from mall_product ";
        $parm=" where 1 ";
        switch($zt){
            case "1":

                $parm.=" and recommend = '1' ";
                break;
            case "2":

                $parm.=" and hot = '1' ";
                break;
            case "3":

                $parm.=" and drops = '1' ";
                break;
            default:
                break;
        }

        $sql.=$parm." order by id desc limit 0,".$limit;
//        ECHO $sql;
        return $this->db->select($sql);
    }

    //获取分类
    function getProductType($tj=""){
        $sql=" select typename, id from mall_productList ";
        $parm=" where  1 ".$tj;
        $sql.=$parm;
        return $this->db->select($sql);

    }

    //当前位置
    function getWeizhi($ids,$lj=" > "){
        global $webname,$webdir;
        $ids=explode("_",$ids);
//        var_dump($ids);
        $memu="<a href='{$webdir}/index.php'>".$webname."</a>";
        foreach( $ids as $k=>$v){

            $typename= $this->db->select("select typename from mall_productList where id = '$v'",1);
            if(empty($typename))   continue;



            $memu.= $lj;
            $memu.= "<a href='{$webdir}/user_productList/productList.php?id=$v'>{$typename['typename']}</a>";


        }
        return $memu;
    }

    //品牌获取
    function getPP($tj="",$limit=10){
        $sql=" select * from mall_productPP ";
        $parm=" where 1 ".$tj;
        $sql.=$parm." order by pporder limit 0,$limit ";
        return $this->db->select($sql);
    }


}