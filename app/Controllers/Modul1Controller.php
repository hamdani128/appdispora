<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;
use Config\Database;

class Modul1Controller extends BaseController
{
    public function index()
    {
        $db = Config::connect();
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $register = $db->table('register')->get()->getResultObject();
        $register_detail = $db->table('register_upload')->get()->getResultObject();
        $cabor = $db->table('cabor')->get()->getResultObject();
        $list_cabor = $db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Home - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Data Register',
            'cabor' => $cabor,
            'register' => $register,
            'register_detail' => $register_detail,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/data_register', $data);
    }

    public function id_atlet($id_jk)
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $db = Database::connect();
        $sql = "SELECT MAX(RIGHT(no_atlet,5)) as KD_MAX FROM atlet";
        $query = $db->query($sql);
        if ($query->getNumRows() > 0) {
            $row = $query->getRow();
            $n = ((int) $row->KD_MAX) + 1;
            $no = sprintf("%05s", $n);
        } else {
            $no = "00001";
        }
        $kode = date('Ym') . $id_jk . $no;
        return $kode;
    }

    public function detail_register()
    {
        $db = config::connect();
        $id = $_GET['id'];
        $register = $db->table('register')->where('id', $id)->get()->getRowObject();
        $data[0] = $register->no_register;
        $data[1] = $register->nik;
        $data[2] = $register->nama;
        $data[3] = $register->sekolah;
        $data[4] = $register->kelas;
        $data[5] = $register->asal;
        $data[6] = $register->jenis_kelamin;
        $data[7] = $register->agama;
        $data[8] = $register->tempat_lahir;
        $data[9] = $register->tanggal_lahir;
        $data[10] = $register->golongan;
        $data[11] = $register->hp;
        $data[12] = $register->identitas;
        $data[13] = $register->orang_tua;
        $data[14] = $register->pekerjaan;
        $data[15] = $register->cabor;
        return json_encode($data);
    }

    public function detail_register_berkas()
    {
        $db = config::connect();
        $id = $_GET['id'];
        $no_register = $db->table('register')->where('id', $id)->get()->getRowObject()->no_register;
        $register_berkas = $db->table('register_upload')->where('no_register', $no_register)->get()->getResultObject();
        if (!empty($register_berkas)) {
            $no = 1;foreach ($register_berkas as $row): ?>
<tr>
    <td><?=$no++;?></td>
    <td><?=$row->nama;?></td>
    <td><?=$row->file;?></td>
    <td>
        <div class="d-flex">
            <a href="<?=base_url()?>/upload/<?=$row->file;?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i
                    class="fa fa-download"></i></a>
            <!-- <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a> -->
        </div>
    </td>
</tr>
<?php endforeach?> <?php
} else {
            ?>
<tr>
    <td colspan="3" class="text-center">Tidak Ada Data</td>
</tr>
<?php
}
    }

    public function validasi()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y');
        $db = config::connect();
        $id = $_POST['id'];
        $cabor = $_POST['cabor'];
        $register = $db->table('register')->where('id', $id)->get()->getRowObject();

        if ($register->jenis_kelamin == 'Laki-Laki') {
            $id_jk = '01';
        } else {
            $id_jk = '02';
        }
        $data1 = [
            'no_atlet' => $this->id_atlet($id_jk),
            'nik' => $register->nik,
            'nama' => $register->nama,
            'sekolah' => $register->sekolah,
            'kelas' => $register->kelas,
            'asal' => $register->asal,
            'jenis_kelamin' => $register->jenis_kelamin,
            'agama' => $register->agama,
            'tempat_lahir' => $register->tempat_lahir,
            'tanggal_lahir' => $register->tanggal_lahir,
            'golongan' => $register->golongan,
            'hp' => $register->hp,
            'identitas' => $register->identitas,
            'orang_tua' => $register->orang_tua,
            'pekerjaan' => $register->pekerjaan,
            'cabor' => $cabor,
            'tahun' => $date,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $data2 = [
            'status' => 'Tervalidasi',
            'updated_at' => $now,
        ];

        $def_pass = 'admin';
        $pass = md5($def_pass);
        $data3 = [
            'username' => $this->id_atlet($id_jk),
            'fullname' => $register->nama,
            'departemen' => $cabor,
            'sub' => 'user',
            'jk' => $register->jenis_kelamin,
            'level' => 'atlet',
            'password' => $pass,
            'image' => 'Default.png',
            'status' => 'active',
            'created_at' => $now,
        ];

        $query1 = $db->table('atlet')->insert($data1);
        $query2 = $db->table('register')->where('id', $id)->update($data2);
        $query3 = $db->table('users')->insert($data3);

        if ($query2) {
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

}