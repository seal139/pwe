<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\KamarModel;
use App\Models\KamarFasilitasModel;
use App\Models\FasilitasModel;

class KamarController extends BaseController 
{
    protected $entity;
 
    function __construct()
    {
        $this->entity = new KamarModel();
    }
    
    public function index()
    {
        $data['entity'] = $this->entity->paginate(6);    
        $data['pager']  = $this->entity->pager;

        return view('kamar/kamar_table', $data);
    }

    public function view($id)
    {
        $mapper         = new KamarFasilitasModel();
        $facilityEntity = new FasilitasModel();
        
        $mapperData = $mapper->where('id_kamar', $id)->findAll();
        $facilities = $facilityEntity->findAll();

        foreach ($facilities as $facility) {
            $facilityName[$facility->id] = $facility->nama_fasilitas;
        }
        
        $facilityNamesStr = '';
        foreach ($mapperData as $mapperItem) {
            $id_fasilitas = $mapperItem->id_fasilitas;
            if (isset($facilityName[$id_fasilitas])) {
                $facilityNamesStr .= $facilityName[$id_fasilitas] . ', ';
            }
        }

        $facilityNamesStr = rtrim($facilityNamesStr, ', ');
        $data['facility'] = $facilityNamesStr;
        $data['entity']   = $this->entity->find($id);

        return view('kamar/kamar_view', $data);
    }

    public function create()
    {
        return view('kamar/kamar_create');
    }

    public function edit($id)
    {
        $data['entity'] = $this->entity->find($id);
        return view('kamar/kamar_edit', $data);
    }

    public function delete($id)
    {        
        $this->entity->delete($id);      
        return redirect()->back()->with('success', 'Deleted!');   
    }

    public function saveOnEdit($id)
    {       
        $data = [
            'id'           => $id,
            'tipe_kamar'   => $this->request->getPost('type'),
            'harga'        => $this->request->getPost('price'),
            'deskripsi'    => $this->request->getPost('description'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
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
            'message' => 'Room updated successfully.',
        ]);       
    }

    public function saveOnCreate()
    {
        $data = [
            'tipe_kamar'   => $this->request->getPost('type'),
            'harga'        => $this->request->getPost('price'),
            'deskripsi'    => $this->request->getPost('description'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
        ];

        if (!$this->entity->save($data)) {
            if($this->entity->errors()){
                return $this->response->setJSON([                
                    'success' => false,
                    'errors' => $this->entity->errors(),
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
