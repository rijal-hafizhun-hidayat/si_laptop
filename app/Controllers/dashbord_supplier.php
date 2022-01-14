<?php

namespace App\Controllers;

use App\Models\model_supplier;

class dashbord_supplier extends BaseController
{
    public function __construct()
    {
        $this->supplier = new model_supplier();
    }

    public function index()
    {
        $data = [
            "tampil_data" => $this->supplier->show()->getResult()
        ];
        return view("supplier/index", $data);
    }

    public function add()
    {
        return view("supplier/tambah");
    }

    public function simpan()
    {
        $tombol = $this->request->getPost('masuk');
        if (isset($tombol)) {
            $data = [
                "nama_laptop" => $this->request->getPost('nama_laptop'),
                "merek" => $this->request->getPost('merek'),
                "stok" => $this->request->getPost('jumlah_stok'),
                "harga" => $this->request->getPost('harga')
            ];
        }

        $simpan = $this->supplier->simpan($data);

        if ($simpan == true) {
            session()->setFlashdata('pesan_tambah', true);
            return redirect()->to(base_url('dashbord_supplier/index'));
        }
    }

    public function re_supply()
    {
        $data = [
            "tampil_data" => $this->supplier->show()->getResult()
        ];
        return view("supplier/tambah_stok", $data);
    }

    public function update_stok()
    {
        $result =  $this->request->getPost('id_laptop');
        $result_explode = explode('|', $result);

        $id_laptop = $result_explode[0];
        $tombol = $this->request->getPost('masuk');
        if (isset($tombol)) {
            $data = [
                "stok" => $this->request->getPost('jumlah_stok') + $result_explode[2]
            ];
        }

        $ubah = $this->supplier->tambah_stok($data, $id_laptop);

        if ($ubah == true) {
            session()->setFlashdata('pesan', true);
            return redirect()->to(base_url('dashbord_supplier/index'));
        }
    }

    public function hapus()
    {
        $uri = service('uri');
        $id_laptop = $uri->getSegment('3');
        $delete = $this->supplier->destroy($id_laptop);

        if ($delete == true) {
            session()->setFlashdata('pesan_hapus', true);
            return redirect()->to(base_url('dashbord_supplier/index'));
        }
    }

    public function edit()
    {
        $uri = service('uri');
        $id_laptop = $uri->getSegment('3');
        $edit = $this->supplier->edit_laptop($id_laptop);

        if (count($edit->getResult()) > 0) {
            $row = $edit->getRow();
            $data = [
                'id' => $row->id_laptop,
                'nama' => $row->nama_laptop,
                'merek' => $row->merek,
                'stok' => $row->stok,
                'harga' => $row->harga
            ];

            return view('supplier/edit', $data);
        }
    }

    public function update()
    {
        $uri = service('uri');
        $id_laptop = $uri->getSegment('3');

        $tombol = $this->request->getPost('masuk');

        if ($tombol == true) {
            $data = [
                "nama_laptop" => $this->request->getPost('nama_laptop'),
                "merek" => $this->request->getPost('merek'),
                "stok" => $this->request->getPost('jumlah_stok'),
                "harga" => $this->request->getPost('harga')
            ];
        }

        $simpan = $this->supplier->simpan_edit($data, $id_laptop);

        if ($simpan == true) {
            session()->setFlashdata('pesan_edit', true);
            return redirect()->to(base_url('dashbord_supplier/index'));
        }
    }
}
