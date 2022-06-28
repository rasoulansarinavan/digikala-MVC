<?php

class payment extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $payment = $this->model->getPaymentItems();

        $basket = $this->model->getbasket();
        $totalPrice = $basket[1];
        $totalDiscount = $basket[2];

        Model::sessionInit();
        $delivery = Model::sessionGet('delivery');


        $data = ['payment' => $payment, 'totalPrice' => $totalPrice, 'totalDiscount' => $totalDiscount,
            'basket' => $basket[0], 'delivery' => unserialize($delivery)];
        $this->getView('payment/index', $data);
    }

    function checkOfferCode()
    {
        $code = $this->model->checkOfferCode($_POST);
        $totalPrice = $this->model->calculateTotalPrice();
        $array = [$code, $totalPrice];
        echo json_encode($array);
    }

    function saveOrder()
    {
//        print_r($_POST);
        $this->model->saveOrder($_POST);
    }
}

