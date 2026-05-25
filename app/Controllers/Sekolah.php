<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Sekolah extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Sekolah',
            'menu'  => 'sekolah',
            'page'  => 'Sekolah/v_index',
        ];
        return view('v_template_back_end', $data); 
    }
}
