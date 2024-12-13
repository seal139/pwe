<?php

namespace App\Controllers;
use App\Models\KamarModel;
use App\Models\FasilitasModel;
use App\Models\KamarFasilitasModel;
use App\Models\BookingModel;
use App\Models\TamuModel;
use App\Models\UserModel;
use App\Controllers\UserController;

class BookingController extends BaseController
{
    protected $KamarModel;
    protected $FasilitasModel;
    protected $KamarFasilitasModel;
    protected $BookingModel;
    protected $tamuModel;
    protected $UserModel;

    public function __construct()
    {
        // Inisialisasi model kamar
        $this->KamarModel = new KamarModel();
        $this->FasilitasModel = new FasilitasModel();
        $this->KamarFasilitasModel = new KamarFasilitasModel();
        $this->BookingModel = new BookingModel();
        $this->tamuModel = new TamuModel();
    }


    public function book($id_kamar)
    {
        // if (!session()->get('isLoggedIn')) {
        //     // Set flashdata untuk menampilkan alert
        //     session()->setFlashdata('error', 'Silahkan login terlebih dahulu untuk melakukan booking.');
        //     return redirect()->to('/login');
        // }

        if(is_null(session()->get('isLoggedIn'))) {
            return redirect()->to('/user/login');
        }
        
        $kamar = $this->KamarModel->find($id_kamar);

        return view('kamar/booking', ['kamar' => $kamar]);
    }

    public function storeBooking()
    {
        $checkin = $this->request->getPost('tanggal_checkin');
        $checkout = $this->request->getPost('tanggal_checkout');

        $id_kamar = $this->request->getPost('id_kamar');
        $jumlah_kamar = $this->request->getPost('jumlah_kamar');

        $kamar = $this->KamarModel->find($id_kamar);
        if (!$kamar) {
            return redirect()->back()->withInput()->with('error', 'Kamar tidak ditemukan.');
        }

        // Cek apakah harga tersedia
        if (!isset($kamar['harga']) || $kamar['harga'] === null) {
            return redirect()->back()->withInput()->with('error', 'Harga kamar tidak tersedia.');
        }
        $checkinDate = new \DateTime($checkin);
        $checkoutDate = new \DateTime($checkout);
        $interval = $checkinDate->diff($checkoutDate);
        $jumlah_hari = $interval->days;

        $total_harga = $kamar['harga'] * $jumlah_hari * $jumlah_kamar;

        $data = [
            'id_tamu'      => session()->get('id_tamu'),
            'id_kamar'     => $id_kamar,
            'tanggal_checkin' => $checkin,
            'tanggal_checkout' => $checkout,
            'jumlah_kamar' => $jumlah_kamar,
            'total_harga'  => $total_harga,
            'status'       => 'Booked',
        ];
        $this->BookingModel->insert($data);
        return redirect()->to('/confirmlogin');
    }
    

}
