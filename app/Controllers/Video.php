<?php

namespace App\Controllers;

use App\Models\VideoModel;

class Video extends BaseController
{

  public function __construct()
  {
    helper('url_Helper');
  }

  public function index()
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    $videoModel = new VideoModel();
    $video = $videoModel->where('user_id', $user->id)->first();

    $data = [
      'pageTitle' => 'Update Video',
      'user' => $user,
      'video' => $video,
    ];

    $structure = view('common/Header', $data) . view('UpdateVideo', $data);
    return $structure;
  }





  public function createVideo()
  {

    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $videoModel = new VideoModel();

    $title = $this->request->getPost('title');
    $url = $this->request->getPost('url');
    $user = $this->session->get('user');

    $adaptedUrl = adaptUrlYoutube($url);

    $data = [
      'title' => $title,
      'url' => $adaptedUrl,
      'user_id' => $user->id,
    ];

    $result = $videoModel->insertOrUpdate($data);

    if ($result) {
      return redirect()->to('/dashboard')->with('msg', 'Video added successfully');
    } else {
      return redirect()->to('/dashboard')->with('msg', 'Error adding the video');
    }
  }





  public function updateVideo()
  {

    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = ['user' => $this->session->get('user')];

    $videoModel = new VideoModel();
    $video = $videoModel->where('user_id', $user['user']->id)->first();

    if (!$video) {
      return redirect()->to('/dashboard')->with('msg', 'No video found');
    }

    $id = $video['id'];
    $title = $this->request->getPost('title');
    $url = $this->request->getPost('url');

    if ($title !== $video['title']) {
      $data['title'] = $title;
    }

    if ($url !== $video['url']) {
      $adaptedUrl = adaptUrlYoutube($url);
      $url = $adaptedUrl;
      $data['url'] = $adaptedUrl;
    }

    $data = [
      'title' => $title,
      'url' => $url,
    ];

    $result = $videoModel->update($id, $data);

    if ($result) {
      return redirect()->to('/dashboard')->with('msg', 'Video edited successfully');
    } else {
      return redirect()->to('/dashboard')->with('msg', 'Error editing the video');
    }
  }
}