<?php

namespace App\Controllers;

use App\Models\UserModel;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $loginmodel = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $dataUser = $loginmodel->where([
            'username' => $username,
        ])->first();
        if ($dataUser) {
            if ($password == $dataUser->password) {

                session()->set([
                    'username' => $dataUser->username,
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('home'));
            } else {
                session()->setFlashdata('error', 'Username & Password Salah');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Username & Password Tidak Ada');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    public function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}


