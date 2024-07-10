<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\VideoModel;

class UsersManagement extends BaseController
{


  // REGISTER PAGE

  public function index()
  {

    if ($this->session->has('user')) {
      return redirect()->to('/dashboard');
    }

    $user = $this->session->get('user');

    $data = [
      'pageTitle' => 'Register',
      'user' => $user,
    ];

    $structure = view('common/Header', $data) . view('register');
    return $structure;
  }



  // MANAGEMENT USERS PAGE

  public function managementPage()
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
      'pageTitle' => 'Users Management',
      'user' => $user,
      'users' => $users,
    ];

    $structure = view('common/Header', $data) . view('usersmanagement', $data);
    return $structure;
  }




  // FORM PAGES

  public function createPage()
  {
    if (!$this->session->has('user')) {
      return redirect()->to('/login');
    }

    $user = $this->session->get('user');

    if (isset($user) && esc($user->role) && $user->role !== 'admin'){
      return redirect()->to('/dashboard');
    }

    $data = [
      'pageTitle' => 'Create User',
      'user' => $user
    ];

    $structure = view('common/Header', $data) . view('UserForm', $data);
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


    $structure = view('common/Header', $data) . view('UserForm', $data);
    return $structure;
  }






// CRUD USERS


  public function createUser()
  {

    $user = $this->session->get('user');

    $userModel = new UserModel();
    $name = $this->request->getPost('name');
    $surname = $this->request->getPost('surname');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $avatar = $this->request->getPost('avatar');
    $role = $this->request->getPost('role');


    if (!is_string($password) || empty($password)) {
      return redirect()->back()->with('msg', 'Wrong format password.');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);


    if (isset($user) && esc($user->role) && $user->role === 'admin') {
      $data = [
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'password' => $password,
        'avatar' => $avatar,
        'role' => $role,
      ];
    } else {
      $data = [
        'name' => $name,
        'surname' => $surname,
        'email' => $email,
        'password' => $password,
        'avatar' => $avatar,
        'role' => 'user',
      ];
    }

    $result = $userModel->insert($data);

    if ($result) {
      if (isset($user) && esc($user->role) && $user->role == 'admin') {
        return redirect()->to('/management/users')->with('msg', 'User created successfully');
      } else {
        return redirect()->to('login')->with('msg', 'User created successfully.');
      }
    } else {
      return redirect()->back()->with('msg', 'Error registering the user');
    }
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
