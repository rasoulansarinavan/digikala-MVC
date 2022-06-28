<?php

class model_compare extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getProduct($product_id)
    {
        $query = "select * from tbl_product where id=?";
        $param = [$product_id];
        $product = $this->doSelect($query, $param, 1);
        $product_category_id = $product['category_id'];
        $features = $this->getFeatures($product_id, $product_category_id);
        $product['features'] = $features;
        return $product;
    }

    function getFeatures($product_id, $category_id)
    {
        $query = "select * from tbl_attr where category_id=? and parent=0";
        $param = [$category_id];
        $result = $this->doSelect($query, $param);
        foreach ($result as $key => $row) {
            $query2 = "
            SELECT tbl_attr.title,tbl_product_attr.value
            FROM tbl_attr
            LEFT JOIN tbl_product_attr
            ON tbl_attr.id = tbl_product_attr.attr_id  and tbl_product_attr.product_id=?  where tbl_attr.parent=?";
            $param2 = [$product_id, $row['id']];
            $result2 = $this->doSelect($query2, $param2);
            $result[$key]['children'] = $result2;
        }
        return $result;
    }
}