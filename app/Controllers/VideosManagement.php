<?php

namespace App\Controllers;

use App\Models\VideoModel;

class VideosManagement extends BaseController
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

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }

    $videoModel = new VideoModel();
    $videos = $videoModel->findAll();

    $data = [
      'pageTitle' => 'Videos Management',
      'user' => $user,
      'videos' => $videos,
    ];

    $structure = view('common/Header', $data) . view('videosmanagement', $data);
    return $structure;
  }




  public function createPage()
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    $data = [
      'pageTitle' => 'Create Video',
      'user' => $user
    ];

    $structure = view('common/Header', $data) . view('VideoForm', $data);
    return $structure;
  }



  public function editPage($id)
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    $videoModel = new VideoModel();
    $videoToUpdate = $videoModel->find($id);

    if (!$videoToUpdate) {
      return redirect()->back()->with('msg', 'Video not found');
    }

    $data = [
      'pageTitle' => 'Edit Video',
      'user' => $user,
      'videoToUpdate' => $videoToUpdate,
    ];

    $structure = view('common/Header', $data) . view('VideoForm', $data);
    return $structure;
  }



  public function createVideo()
  {

    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    $videoModel = new VideoModel();

    $title = $this->request->getPost('title');
    $url = $this->request->getPost('url');
    $date = $this->request->getPost('date');
    $user_id = $this->request->getPost('user_id');

    $data = [];

    $adaptedUrl = adaptUrlYoutube($url);
    $url = $adaptedUrl;

    $date == NULL ? $date = date('Y-m-d') : $date = $date;
    $user_id == NULL ? $user_id = $user->id : $user_id = $user_id;

    if ($user->role == 'admin') {
      $data = [
        'title' => $title,
        'date' => $date,
        'user_id' => $user_id,
        'url' => $url,
      ];
    } else {
      $data = [
        'title' => $title,
        'url' => $url,
        'user_id' => $user_id,
      ];
    }

    $result = $videoModel->insertOrUpdate($data);


    if ($result) {
      return redirect()->back()->with('msg', 'Video created successfully');
    } else {
      return redirect()->back()->with('msg', 'Error creating the video');
    }
  }




  public function editVideo($id)
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    $videoModel = new VideoModel();
    $videoToUpdate = $videoModel->find($id);

    if (!$videoToUpdate) {
      return redirect()->back()->with('msg', 'User not found');
    }

    $url = $this->request->getPost('url');
    $title = $this->request->getPost('title');
    $date = $this->request->getPost('date');
    $user_id = $this->request->getPost('user_id');

    if (!empty($url) && $url !== $videoToUpdate['url']) {
      $adaptedUrl = adaptUrlYoutube($url);
      $url = $adaptedUrl;
      $data['url'] = $adaptedUrl;
    }

    $data = [];

    if ($user->role == 'admin') {
      $data = [
        'title' => $title,
        'date' => $date,
        'user_id' => $user_id,
      ];
    } else {
      $data = [
        'title' => $title,
      ];
    }

    $result = $videoModel->update($id, $data);

    if ($result) {
      return redirect()->back()->with('msg', 'Video updated successfully');
    } else {
      return redirect()->back()->with('msg', 'Error updating the video');
    }
  }




  public function deleteVideo($id)
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }


    $videoModel = new VideoModel();
    $videoToDelete = $videoModel->find($id);

    if (!$videoToDelete) {
      return redirect()->to('/management/videos')->with('msg', 'Video not found');
    } else {
      if ($videoModel->delete($id)) {
        return redirect()->to('/management/videos')->with('msg', 'Video deleted successfully');
      } else {
        return redirect()->to('/management/videos')->with('msg', 'Error deleting the video');
      }
    }
  }
}
