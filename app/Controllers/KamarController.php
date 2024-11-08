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
        $data['entity'] = $this->entity->find($id);
        
        $mapper = new KamarFasilitasModel();
        $mapperData = $mapper->where('id_kamar', $id)->findAll();

        $facilityEntity = new FasilitasModel();
        $facilities     = $facilityEntity->findAll();

        foreach ($facilities as $facility) {
            $facilityName[$facility->id] = $facility->nama_fasilitas;
        }
        
        $facilityNamesStr = ''; // Initialize an empty string to append facility names
        foreach ($mapperData as $mapperItem) {
            $id_fasilitas = $mapperItem->id_fasilitas;
            if (isset($facilityName[$id_fasilitas])) {
                $facilityNamesStr .= $facilityName[$id_fasilitas] . ', ';
            }
        }

        // Trim the trailing comma and space from the string
        $facilityNamesStr = rtrim($facilityNamesStr, ', ');
        $data['facility'] = $facilityNamesStr;

        return view('kamar/kamar_view', $data);
    }

    public function create()
    {
        return view('kamar/kamar_create');
    }

    public function edit($id)
    {
        //$tblproduk = new TblprodukModel();
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }

        return view('kamar/kamar_edit', $data);
    }

    public function delete($id)
    {
        $data['entity'] = $this->entity->find($id);
        if (empty($data)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No data found!');
        }
        
        $this->entity->delete($id);      
        return redirect()->back()->with('success', 'Deleted!');
        
    }

    public function saveOnEdit($id)
    {       
        $model = new KamarModel();

        $data = [
            'id'           => $id,
            'tipe_kamar'   => $this->request->getPost('type'),
            'harga'        => $this->request->getPost('price'),
            'deskripsi'    => $this->request->getPost('description'),
            'jumlah_kamar' => $this->request->getPost('roomCount'),
        ];

        if (!$model->save($data)) {
            return $this->response->setJSON([
                'success' => false,
                'errors'  => $model->errors(), // Pass the validation errors
            ]);
        }

        // Return success message as JSON
        return $this->response->setJSON([
            'success' => true,
            'message' => 'Room updated successfully.',
        ]);       
    }

    public function saveOnCreate()
    {
        $model = new KamarModel();

        $data = [
            'tipe_kamar'   => $this->request->getPost('type'),
            'harga'        => $this->request->getPost('price'),
            'deskripsi'    => $this->request->getPost('description'),
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
   
}
