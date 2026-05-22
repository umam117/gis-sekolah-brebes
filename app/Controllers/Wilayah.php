<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;

class Wilayah extends BaseController
{
    protected $ModelWilayah;

    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
    }

    public function index()
    {
        $data = [
            'judul'   => 'Wilayah',
            'page'    => 'wilayah/v_index',
            'wilayah' => $this->ModelWilayah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function input()
    {
        $data = [
            'judul' => 'Input Data Wilayah',
            'page'  => 'wilayah/v_input',
        ];
        return view('v_template_back_end', $data);
    }

    public function simpan()
    {
        if (!$this->validate([
            'nama_wilayah' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama Wilayah Wajib Diisi !!']
            ],
            'warna' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Warna Wajib Diisi !!']
            ],
            'geojson' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Data GeoJSON Wajib Diisi !!']
            ],
        ])) {
            return redirect()->to(base_url('Wilayah/Input'))->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $data = [
            'nama_wilayah' => $this->request->getPost('nama_wilayah'),
            'warna'        => $this->request->getPost('warna'),
            'geojson'      => $this->request->getPost('geojson'),
        ];
        $db->table('tbl_wilayah')->insert($data);

        return redirect()->to(base_url('Wilayah'))->with('sukses_tambah', 'Wilayah berhasil ditambahkan');
    }

    public function edit($id_wilayah)
    {
        $db = \Config\Database::connect();
        $wilayah = $db->table('tbl_wilayah')->where('id_wilayah', $id_wilayah)->get()->getRowArray();

        $data = [
            'judul'   => 'Edit Data Wilayah',
            'page'    => 'wilayah/v_edit',
            'wilayah' => $wilayah,
        ];
        return view('v_template_back_end', $data);
    }

    public function update($id_wilayah)
    {
        if (!$this->validate([
            'nama_wilayah' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Nama Wilayah Wajib Diisi !!']
            ],
            'warna' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Warna Wajib Diisi !!']
            ],
            'geojson' => [
                'rules'  => 'required',
                'errors' => ['required' => 'Data GeoJSON Wajib Diisi !!']
            ],
        ])) {
            return redirect()->to(base_url('Wilayah/Edit/' . $id_wilayah))->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $data = [
            'nama_wilayah' => $this->request->getPost('nama_wilayah'),
            'warna'        => $this->request->getPost('warna'),
            'geojson'      => $this->request->getPost('geojson'),
        ];
        $db->table('tbl_wilayah')->where('id_wilayah', $id_wilayah)->update($data);

        return redirect()->to(base_url('Wilayah'))->with('sukses_edit', 'Wilayah berhasil diupdate');
    }

    public function delete($id_wilayah)
    {
        $db = \Config\Database::connect();
        $db->table('tbl_wilayah')->where('id_wilayah', $id_wilayah)->delete();

        return redirect()->to(base_url('Wilayah'))->with('sukses_hapus', 'Wilayah berhasil dihapus');
    }
}
