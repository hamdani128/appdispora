<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class InfoUsersController extends BaseController
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
        $atlet = $this->db->table('users')->where('level', 'atlet')->get()->getResultObject();
        $pelatih = $this->db->table('users')->where('level', 'pelatih')->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Users Info - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Users Info',
            'atlet' => $atlet,
            'pelatih' => $pelatih,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/user_info', $data);
    }
}