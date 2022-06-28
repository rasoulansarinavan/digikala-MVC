<?php

class adminReports extends Controller
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
        if (isset($_POST['startDate'])) {
            $this->model->getReports();
            $reports = $this->model->getReports();
            $data = ['reports' => $reports];
        }
        $this->getView('admin/report/index', @$data, 1, 1);
    }
}