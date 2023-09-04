<?=$this->Extend('template/index')?>
<?=$this->Section('content')?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pelatih</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Pelatih</a></li>
    </ol>
</div>

<!-- row Data -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row pb-2">
                    <div class="col-md-12">
                        <button class="btn btn-md btn-info" data-toggle="modal" data-target="#modelId">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example5" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>No.Pelatih</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Usia</th>
                                        <th>Hp</th>
                                        <th>Cabang Olahraga</th>
                                        <th>Jenis Pelatih</th>
                                        <th>Status Akun</th>
                                        <th>#Act</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($pelatih) > 0) {$no = 1;?>
                                    <?php foreach ($pelatih as $row): ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?=$row->no_pelatih;?></td>
                                        <td><?=$row->nama;?></td>
                                        <td><?=$row->jenis_kelamin;?></td>
                                        <td><?=$row->agama;?></td>
                                        <td><?=$row->usia;?></td>
                                        <td><?=$row->hp;?></td>
                                        <td><?=$row->cabor;?></td>
                                        <td><?=$row->jenis_pelatih;?></td>
                                        <td>
                                            <?php if ($row->status == 'active'): ?>
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-success mr-1"></i>
                                                <?=$row->status;?>
                                            </span>
                                            <?php elseif ($row->status == 'nonactive'): ?>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                <?=$row->status;?>
                                            </span>
                                            <?php endif;?>
                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="32" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M2 12C2 6.48 6.47 2 12 2C17.52 2 22 6.48 22 12C22 17.52 17.52 22 12 22C6.47 22 2 17.52 2 12ZM7.52 13.2C6.86 13.2 6.32 12.66 6.32 12C6.32 11.34 6.86 10.801 7.52 10.801C8.18 10.801 8.71 11.34 8.71 12C8.71 12.66 8.18 13.2 7.52 13.2ZM10.8 12C10.8 12.66 11.34 13.2 12 13.2C12.66 13.2 13.19 12.66 13.19 12C13.19 11.34 12.66 10.801 12 10.801C11.34 10.801 10.8 11.34 10.8 12ZM15.28 12C15.28 12.66 15.81 13.2 16.48 13.2C17.14 13.2 17.67 12.66 17.67 12C17.67 11.34 17.14 10.801 16.48 10.801C15.81 10.801 15.28 11.34 15.28 12Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#"
                                                        onclick="delete_pelatih('<?=$row->id;?>', '<?=$row->no_pelatih;?>', '<?=$row->nama;?>', '<?=$row->status;?>')">Delete</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="update_show_pelatih('<?=$row->id;?>', '<?=$row->status;?>')">Update</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="validasi_pelatih('<?=$row->id;?>','<?=$row->no_pelatih;?>','<?=$row->nama;?>','<?=$row->status;?>')">validasi
                                                        Akun</a>
                                                </div>
                                            </div>
                                        </td>
                                        <?php endforeach;?>
                                        <?php } else {?>
                                    <tr>
                                        <td colspan="11">
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
</div>
<!-- end -->

<!-- Modal Tambah -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pelatih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" name="usia" id="usia">
                            </div>
                            <div class="form-group">
                                <label for="">No.Handphone</label>
                                <input type="text" class="form-control" name="hp" id="hp">
                            </div>
                            <div class="form-group">
                                <label for="">Cabang Olahraga</label>
                                <select class="form-control" name="cabor" id="cabor">
                                    <option value="">Pilih Cabang Olahraga</option>
                                    <?php if (count($cabor) > 0) {?>
                                    <?php foreach ($cabor as $row): ?>
                                    <option value="<?=$row->nama_cabang?>"><?=$row->nama_cabang?></option>
                                    <?php endforeach;?>
                                    <?php } else {?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_pelatih" id="jenis_pelatih">
                                    <option value="">Pilih Jenis Pelatih</option>
                                    <option value="Teknik">Pelatih Teknik</option>
                                    <option value="Fisik">Pelatih Fisik</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_pelatih()">Simpan Data</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Update -->

<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-white">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="">
                            <input type="hidden" class="form=control" name="id_update" id="id_update">
                            <div class="form-group">
                                <label for="">ID Pelatih</label>
                                <input type="text" class="form-control" name="id_pelatih" id="id_pelatih" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap_update"
                                    id="nama_lengkap_update">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin_update" id="jenis_kelamin_update" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="agama_update" id="agama_update" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>cls
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Usia</label>
                                <input type="text" class="form-control" name="usia_update" id="usia_update">
                            </div>
                            <div class="form-group">
                                <label for="">No.Handphone</label>
                                <input type="text" class="form-control" name="hp_update" id="hp_update">
                            </div>
                            <div class="form-group">
                                <label for="">Cabang Olahraga</label>
                                <select class="form-control" name="cabor_update" id="cabor_update">
                                    <option value="">Pilih Cabang Olahraga</option>
                                    <?php if (count($cabor) > 0) {?>
                                    <?php foreach ($cabor as $row): ?>
                                    <option value="<?=$row->nama_cabang?>"><?=$row->nama_cabang?></option>
                                    <?php endforeach;?>
                                    <?php } else {?>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_pelatih_update" id="jenis_pelatih_update">
                                    <option value="">Pilih Jenis Pelatih</option>
                                    <option value="Teknik">Pelatih Teknik</option>
                                    <option value="Fisik">Pelatih Fisik</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_pelatih()"><i class="fa fa-edit"></i>
                    Update Data</button>
            </div>
        </div>
    </div>
</div>
<?=$this->EndSection()?>