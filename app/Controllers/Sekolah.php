<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelSekolah = new ModelSekolah();
    }

    public function index()
    {
        $data = [
            'judul'   => 'Sekolah',
            'menu'    => 'sekolah',
            'page'    => 'sekolah/v_index',
            'sekolah' => $this->ModelSekolah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }
}
