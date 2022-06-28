<?php

class compare extends Controller
{
    function __construct()
    {
    }

    function index($product_id)
    {
        $product = $this->model->getProduct($product_id);
        $data = ['product' => $product];
        $this->getView('compare/index', $data);
    }
}