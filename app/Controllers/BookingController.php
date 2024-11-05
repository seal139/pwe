<?php

namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\TamuModel;
use App\Models\KamarModel;

class BookingController extends BaseController
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new BookingModel();
    }

    public function index()
    {
        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;
        return view('booking/booking_table', $data);
    }
    
    public function create()
    {
        return view('booking/booking_create');
    }

    // public function create()
    // {
    //     // Load tamu and kamar models to populate dropdown options
    //     $tamuModel = new TamuModel();
    //     $kamarModel = new KamarModel();

    //     $data['nama'] = $tamuModel->findAll();
    //     $data['tipe_kamar'] = $kamarModel->findAll();

    //     return view('booking_create', $data);
    // }

    public function store()
    {
        $model = new BookingModel();

        $data = [
            'id_tamu' => $this->request->getPost('id_tamu'),
            'id_kamar' => $this->request->getPost('id_kamar'),
            'tanggal_checkin' => $this->request->getPost('tanggal_checkin'),
            'tanggal_checkout' => $this->request->getPost('tanggal_checkout'),
            'jumlah_kamar' => $this->request->getPost('jumlah_kamar'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/booking')->with('success', 'Booking added successfully.');
    }

    public function edit($id)
    {
        $model = new BookingModel();
        $data['booking'] = $model->find($id);

        // Load tamu and kamar models to populate dropdown options
        $tamuModel = new TamuModel();
        $kamarModel = new KamarModel();

        $data['tamu'] = $tamuModel->findAll();
        $data['kamar'] = $kamarModel->findAll();

        return view('booking_edit', $data);
    }

    public function update($id)
    {
        $model = new BookingModel();

        $data = [
            'id' => $id,
            'id_tamu' => $this->request->getPost('idtamu'),
            'id_kamar' => $this->request->getPost('idkamar'),
            'tanggal_checkin' => $this->request->getPost('tanggalcheckin'),
            'tanggal_checkout' => $this->request->getPost('tanggalcheckout'),
            'jumlah_kamar' => $this->request->getPost('jumlahkamar'),
        ];

        if (!$model->save($data)) {
            // Handle errors, e.g., display error messages
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/booking')->with('success', 'Booking updated successfully.');
    }

    public function delete($id)
    {
        $model = new BookingModel();
        $model->delete($id);
        return redirect()->to('/booking')->with('success', 'Booking deleted successfully.');
    }
}