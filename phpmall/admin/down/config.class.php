<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/24
 * Time: 16:56
 */

class config {
    function configUp(){

        $db=new DbMysql();

        $result=$db->select("select * from mall_webconfig");

//foreach($result as $row){
//    echo $row['varname'];
//    echo "<hr>";
//}

        $filename="../config/config.php";

        if(file_exists($filename)){
//    echo "you";
//    存在就直接开始写入
            $ft=fopen($filename,"w");
            flock($ft,3);
            fwrite($ft,"<?php\r\n");

            foreach ($result as $row){
                fwrite($ft,"$".$row['varname']."='".$row['varvalue']."';");

                fwrite($ft,"\r");


//        fwrite($ft,$row['webname']);

            }


            fwrite($ft,"?>");

            fclose($ft);
        }else{
//    echo "wu";
//    先创建文件
            file_put_contents($filename,"");
        }
    }

}