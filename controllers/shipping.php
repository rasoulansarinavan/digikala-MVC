<?php


class shipping extends Controller
{
    function __construct()
    {
        Model::sessionInit();
        $user = Model::sessionGet('user_id');
        if ($user == '') {
            header('location:' . BASE . 'cart/index');
        }
    }

    function index()
    {
        $deliveryItems = $this->model->getDeliveryItems();
        $basket = $this->model->getbasket();
        $totalPrice = $basket[1];
        $totalDiscount = $basket[2];
        $address = $this->model->getAddress();
        $data = ['address' => $address, 'totalPrice' => $totalPrice, 'totalDiscount' => $totalDiscount,

            'basket' => $basket[0], 'deliveryItems' => $deliveryItems];
        $this->getView('shipping/index', $data);
    }

    function addAddress($address_id = '')
    {
        $this->model->addAddress($_POST, $address_id);
    }

    function editAddress($address_id)
    {

        $address = $this->model->getAddressInfo($address_id);
        echo json_encode($address);

    }

    function deliveryPrice($delivery_id)
    {

        $delivery = $this->model->deliveryPrice($delivery_id);
        echo json_encode($delivery);
    }
}
