<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJenjang;
class Jenjang extends BaseController
{
    public function __construct()
    {
        $this->ModelJenjang = new ModelJenjang();
    }
    public function index()
    {
        $data = [
            'judul' => 'Jenjang',
            'menu'  => 'jenjang',
            'page'  => 'v_jenjang',
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_back_end', $data); 
    }

public function UpdateData()
{
    $id_jenjang = $this->request->getPost('id_jenjang');

    $validationRule = [
        'marker' => [
            'rules' => 'uploaded[marker]|mime_in[marker,image/png]|ext_in[marker,png]|max_size[marker,2048]',
        ],
    ];

    if (!$this->validate($validationRule)) {
        session()->setFlashdata('sukses_hapus', 'Gagal! File harus berformat PNG.');
        return redirect()->to(base_url('Jenjang'));
    }

    $marker = $this->request->getFile('marker');
    
    if ($marker->isValid() && !$marker->hasMoved()) {
        $name_file = $marker->getRandomName();
        
        $data = [
            'marker' => $name_file,
        ];
        
        $marker->move(ROOTPATH . 'public/marker/', $name_file);
        $this->ModelJenjang->updateMarker($id_jenjang, $data);
        
        session()->setFlashdata('sukses_edit', 'Marker Berhasil Diupdate !!');
        return redirect()->to(base_url('Jenjang'));
    }
}

}
