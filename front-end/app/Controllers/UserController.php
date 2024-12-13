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
        $session = session();

        $usermodel = new UserModel();        
        $data1 = [            
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama'     => $this->request->getPost('name'),
            'role'     => 0,
        ];
        if (!$usermodel->save($data1)) {
            $errors = $usermodel->errors();

            // Log the errors
            log_message('error', 'UserModel Save Failed: ' . json_encode($errors));
        }

        $tamumodel = new TamuModel();
        $data2 = [
            'nama' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telepon'),
        ];
        if (!$tamumodel->save($data2)) {
            $errors = $tamumodel->errors();

            // Log the errors
            log_message('error', 'Tamu Save Failed: ' . json_encode($errors));
        }

       

        $session->set([
            'user_name' => $this->request->getPost('name'),
            'user_role' => 0,
            'isLoggedIn' => true
        ]);
        return redirect()->to('/');
    }

    public function login()
    {
        return view('user/login');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }
    
    public function authenticate()
    {
        $usermodel = new UserModel();
        $session = session();

        $email    = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $usermodel->where([
            'username' => $email,
        ])->first();

        echo ($user['username']);

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_name' => $user['nama'],
                'user_role' => $user['role'],
                'isLoggedIn' => true
            ]);
            return redirect()->to('/');
        }else {
            $session->setFlashdata('error', 'Invalid email or password');
            return redirect()->to('/user/register');
        }

    }

    
}