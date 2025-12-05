<?php

namespace Modules\CMS\Models;

use CodeIgniter\Model;

class BackUsersModel extends Model
{
    protected $table      = 'back_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields = ['username', 'password_hash'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Guarda o actualiza un usuario según el ID.
     * @param int|null $id
     * @return object|null
     */
    public function saveUser(?int $id = null)
    {
        $request = \Config\Services::request();

        // Leer datos del POST
        $username = $request->getPost('username');
        $password = $request->getPost('password');

        if (!$username || !$password) {
            return null; // O lanzar excepción si quieres
        }

        // Preparar datos
        $data = [
            'username' => $username,
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        ];

        if ($id) {
            // Comprobar si el ID existe
            $user = $this->find($id);
            if ($user) {
                // Actualizar
                $this->update($id, $data);
                return $this->find($id);
            }
        }

        // Crear nuevo usuario
        $newId = $this->insert($data);
        return $this->find($newId);
    }
}
