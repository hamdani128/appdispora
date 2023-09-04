<?=$this->Extend('template/index')?>
<?=$this->Section('content')?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Atlet</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Atlet</a></li>
    </ol>
</div>

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="example3" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>#Act</th>
                                    <th>NIK Atlet</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Sekolah</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Asal</th>
                                    <th>Agama</th>
                                    <th>No.Telepon</th>
                                    <th>Cabang Olahraga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($atlet) > 0) {$no = 1;?>
                                <?php foreach ($atlet as $row): ?>
                                <tr>
                                    <td><?=$no++;?></td>
                                    <td>
                                        <div class="btn-group mb-2">
                                            <a href="#" data-toggle="modal" data-target="#modalUpdate"
                                                class="btn btn-warning btn-sm"
                                                onclick="update_show_atlet_admin('<?=$row->id;?>', '<?=$row->no_atlet;?>')">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modelId"
                                                onclick="detail_show_atlet('<?=$row->id;?>', '<?=$row->no_atlet;?>')">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="#" class="btn btn-success btn-sm"
                                                onclick="masukkan_data_alumni('<?=$row->id;?>','<?=$row->no_atlet;?>', '<?=$row->nama;?>')">
                                                <i class="fa fa-database"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?=$row->no_atlet;?></td>
                                    <td><?=$row->nik;?></td>
                                    <td><?=$row->nama;?></td>
                                    <td><?=$row->sekolah;?></td>
                                    <td><?=$row->jenis_kelamin;?></td>
                                    <td><?=$row->asal;?></td>
                                    <td><?=$row->agama;?></td>
                                    <td><?=$row->hp;?></td>
                                    <td><?=$row->cabor;?></td>
                                </tr>
                                <?php endforeach;?>
                                <?php } else {?>
                                <tr>
                                    <td colspan="10">
                                        <div class="alert alert-info">
                                            <i class="fa fa-info-circle"></i>
                                            Data tidak ditemukan
                                        </div>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update Show -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data Atlet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_update" name="id_update">
                            </div>
                            <div class="form-group">
                                <label for="">ID Atlet</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="no_atlet_update" id="no_atlet_update"
                                        readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-warning" onclick="edit_id_atlet()" type="button">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="">NIK</label>
                                <input type="text" class="form-control" name="nik_update" id="nik_update">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_update" id="nama_update">
                            </div>
                            <div class="form-group">
                                <label for="">Sekolah</label>
                                <input type="text" class="form-control" name="sekolah_update" id="sekolah_update">
                            </div>
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <input type="text" class="form-control" name="kelas_update" id="kelas_update">
                            </div>
                            <div class="form-group">
                                <label for="">Asal</label>
                                <input type="text" class="form-control" name="asal_update" id="asal_update">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" name="jk_update" id="jk_update">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select class="form-control" name="agama_update" id="agama_update">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" name="" id="">
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir_update"
                                    id="tempat_lahir_update" placeholder="isi tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir_update"
                                    id="tanggal_lahir_update" placeholder="isi Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="">No.Telepon</label>
                                <input type="text" class="form-control" name="hp_update" id="hp_update"
                                    placeholder="isi No Telepon">
                            </div>
                            <div class="form-group">
                                <label for="">Golongan Darah</label>
                                <input type="text" class="form-control" name="golongan_update" id="golongan_update"
                                    placeholder="isi Golongan Darah">
                            </div>
                            <div class="form-group">
                                <label for="">Identitas Orang Tua</label>
                                <select name="identitas_orangtua_update" id="identitas_orangtua_update"
                                    class="form-control">
                                    <option value="">Pilih Identitas Orang Tua</option>
                                    <option value="Ibu">Ibu</option>
                                    <option value="Ayah">Ayah</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Orang Tua</label>
                                <input type="text" class="form-control" name="nama_orang_tua_update"
                                    id="nama_orang_tua_update" placeholder="isi nama orang tua">
                            </div>
                            <div class="form-group">
                                <label for="">Pekerjaan Orang Tua</label>
                                <input type="text" class="form-control" name="pekerjaan_orang_tua_update"
                                    id="pekerjaan_orang_tua_update" placeholder="isi pekerjaan tua">
                            </div>
                            <div class="form-group">
                                <label for="">Cabang Olahraga</label>
                                <input type="text" class="form-control" name="cabor_update" id="cabor_update"
                                    placeholder="isi cabang Olahraga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tahun Pengangkatan</label>
                                <input type="text" class="form-control" name="tahun_pengangkatan_update"
                                    id="tahun_pengangkatan_update" placeholder="Tahun Pengangkatan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_data_atlet_admin()"><i
                        class="fa fa-edit"></i> Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Informasi Personal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="profile-personal-info pt-2">
                    <h4 class="text-primary mt-2 mb-4">Personal Information</h4>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">No.Atlet<span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="no_atlet">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">NIK <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="nik">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Nama Lengkap <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="nama_lengkap">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Sekolah <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="sekolah">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Kelas <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="kelas">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Asal Sekolah <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="asal">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Jenis Kelamin <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="jk">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Agama <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="agama">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Tempat Lahir <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="tempat">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Tanggal Lahir <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="tanggal">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Golongan <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="golongan">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">No.Telepon <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="hp">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Identitas Orang tua <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="identitas">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Nama Orang tua <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="nama_orangtua">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Pekerjaan Orang Tua <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="pekerjaan">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Cabang Olahraga <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="cabor">-</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-4 col-6">
                            <h5 class="f-w-500">Tahun Pengangkatan <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-sm-8 col-6"><span id="tahun">-</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save</button> -->
            </div>
        </div>
    </div>
</div>
<?=$this->EndSection()?>