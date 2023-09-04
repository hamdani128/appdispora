<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class Pelatih2Controller extends BaseController
{
    private $db;
    private $users;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->db = Config::connect();
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $this->users = $userModel->find($loggedUserID);
    }
    public function index()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $indikator = $this->db->table('indikator_teknik')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
        $atlet = $this->db->table('atlet')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        // $kategori_inidikator = $this->db->table('kategori_indikator_teknik')->get()->getResultObject();
        $data = [
            'title' => 'Indikator Teknik - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Indikator Teknik',
            'indikator' => $indikator,
            'atlet' => $atlet,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/indikator_teknik', $data);
    }

    public function save_teknik()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y');
        $indikator = $this->request->getPost('indikator');
        $benchmark = $this->request->getPost('benchmark');
        $jk = $this->request->getPost('jk');
        $kategori = $this->request->getPost('kategori');
        $periode = $this->request->getPost('periode');

        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'indikator' => $indikator,
            'benchmark' => $benchmark,
            'cabor' => $UserInfo['departemen'],
            'jenis_kelamin' => $jk,
            'kategori' => $kategori,
            'periode' => $periode,
            'user_id' => $UserInfo['id'],
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $query = $this->db->table('indikator_teknik')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Validasi',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Validasi',
            ];
        }
        return json_encode($response);
    }

    public function detail_show_teknik()
    {
        $id = $this->request->getPost('id');
        $indikator = $this->db->table('indikator_teknik')->where('id', $id)->get()->getRowObject();
        $data[0] = $indikator->indikator;
        $data[1] = $indikator->benchmark;
        $data[2] = $indikator->jenis_kelamin;
        $data[3] = $indikator->kategori;
        $data[4] = $indikator->periode;
        return json_encode($data);
    }

    public function update_teknik()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id');
        $indikator = $this->request->getPost('indikator');
        $benchmark = $this->request->getPost('benchmark');
        $jk = $this->request->getPost('jk');
        $kategori = $this->request->getPost('kategori');
        $periode = $this->request->getPost('periode');
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'indikator' => $indikator,
            'benchmark' => $benchmark,
            'jenis_kelamin' => $jk,
            'kategori' => $kategori,
            'periode' => $periode,
            'cabor' => $UserInfo['departemen'],
            'user_id' => $UserInfo['id'],
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $query = $this->db->table('indikator_teknik')->where('id', $id)->update($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Validasi',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Validasi',
            ];
        }
        return json_encode($response);
    }

    public function delete_teknik()
    {
        $id = $this->request->getPost('id');
        $query = $this->db->table('indikator_teknik')->delete(['id' => $id]);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Hapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Hapus',
            ];
        }
        return json_encode($response);
    }

    public function data_kategori()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $query = $this->db->table('kategori_indikator_teknik')->where('cabor', $UserInfo['departemen'])->get()->getResult();
        return $this->response->setStatusCode(200)->setJSON($query);
    }

    public function insert_kategori_teknik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        $json = $this->request->getBody();
        $input = json_decode($json, true);
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $kategori = $input['kategori'];
        $cabor = $UserInfo['departemen'];
        $user_id = $UserInfo['id'];

        $data = [
            'kategori' => $kategori,
            'cabor' => $cabor,
            'user_id' => $user_id,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $query = $this->db->table('kategori_indikator_teknik')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Successfully created',
            ];
        }
        return $this->response->setStatusCode(200)->setJSON($response);
    }

    public function delete_kategori_teknik()
    {
        $json = $this->request->getBody();
        $input = json_decode($json, true);
        $id = $input['id'];
        $query = $this->db->table("kategori_indikator_teknik")->where('id', $id)->delete();
        if ($query) {
            return $this->response->setStatusCode(200)->setJSON($query);
        }
    }

    // Data Fisik

    public function view_fisik()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $indikator = $this->db->table('indikator_fisik')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Indikator Fisik - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Indikator Fisik',
            'indikator' => $indikator,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/indikator_fisik', $data);
    }

    public function save_fisik()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y');
        $komponen_fisik = $this->request->getPost('komponen_fisik');
        $metode_pengukuran = $this->request->getPost('metode_pengukuran');
        $benchmark = $this->request->getPost('benchmark');
        $jk = $this->request->getPost('jk');
        $kategori = $this->request->getPost('kategori');
        $periode = $this->request->getPost('periode');

        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $data = [
            'komponen_fisik' => $komponen_fisik,
            'metode_pengukuran' => $metode_pengukuran,
            'benchmark' => $benchmark,
            'cabor' => $UserInfo['departemen'],
            'jenis_kelamin' => $jk,
            'kategori' => $kategori,
            'periode' => $periode,
            'user_id' => $UserInfo['id'],
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $query = $this->db->table('indikator_fisik')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Validasi',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Validasi',
            ];
        }
        return json_encode($response);
    }

    public function show_detail_fisik()
    {
        $id = $this->request->getPost('id');
        $indikator = $this->db->table('indikator_fisik')->where('id', $id)->get()->getRowObject();
        $data[0] = $indikator->komponen_fisik;
        $data[1] = $indikator->metode_pengukuran;
        $data[2] = $indikator->benchmark;
        $data[3] = $indikator->jenis_kelamin;
        $data[4] = $indikator->kategori;
        $data[5] = $indikator->periode;
        return json_encode($data);
    }

    public function update_fisik()
    {

        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $id = $this->request->getPost('id_update');
        $komponen_fisik = $this->request->getPost('komponen_fisik_update');
        $metode_pengukuran = $this->request->getPost('metode_pengukuran_update');
        $benchmark = $this->request->getPost('benchmark_update');
        $jk = $this->request->getPost('cmb_jk_update');
        $kategori = $this->request->getPost('kategori_update');
        $periode = $this->request->getPost('periode_fisik_update');
        $data = [
            'komponen_fisik' => $komponen_fisik,
            'metode_pengukuran' => $metode_pengukuran,
            'benchmark' => $benchmark,
            'jenis_kelamin' => $jk,
            'kategori' => $kategori,
            'periode' => $periode,
            'cabor' => $this->users['departemen'],
            'user_id' => $this->users['id'],
            'updated_at' => $now,
        ];
        // var_dump($data);
        $query = $this->db->table('indikator_fisik')->where('id', $id)->update($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Validasi',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Validasi',
            ];
        }
        return $this->response->setJSON($response);
    }

    public function delete_fisik()
    {
        $id = $this->request->getPost('id');
        $query = $this->db->table('indikator_fisik')->where('id', $id)->delete();
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data Berhasil Di Hapus !',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data Gagal Di Hapus !',
            ];
        }
        return json_encode($response);
    }


    public function kategori_fisik()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $query = $this->db->table('kategori_indikator_fisik')->where('cabor', $UserInfo['departemen'])->get()->getResult();
        return $this->response->setStatusCode(200)->setJSON($query);
    }

    public function insert_kategori_fisik()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        $json = $this->request->getBody();
        $input = json_decode($json, true);
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $kategori = $input['kategori'];
        $cabor = $UserInfo['departemen'];
        $user_id = $UserInfo['id'];

        $data = [
            'kategori' => $kategori,
            'cabor' => $cabor,
            'user_id' => $user_id,
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $query = $this->db->table('kategori_indikator_fisik')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Successfully created',
            ];
        }
        return $this->response->setStatusCode(200)->setJSON($response);
    }

    public function delete_kategori_fisik()
    {
        $json = $this->request->getBody();
        $input = json_decode($json, true);
        $id = $input['id'];
        $query = $this->db->table("kategori_indikator_fisik")->where('id', $id)->delete();
        if ($query) {
            return $this->response->setStatusCode(200)->setJSON($query);
        }
    }
}
