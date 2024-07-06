<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index(): string
    {
        $pageTitle = ['title' => 'Dashboard'];
        $user = ['user' => $this->session->get('user')];

        if(!$this->session->has('user')) {
            return redirect()->to('/login');
        } else {
            $structure = view('common/Header', $pageTitle) . view('dashboard', $user);
            return $structure;
        }
    }
}
