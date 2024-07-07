<?php

namespace App\Controllers;

use App\Models\UserModel;

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

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }

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

    if ($user->role != 'admin') {
      return redirect()->to('/dashboard');
    }

    $userModel = new UserModel();
    $userToUpdate = $userModel->find($id);

    if (!$userToUpdate) {
      return redirect()->to('/management/users')->with('msg', 'User not found');
    }

    $name = $this->request->getPost('name');
    $surname = $this->request->getPost('surname');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $avatar = $this->request->getPost('avatar');
    $role = $this->request->getPost('role');

    if (!is_string($password) || empty($password)) {
      echo 'Invalid user name or password';
      return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if ($name !== $userToUpdate['name']) {
      $data['name'] = $name;
    }

    if ($surname !== $userToUpdate['surname']) {
      $data['surname'] = $surname;
    }

    if ($email !== $userToUpdate['email']) {
      $data['email'] = $email;
    }

    if ($password !== $userToUpdate['$password']) {
      $data['$password'] = $password;
    }

    if ($avatar !== $userToUpdate['avatar']) {
      $data['avatar'] = $avatar;
    }

    if ($role !== $userToUpdate['role']) {
      $data['role'] = $role;
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
    $user = $userModel->find($id);

    if (!$user) {
      return redirect()->to('/management/users')->with('msg', 'User not found');
    }

    if ($userModel->delete($id)) {
      return redirect()->to('/management/users')->with('msg', 'User deleted successfully');
    } else {
      return redirect()->to('/management/users')->with('msg', 'Error deleting the user');
    }

  }
}
