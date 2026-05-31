<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_wilayah')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        // Diubah menjadi ->db->table
        $this->db->table('tbl_wilayah')->insert($data);
    }

    public function DetailData($id_wilayah)
    { // Diperbaiki: Menambahkan kurung kurawal buka yang hilang
        return $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $id_wilayah)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        // Diperbaiki: Mengubah id_sekolah menjadi id_wilayah
        $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $data['id_wilayah'])
            ->update($data);
    }

    public function DeleteData($data) 
    {
        // Diperbaiki: Mengubah id_sekolah menjadi id_wilayah
        $this->db->table('tbl_wilayah')
            ->where('id_wilayah', $data['id_wilayah'])
            ->delete($data);
    }
}
