<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $returnType = 'object';
  protected $allowedFields = [
    'name',
    'surname',
    'email',
    'avatar',
    'password',
    'rol'
  ];

  protected $useTimestamps = false;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';
  protected $useSoftDeletes = true;

  protected $validationRules = [
    'nombre'     => 'required|alpha_space|min_length[3]',
    'apellidos'  => 'required|alpha_space|min_length[3]',
    'email'      => 'required|valid_email|is_unique[users.email,id,{id}]',
    'password'   => 'required|min_length[8]',
  ];

  protected $validationMessages = [
    'email' => [
      'is_unique' => 'Este correo electrónico ya está registrado.'
    ],
  ];

  protected $skipValidation = false;
}
