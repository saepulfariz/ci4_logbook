<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'email',
        'username',
        'password',
        'npm',
        'nama_lengkap',
        'gambar',
        'id_role',
        'id_kategori',
        'tempat_mbkm',
        'is_active',
        'cid',
        'uid',
        'did',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
    protected $beforeInsert   = ['beforeInsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['beforeUpdate'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = ['beforeDelete'];
    protected $afterDelete    = [];

    protected function beforeInsert(array $data)
    {
        $data['data']['cid'] = session()->get('id_user');
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data['data']['uid'] = session()->get('id_user');
        return $data;
    }

    protected function beforeDelete(array $data)
    {
        $dataUpdate = [
            'did' => session()->get('id_user')
        ];
        $this->db->table($this->table)->where($this->primaryKey, $data['id'][0])->update($dataUpdate);
        return true;
    }


    public function cekLogin($username)
    {
        $builder = $this->db->table($this->table);
        $builder->where('username', $username);
        $builder->orWhere('npm', $username);
        $builder->orWhere('email', $username);
        return $builder->get()->getRowArray();
    }

    public function getRole()
    {
        return $this->db->table('tb_role')->get()->getResultArray();
    }
}
