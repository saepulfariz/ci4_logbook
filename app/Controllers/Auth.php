<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KategoriModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    private $modelkategori;
    private $modeluser;
    public function __construct()
    {
        $this->modelkategori = new KategoriModel();
        $this->modeluser = new UserModel();
    }

    public function index()
    {
        if (session()->get('id_user')) {
            return redirect()->to('dashboard');
        }

        $data = [
            'title' => 'Login',
            // 'validation' => \Config\Services::validation()
        ];
        return view('auth/login', $data);
    }

    public function proses_login()
    {
        /*

        if (!$this->validate([
            'username' => 'required',
            'password' => 'required',
        ])) {
            return redirect()->back()->withInput();
        };

        */

        $rules = [
            'username' => 'required',
            'password' => 'required|min_length[8]',
        ];

        $messageRules = [
            'username' => [
                // 'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
                'required' => 'Please input username',
            ],
            'password' => [
                // 'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
                'required' => 'Please input password',
                'min_length' => 'Min length 8',
            ],
        ];

        $input = $this->request->getVar();

        if (!$this->validateData($input, $rules, $messageRules)) {
            return redirect()->back()->withInput();
        }

        $username = htmlspecialchars($this->request->getVar('username'), true);
        $password = htmlspecialchars($this->request->getVar('password'), true);


        $dataUser = $this->modeluser->cekLogin($username);
        if ($dataUser) {
            if (password_verify($password, $dataUser['password'])) {
                if ($dataUser['is_active'] == 1) {
                    if (!$dataUser['deleted_at']) {
                        session()->set('id_user', $dataUser['id_user']);
                        session()->set('id_role', $dataUser['id_role']);
                        session()->set('username', $dataUser['username']);

                        $this->alert->set('success', 'Success', 'User login');
                        return redirect()->to('dashboard');
                    } else {
                        $this->alert->set('warning', 'Warning', 'User deleted, please contact administrator');
                    }
                } else {
                    $this->alert->set('warning', 'Warning', 'User disabled active, please contact administrator');
                }
            } else {
                $this->alert->set('warning', 'Warning', 'Password Dont Match');
            }
        } else {
            $this->alert->set('warning', 'Warning', 'User Not Register');
        }

        return redirect()->to('auth');
    }


    public function register()
    {

        if (session()->get('id_user')) {
            return redirect()->to('dashboard');
        }

        $data = [
            'title' => 'Register',
            'kategori' => $this->modelkategori->findAll()
        ];
        return view('auth/register', $data);
    }


    public function proses_register()
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
            'password1' => [
                'rules'  => 'required|matches[password]',
                'errors' => [
                    'required' => 'You must choose a Password',
                    'matches' => 'Password not match',
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
            'gambar' => 'default.jpg',
            'cid' => 1,
            'uid' => 1,
            'is_active' => 1,
            'id_role' => 2,
        ];

        $res = $this->modeluser->save($data);
        if ($res) {
            $this->alert->set('success', 'Success', 'Register Success');
            return redirect()->to('auth');
        } else {
            $this->alert->set('warning', 'Warning', 'Register Failed');
            return redirect()->to('auth/register');
        }
    }

    public function ajaxKategori()
    {
        $id_kategori = htmlspecialchars($this->request->getVar('id_kategori'), true);
        return json_encode($this->modelkategori->find($id_kategori));
    }


    public function logout()
    {
        session()->remove('id_user');
        session()->remove('id_role');
        session()->remove('username');
        session()->destroy();

        return redirect()->to('auth');
    }
}
