<?php

class Controller
{
    function __construct()
    {
    }

    function getView($view, $data = [], $noHeader = '', $noFooter = '')
    {
        if ($noHeader == '') {
            require('header.php');
        }

        require('views/' . $view . '.php');

        if ($noFooter == '') {
            require('footer.php');
        }

    }

    function model($model)
    {
        require('models/model_' . $model . '.php');
        $classname = 'model_' . $model;
        $this->model = new $classname;
    }
}