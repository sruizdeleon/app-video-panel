<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {

        if ($this->session->has('user')) {
            return redirect()->to('/dashboard');
        }

        $user = $this->session->get('user');

        $data = [
            'pageTitle' => 'Login',
            'user' => $user,
        ];

        $structure = view('common/Header', $data) . view('login');
        return $structure;
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

                $this->session->set('user', $user);
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
