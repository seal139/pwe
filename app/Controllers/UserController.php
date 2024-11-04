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
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }
        
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
        $model = new UserModel();

        $data = [            
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'nama'     => $this->request->getPost('name'),
            'role'     => 0,
        ];
    
        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $model->errors(),
            ]);
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'User added successfully.',
        ]); 
    }
}

