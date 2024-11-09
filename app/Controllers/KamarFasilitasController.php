<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KamarFasilitasModel;
use App\Models\KamarModel;
use App\Models\FasilitasModel;

class KamarFasilitasController extends BaseController 
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new KamarFasilitasModel();
    }

    public function detail($master)
    {
        $masterEntity   = new KamarModel();
        $facilityEntity = new FasilitasModel();

        $facilities = $facilityEntity->findAll();
        foreach ($facilities as $facility) {
            $facilityName[$facility->id] = $facility->nama_fasilitas;
            $facilityDesc[$facility->id] = $facility->deskripsi;
        }
        
        $data['entity']       = $this->entity->where('id_kamar', $master)->paginate(6);
        $data['pager']        = $this->entity->pager;
        $data['master']       = $masterEntity->find($master);
        $data['facilityName'] = $facilityName;
        $data['facilityDesc'] = $facilityDesc;

        return view('kamarFasilitas/kamarFasilitas_table', $data);
    }

    public function view($id1, $id2)
    {
        $roomFacility = $this->entity->where('id_kamar', $id1)->where('id_fasilitas', $id2)->first();

        $facility      = new FasilitasModel();
        $facilityEntry = $facility->where('id', $roomFacility->id_fasilitas)->first();
    
        $data['name']        = $facilityEntry->nama_fasilitas;
        $data['description'] = $facilityEntry->deskripsi;
        
        return view('kamarFasilitas/kamarFasilitas_view', $data);
    }

    public function create($master)
    {
        $masterEntity   = new KamarModel();
        $facilityEntity = new FasilitasModel();

        $data['master']     = $masterEntity->find($master);       
        $data['facilities'] = $facilityEntity->findAll();
        
        return view('kamarFasilitas/kamarFasilitas_create', $data);
    }

    public function delete($id1, $id2)
    {        
        $this->entity->where('id_kamar', $id1)->where('id_fasilitas', $id2)->delete();      
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function saveOnCreate()
    {
        $data = [
            'id_kamar'     => $this->request->getPost('master'),
            'id_fasilitas' => $this->request->getPost('facility'),
        ];     

        if (!$this->entity->insert($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors' => $this->entity->errors(),
                ]);
            }           
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room Facility added successfully.',
        ]);       
    }
   
}
