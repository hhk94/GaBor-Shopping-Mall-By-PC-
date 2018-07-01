<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/27
 * Time: 14:42
 */

class order
 {
    private $db;
    function __construct()
    {
        $this->db=new DbMysql();
    }

    //获取订单清单
    function getOrderList($orderID){
        $sql=" select * from mall_orderList where orderID = '$orderID' ";
//        return $sql;
        return $this->db->select($sql);
    }

    //支付状态
    function getPaymentState($state){
        switch ($state){
            case 0:

                return '待支付';
                break;
            case 1:
                return '已支付';
                break;
        }
    }

    //订单状态
    function getOrderState($state){
        switch ($state){
            case 0:
                return '未确认';
            break;
            case 1:
                return '待发货';
            break;
            case 2:
                return '已发货';
            break;
            case 3:
                return '已完结';
                break;
            case 4:
                return '已取消';
                break;
            case 5:
                return '待评价';
                break;

        }

    }

}
