<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = [
           'judul' => 'Dashboard',
           'menu'  => 'dashboard',
           'page' => 'v_dashboard',
        ];
        return view('v_template_back_end', $data);
    }

    
    public function Setting()
    {
        $data = [
           'judul' => 'Setting',
           'menu'  => 'setting',
           'page' => 'v_setting',
        ];
        return view('v_template_back_end', $data);  
    }

    public function UpdateSetting()
{
    $data = [
        'id' => 1,
        'nama_web' => $this->request->getPost('nama_web'),
        'coordinat_wilayah' => $this->request->getPost('coordinat_wilayah'),
        'zoom_view' => $this->request->getPost('zoom_view'),
    ];

    $this->ModelSetting->UpdateData($data);

    session()->setFlashdata('pesan', 'Settingan Web Telah Diupdate !!!');

    return redirect()->to('Admin/Setting');
}
}