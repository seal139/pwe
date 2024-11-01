<?php

namespace App\Controllers;

use App\Models\TamuModel;

class TamuController extends BaseController
{
    public function index()
    {
        $model = new TamuModel();
        $data['tamu'] = $model->findAll();
        return view('tamu_list', $data);
    }

    public function create()
    {
        return view('tamu_form');
    }

    public function store()
    {
        $model = new TamuModel();

        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/tamu')->with('success', 'Tamu added successfully.');
    }

    public function edit($id)
    {
        $model = new TamuModel();
        $data['tamu'] = $model->find($id);
        return view('tamu_form', $data);
    }

    public function update($id)
    {
        $model = new TamuModel();

        $data = [
            'id' => $id,
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'no_telpon' => $this->request->getPost('no_telpon'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/tamu')->with('success', 'Tamu updated successfully.');
    }

    public function delete($id)
    {
        $model = new TamuModel();
        $model->delete($id);
        return redirect()->to('/tamu')->with('success', 'Tamu deleted successfully.');
    }
}