<?php

namespace App\Models;

use CodeIgniter\Model;

class model_super extends Model
{
    public function __construct()
    {
        $this->database = db_connect();
    }
    function show_akun()
    {
        return $this->database->table('akun')->get();
    }

    function destroy($id)
    {
        return $this->database->table('akun')->delete(['id_akun' => $id]);
    }

    function add($data)
    {
        return $this->database->table('akun')->insert($data);
    }

    function change($id)
    {
        return $this->database->table('akun')->getWhere(['id_akun' => $id]);
    }

    function save_change($data, $id)
    {
        return $this->database->table('akun')->update($data, ['id_akun' => $id]);
    }
}
