<?php

namespace App\Controllers;

use App\Models\ModelWilayah;
use App\Models\ModelSetting;
use App\Models\ModelSekolah;

class Sekolah extends BaseController
{
    protected $ModelWilayah;
    protected $ModelSetting;
    protected $ModelSekolah;

    public function __construct()
    {
        $this->ModelSetting  = new ModelSetting();
        $this->ModelWilayah  = new ModelWilayah();
        $this->ModelSekolah  = new ModelSekolah();
    }

    public function index()
    {
        $data = [
            'judul'   => 'Data Sekolah',
            'menu'    => 'sekolah',
            'page'    => 'sekolah/v_index', 
            'web'     => $this->ModelSetting->Dataweb(),
            'sekolah' => $this->ModelSekolah->AllData(), 
        ];
        return view('v_template_back_end', $data);
    }

    public function input()
    {
        $data = [
            'judul'   => 'Input Sekolah',
            'menu'    => 'sekolah',
            'page'    => 'sekolah/v_input',
            'web'     => $this->ModelSetting->Dataweb(),
            'wilayah' => $this->ModelWilayah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }
}