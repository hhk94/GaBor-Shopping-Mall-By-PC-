<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/10
 * Time: 17:06
 */


class ProductType{
    private $db;
    function __construct()
    {
        $this->db=new DbMysql();

    }

    function fl($tid){
        $select=new DbMysql();
        $result=$this->db->select("select * from mall_productList where tid = '$tid'");
        $menu="";
        $leftStr="";
        $sd="";
        foreach($result as $row){
            for($i=2;$i<=$row['sd'];$i++){
                $leftStr="|-";
                $sd.="-";
            }

            $menu.="<tr>";
            $menu.="<td>".$row["id"]."</td>";
            $menu.="<td>".$leftStr.$sd.$row['typename']."</td>";
            $menu.="<td><a href='./../deal/productListDel.php?id=".$row["id"]."'>删除</a>
                        <a href='./productListChange.php?id=".$row["id"]."'>修改</a></td>";
            $menu.="</tr>";

            $sd="";
            $menu.=$this->fl($row["id"]);
        }
        return $menu;
    }

//添加类别
    function floption($tid,$dqid=0,$style=0){


        $result=$this->db->select("select * from mall_productList where tid = '$tid'");
        $menu="";
        $leftStr="";
        $sd="";
        foreach($result as $row){
            for($i=2;$i<=$row['sd'];$i++){
                $leftStr="|-";
                $sd.="-";
            }

            if($style==0) {


                if ($dqid == $row["id"]) {
                    $menu .= "<option value=" . $row['id'] . " selected>" . $leftStr . $sd . $row['typename'] . "</option>";

                } else {

                    $menu .= "<option value=" . $row['id'] . ">" . $leftStr . $sd . $row['typename'] . "</option>";

                }
            }else{
                if ($dqid == $row["id"]) {
                    $menu .= "<option value=?typeid=" . $row['id'] . " selected>" . $leftStr . $sd . $row['typename'] . "</option>";

                } else {

                    $menu .= "<option value=?typeid=" . $row['id'] . ">" . $leftStr . $sd . $row['typename'] . "</option>";

                }




            }

            $sd="";
            $menu.=$this->floption($row["id"],$dqid,$style);
        }
        return $menu;
    }

//循环删除底层下级
function typeDel($id){
    $result=$this->db->select("select * from mall_productList where tid = $id");
    $xj=$this->db->affected();
    $info="";
    if($xj!=0){


       foreach($result as $row){
           $info.=$this->typeDel($row['id']);
       }
//        $info.=$id."有下级<br>";

       $this->db->sql("delete from mall_productList where id = '$id' ");


    }else{
        $this->db->sql("delete from mall_productList where id = '$id' ");
//        $info.=$id."无下级";
    }
    return $info;


}
//更新深度
    function updateSd($id,$sd)
    {
        $result=$this->db->select("select * from mall_productList where tid=$id");
        $xj=$this->db->affected();
        $info="";

        if($xj!=0)
        {
            $info.=$id."深度:$sd<br>";
            foreach($result as $row)
            {

                $info.=$this->updateSd($row["id"], $sd+1);
            }
            $this->db->sql("update mall_productList set sd=$sd where id=$id");
        }
        else
        {
            $info.=$id."深度:$sd<br><br>";
            $this->db->sql("update mall_productList set sd=$sd where id=$id");
        }
        return $info;
    }


    function infoList(){
        $sql=" select concat( idpath,'_',id ) as path,idpath,id,typename from mall_productList order by path ";
        return $this->db->select($sql);
    }
}