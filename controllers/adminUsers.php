<?php

class adminUsers extends Controller
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
        $usersLevel = $this->model->getUsersLevel();
        $users = $this->model->getUsers();
        $data = ['users' => $users, 'usersLevel' => $usersLevel];
        $this->getView('admin/users/index', $data, 1, 1);
    }

    function userOrders($user_id)
    {
        $orders = $this->model->getUserOrders($user_id);
        $data = ['orders' => $orders];
        $this->getView('admin/users/userOrders', $data, 1, 1);
    }

    function changeLevel($user_id)
    {
        $this->model->changeLevel($user_id, $_POST);
    }
}
