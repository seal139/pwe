<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class UserController extends BaseController 
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new UserModel();
    }

    public function index()
    {
        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;

        return view('user/user_table', $data);
    }

    public function delete($id)
    {
        $this->entity->delete($id);      
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function view($id)
    {
        $data['entity'] = $this->entity->find($id);
        return view('user/user_view', $data);
    }

    public function create()
    {
        return view('user/user_create');
    }

    public function saveOnCreate()
    {
        $data = [            
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama'     => $this->request->getPost('name'),
            'role'     => 0,
        ];
    
        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors' => $this->entity->errors(),
                ]);
            }    
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'User added successfully.',
        ]); 
    }
}

