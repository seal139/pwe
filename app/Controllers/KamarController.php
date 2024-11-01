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
        $data['entity'] = $this->entity->find($id);
        return view('kamar/kamar_view', $data);
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
        $model = new KamarModel();

        $data = [
            'id' => $id,
            'tipe_kamar' => $this->request->getPost('type'),
            'harga' => $this->request->getPost('price'),
            'deskripsi' => $this->request->getPost('description'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
        ];

        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $model->errors(), // Pass the validation errors
            ]);
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room updated successfully.',
        ]);       
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
            return $this->response->setJSON([
                'success' => false,
                'errors' => $model->errors(), // Pass the validation errors
            ]);
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room added successfully.',
        ]);       
    }
   
}
