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

        $result = $userModel->where('email', $email)->first();

        if($result->id > 0) {
            if(password_verify($password, $result->password)) {

                $this->session->set('user_id', $result->id);
                return redirect()->to('/dashboard');

            } else {
                echo 'Invalid user name or password';
            }
        } else {
            echo 'Invalid user name or password';
        }


    }

    public function logout() {
        $this->session->destroy();
        return redirect()->to('/login');
    }


}
