<?= $this->Extend('template/index') ?>
<?= $this->Section('content') ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pelatih</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Indikator Fisik</a></li>
    </ol>
</div>

<!-- Row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <button class="btn btn-md btn-info" data-toggle="modal" data-target="#modelId">
                            <i class="fa fa-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-md btn-dark" onclick="show_kategori_fisik_indikator()">
                            <i class="fa fa-folder"></i>
                            Kategori Event
                        </button>
                    </div>
                </div>
                <div class="default-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"><i class="la la-user mr-2"></i>
                                Laki - Laki</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#profile"><i class="la la-user mr-2"></i>
                                Perempuan</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="home" role="tabpanel">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Komposenen Fisik</th>
                                                    <th>Metode Pengukuran</th>
                                                    <th>Benchmark</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kategori</th>
                                                    <th>Periode</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($indikator) > 0) {
                                                    $no = 1; ?>
                                                    <?php foreach ($indikator as $row) : ?>
                                                        <?php if ($row->jenis_kelamin == "Laki-Laki") { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $row->komponen_fisik; ?></td>
                                                                <td><?= $row->metode_pengukuran; ?></td>
                                                                <td><?= $row->benchmark; ?></td>
                                                                <td><?= $row->jenis_kelamin; ?></td>
                                                                <td><?= $row->kategori; ?></td>
                                                                <td><?= $row->periode; ?></td>
                                                                <td>
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="update_show_detail_fisik('<?= $row->id; ?>')" data-toggle="modal" data-target="#modalUpdate">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="delete_indikator_fisik('<?= $row->id; ?>', '<?= $row->komponen_fisik; ?>', '<?= $row->metode_pengukuran; ?>')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="5">
                                                            <center>
                                                                <h4>Data Kosong</h4>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="profile" role="tabpanel">
                            <div class="row pt-3">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Komposenen Fisik</th>
                                                    <th>Metode Pengukuran</th>
                                                    <th>Benchmark</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Kategori</th>
                                                    <th>Periode</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($indikator) > 0) {
                                                    $no = 1; ?>
                                                    <?php foreach ($indikator as $row) : ?>
                                                        <?php if ($row->jenis_kelamin == "Perempuan") { ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $row->komponen_fisik; ?></td>
                                                                <td><?= $row->metode_pengukuran; ?></td>
                                                                <td><?= $row->benchmark; ?></td>
                                                                <td><?= $row->jenis_kelamin; ?></td>
                                                                <td><?= $row->kategori; ?></td>
                                                                <td><?= $row->periode; ?></td>
                                                                <td>
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-info" onclick="update_show_detail_fisik('<?= $row->id; ?>')" data-toggle="modal" data-target="#modalUpdate">
                                                                        <i class="fa fa-edit"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="delete_indikator_fisik('<?= $row->id; ?>', '<?= $row->komponen_fisik; ?>', '<?= $row->metode_pengukuran; ?>')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="5">
                                                            <center>
                                                                <h4>Data Kosong</h4>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="komponen_fisik">Komposenen Fisik</label>
                        <input type="text" class="form-control" name="komponen_fisik" id="komponen_fisik" placeholder="Komposenen Fisik">
                    </div>
                    <div class="form-group">
                        <label for="metode_pengukuran">Metode Pengukuran</label>
                        <input type="text" class="form-control" name="metode_pengukuran" id="metode_pengukuran" placeholder="Metode Pengukuran">
                    </div>
                    <div class="form-group">
                        <label for="benchmark">Benchmark</label>
                        <input type="number" class="form-control" name="benchmark" id="benchmark" placeholder="Benchmark">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kelamin</label>
                        <select name="cmb_jk" id="cmb_jk" class="form-control">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="cmb_kategori_fisik" id="cmb_kategori_fisik" class="form-control">
                            <option value="">Pilih Kategroi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Periode</label>
                        <input type="text" name="periode_fisik" id="periode_fisik" class="form-control" placeholder="Periode">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="simpan_indikator_fisik()" class="btn btn-primary">Simpan
                            Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
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
                <form action="#" method="post" id="form_indikator_fisik_update">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_update" name="id_update">
                            </div>
                            <div class="form-group">
                                <label for="komponen_fisik">Komposenen Fisik</label>
                                <input type="text" class="form-control" name="komponen_fisik_update" id="komponen_fisik_update" placeholder="Komposenen Fisik">
                            </div>
                            <div class="form-group">
                                <label for="metode_pengukuran">Metode Pengukuran</label>
                                <input type="text" class="form-control" name="metode_pengukuran_update" id="metode_pengukuran_update" placeholder="Metode Pengukuran">
                            </div>
                            <div class="form-group">
                                <label for="benchmark">Benchmark</label>
                                <input type="number" class="form-control" name="benchmark_update" id="benchmark_update" placeholder="Benchmark">
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="cmb_jk_update" id="cmb_jk_update" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="cmb_kategori_fisik_update" id="cmb_kategori_fisik_update" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Periode</label>
                                <input type="text" name="periode_fisik_update" id="periode_fisik_update" class="form-control" placeholder="Periode">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_indikator_fisik()"><i class="fa fa-edit"></i> Update</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Kategori Indikator -->
<div id="my-modal-kategori_indikator_fisik" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white">Informasi Kategori Indikator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" ng-app="kategori_fisik" ng-controller="ControllerKategoriFisik">
                    <div class="col-md-12">
                        <div class="default-tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#info">
                                        <i class="la la-table mr-2"></i>
                                        Info
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#add">
                                        <i class="la la-edit mr-2"></i>
                                        Add
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="info" role="tabpanel">
                                    <div class="row pt-2">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kategori</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody ng-repeat="post in posts">
                                                        <tr ng-if="posts.length > 0">
                                                            <td>{{$index + 1}}</td>
                                                            <td>{{post.kategori}}</td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <button class="btn btn-md btn-danger" ng-click="delete(post)">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr ng-if="posts.length === 0">
                                                            <td colspan="3">No data available</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="add" role="tabpanel">
                                    <div class="row pt-2">
                                        <div class="col-md-12">
                                            <form action="">
                                                <div class="form-group">
                                                    <label for="">Kategori</label>
                                                    <textarea rows="3" cols="3" class="form-control" name="kategori" ng-model="text_kategori" id="kategori"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-md btn-dark" ng-click="insertkategorifisik()">
                                                        <i class="fa fa-plus"></i>
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
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
<?= $this->EndSection() ?>