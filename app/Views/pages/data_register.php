<?=$this->Extend('template/index')?>
<?=$this->Section('content')?>

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Registes</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Register</a></li>
    </ol>
</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Informasi Data</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example5" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Act</th>
                                        <th>Status</th>
                                        <th>ID Register</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Sekolah</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Asal</th>
                                        <th>Agama</th>
                                        <th>No.Telepon</th>
                                        <th>Tanggal Register</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($register) > 0) {$no = 1;?>
                                    <?php foreach ($register as $row): ?>
                                    <tr>
                                        <td><?=$no++;?></td>
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
                                                    <a class="dropdown-item"
                                                        onclick="show_detaiL_register('<?=$row->id?>')" href="#"
                                                        data-toggle="modal" data-target="#modelId">View Detail</a>
                                                    <a class="dropdown-item" href="#"
                                                        onclick="show_validasi('<?=$row->id?>','<?=$row->no_register?>','<?=$row->nik?>','<?=$row->nama?>', '<?=$row->status?>','<?=$row->cabor?>')">Validasi</a>
                                                    <a class="dropdown-item" href="#">Cetak Validasi</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if ($row->status == 'Tervalidasi'): ?>
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-success mr-1"></i>
                                                <?=$row->status;?>
                                            </span>
                                            <?php elseif ($row->status == 'Pendaftaran'): ?>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                <?=$row->status;?>
                                            </span>
                                            <?php endif;?>
                                        </td>
                                        <td><?=$row->no_register?></td>
                                        <td><?=$row->nik?></td>
                                        <td><?=$row->nama?></td>
                                        <td><?=$row->sekolah?></td>
                                        <td><?=$row->jenis_kelamin?></td>
                                        <td><?=$row->asal?></td>
                                        <td><?=$row->agama?></td>
                                        <td><?=$row->hp?></td>
                                        <td><?=$row->created_at?></td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php } else {?>
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

<!-- Modal Views Detail -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-modal">Large</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                            class="nav-link active show">Informasi Personal</a>
                                    </li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                            class="nav-link">File Upload</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="about-me" class="tab-pane fade active show">
                                        <div class="profile-personal-info pt-2">
                                            <h4 class="text-primary mt-2 mb-4">Personal Information</h4>
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
                                                    <h5 class="f-w-500">Identitas Orang tua <span
                                                            class="pull-right">:</span>
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
                                                    <h5 class="f-w-500">Pekerjaan Orang Tua <span
                                                            class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 col-6"><span id="pekerjaan">-</span>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-sm-4 col-6">
                                                    <h5 class="f-w-500">Cabang Olahraga <span
                                                            class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-sm-8 col-6"><span id="cabor">-</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="row pt-2">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="example3" class="display min-w850">
                                                        <thead>
                                                            <tr>
                                                                <th>#No</th>
                                                                <th>Keterangan</th>
                                                                <th>Nama File</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="list_upload">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Validasi -->
<div class="modal fade" id="validasi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title-validasi">No.Register :</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" class="form-control" name="id_row" id="id_row">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" name="nik_validasi" id="nik_validasi">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_validasi" id="nama_validasi">
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Cabang Olahraga</label>
                            <select class="form-control" name="cabor_validasi" id="cabor_validasi">
                                <option value="">Pilih Cabang Olahraga</option>
                                <?php foreach ($cabor as $row): ?>
                                <option value="<?=$row->nama_cabang?>"><?=$row->nama_cabang?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Close</button>
                <button type="button" class="btn btn-primary" onclick="submit_validasi()">Yes, Validasi </button>
            </div>
        </div>
    </div>
</div>

<?=$this->endSection()?>