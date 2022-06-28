<?php

class model_payment extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getPaymentItems()
    {
        $query = "select * from tbl_payment";
        return $this->doSelect($query);
    }

    function checkOfferCode()
    {
        $code = $_POST['code'];
        $query = "select * from tbl_offer_code where code=? and used=0";
        $param = [$code];
        $code = $this->doSelect($query, $param, 1);
        if (isset($code['id'])) {
            return $code['percent'];
        } else {
            return 0;
        }
    }

    function calculateTotalPrice()
    {
        self::sessionInit();
        $finalPrice = self::sessionGet('finalPrice');

        $offerDiscount = $this->checkOfferCode();
        $offerPrice = ($finalPrice * $offerDiscount) / 100;
        return $finalPrice - $offerPrice;

    }

    function saveOrder()
    {
        self::sessionInit();
        $addressInfo = self::sessionGet('address');
        $user_id = self::sessionGet('user_id');
        $deliveryType = self::sessionGet('delivery');
        $delivery = unserialize($deliveryType);

        $payment_id = $_POST['payment'];


        $order_date = time();


        $basket = $this->getBasket();
        $basketItems = $basket[0];
        $basketItems = serialize($basketItems);
        $totalPrice = $basket[1];
        $totalDiscount = $basket[2];
        $deliveryPrice = $delivery['price'];


        $price = $totalPrice - $totalDiscount + $deliveryPrice;
        $offer_code = $_POST['code'];
        $offer_percent = $this->checkOfferCode();
        $offer=[$offer_code,$offer_percent];
        $offer=serialize($offer);

        $offer_price = ($price * $offer_percent) / 100;
        $priceTotal = $price - $offer_price;
        if ($payment_id == 1) {
            $pay_type = 'پرداخت درب منزل';
            $query = "insert into tbl_order (price,discount,basket,delivery,user_id,order_date,address,pay_type,offer_code)
values (?,?,?,?,?,?,?,?,?)";
            $param = [$priceTotal, $totalDiscount, $basketItems, $deliveryType, $user_id, $order_date, $addressInfo, $pay_type,$offer];
            $this->doQuery($query, $param);

        } else {

            echo 'online payment';

        }
    }
}