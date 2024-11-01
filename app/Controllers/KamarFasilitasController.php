<?php

namespace App\Controllers;

use App\Models\KamarFasilitasModel;

class KamarFasilitasController extends BaseController
{
    public function index()
    {
        $model = new KamarFasilitasModel();
        $data['kamar_fasilitas'] = $model->findAll();
        return view('kamar_fasilitas_list', $data);
    }

    public function create()
    {
        // Load kamar and fasilitas models to populate dropdown options
        $kamarModel = new KamarModel();
        $fasilitasModel = new FasilitasModel();

        $data['kamars'] = $kamarModel->findAll();
        $data['fasilitas'] = $fasilitasModel->findAll();

        return view('kamar_fasilitas_form', $data);
    }

    public function store()
    {
        $model = new KamarFasilitasModel();

        $data = [
            'id_kamar' => $this->request->getPost('id_kamar'),
            'id_fasilitas' => $this->request->getPost('id_fasilitas'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/kamar_fasilitas')->with('success', 'Kamar Fasilitas added successfully.');
    }

    public function delete($id_kamar, $id_fasilitas)
    {
        $model = new KamarFasilitasModel();
        $model->delete(['id_kamar' => $id_kamar, 'id_fasilitas' => $id_fasilitas]);
        return redirect()->to('/kamar_fasilitas')->with('success', 'Kamar Fasilitas deleted successfully.');
    }
}