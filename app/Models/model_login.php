<?php

namespace App\Models;

use CodeIgniter\Model;

class model_login extends Model
{
    function __construct()
    {
        $this->database = db_connect();
    }

    function masuk($user, $pass)
    {
        return $this->database->table('akun')->getWhere(array('username' => $user, 'password' => $pass));
    }
}
