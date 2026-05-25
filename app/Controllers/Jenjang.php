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
}
