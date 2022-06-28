<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getSlider()
    {
        $query = 'select * from tbl_slider';
        $result = $this->doSelect($query);
        return $result;
    }


    function mostVisited()
    {
        $query = " select * from tbl_options where setting='slider'";
        $result = $this->doSelect($query, [], 1);
        $limit = $result['value'];


        $query = " select * from tbl_product order by visit desc limit " . $limit . " ";
        $result = $this->doSelect($query);
        foreach ($result as $key => $row) {
            $price_total = $this->calculateDiscount($row['price'], $row['discount']);
            $result[$key]['price_total'] = $price_total;
        }
        return $result;
    }

    function last_products()
    {
        $query = " select * from tbl_options where setting='slider'";

        $result = $this->doSelect($query, [], 1);
        $limit = $result['value'];

        $query = " select * from tbl_product order by id  desc limit " . $limit . " ";
        $result = $this->doSelect($query);
        foreach ($result as $key => $row) {
            $price_total = $this->calculateDiscount($row['price'], $row['discount']);
            $result[$key]['price_total'] = $price_total;
        }
        return $result;
    }

    function removeProduct($product_id)
    {
        $cookie = self::setBasketCookie();
        $query = "delete from tbl_basket where cookie=? and product_id=?";
        $param = [$cookie, $product_id];
        $this->doQuery($query, $param);
    }
}