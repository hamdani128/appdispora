<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class Modul3Controller extends BaseController
{
    private $db;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->db = Config::connect();
    }

    public function index()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $atlet = $this->db->table('atlet')->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->orderBy('id','ASC')->get()->getResultObject();
        $data = [
            'title' => 'Atlet - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Data Atlet',
            'atlet' => $atlet,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/data_atlet', $data);
    }

    public function detail_show_update_atlet()
    {   
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id');
        $query = $this->db->table('atlet')->where('id', $id)->get()->getRowObject();
        $data[0] = $query->nik;
        $data[1] = $query->nama;
        $data[2] = $query->sekolah;
        $data[3] = $query->kelas;
        $data[4] = $query->asal;
        $data[5] = $query->jenis_kelamin;
        $data[6] = $query->agama;
        $data[7] = $query->tempat_lahir;
        $data[8] = $query->tanggal_lahir;
        $data[9] = $query->hp;
        $data[10] = $query->golongan;
        $data[11] = $query->identitas;
        $data[12] = $query->orang_tua;
        $data[13] = $query->pekerjaan;
        $data[14] = $query->cabor;
        $data[15] = $query->tahun;
        return json_encode($data);
    }

    public function update_atlet()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id_update');
        $id_atlet = $this->request->getPost('id_atlet');
        $nik = $this->request->getPost('nik');
        $nama = $this->request->getPost('nama');
        $sekolah = $this->request->getPost('sekolah');
        $kelas = $this->request->getPost('kelas');
        $asal = $this->request->getPost('asal');
        $jenis_kelamin = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $hp = $this->request->getPost('hp');
        $golongan = $this->request->getPost('golongan');
        $identitas = $this->request->getPost('identitas');
        $orang_tua = $this->request->getPost('nama_orang_tua');
        $pekerjaan = $this->request->getPost('pekerjaan_orang_tua');
        $cabor = $this->request->getPost('cabor');
        $tahun = $this->request->getPost('tahun_pengangkatan');

        $data = [
            'no_atlet' => $id_atlet,
            'nik' => $nik,
            'nama' => $nama,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'asal' => $asal,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'hp' => $hp,
            'golongan' => $golongan,
            'identitas' => $identitas,
            'orang_tua' => $orang_tua,
            'pekerjaan' => $pekerjaan,
            'cabor' => $cabor,
            'tahun' => $tahun,
        ];

        $query = $this->db->table('atlet')->where('id', $id)->update($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil diupdate',
            ];
        }else{
            $response = [
                'status' => 'error',
                'message' => 'Data gagal diupdate',
            ];
        }
        return json_encode($response);
    }

    public function no_pelatih($kode)
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $sql = "SELECT MAX(RIGHT(no_pelatih,5)) as KD_MAX FROM pelatih";
        $query = $this->db->query($sql);
        if ($query->getNumRows() > 0) {
            $row = $query->getRow();
            $n = ((int) $row->KD_MAX) + 1;
            $no = sprintf("%05s", $n);
        } else {
            $no = "00001";
        }
        $kode = $kode . date('Ym') . $no;
        return $kode;
    }

    public function pelatih()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $pelatih = $this->db->table('pelatih')->get()->getResultObject();
        $cabor = $this->db->table('cabor')->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Pelatih - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Data Pelatih',
            'pelatih' => $pelatih,
            'cabor' => $cabor,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/data_pelatih', $data);
    }

    public function save_pelatih()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $nama = $this->request->getPost('nama');
        $jk = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $usia = $this->request->getPost('usia');
        $hp = $this->request->getPost('hp');
        $cabor = $this->request->getPost('cabor');
        $jenis_pelatih = $this->request->getPost('jenis_pelatih');

        if($jenis_pelatih == 'Teknik'){
            $kode_pelatih = 'PTK';
        }else{
            $kode_pelatih = 'PSC';
        }

        $data = [
            'no_pelatih' => $this->no_pelatih($kode_pelatih),
            'nama' => $nama,
            'jenis_kelamin' => $jk,
            'agama' => $agama,
            'usia' => $usia,
            'hp' => $hp,
            'cabor' => $cabor,
            'jenis_pelatih' => $jenis_pelatih,
            'status' => 'nonactive',
            'image' => 'default.png',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $query = $this->db->table('pelatih')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Disimpan',
            ];
        }
        return json_encode($response);
    }

    public function validasi_pelatih()
    {
        date_default_timezone_set('Asia/jakarta');
        $now = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $pelatih = $this->db->table('pelatih')->where('id', $id)->get()->getRowObject();
        $pass = md5('admin');
        $data1 = [
            'username' => $pelatih->no_pelatih,
            'fullname' => $pelatih->nama,
            'departemen' => $pelatih->cabor,
            'sub' => $pelatih->jenis_pelatih,
            'jk' => $pelatih->jenis_kelamin,
            'level' => 'pelatih',
            'password' => $pass,
            'image' => 'Default.png',
            'status' => 'active',
            'created_at' => $now,
        ];
        $data2 = [
            'status' => 'active',
            'updated_at' => $now,
        ];

        $query1 = $this->db->table('users')->insert($data1);
        $query2 = $this->db->table('pelatih')->where('id', $id)->update($data2);

        if ($query1 && $query2) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Disimpan',
            ];
        }
        return json_encode($response);
    }

    public function detail_show_pelatih()
    {
        $id = $_POST['id'];
        $pelatih = $this->db->table('pelatih')->where('id', $id)->get()->getRowObject();
        $data[0] = $pelatih->no_pelatih;
        $data[1] = $pelatih->nama;
        $data[2] = $pelatih->jenis_kelamin;
        $data[3] = $pelatih->agama;
        $data[4] = $pelatih->usia;
        $data[5] = $pelatih->hp;
        $data[6] = $pelatih->cabor;
        $data[7] = $pelatih->jenis_pelatih;
        return json_encode($data);
    }

    public function update_pelatih()
    {
        date_default_timezone_set('Asia/jakarta');
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id');
        $id_pelatih  = $this->request->getPost('id_pelatih');
        $nama = $this->request->getPost('nama_lengkap');
        $jk = $this->request->getPost('jenis_kelamin');
        $agama = $this->request->getPost('agama');
        $usia = $this->request->getPost('usia');
        $hp = $this->request->getPost('hp');
        $cabor = $this->request->getPost('cabor');
        $jenis_pelatih = $this->request->getPost('jenis_pelatih');
        
        if($jenis_pelatih == 'Teknik'){
            $kode_pelatih = 'PTK';
        }else{
            $kode_pelatih = 'PSC';
        }
        $numerik = substr($id_pelatih,3);
        $no_pelatih = $kode_pelatih.$numerik;

        $data = [
            'no_pelatih' => $no_pelatih,
            'nama' => $nama,
            'jenis_kelamin' => $jk,
            'agama' => $agama,
            'usia' => $usia,
            'hp' => $hp,
            'cabor' => $cabor,
            'jenis_pelatih' => $jenis_pelatih,
            'updated_at' => $now,
        ];
        
        $query = $this->db->table('pelatih')->where('id', $id)->update($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Disimpan',
            ];
        }
        return json_encode($response);
    }

    public function delete_pelatih()
    {
        date_default_timezone_set('Asia/jakarta');
        $now = date('Y-m-d H:i:s');
        $id = $_POST['id'];
        $query = $this->db->table('pelatih')->where('id', $id)->delete();
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Disimpan',
            ];
        }
        return json_encode($response);
    }


}