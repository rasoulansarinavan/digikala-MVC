<?php

class model_adminOrder extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrders()
    {
        $query = "select * from tbl_order order by id desc ";
        $orders = $this->doSelect($query);

        foreach ($orders as $key => $row) {

            $order_date = $row['order_date'];
            $order_date = self::shamsi($order_date);
            $orders[$key]['order_date'] = $order_date[2];

            $address = $row['address'];
            $address = unserialize($address);
            $orders[$key]['address'] = $address;

        }
        return $orders;
    }

    function getOrderStatus()
    {
        $query = "select * from tbl_order_status";
        return $this->doSelect($query);
    }

    function getOrderInfo($order_id)
    {
        $query = "select * from tbl_order where id=? order by id desc ";
        $param = [$order_id];
        $order = $this->doSelect($query, $param);

        foreach ($order as $key => $row) {
            $order_date = $row['order_date'];
            $order_date = self::shamsi($order_date);
            $order[$key]['order_date'] = $order_date[2];

            $address = $row['address'];
            $address = unserialize($address);
            $order[$key]['address'] = $address;

            $basket = $row['basket'];
            $basket = unserialize($basket);
            $order[$key]['basket'] = $basket;


            $delivery = $row['delivery'];
            $delivery = unserialize($delivery);
            $order[$key]['delivery'] = $delivery;


            $offer_code = $row['offer_code'];
            $offer_code = unserialize($offer_code);
            $order[$key]['offer_code'] = $offer_code;

        }
        return $order;
    }

    function changeStatus($order_id, $data)
    {
        $status_id = $data['status'];
        $query = "update tbl_order set status=? where id=?";
        $param = [$status_id, $order_id];
        $this->doQuery($query, $param);
    }
}