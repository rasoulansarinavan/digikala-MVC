<?php

class index extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $slider = $this->model->getSlider();
        $special = $this->model->getSpecial();
        $mostVisited = $this->model->mostVisited();
        $last_products = $this->model->last_products();
        $data = [$slider, $special, $mostVisited, $last_products];
        $this->getView('index/index', $data);
    }

    function removeProduct($product_id)
    {
        $this->model->removeProduct($product_id);
        $basketUpdate = $this->model->getBasket();
        echo json_encode($basketUpdate);
    }

    function search()
    {
        $search = $this->model->search($_POST);
        echo json_encode($search);
    }
}

