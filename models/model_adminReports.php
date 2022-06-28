<?php

class model_adminReports extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getReports()
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        $startDate = explode('/', $startDate);
        $endDate = explode('/', $endDate);

        $startDate = jmktime(0, 0, 0, $startDate[1], $startDate[2], $startDate[0]);
        $endDate = jmktime(23, 59, 59, $endDate[1], $endDate[2], $endDate[0]);

        $query = "select * from tbl_order where order_date >= " . $startDate . " and order_date <= " . $endDate . " ";
        $orders = $this->doSelect($query);

        $totalPrice = 0;
        foreach ($orders as $key => $row) {
            $address = $row['address'];
            $address = unserialize($address);
            $orders[$key]['address'] = $address;

            $price = $row['price'];
            $totalPrice = $totalPrice + $price;
        }
        return [$orders, $startDate, $endDate,$totalPrice];
    }
}