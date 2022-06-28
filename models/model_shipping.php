<?php

class model_shipping extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAddress()
    {
        Model::sessionInit();
        $user_id = Model::sessionGet('user_id');

        $query = " select *from tbl_address  where user_id=? order by id desc";
        $param = [$user_id];
        return $this->doSelect($query, $param);
    }

    function getAddressInfo($address_id)
    {
        $query = " select *from tbl_address where id=?";
        $param = [$address_id];
        $addressInfo = $this->doSelect($query, $param, 1);

        self::sessionInit();
        self::sessionSet('address', serialize($addressInfo));

        return $addressInfo;
    }

    function addAddress($data, $address_id)
    {

        $name = $data['name'];
        $family = $data['family'];
        $mobile = $data['mobile'];
        $post_code = $data['post_code'];
        $address = $data['address'];
        $pelak = $data['pelak'];
        $vahed = $data['vahed'];
        $province = $data['province'];
        $city = $data['city'];

        Model::sessionInit();
        $user_id = Model::sessionGet('user_id');

        if ($address_id == '') {

            $query = "insert into tbl_address (name,family,province,city,address,pelak,vahed,post_code,mobile,user_id)

values (?,?,?,?,?,?,?,?,?,?)";

            $param = [$name, $family, $province, $city, $address, $pelak, $vahed, $post_code, $mobile, $user_id];

            $this->doquery($query, $param);
        } else {

            $query = "update  tbl_address set name=?,family=?,province=?,city=?,address=?,pelak=?,vahed=?,post_code=?,mobile=?,user_id=?

where id=?";

            $param = [$name, $family, $province, $city, $address, $pelak, $vahed, $post_code, $mobile, $user_id, $address_id];

            $this->doquery($query, $param);

        }

    }

    function getDeliveryItems()
    {
        $query = " select *from tbl_post_type ";
        return $this->doSelect($query);
    }

    function deliveryPrice($delivery_id)
    {
        $query = " select *from tbl_post_type where id=?";
        $param = [$delivery_id];
        $delivery = $this->doSelect($query, $param, 1);

        $deliveryPrice = $delivery['price'];

        self::sessionInit();
        self::sessionSet('delivery', serialize($delivery));

        $basket = $this->getBasket();
        $totalPrice = $basket[1];
        $totalDiscount = $basket[2];

        $finalPrice = ($totalPrice - $totalDiscount) + $deliveryPrice;

        self::sessionSet('finalPrice', $finalPrice);

        return [$delivery, $finalPrice];
    }
}
