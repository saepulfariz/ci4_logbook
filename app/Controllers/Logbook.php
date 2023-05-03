<?php

namespace App\Controllers;

use App\Models\LogbookModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class Logbook extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */

    private $title = 'Logbook';
    private $modellogbook;
    private $modeluser;
    public function __construct()
    {
        $this->modellogbook = new LogbookModel();
        $this->modeluser = new UserModel();
    }


    public function index()
    {
        $logbook = '';
        $mahasiswa = '';

        if (session()->get('id_role') == 1) {
            $logbook = $this->modellogbook->select('tb_logbook.*, nama_lengkap as pembuat')->join('tb_user', 'tb_user.id_user = tb_logbook.cid', 'left')->orderBy('id_logbook', 'DESC')->findAll();
            $mahasiswa = $this->modeluser->findAll();
        } else {
            $logbook = $this->modellogbook->select('tb_logbook.*, nama_lengkap as pembuat')->join('tb_user', 'tb_user.id_user = tb_logbook.cid', 'left')->where('tb_logbook.cid', session()->get('id_user'))->orderBy('id_logbook', 'DESC')->findAll();
        }

        $data = [
            'title' => $this->title,
            'logbook' => $logbook,
            'mahasiswa' => $mahasiswa
        ];

        return view('logbook/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        return redirect()->to('logbook');
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

        return view('logbook/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Date.',
                ],
            ],

            'mulai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Time Start',
                ],
            ],
            'selesai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Time End',
                ],
            ],
            'penjelasan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Description',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };

        $data = [
            'tanggal' => htmlspecialchars($this->request->getVar('tanggal'), true),
            'mulai' => htmlspecialchars($this->request->getVar('mulai'), true),
            'selesai' => htmlspecialchars($this->request->getVar('selesai'), true),
            'penjelasan' => htmlspecialchars($this->request->getVar('penjelasan'), true),
        ];

        $res = $this->modellogbook->save($data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('logbook');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modellogbook->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('logbook');
        }

        if (session()->get('id_role') == 2) {
            $cekLogbook = $this->modellogbook->where('cid', session()->get('id_user'))->find($id);
            if (!$cekLogbook) {
                $this->alert->set('warning', 'Warning', 'Not yours');
                return redirect()->to('logbook');
            }
        }

        $data = [
            'title' => $this->title,
            'logbook' => $result
        ];

        return view('logbook/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $result = $this->modellogbook->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('logbook');
        }

        if (session()->get('id_role') == 2) {
            $cekLogbook = $this->modellogbook->where('cid', session()->get('id_user'))->find($id);
            if (!$cekLogbook) {
                $this->alert->set('warning', 'Warning', 'Not yours');
                return redirect()->to('logbook');
            }
        }

        $rules = [
            'tanggal' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Date.',
                ],
            ],

            'mulai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Time Start',
                ],
            ],
            'selesai' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Time End',
                ],
            ],
            'penjelasan' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Description',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };

        $data = [
            'tanggal' => htmlspecialchars($this->request->getVar('tanggal'), true),
            'mulai' => htmlspecialchars($this->request->getVar('mulai'), true),
            'selesai' => htmlspecialchars($this->request->getVar('selesai'), true),
            'penjelasan' => htmlspecialchars($this->request->getVar('penjelasan'), true),
        ];

        $res = $this->modellogbook->update($id, $data);

        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('logbook');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $result = $this->modellogbook->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('logbook');
        }

        if (session()->get('id_role') == 2) {
            $cekLogbook = $this->modellogbook->where('cid', session()->get('id_user'))->find($id);
            if (!$cekLogbook) {
                $this->alert->set('warning', 'Warning', 'Not yours');
                return redirect()->to('logbook');
            }
        }

        $res = $this->modellogbook->delete($id);

        if ($res) {
            $this->alert->set('success', 'Success', 'Delete Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Delete Failed');
        }
        return redirect()->to('logbook');
    }
}
