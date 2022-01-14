<?php

namespace App\Models;

use CodeIgniter\Model;

class model_admin extends Model
{
    function __construct()
    {
        $this->database = db_connect();
    }

    function show_transaksi()
    {
        $builder = $this->database->table('transaksi');
        $builder->select('*');
        $builder->join('laptop', 'laptop.id_laptop = transaksi.id_barang');
        $query = $builder->get();
        // $this->database->select('*');
        // $this->database->from('transaksi');
        // $this->database->join('laptop', 'laptop.id_barang = transaksi.id_barang');

        return $query;
    }

    function show_laptop()
    {
        return $this->database->table('laptop')->get();
    }

    function tambah($data)
    {
        return $this->database->table('transaksi')->insert($data);
    }

    function ubah_stok($data, $id)
    {
        return $this->database->table('laptop')->update($data, ['id_laptop' => $id]);
    }

    function destroy($id)
    {
        return $this->database->table('transaksi')->delete(['id_transaksi' => $id]);
    }

    function edit_stok($id)
    {
        return $this->database->table('laptop')->getWhere(['id_laptop' => $id]);
    }
    function edit_data($id)
    {
        return $this->database->table('transaksi')->getWhere(['id_transaksi' => $id]);
    }

    function look($data)
    {
        $builder = $this->database->table('transaksi');
        $builder->select('*');
        $builder->join('laptop', 'laptop.id_laptop = transaksi.id_barang');
        $builder->like('nama_pembeli', $data);
        $query = $builder->get();
        return $query;
    }

    function save_edit($data, $id)
    {
        return $this->database->table('transaksi')->update($data, ['id_transaksi' => $id]);
    }
}
