<?php

class error404 extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->getView('errors/index');
    }
}