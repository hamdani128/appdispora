<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class RegisterController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $cabor = $db->table('cabor')->get()->getResultObject();
        $data = [
            'title' => 'Register - App Dispora',
            'cabor' => $cabor,
        ];
        return view('pages/new_register', $data);
    }

    public function id_registrasi()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $db = Database::connect();
        $sql = "SELECT MAX(RIGHT(no_register,5)) as KD_MAX FROM register";
        $query = $db->query($sql);
        if ($query->getNumRows() > 0) {
            $row = $query->getRow();
            $n = ((int) $row->KD_MAX) + 1;
            $no = sprintf("%05s", $n);
        } else {
            $no = "00001";
        }
        $kode = date('Y') . $no;
        return $kode;
    }

    public function save()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $ktp = $this->request->getPost('ktp');
        $nama = $this->request->getPost('nama');
        $sekolah = $this->request->getPost('sekolah');
        $kelas = $this->request->getPost('kelas');
        $asal = $this->request->getPost('asal');
        $jk = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $golongan = $this->request->getPost('golongan');
        $identitas_orang_tua = $this->request->getPost('identitas_orangtua');
        $nama_orangtua = $this->request->getPost('nama_orang_tua');
        $pekerjaan = $this->request->getPost('pekerjaan_orang_tua');
        $cabor = $this->request->getPost('cabor');
        $hp = $this->request->getPost('hp');

        $file_ktp = $this->request->getFile('ktp_berkas');
        $file_id_pelajar_berkas = $this->request->getFile('id_pelajar_berkas');
        $file_pas_photo = $this->request->getFile('pas_photo');
        $file_izajah_berkas = $this->request->getFile('izajah_berkas');
        $file_surat_kesahatan = $this->request->getFile('surat_kesehatan_berkas');

        $fileNameKTP = $this->id_registrasi() . '_' . $file_ktp->getName();
        $file_ktp->move('upload/', $fileNameKTP);

        $fileNameIDPelajar = $this->id_registrasi() . '_' . $file_id_pelajar_berkas->getName();
        $file_id_pelajar_berkas->move('upload/', $fileNameIDPelajar);

        $fileNamePasPhoto = $this->id_registrasi() . '_' . $file_pas_photo->getName();
        $file_pas_photo->move('upload/', $fileNamePasPhoto);

        $fileNameIzajah = $this->id_registrasi() . '_' . $file_izajah_berkas->getName();
        $file_izajah_berkas->move('upload/', $fileNameIzajah);

        $fileNameSuratKesahatan = $this->id_registrasi() . '_' . $file_surat_kesahatan->getName();
        $file_surat_kesahatan->move('upload/', $fileNameSuratKesahatan);

        $data1 = [
            'no_register' => $this->id_registrasi(),
            'nik' => $ktp,
            'nama' => $nama,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'asal' => $asal,
            'jenis_kelamin' => $jk,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'hp' => $hp,
            'golongan' => $golongan,
            'identitas' => $identitas_orang_tua,
            'orang_tua' => $nama_orangtua,
            'pekerjaan' => $pekerjaan,
            'cabor' => $cabor,
            'status' => 'Pendaftaran',
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $data2 = [
            'no_register' => $this->id_registrasi(),
            'nama' => 'Kartu Tanda Penduduk',
            'file' => $fileNameKTP,
            'created_at' => $now,
        ];
        $data3 = [
            'no_register' => $this->id_registrasi(),
            'nama' => 'Identitas Pelajar',
            'file' => $fileNameIDPelajar,
            'created_at' => $now,
        ];
        $data4 = [
            'no_register' => $this->id_registrasi(),
            'nama' => 'Pas Photo',
            'file' => $fileNamePasPhoto,
            'created_at' => $now,
        ];

        $data5 = [
            'no_register' => $this->id_registrasi(),
            'nama' => 'Izajah',
            'file' => $fileNameSuratKesahatan,
            'created_at' => $now,
        ];
        $data6 = [
            'no_register' => $this->id_registrasi(),
            'nama' => 'Surat Kesehatan',
            'file' => $fileNameSuratKesahatan,
            'created_at' => $now,
        ];

        $UserIP = $this->input->ip_address();
        $secret = '6Ld9d-QfAAAAACC-ja_wiHuSG27ReW3BMGsOk9ZS';
        $credential = array(
            'secret' => $secret,
            'response' => $this->request->getVar('g-recaptcha-response'),
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);

        $status = json_decode($response, true);
        if ($status['success']) {
            $db = Database::connect();
            $query1 = $db->table('register')->insert($data1);
            $query2 = $db->table('register_upload')->insert($data2);
            $query3 = $db->table('register_upload')->insert($data3);
            $query4 = $db->table('register_upload')->insert($data4);
            $query5 = $db->table('register_upload')->insert($data5);
            $query6 = $db->table('register_upload')->insert($data6);
            if ($query1) {
                session()->setFlashdata('success', 'Data berhasil disimpan !');
                return redirect()->to('/register');
            } else {
                session()->setFlashdata('error', 'Gagal Simpan Data !');
                return redirect()->to('/register');
            }
        } else {
            session()->setFlashdata('msg', 'Something goes to wrong');
        }
    }

    public function insert_register()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');

        $ktp = $this->request->getPost('ktp');
        $nama = $this->request->getPost('nama');
        $sekolah = $this->request->getPost('sekolah');
        $kelas = $this->request->getPost('kelas');
        $asal = $this->request->getPost('asal');
        $jk = $this->request->getPost('jk');
        $agama = $this->request->getPost('agama');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $tanggal_lahir = $this->request->getPost('tanggal_lahir');
        $golongan = $this->request->getPost('golongan');
        $identitas_orang_tua = $this->request->getPost('identitas_orangtua');
        $nama_orangtua = $this->request->getPost('nama_orang_tua');
        $pekerjaan = $this->request->getPost('pekerjaan_orang_tua');
        $data = [
            'no_register' => $this->id_registrasi(),
            'nik' => $ktp,
            'nama' => $nama,
            'sekolah' => $sekolah,
            'kelas' => $kelas,
            'asal' => $asal,
            'jenis_kelamin' => $jk,
            'agama' => $agama,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'golongan' => $golongan,
            'identitas' => $identitas_orang_tua,
            'orang_tua' => $nama_orangtua,
            'pekerjaan' => $pekerjaan,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $db = Database::connect();
        $query = $db->table('register')->insert($data);
        if ($query) {
            $status = 'success';
        } else {
            $status = 'failed';
        }
        return json_encode($status);
    }

    public function upload_ktp()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $db = Database::connect();

        $temp = "upload/";
        if (!file_exists($temp)) {
            mkdir($temp);
        }
        $nama_file = $_POST['ktp_berkas'];
        $fileupload = $_FILES['ktp_berkas']['tmp_name'];
        $ImageName = $_FILES['ktp_berkas']['name'];
        $ImageType = $_FILES['ktp_berkas']['type'];

        echo $nama_file;
    }
}
