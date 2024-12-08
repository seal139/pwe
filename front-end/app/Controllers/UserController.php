<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TamuModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function register()
    {
        return view('user/register');
    }

    public function storeUser()
    {
        $usermodel = new UserModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'role' => 'tamu'
        ];
        $usermodel->save($data);
        return view('user/storeUser');
    }

    public function login()
    {
        return view('user/login');
    }
    
    public function authenticate()
    {
        $usermodel = new UserModel();
        $session = session();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $usermodel->getByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'id_tamu' => $user['id'],
                'user_name' => $user['nama'],
                'user_role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/user/authenticate');
        }else {
            $session->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('/user/login');
        }

    }

    
}