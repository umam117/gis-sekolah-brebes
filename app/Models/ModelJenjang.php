<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenjang extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_jenjang')
            ->get()->getResultArray();
    }

    public function updateMarker($id, $data)
    {
        return $this->db->table('tbl_jenjang')
            ->where('id_jenjang', $id)
            ->update($data);
    }
}
