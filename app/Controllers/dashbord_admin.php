<?php

namespace App\Controllers;

use App\Models\model_admin;
use TCPDF;

class dashbord_admin extends BaseController
{
    public function __construct()
    {
        $this->admin = new model_admin();
    }
    public function cari()
    {
        $cari = $this->request->getPost('cari');
        $data = [
            'tampil_data' => $this->admin->look($cari)->getResult()
        ];
        return view('admin/index', $data);
    }
    public function index()
    {
        $data = [
            'tampil_data' => $this->admin->show_transaksi()->getResult()
        ];
        return view('admin/index', $data);
    }

    public function add()
    {
        $data = [
            'tampil_data' => $this->admin->show_laptop()->getResult()
        ];
        return view('admin/tambah', $data);
    }

    public function simpan()
    {
        $check = $this->request->getPost('submit');
        if ($check == true) {

            $result =  $this->request->getPost('barang');
            $result_explode = explode('|', $result);

            $data = [
                "nama_pembeli" => $this->request->getPost('nama'),
                "asal_pembeli" => $this->request->getPost('asal'),
                "id_barang" => $result_explode[0],
                "tgl_transaksi" => date('d F Y'),
                "jumlah_beli" => $this->request->getPost('jumlah'),
                "total" => $this->request->getPost('jumlah') * $result_explode[1]

            ];
            $simpan = $this->admin->tambah($data);

            $data2 = [
                "stok" => $result_explode[2] - $this->request->getPost('jumlah')
            ];

            $kurangin = $this->admin->ubah_stok($data2, $result_explode[0]);


            if ($simpan == true && $kurangin == true) {
                return redirect()->to(base_url('dashbord_admin/index'));
            } else {
                echo "gagal";
            }
        }
    }

    public function edit()
    {
        $uri = service('uri');
        $id_transaksi = $uri->getSegment('3');
        $edit = $this->admin->edit_data($id_transaksi);

        if (count($edit->getResult()) > 0) {
            $row = $edit->getRow();
            $data = [
                'id' => $row->id_transaksi,
                'nama' => $row->nama_pembeli,
                'asal' => $row->asal_pembeli,
                'tgl' => $row->tgl_transaksi,
                'barang' => $this->admin->show_laptop()->getResult(),
                'jumlah' => $row->jumlah_beli
            ];

            return view('admin/edit', $data);
        }
    }

    public function hapus()
    {
        $uri = service('uri');
        $id_transaksi = $uri->getSegment('3');
        $delete = $this->admin->destroy($id_transaksi);

        if ($delete == true) {
            session()->setFlashdata('pesan_hapus', 'data berhasil di hapus');
            return redirect()->to(base_url('dashbord_admin/index'));
        }
    }

    public function simpan_edit()
    {
        $uri = service('uri');
        $id_transaksi = $uri->getSegment('3');

        $result =  $this->request->getPost('barang');
        $result_explode = explode('|', $result);

        $button = $this->request->getPost('submit');

        if (isset($button)) {
            $data2 = [
                "nama_pembeli" => $this->request->getPost('nama'),
                "asal_pembeli" => $this->request->getPost('asal'),
                "id_barang" => $result_explode[0],
                "tgl_transaksi" => date('d F Y'),
                "jumlah_beli" => $this->request->getPost('jumlah'),
                "total" => $this->request->getPost('jumlah') * $result_explode[1]
            ];
            $edit = $this->admin->edit_data($id_transaksi);
            if (count($edit->getResult()) > 0) {
                $row = $edit->getRow();
                $jumlah = $this->request->getPost('jumlah');
                if ($row->jumlah_beli > $jumlah) {
                    $total = $row->jumlah_beli - $jumlah;
                    $data = [
                        "stok" => $result_explode[2] + $total
                    ];
                } else {
                    $total = $jumlah - $row->jumlah_beli;
                    $data = [
                        "stok" => $result_explode[2] - $total
                    ];
                }
            }
        }

        $change = $this->admin->ubah_stok($data, $result_explode[0]);
        $simpan = $this->admin->save_edit($data2, $id_transaksi);

        // var_dump($data2);
        // var_dump($simpan);
        if ($simpan == true && $change == true) {
            session()->setFlashdata('pesan_edit', 'data berhasil di edit');
            return redirect()->to(base_url('dashbord_admin/index'));
        }
    }

    public function print()
    {
        $data = [
            "tampil_data" => $this->admin->show_transaksi()->getResult()
        ];

        $html = view('admin/print', $data);

        $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Rijal Haifizhun Hidayat');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        //line ini penting
        $this->response->setContentType('application/pdf');
        //Close and output PDF document
        $pdf->Output('invoice.pdf', 'I');
    }
}
