<?php

class adminOrder extends Controller
{
    function __construct()
    {
        parent::__construct();
         $level = Model::getUserLevel();
        if ($level != 1) {
            header('location:' . BASE . 'adminLogin/index');
        }
    }

    function index()
    {
        $orders = $this->model->getOrders();
        $data = ['orders' => $orders];
        $this->getView('admin/order/index', $data, 1, 1);
    }

    function detail($order_id)
    {
        if (isset($_POST['status'])) {
            $this->model->changeStatus($order_id, $_POST);
        }
        $order_status = $this->model->getOrderStatus();
        $order = $this->model->getorderInfo($order_id);
        $data = ['order' => $order, 'order_status' => $order_status];
        $this->getView('admin/order/detail', $data, 1, 1);
    }

    function changeStatus($order_id)
    {

    }
}