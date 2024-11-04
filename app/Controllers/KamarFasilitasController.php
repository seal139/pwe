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
        $data['entity'] = $this->entity->where('id_kamar', $master)->paginate(6);
        $data['pager']  = $this->entity->pager;

        $masterEntity   = new KamarModel();
        $data['master'] = $masterEntity->find($master);

        $facilityEntity = new FasilitasModel();
        $facilities     = $facilityEntity->findAll();

        foreach ($facilities as $facility) {
            $facilityName[$facility->id] = $facility->nama_fasilitas;
            $facilityDesc[$facility->id] = $facility->deskripsi;
        }
        
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
        $data['master'] = $masterEntity->find($master);

        $facilityEntity     = new FasilitasModel();
        $data['facilities'] = $facilityEntity->findAll();
        
        return view('kamarFasilitas/kamarFasilitas_create', $data);
    }

    public function delete($id1, $id2)
    {
        $data['entity'] = $this->entity->where('id_kamar', $id1)->where('id_fasilitas', $id2);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }
        
        $this->entity->where('id_kamar', $id1)->where('id_fasilitas', $id2)->delete();      
        return redirect()->back()->with('success', 'Deleted!');
    }

    public function saveOnCreate()
    {
        $model = new KamarFasilitasModel();

        $data = [
            'id_kamar'     => $this->request->getPost('master'),
            'id_fasilitas' => $this->request->getPost('facility'),
        ];     

        if (!$model->insert($data)) {
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
   
}
