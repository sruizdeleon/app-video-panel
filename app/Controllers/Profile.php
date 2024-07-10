<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function index()
    {

        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $this->session->get('user');

        $data = [
            'pageTitle' => 'My profile',
            'user' => $user,
        ];

        $structure = view('common/Header', $data) . view('Profile');
        return $structure;

    }
}