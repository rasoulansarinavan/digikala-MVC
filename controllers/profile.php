<?php

class profile extends Controller
{


    function __construct()
    {
        Model::sessionInit();
        $user = Model::sessionGet('user_id');
        if ($user == '') {
            header('location:' . BASE . 'index');
        }
    }

    function index()
    {
        $user = $this->model->getUserInfo();
        $order = $this->model->getLastOrders();
        $favorites = $this->model->getLastFavorites();
        $data = ['user' => $user, 'order' => $order, 'favorites' => $favorites];
        $this->getView('profile/index', $data);
    }

    function myOrders()
    {
        $this->getView('profile/profile_my_orders');
    }

    function lastViews()
    {
        $this->getView('profile/profile_last_views');
    }

    function comments()
    {
        $this->getView('profile/profile_comments');
    }

    function lists()
    {
        $favorites = $this->model->getFavorites();
        $data = ['favorites' => $favorites];
        $this->getView('profile/profile_lists', $data);
    }

    function removeAjaxFavorites($favorite_id)
    {
        $this->model->removeAjaxFavorites($favorite_id);

    }

    function personalInfo()
    {
        if (isset($_POST['family'])) {
            $this->model->editPersonalInfo($_POST);
        }

        $user = $this->model->getUserInfo();
        $data = ['user' => $user];
        $this->getView('profile/profile_personal_info', $data);
    }

    function address()
    {
        if (isset($_POST['name'])) {
            $this->model->addAddress($_POST);
        }
        $address = $this->model->getAddressUser();
        $data = ['address' => $address];
        $this->getView('profile/profile_address', $data);
    }

    function removeAjaxAddress($address_id)
    {
        $this->model->removeAjaxAddress($address_id);
    }

    function editAddressAjax($address_id)
    {
        $this->model->editAddressAjax($_POST, $address_id);
    }

    function orders($order_id)
    {
        $order = $this->model->getOrderInfo($order_id);
        $data = ['order' => $order];
        $this->getView('profile/profile_orders', $data);
    }

}