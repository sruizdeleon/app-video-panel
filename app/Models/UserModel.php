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
    'role'
  ];

  protected $useTimestamps = false;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';
  protected $deletedField = 'deleted_at';
  protected $useSoftDeletes = false;

  protected $validationRules = [];
  
  protected $validationMessages = [];

  protected $skipValidation = false;
}
