<?php

class login extends Controller
{
    function __construct()
    {
    }

    function checkUserLogin()
    {
        if ($_POST['email'] !== '') {
            $this->model->checkUserLogin($_POST);

            $user = Model::sessionGet('user_id');

            if ($user == false) {
                echo 0;
            } else {
                echo 1;
            }
        }
    }
}