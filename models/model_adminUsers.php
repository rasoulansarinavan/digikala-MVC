<?php

class model_adminUsers extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getUserOrders($user_id)
    {
        $query = "select * from tbl_order where user_id=? order by id desc ";
        $param = [$user_id];
        $orders = $this->doSelect($query, $param);
        foreach ($orders as $key => $row) {
            $order_date = $row['order_date'];
            $order_date = self::shamsi($order_date);
            $order_date_shamsi = $order_date[2];
            $orders[$key]['order_date'] = $order_date_shamsi;

            $delivery = $row['delivery'];
            @$delivery = unserialize($delivery);
            $orders[$key]['delivery'] = $delivery;

            $basket = $row['basket'];
            @$basket = unserialize($basket);
            $orders[$key]['basket'] = $basket;

        }
        return $orders;
    }

    function getUsersLevel()
    {
        $query = "select * from tbl_users_level";
        return $this->doSelect($query);
    }

    function changeLevel($user_id, $data)
    {
         $level = $data['level'];
        $query = "update tbl_users set level=? where id=?";
        $param = [$level, $user_id];
        $this->doQuery($query, $param);
    }
}