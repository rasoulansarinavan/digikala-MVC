<?php

class cart extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $basket = $this->model->getBasket();
        $data = ['basket' => $basket[0], 'totalPrice' => $basket[1], 'totalDiscount' => $basket['2']];
        $this->getView('cart/index', $data);
    }

    function removeBasketItemAjax($basket_id)
    {
        $this->model->removeBasketItemAjax($basket_id);
    }

    function updateBasket()
    {
        $this->model->updateBasket($_POST);
        $basket = $this->model->getBasket();
        echo json_encode($basket);
    }
}

