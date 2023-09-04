<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\Config;

class Pelatih1Controller extends BaseController
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
        $atlet = $this->db->table('atlet')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
        $indikator_teknik = $this->db->table('indikator_teknik')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
        $list_cabor = $this->db->table('cabor')->get()->getResultObject();
        $sql_perform = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_teknik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $UserInfo['departemen'] . "'
                        GROUP BY 1,2,3,4,5";
        $perform = $this->db->query($sql_perform)->getResultObject();
        $data = [
            'title' => 'Home - App Dispora',
            'userinfo' => $UserInfo,
            'judul' => 'Tes Teknik',
            'atlet' => $atlet,
            'indikator_teknik' => $indikator_teknik,
            'perfom' => $perform,
            'list_cabor' => $list_cabor,
        ];
        return view('pages/tes_teknik', $data);
    }

    public function detail_simpan_teknik()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y');
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);
        $atlet_id = $this->request->getPost('atlet_id');
        $tanggal = $this->request->getPost('tanggal');
        $pelatih_id = $UserInfo['username'];
        $komponen = $this->request->getPost('komponen');
        $nilai = $this->request->getPost('nilai');
        $benchmark = $this->request->getPost('benchmark');
        $keterangan = $this->request->getPost('keterangan');
        $percent = $this->request->getPost('hasil');
        $user_id = $UserInfo['id'];
        $cabor = $UserInfo['departemen'];
        $data = [
            'atlet_id' => $atlet_id,
            'tanggal' => $tanggal,
            'pelatih_id' => $pelatih_id,
            'komponen' => $komponen,
            'nilai' => $nilai,
            'benchmark' => $benchmark,
            'keterangan' => $keterangan,
            'percent' => $percent,
            'user_id' => $user_id,
            'cabor' => $cabor,
            'created_at' => $now,
            'updated_at' => $now,
        ];
        $query = $this->db->table('detail_hasil_teknik')->insert($data);
    }

    public function simpan_teknik()
    {
        date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
        $now = date('Y-m-d H:i:s');
        $date = date('Y');
        $userModel = new UserModel();
        $loggedUserID = session()->get('loggedUser');
        $UserInfo = $userModel->find($loggedUserID);

        $atlet_id = $this->request->getPost('atlet_id');
        $pelatih_id = $UserInfo['username'];
        $tanggal = $this->request->getPost('tanggal');
        $tambahan = $this->request->getPost('tambahan');
        $hasil = $this->request->getPost('kumulasi');
        $user_id = $UserInfo['id'];
        $data = [
            'atlet_id' => $atlet_id,
            'pelatih_id' => $pelatih_id,
            'tanggal' => $tanggal,
            'no_pertandingan' => $tambahan,
            'hasil' => $hasil,
            'cabor' => $UserInfo['departemen'],
            'user_id' => $user_id,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $query = $this->db->table('hasil_teknik')->insert($data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data gagal disimpan',
            ];
        }
        return json_encode($response);
    }

    public function delete_teknik()
    {
        $id = $this->request->getPost('id');
        $atlet_id = $this->request->getPost('atlet_id');
        $tanggal = $this->request->getPost('tanggal');
        $query1 = $this->db->table('detail_hasil_teknik')->where('tanggal', $tanggal)->where('atlet_id', $atlet_id)->delete();
        $query2 = $this->db->table('hasil_teknik')->where('id', $id)->delete();
        if ($query1 && $query2) {
            $response = [
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Data gagal dihapus',
            ];
        }
        return json_encode($response);
    }

    public function detail_show_teknik()
    {
        $id = $_GET['id'];
        $sql = "SELECT
                a.id as id,
                a.atlet_id as atlet_id,
                b.nama as nama,
                a.tanggal as tanggal,
                a.no_pertandingan as no_pertandingan,
                a.hasil as hasil,
                a.pelatih_id as pelatih_id,
                c.nama as nama_pelatih
                FROM hasil_teknik a 
                LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                LEFT JOIN pelatih c ON a.pelatih_id = c.no_pelatih
                WHERE a.id = '" . $id . "'";
        $query = $this->db->query($sql)->getRowObject();
        $data[0] = $query->atlet_id;
        $data[1] = $query->nama;
        $data[2] = $query->tanggal;
        $data[3] = $query->no_pertandingan;
        $data[4] = $query->hasil;
        $data[5] = $query->pelatih_id;
        $data[6] = $query->nama_pelatih;
        return json_encode($data);
    }

    public function detail_show_teknik_list()
    {
        $atlet_id = $_GET['atlet_id'];
        $tanggal = $_GET['tanggal'];
        $perfom = $this->db->table('detail_hasil_teknik')->where('tanggal', $tanggal)->where('atlet_id', $atlet_id)->get()->getResultObject();
        if (!empty($perfom)) {
            $no = 1;
            foreach ($perfom as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->komponen; ?></td>
                    <td><?= $row->benchmark; ?></td>
                    <td><?= $row->nilai; ?></td>
                    <td><?= $row->keterangan; ?></td>
                    <td><?= $row->percent; ?>%</td>
                </tr>
            <?php endforeach ?> <?php
                            } else {
                                ?>
            <tr>
                <td colspan="6" class="text-center">Tidak Ada Data</td>
            </tr>
            <?php
                            }
                        }

                        public function view_fisik()
                        {
                            $userModel = new UserModel();
                            $loggedUserID = session()->get('loggedUser');
                            $UserInfo = $userModel->find($loggedUserID);
                            $atlet = $this->db->table('atlet')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
                            $indikator = $this->db->table('indikator_fisik')->where('cabor', $UserInfo['departemen'])->get()->getResultObject();
                            $list_cabor = $this->db->table('cabor')->get()->getResultObject();
                            $sql_perform = "SELECT
                        a.id as id,
                        a.atlet_id as atlet_id,
                        b.nama as nama,
                        a.tanggal as tanggal,
                        a.no_pertandingan as no_pertandingan,
                        a.hasil as hasil
                        FROM hasil_fisik a 
                        LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                        WHERE a.cabor = '" . $UserInfo['departemen'] . "'
                        GROUP BY 1,2,3,4,5";
                            $perform = $this->db->query($sql_perform)->getResultObject();
                            $data = [
                                'title' => 'Home - App Dispora',
                                'userinfo' => $UserInfo,
                                'judul' => 'Tes Fisik',
                                'atlet' => $atlet,
                                'indikator' => $indikator,
                                'perfom' => $perform,
                                'list_cabor' => $list_cabor,
                            ];
                            return view('pages/tes_fisik', $data);
                        }

                        public function detail_simpan_fisik()
                        {
                            date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
                            $now = date('Y-m-d H:i:s');
                            $date = date('Y');
                            $userModel = new UserModel();
                            $loggedUserID = session()->get('loggedUser');
                            $UserInfo = $userModel->find($loggedUserID);
                            $atlet_id = $this->request->getPost('atlet_id');
                            $tanggal = $this->request->getPost('tanggal');
                            $pelatih_id = $UserInfo['username'];
                            $komponen = $this->request->getPost('komponen');
                            $pengukuran = $this->request->getPost('pengukuran');
                            $nilai = $this->request->getPost('nilai');
                            $benchmark = $this->request->getPost('benchmark');
                            $keterangan = $this->request->getPost('keterangan');
                            $percent = $this->request->getPost('hasil');
                            $user_id = $UserInfo['id'];
                            $cabor = $UserInfo['departemen'];
                            $data = [
                                'atlet_id' => $atlet_id,
                                'tanggal' => $tanggal,
                                'pelatih_id' => $pelatih_id,
                                'komponen' => $komponen,
                                'pengukuran' => $pengukuran,
                                'nilai' => $nilai,
                                'benchmark' => $benchmark,
                                'keterangan' => $keterangan,
                                'percent' => $percent,
                                'cabor' => $cabor,
                                'user_id' => $user_id,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ];
                            $query = $this->db->table('detail_hasil_fisik')->insert($data);
                        }

                        public function simpan_fisik()
                        {
                            date_default_timezone_set('Asia/jakarta'); # add your city to set local time zone
                            $now = date('Y-m-d H:i:s');
                            $date = date('Y');
                            $userModel = new UserModel();
                            $loggedUserID = session()->get('loggedUser');
                            $UserInfo = $userModel->find($loggedUserID);

                            $atlet_id = $this->request->getPost('atlet_id');
                            $pelatih_id = $UserInfo['username'];
                            $tanggal = $this->request->getPost('tanggal');
                            $tambahan = $this->request->getPost('tambahan');
                            $hasil = $this->request->getPost('kumulasi');
                            $user_id = $UserInfo['id'];
                            $data = [
                                'atlet_id' => $atlet_id,
                                'pelatih_id' => $pelatih_id,
                                'tanggal' => $tanggal,
                                'no_pertandingan' => $tambahan,
                                'hasil' => $hasil,
                                'cabor' => $UserInfo['departemen'],
                                'user_id' => $user_id,
                                'created_at' => $now,
                                'updated_at' => $now,
                            ];

                            $query = $this->db->table('hasil_fisik')->insert($data);
                            if ($query) {
                                $response = [
                                    'status' => 'success',
                                    'message' => 'Data berhasil disimpan',
                                ];
                            } else {
                                $response = [
                                    'status' => 'error',
                                    'message' => 'Data gagal disimpan',
                                ];
                            }
                            return json_encode($response);
                        }

                        public function delete_fisik()
                        {
                            $id = $this->request->getPost('id');
                            $atlet_id = $this->request->getPost('atlet_id');
                            $tanggal = $this->request->getPost('tanggal');
                            $query1 = $this->db->table('detail_hasil_fisik')->where('tanggal', $tanggal)->where('atlet_id', $atlet_id)->delete();
                            $query2 = $this->db->table('hasil_fisik')->where('id', $id)->delete();
                            if ($query1 && $query2) {
                                $response = [
                                    'status' => 'success',
                                    'message' => 'Data berhasil dihapus',
                                ];
                            } else {
                                $response = [
                                    'status' => 'error',
                                    'message' => 'Data gagal dihapus',
                                ];
                            }
                            return json_encode($response);
                        }

                        public function detail_show_fisik()
                        {
                            $id = $_GET['id'];
                            $sql = "SELECT
                a.id as id,
                a.atlet_id as atlet_id,
                b.nama as nama,
                a.tanggal as tanggal,
                a.no_pertandingan as no_pertandingan,
                a.hasil as hasil,
                a.pelatih_id as pelatih_id,
                c.nama as nama_pelatih
                FROM hasil_fisik a 
                LEFT JOIN atlet b ON a.atlet_id = b.no_atlet
                LEFT JOIN pelatih c  ON a.pelatih_id = c.no_pelatih
                WHERE a.id = '" . $id . "'";
                            $query = $this->db->query($sql)->getRowObject();
                            $data[0] = $query->atlet_id;
                            $data[1] = $query->nama;
                            $data[2] = $query->tanggal;
                            $data[3] = $query->no_pertandingan;
                            $data[4] = $query->hasil;
                            $data[5] = $query->pelatih_id;
                            $data[6] = $query->nama_pelatih;
                            return json_encode($data);
                        }

                        public function detail_show_fisik_list()
                        {
                            $atlet_id = $_GET['atlet_id'];
                            $tanggal = $_GET['tanggal'];
                            $perfom = $this->db->table('detail_hasil_fisik')->where('tanggal', $tanggal)->where('atlet_id', $atlet_id)->get()->getResultObject();
                            if (!empty($perfom)) {
                                $no = 1;
                                foreach ($perfom as $row) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row->komponen; ?></td>
                    <td><?= $row->pengukuran; ?></td>
                    <td><?= $row->benchmark; ?></td>
                    <td><?= $row->nilai; ?></td>
                    <td><?= $row->keterangan; ?></td>
                    <td><?= $row->percent; ?>%</td>
                </tr>
            <?php endforeach ?> <?php
                            } else {
                                ?>
            <tr>
                <td colspan="7" class="text-center">Tidak Ada Data</td>
            </tr>
<?php
                            }
                        }
                    }
