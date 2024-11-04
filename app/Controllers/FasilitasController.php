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
        //$tblproduk = new TblprodukModel();
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }

        return view('fasilitas/fasilitas_edit', $data);
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
        $model = new FasilitasModel();

        $data = [
            'id'             => $id,
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
        ];

        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $model->errors(), // Pass the validation errors
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
        $model = new fasilitasModel();

        $data = [
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi'      => $this->request->getPost('deskripsi'),
        ];

        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $model->errors(), // Pass the validation errors
            ]);
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Tamu added successfully.',
        ]);
    }
}
