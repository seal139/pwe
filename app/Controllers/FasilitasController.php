<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FasilitasModel;

class FasilitasController extends BaseController
{
    protected $entity;

    function __construct()
    {
        $this->entity = new FasilitasModel();
    }

    public function index()
    {
        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;

        return view('fasilitas/fasilitas_table', $data);
    }

    public function view($id)
    {
        $data['entity'] = $this->entity->find($id);
        return view('fasilitas/fasilitas_view', $data);
    }

    public function create()
    {
        return view('fasilitas/fasilitas_create');
    }

    public function edit($id)
    {
        $data['entity'] = $this->entity->find($id);
        return view('fasilitas/fasilitas_edit', $data);
    }

    public function delete($id)
    {
        $this->entity->delete($id);
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function saveOnEdit($id)
    {
        $data = [
            'id'             => $id,
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
        ];

        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors'  => $this->entity->errors(),
                ]);
            }
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Facility updated successfully!',
        ]);
    }

    public function saveOnCreate()
    {
        $data = [
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
        ];

        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors'  => $this->entity->errors(),
                ]);
            }    
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Facility added successfully!',
        ]);
    }
}
