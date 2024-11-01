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

    /**
     * index function
     */
    public function index()
    {
        $data['entity'] = $this->entity->findAll();       

        return view('user/user_table', $data);
    }

    public function view($id)
    {

    }

    public function create()
    {
        return view('user/user_create');
    }

    public function edit($id)
    {
        //$tblproduk = new TblprodukModel();
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }

        return view('user/user_edit', $data);
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

    public function saveOnEdit($id)
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'mail' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],         
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }
        
        $this->entity->update($id, [
            
            'username'  => $this->request->getVar('username'),
            'name'      => $this->request->getVar('name'),
            'telp'      => $this->request->getVar('telp'),
            'mail'      => $this->request->getVar('mail')  
        ]);

        session()->setFlashdata('message', 'Success');
        return redirect()->to('/User');
    }

    public function saveOnCreate()
    {
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'mail' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            
 
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
 
        $this->entity->insert([
            'username'  => $this->request->getVar('username'),
            'name'      => $this->request->getVar('name'),
            'telp'      => $this->request->getVar('telp'),
            'mail'      => $this->request->getVar('mail')            
        ]);

        session()->setFlashdata('message', 'Success');
        return redirect()->to('/User');
    }
   
}

