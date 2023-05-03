<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\LogbookModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    private $modeluser;
    private $modelkategori;
    private $modellogbook;
    public function __construct()
    {
        $this->modeluser = new UserModel();
        $this->modelkategori = new KategoriModel();
        $this->modellogbook = new LogbookModel();
    }

    public function index()
    {
        if (session()->get('id_role') == 1) {
            return $this->admin();
        } else {
            return $this->mahasiswa();
        }
    }


    private function admin()
    {
        $subQueryKategori = "( SELECT count(id_user) FROM tb_user WHERE id_role = 2 AND id_kategori = tb_logbook_kategori.id_kategori ) as jumlah";
        $data = [
            'title' => 'Dashboard Admin',
            'admin' => $this->modeluser->where('id_role', 1)->countAllResults(),
            'mahasiswa' => $this->modeluser->where('id_role', 2)->countAllResults(),
            // 'kategori' => $this->modelkategori->countAllResults(),
            'list_kategori' => $this->modelkategori->select('nama_kategori')->select($subQueryKategori)->findAll(),
            'logbook' => $this->modellogbook->countAllResults(),
            'top' => $this->modellogbook->topFive(),
            'tahun_logbook' => $this->modellogbook->select('YEAR(created_at) as tahun')->groupBy('YEAR(created_at)')->findAll(),
            'chart_logbook' => $this->modellogbook->getChart(date('Y'))
        ];
        return view('dashboard/index', $data);
    }

    private function mahasiswa()
    {
        $data = [
            'title' => 'Dashboard Mahasiswa',
            'nama_lengkap' => $this->modeluser->select('nama_lengkap')->find(session()->get('id_user'))['nama_lengkap'],
            'top' => $this->modellogbook->topFive(),
            'tahun_logbook' => $this->modellogbook->select('YEAR(created_at) as tahun')->groupBy('YEAR(created_at)')->findAll(),
            'chart_logbook' => $this->modellogbook->getChartWord(date('Y'), session()->get('id_user'))
        ];
        return view('dashboard/mahasiswa', $data);
    }
}
