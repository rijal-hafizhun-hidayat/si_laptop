<?php

namespace App\Models;

use CodeIgniter\Model;

class model_supplier extends Model
{
    function __construct()
    {
        $this->database = db_connect();
    }

    function show()
    {
        return $this->database->table('laptop')->get();
    }

    function tambah_stok($data, $id)
    {
        return $this->database->table('laptop')->update($data, ['id_laptop' => $id]);
    }

    function destroy($id)
    {
        return $this->database->table('laptop')->delete(['id_laptop' => $id]);
    }

    function edit_laptop($id)
    {
        return $this->database->table('laptop')->getWhere(['id_laptop' => $id]);
    }

    function simpan_edit($data, $id)
    {
        return $this->database->table('laptop')->update($data, ['id_laptop' => $id]);
    }

    function simpan($data)
    {
        return $this->database->table('laptop')->insert($data);
    }
}
