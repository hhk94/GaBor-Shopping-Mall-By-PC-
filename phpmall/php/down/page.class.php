<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/10
 * Time: 15:48
 */

class page{

    private $infoCount; //信息总数

    private $pageSize;//每页显示数量
    private $pageCount;//总页数
    private $currPage;//当前页码
    function __construct($ifcount,$pgsize,$pgcount=1,$cupage=1){
        $this->infoCount=$ifcount;
        $this->pageSize=$pgsize;
        $this->pageCount=ceil($this->infoCount/$this->pageSize);
        $this->currPage=min($this->pageCount,max((int)@$_GET['page'],1));
    }




    function hello(){
        echo $this->infoCount;
        echo "<br>";
        echo $this->pageSize;
        echo "<br>";
//        echo $this->pageCount;
//        echo "<br>";
//        echo $this->currPage;
    }







    function show(){
        $s='';
        for($i=1;$i<=$this->pageCount;$i++){
            if($i==$this->currPage){
                $s.="<span style='font-size:22px;;font-weight:bold;color:rgb(86,61,124)'>$i</span>&nbsp;";
            }else{
                $s.="<a href='".$this->pageurl()."$i'>$i</a>&nbsp;";
            }



        }
        return $s;
    }
    function limit(){
        return "limit ".($this->currPage-1)*$this->pageSize.",".$this->pageSize;
    }
//d当前页码的url地址

    function pageurl(){

        $url=isset($_SERVER['REQUEST_URL'])?$_SERVER['REQUEST_URL']:$_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'];

//

       $request_arr=parse_url($url);

        if(isset($request_arr['query'])){
//                    echo "有参数";
            parse_str($request_arr['query'],$arr);

//            注销某个值
            unset($arr['page']);
//            从新组合网址
            $url=$request_arr['path']."?".http_build_query($arr)."&page=";
        }else{
//            echo "无参数";
                $url=strstr($url,"?")?$url."page=":$url."?page=";
        }

        return $url;

    }



}