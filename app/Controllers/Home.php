<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $user = $this->session->get('user');

        $data = [
            'pageTitle' => 'Home',
            'user' => $user,
        ];

        $structure = view('common/Header', $data) . view('home');
        return $structure;

    }
}
