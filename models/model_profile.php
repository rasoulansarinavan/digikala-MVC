<?php

class model_profile extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function editPersonalInfo()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');


        $user = $this->getUserInfo();

        $oldPassword = $user['password'];
        $family = $_POST['family'];
        $code_melli = $_POST['code_melli'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $job = $_POST['job'];
        $bank_card = $_POST['bank_card'];
        $birthdate = $_POST['birthdate'];
        $newPassword = $_POST['newPassword'];
        $repeat_newPassword = $_POST['repeat_newPassword'];

        if ($newPassword == $repeat_newPassword) {
            $password = $repeat_newPassword;
        } else {
            $password = $oldPassword;
        }
        $query = "update tbl_users set name=?,code_melli=?,mobile=?,email=?,job=?,
bank_card=?,birthday_date=?,password=? where id=?";
        $param = [$family, $code_melli, $mobile, $email, $job, $bank_card, $birthdate, $password, $user_id];
        $this->doQuery($query, $param);
    }

    function getAddressUser()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');
        $query = "select * from tbl_address where user_id=? order by id desc ";
        $param = [$user_id];
        return $this->doSelect($query, $param);
    }

    function removeAjaxAddress($address_id)
    {
        $query = "delete from tbl_address where id=?";
        $param = [$address_id];
        $this->doQuery($query, $param);
    }

    function editAddressAjax($data, $address_id)
    {
        $province = $data['province'];
        $city = $data['city'];
        $address = $data['address'];
        $pelak = $data['pelak'];
        $vahed = $data['vahed'];
        $name = $data['name'];
        $family = $data['family'];
        $mobile = $data['mobile'];

        $query = "update tbl_address set province=?, city=?, address=?, pelak=?,
 vahed=?,name=?, family=?,mobile=? where id=?";
        $param = [$province, $city, $address, $pelak, $vahed, $name, $family, $mobile, $address_id];
        $this->doQuery($query, $param);
    }

    function addAddress()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');

        $province = $_POST['province'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $pelak = $_POST['pelak'];
        $vahed = $_POST['vahed'];
        $name = $_POST['name'];
        $family = $_POST['family'];
        $mobile = $_POST['mobile'];

        $query = "insert into tbl_address (province,city,address,pelak,vahed,name,family,mobile,user_id)
values (?,?,?,?,?,?,?,?,?)";
        $param = [$province, $city, $address, $pelak, $vahed, $name, $family, $mobile, $user_id];
        $this->doQuery($query, $param);
    }

    function getFavorites()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');

        $query = "select tbl_product.*,tbl_favorites.id as favorite_id  from 
tbl_product left join tbl_favorites on tbl_product.id=tbl_favorites.product_id
 where tbl_favorites.user_id=?";

        $param = [$user_id];
        return $this->doSelect($query, $param);
    }

    function removeAjaxFavorites($favorite_id)
    {
        $query = "delete from tbl_favorites where id=?";
        $param = [$favorite_id];
        $this->doQuery($query, $param);
    }

    function getLastOrders()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');

        $query = "select * from tbl_order where user_id=? order by id desc limit 2";
        $param = [$user_id];
        $result = $this->doSelect($query, $param);


        foreach ($result as $key => $row) {
            @$order = unserialize($row['basket']);
            $result[$key]['basket'] = $order;
            $shamsi = self::shamsi($row['order_date']);
            $result[$key]['order_date'] = $shamsi;
        }
        return $result;
    }

    function getLastFavorites()
    {
        self::sessionInit();
        $user_id = self::sessionGet('user_id');

        $query = "select tbl_product.* 
         from tbl_favorites left join tbl_product on tbl_favorites.product_id=tbl_product.id
         where tbl_favorites.user_id=? order by id desc limit 3";

        $param = [$user_id];
        return $this->doSelect($query, $param);
    }

//    function orders($order_id)
//    {
//    }
}