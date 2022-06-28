<?php

class App
{
    public $controller = 'index';
    public $method = 'index';
    public $params = [];

    function __construct()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            $url = $this->explodeUrl($url);
            $this->controller = $url[0];

            unset($url[0]);
            if (isset($url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }

            $this->params = array_values($url);
        }
        $controller = 'controllers/' . $this->controller . '.php';
        if (file_exists($controller)) {
            require($controller);
            $object = new $this->controller;
            $object->model($this->controller);
            if (method_exists($object, $this->method)) {
                call_user_func_array([$object, $this->method], $this->params);
            } else {
                header('location:' . BASE . 'error404');
            }
        } else {
            header('location:' . BASE . 'error404');
        }
    }

    function explodeUrl($url)
    {
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        return $url;
    }
}





