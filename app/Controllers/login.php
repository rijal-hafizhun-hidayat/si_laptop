<?php

namespace App\Controllers;

use App\Models\model_login;

class login extends BaseController
{
    public function proses_login()
    {
        $login = new model_login();
        $username = $this->request->getpost('user');
        $password = $this->request->getpost('pass');
        $masuk = $login->masuk($username, $password);
        if (count($masuk->getResult()) > 0) {
            $row = $masuk->getRow();
            $db_user = $row->username;
            $db_pass = $row->password;
            $db_level = $row->level;
            if ($db_user === $username && $db_pass === $password) {
                session()->set('log', true);
                session()->set('user', $db_user);
                session()->set('level', $db_level);
                session()->setFlashdata('user', $db_user);
                if ($db_level == "admin") {
                    return redirect()->to(base_url('dashbord_admin/index'));
                } else if ($db_level == "supplier") {
                    return redirect()->to(base_url('dashbord_supplier/index'));
                } else if ($db_level == "super") {
                    return redirect()->to(base_url('dashbord_super/index'));
                }
            }
        } else {
            session()->setFlashdata('gagal_masuk', 'gagal masuk');
            return redirect()->to(base_url('Home/index'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Home/index'));
    }
}
