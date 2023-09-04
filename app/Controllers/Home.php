<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Database\Config;
use Config\Database;

class Home extends BaseController
{
    private $db;
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
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Home - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Dashboard',
            'list_cabor' => $list_cabor,
        ];
        return view('pages/home', $data);
    }

    public function home_atlet()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $list_profile = $this->db->table('atlet')->where('no_atlet', $UserInfo['username'])->get()->getRowObject();
        $data = [
            'title' => 'Home Atlet - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Home Atlet',
            'list_cabor' => $list_cabor,
            'profile' => $list_profile,
        ];
        return view('pages/home_atlet', $data);
    }

    public function home_pelatih()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $list_profile = $this->db->table('pelatih')->where('no_pelatih', $UserInfo['username'])->get()->getRowObject();
        $data = [
            'title' => 'Home Pelatih - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Home Pelatih',
            'list_cabor' => $list_cabor,
            'profile' => $list_profile,
        ];
        return view('pages/home_pelatih', $data);
    }

    public function teknik_performance()
    {
        $cabor = $_GET['cabor'];
        $sql_teknik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_teknik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $cabor . "'
                        GROUP BY 1,2,3,4,5 ORDER BY 5 DESC LIMIT 5";
        $query = $this->db->query($sql_teknik)->getResultObject();
        if (!empty($query)) {
            $no = 1;foreach ($query as $row): ?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->tanggal?></td>
    <td><?=$row->atlet_id?></td>
    <td><?=$row->nama?></td>
    <td><?=$row->no_pertandingan?></td>
    <td><?=$row->hasil?></td>
</tr>
<?php endforeach?> <?php
                            } else {
                                        ?>
<tr>
    <td colspan="7" class="text-center">Tidak Ada Data</td>
</tr>
<?php
        }
    }

    public function fisik_performance()
    {
        $cabor = $_GET['cabor'];
        $sql_fisik = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_fisik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $cabor . "'
                        GROUP BY 1,2,3,4,5 ORDER BY 5 DESC LIMIT 5";
        $query = $this->db->query($sql_fisik)->getResultObject();
        if (!empty($query)) {
            $no = 1;foreach ($query as $row): ?>
<tr>
    <td><?=$no++?></td>
    <td><?=$row->tanggal?></td>
    <td><?=$row->atlet_id?></td>
    <td><?=$row->nama?></td>
    <td><?=$row->no_pertandingan?></td>
    <td><?=$row->hasil?></td>
</tr>
<?php endforeach?>
<?php } else { ?>
<tr>
    <td colspan="7" class="text-center">Tidak Ada Data</td>
</tr>
<?php
        }
    }

    public function show_detail_pelatih()
    {
        $pelatih_id = $this->request->getPost('pelatih_id');
        $query = $this->db->table('pelatih')->where('no_pelatih', $pelatih_id)->get()->getRowObject();
        $data[0] = $query->no_pelatih;
        $data[1] = $query->nama;
        $data[2] = $query->jenis_kelamin;
        $data[3] = $query->agama;
        $data[4] = $query->usia;
        $data[5] = $query->hp;
        $data[6] = $query->cabor;
        $data[7] = $query->image;
        return json_encode($data);
    }

    public function update_profile_pelatih()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y-m-d');
        $pelatih_id = $this->request->getPost('id_pelatih');
        $nama = $this->request->getPost('nama');
        $jenis_kelamin = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $usia = $this->request->getPost('usia');
        $hp = $this->request->getPost('hp');
        $file = $this->request->getFile('file_img');
        $NewFile = $pelatih_id . '_' . $date . '_' . $file->getName();
        $file->move('upload/', $NewFile);
        $data = [
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'usia' => $usia,
            'hp' => $hp,
            'image' => $NewFile,
            'updated_at' => $now,
        ];
        $query = $this->db->table('pelatih')->where('no_pelatih', $pelatih_id)->update($data);
        if ($query) {
            return redirect()->to('/home_pelatih');
        } else {
            $this->session->setFlashdata('error', 'Data Gagal Diubah');
            return redirect()->to('/home_pelatih');
        }
    }

    public function profile_admin()
    {
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $list_profile = $this->db->table('users')->where('username', $UserInfo['username'])->get()->getRowObject();
        $data = [
            'title' => 'Home Pelatih - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Home Pelatih',
            'list_cabor' => $list_cabor,
            'profile' => $list_profile,
        ];
        return view('pages/profile_admin', $data);
    }

}