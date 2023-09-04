<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Database;

class AlumniController extends BaseController
{

    private $__db;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->db = Database::connect();
    }

    public function index()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $alumni = $this->db->table('alumni_atlet')->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->orderBy('id', 'ASC')->get()->getResultObject();
        $data = [
            'title' => 'Alumni Atlet - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Data Alumni Atlet',
            'alumni' => $alumni,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/alumni_atlet', $data);
    }

    public function save()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id');
        $value = $this->db->table('atlet')->where('id', $id)->get()->getRowObject();
        $data1 = [
            'no_atlet' => $value->no_atlet,
            'nik' => $value->nik,
            'nama' => $value->nama,
            'sekolah' => $value->sekolah,
            'kelas' => $value->kelas,
            'asal' => $value->asal,
            'jenis_kelamin' => $value->jenis_kelamin,
            'agama' => $value->agama,
            'tempat_lahir' => $value->tempat_lahir,
            'tanggal_lahir' => $value->tanggal_lahir,
            'hp' => $value->hp,
            'golongan' => $value->golongan,
            'identitas' => $value->identitas,
            'orang_tua' => $value->orang_tua,
            'pekerjaan' => $value->pekerjaan,
            'cabor' => $value->cabor,
            'tahun' => $value->tahun,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $query1 = $this->db->table('alumni_atlet')->insert($data1);
        $query2 = $this->db->table('atlet')->where('id', $id)->delete();
        if ($query1 && $query2) {
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

}