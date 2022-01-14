<?php

namespace App\Controllers;

use App\Models\model_super;

class dashbord_super extends BaseController
{
    public function __construct()
    {
        $this->super = new model_super();
    }

    public function index()
    {
        $data = [
            'tampil_data' => $this->super->show_akun()->getResult()
        ];

        return view('super/index', $data);
    }

    public function hapus()
    {
        $uri = service('uri');
        $id_laptop = $uri->getSegment('3');
        $delete = $this->super->destroy($id_laptop);

        if ($delete == true) {
            session()->setFlashdata('pesan_hapus', true);
            return redirect()->to(base_url('dashbord_super/index'));
        }
    }

    public function add()
    {
        return view('super/add');
    }

    public function simpan()
    {
        $tombol = $this->request->getPost('submit');
        if (isset($tombol)) {
            $data = [
                "username" => $this->request->getPost('user'),
                "password" => $this->request->getPost('pass'),
                "level" => $this->request->getPost('role'),
            ];
        }

        $simpan = $this->super->add($data);

        if ($simpan == true) {
            session()->setFlashdata('pesan_add', true);
            return redirect()->to(base_url('dashbord_super/index'));
        }
    }

    public function edit_akun()
    {
        $uri = service('uri');
        $id_akun = $uri->getSegment('3');

        $edit = $this->super->change($id_akun);

        if (count($edit->getResult()) > 0) {
            $row = $edit->getRow();
            $data = [
                'id' => $row->id_akun,
                'user' => $row->username,
                'pass' => $row->password,
            ];
        }

        return view('super/edit', $data);
    }

    public function simpan_edit()
    {
        $uri = service('uri');
        $id_akun = $uri->getSegment('3');

        $tombol = $this->request->getPost('submit');

        if (isset($tombol)) {
            $data = [
                "username" => $this->request->getPost('user'),
                "password" => $this->request->getPost('pass'),
                "level" => $this->request->getPost('role'),
            ];
        }

        $simpan = $this->super->save_change($data, $id_akun);

        if ($simpan == true) {
            session()->setFlashdata('simpan_edit', true);
            return redirect()->to(base_url('dashbord_super/index'));
        }
    }
}
