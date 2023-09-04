<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class PerformansiController extends BaseController
{
    private $db;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->db = Config::connect();
    }
    public function index($id)
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $cabor = $this->db->table('cabor')->where('id', $id)->get()->getRowObject();
        $sql_teknik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_teknik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $cabor->nama_cabang . "'
                        GROUP BY 1,2,3,4,5";
        $sql_fisik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_fisik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $cabor->nama_cabang . "'
                        GROUP BY 1,2,3,4,5";

        $perfomansi_teknik = $this->db->query($sql_teknik)->getResultObject();
        $perfomansi_fisik = $this->db->query($sql_fisik)->getResultObject();
        $data = [
            'title' => 'Performansi - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Performansi ' . $cabor->nama_cabang,
            'list_cabor' => $list_cabor,
            'cabor' => $cabor,
            'perfomansi_teknik' => $perfomansi_teknik,
            'perfomansi_fisik' => $perfomansi_fisik,
        ];
        return view('pages/performansi', $data);
    }
}