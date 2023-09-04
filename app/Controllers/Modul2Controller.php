<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;
use Config\Database;

class Modul2Controller extends BaseController
{
    public function index()
    {
        $db = Config::connect();
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $cabor = $db->table('cabor')->get()->getResultObject();
        $list_cabor =  $db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Cabang Olahraga - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Cabang Olahraga',
            'cabor' => $cabor,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/cabor', $data);
    }

    public function save()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $cabor = $this->request->getPost('cabor');
        $db = Database::connect();
        $data = [
            'nama_cabang' => $cabor,
            'created_at' => $now,
        ];
        $query = $db->table('cabor')->insert($data);
        if ($query) {
            $respon = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ];
        } else {
            $respon = [
                'status' => 'failed',
                'message' => 'Gagal Simpan Data !',
            ];
        }
        return json_encode($respon);
    }


    public function detail_show_cabor()
    {
        $id = $_GET['id'];
        $db = Database::connect();
        $cabor = $db->table('cabor')->where('id', $id)->get()->getRowObject();
        $data[0] = $cabor->nama_cabang;
        return json_encode($data);
    }

    public function update()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id');
        $cabang = $this->request->getPost('cabang');
        $db = Database::connect();
        $data = [
            'nama_cabang' => $cabang,
            'created_at' => $now,
        ];
        $query = $db->table('cabor')->where('id', $id)->update($data);
        if ($query) {
            $respon = [
                'status' => 'success',
                'message' => 'Data berhasil diupdate',
            ];
        } else {
            $respon = [
                'status' => 'failed',
                'message' => 'Gagal Update Data !',
            ];
        }
        return json_encode($respon);
    }

    public function delete()
    {
        $id = $_POST['id'];
        $db = Database::connect();
        $query = $db->table('cabor')->where('id', $id)->delete();
        if ($query) {
            $respon = [
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ];
        } else {
            $respon = [
                'status' => 'failed',
                'message' => 'Gagal Hapus Data !',
            ];
        }
        return json_encode($respon);
    }

}