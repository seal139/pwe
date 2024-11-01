<?php

namespace App\Controllers;

use App\Models\KamarModel;

class KamarController extends BaseController
{
    public function index()
    {
        $model = new KamarModel();
        $data['kamars'] = $model->findAll();
        return view('kamar_list', $data);
    }

    public function create()
    {
        return view('kamar_form');
    }

    public function store()
    {
        $model = new KamarModel();

        $data = [
            'tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah_kamar' => $this->request->getPost('jumlah_kamar'),
            'gambar' => $this->request->getFile('gambar')->getName(), 
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/kamar')->with('success', 'Kamar added successfully.');
    }

    public function edit($id)
    {
        $model = new KamarModel();
        $data['kamar'] = $model->find($id);
        return view('kamar_form', $data);
    }

    public function update($id)
    {
        $model = new KamarModel();

        $data = [
            'id' => $id,
            'tipe_kamar' => $this->request->getPost('tipe_kamar'),
            'harga' => $this->request->getPost('harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'jumlah_kamar' => $this->request->getPost('jumlah_kamar'),
            'gambar' => $this->request->getFile('gambar')->getName(), // Assuming file upload is handled
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/kamar')->with('success', 'Kamar updated successfully.');
    }

    public function delete($id)
    {
        $model = new KamarModel();
        $model->delete($id);
        return redirect()->to('/kamar')->with('success', 'Kamar deleted successfully.');
    }
}