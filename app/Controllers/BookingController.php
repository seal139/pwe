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

        $kamarEntity = new KamarModel();
        $rooms       = $kamarEntity->findAll();

        $guestEntity = new TamuModel();
        $guests      = $guestEntity->findAll();

        foreach ($rooms as $room) {
            $roomName[$room->id] = $room->tipe_kamar;
        }

        foreach ($guests as $guest) {
            $guestName[$guest->id] = $guest->nama;
        }
        
        $data['room']  = $roomName;
        $data['guest'] = $guestName;

        return view('booking/booking_table', $data);
    }

    public function view($id)
    {
        $book = $this->entity->where('id', $id)->first();
        $data['entity'] = $book;

        $roomEntity    = new KamarModel();
        $room          = $roomEntity->where('id', $book->id_kamar)->first();
        $data['room']  = $room->tipe_kamar;

        $guestEntity    = new TamuModel();
        $guest          = $guestEntity->where('id', $book->id_tamu)->first();
        $data['guest']  = $guest->nama;
        
        return view('booking/booking_view', $data);
    }
    
    public function create()
    {
        $kamarEntity  = new KamarModel();
        $data['rooms'] = $kamarEntity->findAll();
        
        $guestEntity   = new TamuModel();
        $data['guests'] = $guestEntity->findAll();

        return view('booking/booking_create', $data);
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

    public function delete($id)
    {
        $model = new BookingModel();
        $model->delete($id);
        return redirect()->to('/booking')->with('success', 'Booking deleted successfully.');
    }

    public function saveOnCreate()
    {
        $model = new BookingModel();

        $data = [
            'id_tamu' => $this->request->getPost('guest'),
            'id_kamar' => $this->request->getPost('room'),
            'tanggal_checkin' => $this->request->getPost('checkin'),
            'tanggal_checkout' => $this->request->getPost('checkout'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
        ];

        if (!$model->save($data)) {
            if($model->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors' => $model->errors(), // Pass the validation errors
                ]);
            }
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room added successfully.',
        ]);
    }

    public function saveOnEdit($id)
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

    
}