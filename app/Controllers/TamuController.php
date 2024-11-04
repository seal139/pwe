<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TamuModel;

class TamuController extends BaseController 
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new TamuModel();
    }

    public function index()
    {
        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;

        return view('tamu/tamu_table', $data);
    }

    public function view($id)
    {
        $data['entity'] = $this->entity->find($id);
        return view('tamu/tamu_view', $data);
    }

    public function create()
    {
        return view('tamu/tamu_create');
    }

    public function edit($id)
    {
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }

        return view('tamu/tamu_edit', $data);
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
        $model = new TamuModel();

        $data = [
            'id'        => $id,
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('notelepon'),
        ];

        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $model->errors(), // Pass the validation errors
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room updated successfully.',
        ]);       
    }

    public function saveOnCreate()
    {
        $model = new tamuModel();

        $data = [
            'id'        => $this->request->getPost('id'),
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('notelepon'),
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
