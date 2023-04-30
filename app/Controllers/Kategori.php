<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\RESTful\ResourceController;

class Kategori extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $title = "Kelola Kategori";
    private $modelkategori;
    public function __construct()
    {
        $this->modelkategori = new KategoriModel();
    }


    public function index()
    {
        $data = [
            'title' => $this->title,
            'kategori' => $this->modelkategori->findAll()
        ];

        return view('kategori/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('kategori');
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => $this->title
        ];

        return view('kategori/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'nama_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Name Categori.',
                ],
            ],

            'kode' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a kode',
                ],
            ],
            'is_pleace' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a pleace',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };


        $data = [
            'nama_kategori' => htmlspecialchars($this->request->getVar('nama_kategori'), true),
            'kode' => htmlspecialchars($this->request->getVar('kode'), true),
            'is_pleace' => htmlspecialchars($this->request->getVar('is_pleace'), true),
        ];

        $res = $this->modelkategori->save($data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('kategori');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modelkategori->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('kategori');
        }


        $data = [
            'title' => $this->title,
            'kategori' => $result
        ];

        return view('kategori/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'nama_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Name Categori.',
                ],
            ],

            'kode' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a kode',
                ],
            ],
            'is_pleace' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a pleace',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };


        $data = [
            'nama_kategori' => htmlspecialchars($this->request->getVar('nama_kategori'), true),
            'kode' => htmlspecialchars($this->request->getVar('kode'), true),
            'is_pleace' => htmlspecialchars($this->request->getVar('is_pleace'), true),
        ];

        $res = $this->modelkategori->update($id, $data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('kategori');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modelkategori->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('kategori');
        }

        $res = $this->modelkategori->delete($id);

        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('kategori');
    }
}
