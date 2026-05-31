<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    protected $table = 'tbl_sekolah'; 
    protected $primaryKey = 'id_sekolah';

    public function AllData()
    {
        return $this->db->table($this->table)
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table($this->table)->insert($data);
    }

    public function DetailData($id_sekolah)
    {
        return $this->db->table($this->table)
            ->where('id_sekolah', $id_sekolah)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table($this->table)
            ->where('id_sekolah', $data['id_sekolah'])
            ->update($data);
    }

    public function DeleteData($data) 
    {
        $this->db->table($this->table)
            ->where('id_sekolah', $data['id_sekolah'])
            ->delete($data);
    }
}
