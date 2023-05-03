<?php

namespace App\Models;

use CodeIgniter\Model;

class LogbookModel extends Model
{
    // protected $DBGroup          = 'default';
    protected $table            = 'tb_logbook';
    protected $primaryKey       = 'id_logbook';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tanggal',
        'mulai',
        'selesai',
        'penjelasan',
        'paraf',
        'paraf_raw',
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
        // if (isset($data['data']['cid'])) {
        // }
        $data['data']['cid'] = session()->get('id_user');
        $data['data']['uid'] = session()->get('id_user');
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


    public function topFive()
    {
        $builder = $this->db->table($this->table);
        $builder->select('nama_lengkap');
        $builder->select("SUM(LENGTH(penjelasan) - LENGTH(REPLACE(penjelasan, ' ', '')) + 1) as count_word");
        $builder->join('tb_user', 'tb_user.id_user = tb_logbook.cid');
        $builder->groupBy('tb_logbook.cid');
        $builder->orderBy('count_word', 'DESC');
        $builder->limit(5);

        return $builder->get()->getResultArray();
    }

    public function getChart($year = null)
    {
        $year =  ($year == null) ? date('Y') : $year;

        $builder = $this->db->table($this->table);
        $builder->select('MONTHNAME(created_at) as nama_bulan');
        $builder->select('count(cid) as jumlah_nulis');
        $builder->where('YEAR(created_at)', $year);
        $builder->groupBy('MONTH(created_at)');
        return $builder->get()->getResultArray();
    }

    public function getChartWord($year = null, $id_user = null)
    {
        $year =  ($year == null) ? date('Y') : $year;
        $builder = $this->db->table($this->table);
        $builder->select('MONTHNAME(created_at) as nama_bulan');
        $builder->select("SUM( LENGTH(penjelasan) - LENGTH(REPLACE(penjelasan, ' ', '')) + 1 )  as jumlah_nulis");
        if ($id_user != null) {
            $builder->where('cid', $id_user);
        }
        $builder->where('YEAR(created_at)', $year);
        $builder->groupBy('MONTH(created_at)');
        return $builder->get()->getResultArray();
    }


    public function exportLogbook($id_user = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select($this->table . '.*');
        $builder->select('nama_kategori, kode, tempat_mbkm');
        $builder->join('tb_user', 'tb_user.id_user = tb_logbook.cid', 'left');
        $builder->join('tb_logbook_kategori', 'tb_logbook_kategori.id_kategori = tb_user.id_kategori');

        if ($id_user != null) {
            // $id_user = session()->get('id_user');
            $builder->where('tb_logbook.cid', $id_user);
        }


        return $builder->get()->getResultArray();
    }
}
