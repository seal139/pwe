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
        $kamarEntity  = new KamarModel();
        $data['rooms'] = $kamarEntity->findAll();
        
        $guestEntity   = new TamuModel();
        $data['guests'] = $guestEntity->findAll();

        return view('booking/booking_create', $data);
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

    public function saveOnCreate()
    {
        log_message('error', 'Suck:' . $this->request->getPost('guest'));
        log_message('error', 'Suck:' . $this->request->getPost('room'));
        log_message('error', 'Suck:' . $this->request->getPost('checkin'));
        log_message('error', 'Suck:' . $this->request->getPost('checkout'));
        log_message('error', 'Suck:' . $this->request->getPost('roomCount'));

        log_message('error', 'Check-in date: ' . $this->request->getPost('checkin'));
        log_message('error', 'Check-out date: ' .  $this->request->getPost('checkout'));

        // Compare their Unix timestamps to debug
        log_message('error', 'Check-in timestamp: ' . strtotime($this->request->getPost('checkin')));
        log_message('error', 'Check-out timestamp: ' . strtotime( $this->request->getPost('checkout')));


        $model = new BookingModel();

        $data = [
            'id_tamu' => $this->request->getPost('guest'),
            'id_kamar' => $this->request->getPost('room'),
            'tanggal_checkin' => $this->request->getPost('checkin'),
            'tanggal_checkout' => $this->request->getPost('checkout'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
        ];

        if (!$model->save($data)) {
            $validation = \Config\Services::validation();
            $errors = $validation->getErrors();

            // Log each error message
            foreach ($errors as $field => $error) {
                log_message('error', "Validation Error on $field: $error");
            }
            
            log_message('error', 'eerr:' . print_r($model->errors(), true));
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

        if (!($model->save($data))) {
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