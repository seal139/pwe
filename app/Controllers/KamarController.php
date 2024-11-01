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
            'tipe_kamar' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} is required field'
                ]
            ],
            'deskripsi' => [
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
            'tipe_kamar'          => $this->request->getPost('type'),
            'harga'         => $this->request->getPost('price'),
            'deskripsi'   => $this->request->getPost('description'),
            'jumlah_kamar'     => $this->request->getPost('roomCount')  
        ]);

        session()->setFlashdata('message', 'Success');
        return redirect()->to(base_url('/KamarController'));
       
    }

    public function saveOnCreate()
    {
        $model = new KamarModel();

        $data = [
            'tipe_kamar' => $this->request->getPost('type'),
            'harga' => $this->request->getPost('price'),
            'deskripsi' => $this->request->getPost('description'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
            #'gambar' => $this->request->getFile('gambar')->getName(), // Assuming file upload is handled
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to(base_url('/KamarController'))->with('success', 'Kamar added successfully.');
    }
   
}
