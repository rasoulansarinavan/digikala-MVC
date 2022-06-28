<?php

class model_cart extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function removeBasketItemAjax($basket_id)
    {
        $query = "delete from tbl_basket where id=?";
        $param = [$basket_id];
        $this->doQuery($query, $param);
    }

    function updateBasket()
    {
        $number = $_POST['number'];
        $basket_id = $_POST['basket_id'];
        if ($number >= 1) {

            $query = "update tbl_basket set number=? where id=?";
            $param = [$number, $basket_id];
            $this->doQuery($query, $param);
        }
    }
}
