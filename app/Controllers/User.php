<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\UserModel;
use CodeIgniter\RESTful\ResourceController;

class User extends BaseController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $modeluser;
    private $modelkategori;
    private $title = 'User';
    public function __construct()
    {
        $this->modeluser = new UserModel();
        $this->modelkategori = new KategoriModel();
    }


    public function index()
    {
        $data = [
            'title' => $this->title,
            'user' => $this->modeluser->join('tb_role', 'tb_role.id_role = tb_user.id_role', 'left')->findAll()
        ];

        return view('user/index', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [
            'title' => $this->title,
            'role' => $this->modeluser->getRole(),
            'kategori' => $this->modelkategori->findAll()
        ];

        return view('user/new', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'npm' => [
                'rules'  => 'required|min_length[9]|max_length[9]|is_unique[tb_user.npm]',
                'errors' => [
                    'required' => 'You must choose a Username.',
                    'min_length' => 'Min length 9.',
                    'max_length' => 'Max length 9.',
                    'is_unique' => 'Already register.',
                ],
            ],
            'username' => [
                'rules'  => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'You must choose a Username.',
                    'is_unique' => 'Already register.',
                ],
            ],
            'nama_lengkap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Full Name.',
                ],
            ],
            'password' => [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required' => 'You must choose a Password',
                    'min_length' => 'Min length 8.',
                ],
            ],
            'id_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Categori',
                ],
            ],
            'id_role' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Role',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email|is_unique[tb_user.email]',
                'errors' => [
                    'required' => 'You must choose a Email',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_unique' => 'Already register.',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };

        $data = [
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap'), true),
            'npm' => htmlspecialchars($this->request->getVar('npm'), true),
            'username' => htmlspecialchars($this->request->getVar('npm'), true),
            'email' => htmlspecialchars($this->request->getVar('email'), true),
            'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori'), true),
            'tempat_mbkm' => htmlspecialchars($this->request->getVar('tempat_mbkm'), true),
            'password' => password_hash(htmlspecialchars($this->request->getVar('password'), true), PASSWORD_DEFAULT),
            'is_active' => 1,
            'id_role' => htmlspecialchars($this->request->getVar('id_role'), true),
        ];


        $res = $this->modeluser->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Add Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Add Failed');
        }
        return redirect()->to('user');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $result = $this->modeluser->find($id);
        if (!$result) {
            $this->alert->set('warning', 'Warning', 'Not Valid');
            return redirect()->to('user');
        }

        $data = [
            'title' => $this->title,
            'user' => $result,
            'role' => $this->modeluser->getRole(),
            'kategori' => $this->modelkategori->findAll()
        ];

        return view('user/edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $rules = [
            'npm' => [
                'rules'  => 'required|min_length[9]|max_length[9]',
                'errors' => [
                    'required' => 'You must choose a Username.',
                    'min_length' => 'Min length 9.',
                    'max_length' => 'Max length 9.',
                    'is_unique' => 'Already register.',
                ],
            ],
            'username' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Username.',
                    'is_unique' => 'Already register.',
                ],
            ],
            'nama_lengkap' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Full Name.',
                ],
            ],
            'id_kategori' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Categori',
                ],
            ],
            'id_role' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Role',
                ],
            ],
            'email' => [
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required' => 'You must choose a Email',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_unique' => 'Already register.',
                ],
            ],
        ];


        $dataOld = $this->modeluser->find($id);

        if ($this->request->getVar('password') != '') {
            $rules['password'] = [
                'rules'  => 'required|min_length[8]',
                'errors' => [
                    'required' => 'You must choose a Password',
                    'min_length' => 'Min length 8.',
                ],
            ];
        }

        if ($dataOld['email'] != $this->request->getVar('email')) {
            $rules['email'] = [
                'rules'  => 'required|valid_email|is_unique[tb_user.email]',
                'errors' => [
                    'required' => 'You must choose a Email',
                    'valid_email' => 'Please check the Email field. It does not appear to be valid.',
                    'is_unique' => 'Already register.',
                ],
            ];
        }

        if ($dataOld['npm'] != $this->request->getVar('npm')) {
            $rules['npm'] = [
                'rules'  => 'required|min_length[9]|max_length[9]|is_unique[tb_user.npm]',
                'errors' => [
                    'required' => 'You must choose a Username.',
                    'min_length' => 'Min length 9.',
                    'max_length' => 'Max length 9.',
                    'is_unique' => 'Already register.',
                ],
            ];
        }


        if ($dataOld['username'] != $this->request->getVar('username')) {
            $rules['email'] = [
                'rules'  => 'required|is_unique[tb_user.username]',
                'errors' => [
                    'required' => 'You must choose a Username',
                    'is_unique' => 'Already register.',
                ],
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };


        $data = [
            'nama_lengkap' => htmlspecialchars($this->request->getVar('nama_lengkap'), true),
            'npm' => htmlspecialchars($this->request->getVar('npm'), true),
            'username' => htmlspecialchars($this->request->getVar('npm'), true),
            'email' => htmlspecialchars($this->request->getVar('email'), true),
            'id_kategori' => htmlspecialchars($this->request->getVar('id_kategori'), true),
            'tempat_mbkm' => htmlspecialchars($this->request->getVar('tempat_mbkm'), true),
            'id_role' => htmlspecialchars($this->request->getVar('id_role'), true),
        ];

        if ($this->request->getVar('password') != '') {
            $data['password'] = password_hash(htmlspecialchars($this->request->getVar('password'), true), PASSWORD_DEFAULT);
        }

        $res  = $this->modeluser->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Update Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Update Failed');
        }
        return redirect()->to('user');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $this->modeluser->delete($id);
        $this->alert->set('success', 'Success', 'Delete Success');
        return redirect()->to('user');
    }

    public function active($id, $active)
    {
        $data = [
            'is_active' => $active
        ];

        $res = $this->modeluser->update($id, $data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Active Success');
        } else {
            $this->alert->set('warning', 'Warning', 'Active Failed');
        }
        return redirect()->to('user');
    }


    public function gantiPass()
    {
        $data = [
            'title' => 'Ganti Password'
        ];

        return view('user/gantipass', $data);
    }


    public function prosesGantiPass()
    {

        $rules['password_lama'] = [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'You must choose a Password',
                'min_length' => 'Min length 8.',
            ],
        ];

        $rules['password_baru'] = [
            'rules'  => 'required|min_length[8]',
            'errors' => [
                'required' => 'You must choose a Password',
                'min_length' => 'Min length 8.',
            ],
        ];

        $rules['password_retype'] = [
            'rules'  => 'required|min_length[8]|matches[password_baru]',
            'errors' => [
                'required' => 'You must choose a Password',
                'min_length' => 'Min length 8.',
                'matches' => 'Password not match',
            ],
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput();
        };


        $password_lama = htmlspecialchars($this->request->getVar('password_lama'), true);
        $password_baru = htmlspecialchars($this->request->getVar('password_baru'), true);
        $password_retype = htmlentities($this->request->getVar('password_retype'), true);


        $dataRes = $this->modeluser->find(session()->get('id_user'));

        if (password_verify($password_lama, $dataRes['password'])) {
            if ($password_baru == $password_retype) {
                $data = [
                    'password' => password_hash($password_baru, PASSWORD_DEFAULT)
                ];


                $this->modeluser->update(session()->get('id_user'), $data);

                $this->alert->set('success', 'Success', 'Password Berhasil Di Ganti');
            } else {
                $this->alert->set('warning', 'Warning', 'Password Baru Tidak Sama');
            }
        } else {
            $this->alert->set('warning', 'Warning', 'Password Lama Beda');
        }


        return redirect()->to('gantipass');
    }


    public function profile()
    {
        $data = [
            'title' => 'My Profile'
        ];

        return view('user/profile', $data);
    }
}
