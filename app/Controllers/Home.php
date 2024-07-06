<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {

        $pageTitle = ['title' => 'Home'];
        $structure = view('common/Header', $pageTitle) . view('home');

        return $structure;


    }
}
