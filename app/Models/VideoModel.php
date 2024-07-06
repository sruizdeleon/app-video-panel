<?php

namespace App\Models;
use CodeIgniter\Model;

class VideoModel extends Model
{


  protected $table = 'videos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['title', 'url', 'user_id', 'date'];

  protected $useAutoIncrement = true;
  protected $useTimestamps = false;

  protected $validationRules = [
    'title' => 'required|max_length[255]',
    'url' => 'required|valid_url|max_length[255]',
    'user_id' => 'required|integer',
  ];

  protected $validationMessages = [
    'url' => [
      'valid_url' => 'The URL field must be a valid URL.',
    ],
  ];

  protected $skipValidation = false;

  // Save the date
  public function insertOrUpdate($data)
  {
    if (!isset($data['id'])) {

      // New video
      $data['date'] = date('Y-m-d');
      return $this->insert($data);
    } else {

      // Update video
      if (isset($data['title']) || isset($data['url'])) {
        $data['date'] = date('Y-m-d');
      }
      return $this->update($data['id'], $data);
    }
  }
}
