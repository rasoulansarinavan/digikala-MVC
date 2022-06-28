<?php

class search extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $this->getView('search/index');
    }
}