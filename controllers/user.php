<?php

class user extends Controller {
    function __construct()
    {

    }
    function index()
    {
        $this->getView('user/index');
    }

}
