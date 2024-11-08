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
        $kamarEntity = new KamarModel();
        $guestEntity = new TamuModel();

        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;

        $rooms       = $kamarEntity->findAll();
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
        $roomEntity  = new KamarModel();
        $guestEntity = new TamuModel();

        $book  = $this->entity->where('id', $id)->first();
        $room  = $roomEntity->where('id', $book->id_kamar)->first();
        $guest = $guestEntity->where('id', $book->id_tamu)->first();

        $data['entity'] = $book;
        $data['room']   = $room->tipe_kamar;
        $data['guest']  = $guest->nama;
        
        return view('booking/booking_view', $data);
    }
    
    public function create()
    {
        $kamarEntity  = new KamarModel();
        $guestEntity  = new TamuModel();

        $data['rooms']  = $kamarEntity->findAll();
        $data['guests'] = $guestEntity->findAll();

        return view('booking/booking_create', $data);
    }
    
    public function edit($id)
    {
        $roomEntity    = new KamarModel();
        $guestEntity    = new TamuModel();

        $book  = $this->entity->where('id', $id)->first();
        $room  = $roomEntity->where('id', $book->id_kamar)->first();
        $guest = $guestEntity->where('id', $book->id_tamu)->first();

        $data['entity'] = $book;
        $data['room']   = $room->tipe_kamar;
        $data['guest']  = $guest->nama;

        return view('booking/booking_edit', $data);
    }

    public function delete($id)
    {
        $this->entity->delete($id);      
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function saveOnCreate()
    {
        $data = [
            'id_tamu'          => $this->request->getPost('guest'),
            'id_kamar'         => $this->request->getPost('room'),
            'tanggal_checkin'  => $this->request->getPost('checkin'),
            'tanggal_checkout' => $this->request->getPost('checkout'),
            'jumlah_kamar'     => $this->request->getPost('roomCount'),
        ];

        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors' => $this->entity->errors(),
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Booking added successfully!',
        ]);
    }

    public function saveOnEdit($id)
    {
        $book = $this->entity->where('id', $id)->first();

        $data = [
            'id'               => $id,
            'id_tamu'          => $book->id_tamu,
            'id_kamar'         => $book->id_kamar,
            'tanggal_checkin'  => $this->request->getPost('tanggalcheckin'),
            'tanggal_checkout' => $this->request->getPost('tanggalcheckout'),
            'jumlah_kamar'     => $this->request->getPost('jumlahkamar'),
        ];

        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors'  => $this->entity->errors(),
                ]);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Booking updated successfully!',
        ]);
    }   
}