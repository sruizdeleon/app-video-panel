<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Dashboard extends BaseController
{

    public function index()
    {

        if (!$this->session->has('user')) {
            return redirect()->to('/login');
        }

        $user = $this->session->get('user');

        $videoModel = new VideoModel();
        $video= $videoModel->where('user_id', $user->id)->first();

        $data = [
            'pageTitle' => 'Dashboard',
            'user' => $user,
            'video' => $video,
        ];

        $structure = view('common/Header', $data) . view('dashboard', $data);
        return $structure;

    }
}
