<?php

namespace App\Controllers;

class Dashboard extends BaseController
{

    public function index(): string
    {

        if(!$this->session->has('user')) {
            return redirect()->to('/login');
        }


        echo view('common/Header');
        return view('dashboard');
    }
}
