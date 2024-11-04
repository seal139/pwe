<?php

namespace App\Controllers;

use App\Models\FormModel;
use App\Models\RegistrasiModel;
use Config\Services;

class RegisterController extends BaseController
{
    //protected $helpers = ['form'];
    public function index()
    {

        return view('register');
    }

    public function process()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tbllogin.username]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'username sudah digunakan sebelumnya'
                ]
            ],

            'nama' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                    'is_unique' => 'username sudah digunakan sebelumnya'
                ]
            ],

            'email' => [
                'rules' => 'required|min_length[4]|max_length[50]|is_unique[tbllogin.email]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                    'is_unique' => 'username sudah digunakan sebelumnya'
                ]
            ],

            'telp' => [
                'rules' => 'required|min_length[4]|max_length[20]|is_unique[tbllogin.no_telepon]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 20 Karakter',
                    'is_unique' => 'username sudah digunakan sebelumnya'
                ]
            ],
            'Password' => [
                'rules' => 'required|min_length[4]|max_length[25]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 25 Karakter',
                ]
            ],
            'Password_conf' => [
                'rules' => 'matches[Password]',
                'errors' => [
                    'matches' => 'Konfirmasi password tidak sesuai dengan password',
                ]
            ],
            
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $register = new RegistrasiModel();
        $register->insert([
            'username' => $this->request->getVar('username'),
            //'password' => password_hash($this->request->getVar('password'), password_BCRYPT),            
            'password' => $this->request->getVar('Password'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'no_telepon' => $this->request->getVar('no_telpon'),
           
        ]);        
        return redirect()->to('/RegisterController/login');
    }
    public function login()
    {
        return view('login');
    }
   
}