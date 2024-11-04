<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $loginmodel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $dataUser = $loginmodel->where([
            'username' => $username,
        ])->first();
        
        if ($dataUser) {

            if (password_verify($password, $dataUser->password)) {

                session()->set([
                    'name'  => $dataUser->nama,
                    'role'      => $dataUser->role,
                    'logged_in' => TRUE
                ]);

                return redirect()->to(base_url('HomeController'));
            } 
            else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        }
        else {
            session()->setFlashdata('error', 'Username & Password Tidak Ada');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/LoginController'));
    }

    public function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}


