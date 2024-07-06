<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Dashboard extends BaseController
{

    public function index(): string
    {

        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }

        $pageTitle = ['title' => 'Dashboard'];
        $user = ['user' => $this->session->get('user')];

        $videoModel = new VideoModel();
        $video= $videoModel->where('user_id', $user['user']->id)->first();

        // var_dump($video); // Solo para propósitos de depuración
        // die();

        $data = [
            'user' => $user,
            'video' => $video,
        ];

        $structure = view('common/Header', $pageTitle) . view('dashboard', $data);
        return $structure;

    }
}
