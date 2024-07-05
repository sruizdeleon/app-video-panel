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

        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        if (!is_string($password) || empty($password)) {
            echo 'Invalid user name or password';
            return;
        }

        $user = $userModel->where('email', $email)->first();

        if($user->id > 0) {
            if(password_verify($password, $user->password)) {

                $this->session->set('user', $user->id);
                return redirect()->to('/dashboard');

            } else {
                echo 'Invalid user name or password';
            }
        } else {
            echo 'Invalid user name or password';
        }


    }

    public function doLogout() {
        $this->session->destroy();
        return redirect()->to('/login');
    }


}
