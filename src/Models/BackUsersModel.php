<?php

namespace Modules\CMS\Models;

use CodeIgniter\Model;

class BackUsersModel extends Model
{
    protected $table      = 'back_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password_hash'];
    protected $useTimestamps = true;
}
