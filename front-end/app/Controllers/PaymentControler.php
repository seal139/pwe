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

    public function getTotal() {
        $session = session();

        $roomEntity    = new KamarModel();
        $bookingEntity = new BookingModel();
        $guestEntity   = new TamuModel();
        
        $nama  = session->get('user_name');
        $tamu  = $guestEntity->where ('nama', $nama);
        $pesan = $bookingtEntity->where ('id_tamu', $tamu['id'])->findAll();

        $total = 0;

        if($pesan) {
            foreach ($pesan as $row) {
                $idKamar     = $row['id_kamar'];
                $jumlahKamar = $row['jumlah_kamar'];
        
                // Ambil detail kamar berdasarkan id_kamar
                $kamar = $kamarEntity->where('id', $idKamar)->first();
        
                if ($kamar) {
                    $harga    = $kamar['harga']; // Ambil harga dari tabel kamar
                    $subtotal = $jumlahKamar * $harga; // Hitung subtotal untuk booking ini
                    $total += $subtotal; // Akumulasikan ke total pembayaran
                }
            }
        }
        
        return $total;
    }


}