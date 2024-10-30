<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KamarModel;

class KamarController extends BaseController 
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new KamarModel();
    }

    /**
     * index function
     */
    public function index()
    {
        $data['entity'] = $this->entity->findAll();       

        return view('kamar/kamar_table', $data);
    }

    public function view($id)
    {

    }

    public function create()
    {
        return view('kamar/kamar_create');
    }

    public function edit($id)
    {
        //$tblproduk = new TblprodukModel();
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }

        return view('kamar/kamar_edit', $data);
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
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'descirption' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'roomCount' => [
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
            'type'          => $this->request->getVar('type'),
            'price'         => $this->request->getVar('price'),
            'descirption'   => $this->request->getVar('descirption'),
            'roomCount'     => $this->request->getVar('roomCount')  
        ]);

        session()->setFlashdata('message', 'Success');
        return redirect()->to(base_url('/KamarController'));
       
    }

    public function saveOnCreate()
    {
        if (!$this->validate([
            'type' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'price' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'descirption' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'roomCount' => [
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
            'type'          => $this->request->getVar('type'),
            'price'         => $this->request->getVar('price'),
            'descirption'   => $this->request->getVar('descirption'),
            'roomCount'     => $this->request->getVar('roomCount')            
        ]);

        session()->setFlashdata('message', 'Success');
        return redirect()->to(base_url('/KamarController'));
    }
   
}

