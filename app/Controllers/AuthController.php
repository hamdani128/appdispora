<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class AuthController extends BaseController
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
        $data = [
            'title' => 'Login - App Dispora',
        ];
        return view('auth/login', $data);
    }

    public function check_login()
    {
        helper(['url', 'form']);
        $validation = $this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Diisi username Anda !',
                    // 'is_not_unique' => 'Username Anda Belom Terrigistrasi !',
                ],
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Wajib Mengisi Password !',
                ],
            ],
        ]);

        if (!$validation) {
            return view('auth/login', ['validation' => $this->validator]);
        } else {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $UserModel = new UserModel();
            $UserInfo = $UserModel->where('username', $username)->first();
            $check_password = md5($password);
            if ($UserInfo) {
                if ($check_password == $UserInfo['password'] && $UserInfo['status'] == 'active') {
                    if ($UserInfo['level'] == 'Super Admin') {
                        $user_id = $UserInfo['id'];
                        session()->set('loggedUser', $user_id);
                        return redirect()->to('/');

                    } elseif ($UserInfo['level'] == 'Root') {
                        $user_id = $UserInfo['id'];
                        session()->set('loggedUser', $user_id);
                        return redirect()->to('/');

                    } elseif ($UserInfo['level'] == 'atlet') {
                        $user_id = $UserInfo['id'];
                        session()->set('loggedUser', $user_id);
                        return redirect()->to('/home_atlet');
                    } elseif ($UserInfo['level'] == 'pelatih') {
                        $user_id = $UserInfo['id'];
                        session()->set('loggedUser', $user_id);
                        return redirect()->to('/home_pelatih');
                    }

                } else {
                    if ($UserInfo['status'] == 'nonactive') {
                        session()->setFlashdata('fail', 'Maaf, Akun Anda Belum Aktif !');
                        return redirect()->back();

                    } else {
                        session()->setFlashdata('fail', 'Maaf, Password Anda Salah !');
                        return redirect()->back();
                    }
                }
            } else {
                session()->setFlashdata('fail', 'Username dan Password Anda Salah ! Silahkan Periksa Kembali');
                return redirect()->back();
            }
        }

    }

    public function logout()
    {
        helper(['url', 'form']);
        if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth/login')->with('logout', 'You Are logged Out');
        }

    }

}