<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class Atlet1Controller extends BaseController
{
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
        $sql_teknik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_teknik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $UserInfo['departemen'] . "' AND a.atlet_id='" . $UserInfo['username'] . "' 
                        GROUP BY 1,2,3,4,5";

        $perfom = $this->db->query($sql_teknik)->getResultObject();
        $data = [
            'title' => 'Home - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Hasil Tes Teknik',
            'perfom' => $perfom,    
        ];
        return view('pages/atlet_hasil_teknik', $data);
    }

    public function view_fisik()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $sql_fisik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_fisik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $UserInfo['departemen'] . "' AND a.atlet_id='" . $UserInfo['username'] . "'
                        GROUP BY 1,2,3,4,5";
        $perfom = $this->db->query($sql_fisik)->getResultObject();
        $data = [
            'title' => 'Home - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Hasil Tes Fisik',
            'perfom' => $perfom,
        ];
        return view('pages/atlet_hasil_fisik', $data);
    }
}