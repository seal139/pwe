<?php

namespace App\Controllers;
use App\Models\KamarModel;
use App\Models\FasilitasModel;
use App\Models\KamarFasilitasModel;

class KamarController extends BaseController
{
    protected $KamarModel;
    protected $FasilitasModel;
    protected $KamarFasilitasModel;

    public function __construct()
    {
        // Inisialisasi model kamar
        $this->KamarModel = new KamarModel();
        $this->FasilitasModel = new FasilitasModel();
        $this->KamarFasilitasModel = new KamarFasilitasModel();
    }

    public function index()
    {

        $kamar = $this->KamarModel->findAll();


        return view('user/index', ['kamar' => $kamar]);
    }

    public function detailkamar($id)
    {
        $kamar = $this->KamarModel->find($id);
        $fasilitasIds = $this->KamarFasilitasModel->where ('id_kamar', $id)->findAll();
        $fasilitas = array_map(function($f) {
            return $this->FasilitasModel->find($f ['id_fasilitas']);
        }, $fasilitasIds);

        return view('kamar/kamardetail',['kamar' => $kamar,'fasilitas' => $fasilitas]);

    }
}
