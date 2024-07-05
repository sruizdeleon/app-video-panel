<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function index(): string
    {
        echo view('common/Header');
        return view('Register');
    }

    public function doRegister()
    {
        $userModel = new UserModel();

        $name = $this->request->getPost('name');
        $surname = $this->request->getPost('surname');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $avatar = $this->request->getPost('avatar');
        $role = "user";

        if (!is_string($password) || empty($password)) {
            echo 'Invalid user name or password';
            return;
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $data = [
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'password' => $password,
            'avatar' => $avatar,
            'role' => $role
        ];

        $result = $userModel->insert($data);

        if ($result) {
            return redirect()->to(base_url('login'))->with('msg', 'Register successful! Please login.');
        } else {
            return redirect()->to(base_url('register'))->with('msg', 'Error registering the user');
        }
    }
}
