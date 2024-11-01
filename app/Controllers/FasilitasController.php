<?php

namespace App\Controllers;

use App\Models\FasilitasModel;

class FasilitasController extends BaseController
{
    public function index()
    {
        $model = new FasilitasModel();
        $data['fasilitas'] = $model->findAll();
        return view('fasilitas_list', $data);
    }

    public function create()
    {
        return view('fasilitas_form');
    }

    public function store()
    {
        $model = new FasilitasModel();

        $data = [
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/fasilitas')->with('success', 'Fasilitas added successfully.');
    }

    public function edit($id)
    {
        $model = new FasilitasModel();
        $data['fasilitas'] = $model->find($id);
        return view('fasilitas_form', $data);
    }

    public function update($id)
    {
        $model = new FasilitasModel();

        $data = [
            'id' => $id,
            'nama_fasilitas' => $this->request->getPost('nama_fasilitas'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/fasilitas')->with('success', 'Fasilitas updated successfully.');
    }

    public function delete($id)
    {
        $model = new FasilitasModel();
        $model->delete($id);
        return redirect()->to('/fasilitas')->with('success', 'Fasilitas deleted successfully.');
    }
}