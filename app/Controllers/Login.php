<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index(): string
    {
        echo view('common/Header');
        return view('Login');
    }

    public function doLogin() {

        $model = new UserModel();

        echo "Submitted";


    }
}
