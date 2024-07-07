<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\VideoModel;

class UsersManagement extends BaseController
{


  public function index()
  {

    if (!$this->session->has('user')) {
      return redirect()->to('/dashboard');
    }

    $user = $this->session->get('user');

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }

    $userModel = new UserModel();
    $users = $userModel->findAll();
    $data['users'] = $users;

    $data = [
      'pageTitle' => 'Dashboard',
      'user' => $user,
      'users' => $users,
    ];

    $structure = view('common/Header', $data) . view('usersmanagement', $data);
    return $structure;
  }




  public function editPage($id)
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/dashboard');
    }

    $user = $this->session->get('user');

    $userModel = new UserModel();
    $userToUpdate = $userModel->find($id);

    if (!$userToUpdate) {
      return redirect()->to('/management/users')->with('msg', 'User not found');
    }

    $data = [
      'pageTitle' => 'Edit User',
      'user' => $user,
      'userToUpdate' => $userToUpdate,
    ];

    $structure = view('common/Header', $data) . view('updateuser', $data);
    return $structure;
  }




  public function editUser($id) {
    if (!$this->session->has('user')) {
      return redirect()->to('/dashboard');
    }

    $user = $this->session->get('user');

    $userModel = new UserModel();
    $userToUpdate = $userModel->find($id);

    if (!$userToUpdate) {
      return redirect()->to('/management/users')->with('msg', 'User not found');
    }

    $name = $this->request->getPost('name');
    $surname = $this->request->getPost('surname');
    $email = $this->request->getPost('email');
    $password = (string) $this->request->getPost('password');
    $avatar = $this->request->getPost('avatar');
    $role = $this->request->getPost('role');

    $data = [];

    if($user->role == 'admin') {
      $data = [
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'avatar' => $avatar,
        'role' => $role,
      ];
    } else {
      $data = [
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'avatar' => $avatar,
      ];
    }

    if (is_string($password) && !empty($password)) {
      $password = password_hash($password, PASSWORD_DEFAULT);
      $data['password'] = $password;
    }

    $result = $userModel->update($id, $data);

    if ($result) {
      return redirect()->to('/management/users')->with('msg', 'User updated successfully');
    } else {
      return redirect()->to('/management/users')->with('msg', 'Error updating the user');
    }

  }




  public function delete($id)
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/dashboard');
    }

    $user = $this->session->get('user');

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }

    $userModel = new UserModel();
    $userToDelete = $userModel->find($id);

    if (!$userToDelete) {
      return redirect()->to('/management/users')->with('msg', 'User not found');
    } else {
      $videoModel = new VideoModel();
      $videosToDelete = $videoModel->where('user_id', $id)->findAll();
      $videoIds = array_column($videosToDelete, 'id');
      $videoModel->whereIn('id', $videoIds)->delete();

      if ($userModel->delete($id)) {
        return redirect()->to('/management/users')->with('msg', 'User deleted successfully');
      } else {
        return redirect()->to('/management/users')->with('msg', 'Error deleting the user');
      }
    }


  }
}
