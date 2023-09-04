<?= $this->Extend('template/index') ?>
<?= $this->Section('content') ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Pelatih</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tes Teknik</a></li>
    </ol>
</div>

<div ng-app="TesTeknikApp" ng-controller="TesTeknikAppController">
    <!-- row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card plan-list">
                    <div class="card-header d-sm-flex flex-wrap d-block pb-0 border-0">
                        <div class="mr-auto pr-3 mb-3">
                            <h4 class="text-black fs-20">Form Tes Teknik</h4>
                            <p class="fs-13 mb-0 text-black">Informasi dan Inputan Data Tes Teknik Atlet</p>
                        </div>
                        <div class="card-action card-tabs mr-4 mt-3 mt-sm-0 mb-3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#All" role="tab" aria-selected="true">Priview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " data-toggle="tab" href="#Unifinshed" role="tab" aria-selected="false">Inputan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body tab-content pt-2">
                        <div class="tab-pane  fade" id="Unifinshed">
                            <div class="row text-right">
                                <div class="col-lg-12">
                                    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#modelId">
                                        <i class="fa fa-search"></i>
                                        Cari Data Atlet
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-form-label">No.NIA</label>
                                        <input type="text" class="form-control" id="no_nia" placeholder="No.Induk Atlet" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Tempat dan Tanggal Lahir</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" readonly>
                                            <input type="date" class="form-control" id="tanggal_lahir" name="tgl_lahir" readonly>
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Kegiatan</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tambahan (Bisa Nomor Pertandingan , Atau dll Sesuai
                                            Kebutuhan)</label>
                                        <input type="text" class="form-control" id="tambahan" name="tambahan" placeholder="Tambahan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-form-label">Pemilihan Indikator</label>
                                        <div class="input-group">
                                            <select name="indikator_teknik" id="indikator_teknik" class="form-control" onchange="ChangeIndikatorTeknik()">
                                                <option value="">Pilih Indikator</option>
                                                <?php if (count($indikator_teknik) > 0) { ?>
                                                    <?php foreach ($indikator_teknik as $row) : ?>
                                                        <option value="<?= $row->benchmark ?>"><?= $row->indikator ?></option>
                                                    <?php endforeach;  ?>
                                                <?php } else { ?>

                                                <?php } ?>
                                            </select>
                                            <input type="text" class="form-control" name="benchmark" id="benchmark" readonly placeholder="Nilai Benchmark">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Penginputan Penilaian</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nilai_inputan" id="nilai_inputan" placeholder="Inputan Nilai">
                                            <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-primary" type="button" onclick="tambah_baris()">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover table-bordered" id="table-teknik">
                                            <thead class="bg-info">
                                                <tr class="text-white">
                                                    <th>#Act</th>
                                                    <th>Indikator</th>
                                                    <th>Nilai</th>
                                                    <th>Nilai Banchmark</th>
                                                    <th>Keterangan</th>
                                                    <th>Percent(%)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table-teknik2">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="">Hasil Kumulasi Nilai</label>
                                    <input type="text" class="form-control" id="kumulasi" name="kumulasi" readonly>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-12 col-lg-12 col-md-12">
                                    <button class="btn btn-md btn-info" onclick="simpan_tes_teknik()">
                                        <i class="fa fa-save"></i>
                                        Simpan Data
                                    </button>
                                    <button class="btn btn-md btn-dark">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active show fade" id="All">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="example5" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tanggal</th>
                                                    <th>NIA</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>No.Pertandingan</th>
                                                    <th>Hasil Kumulasi</th>
                                                    <th>#Act</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($perfom) > 0) {
                                                    $no = 1; ?>
                                                    <?php foreach ($perfom as $row) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row->tanggal ?></td>
                                                            <td><?= $row->atlet_id ?></td>
                                                            <td><?= $row->nama ?></td>
                                                            <td><?= $row->no_pertandingan ?></td>
                                                            <td><?= $row->hasil ?></td>
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailshow" onclick="show_detail_teknik('<?= $row->id ?>', '<?= $row->tanggal ?>', '<?= $row->atlet_id ?>')">
                                                                    <i class="fa fa-eye"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-sm btn-danger" onclick="delete_teknik('<?= $row->id ?>', '<?= $row->tanggal ?>', '<?= $row->atlet_id ?>', '<?= $row->nama ?>')">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    <?php } else { ?>
                                                        <tr>
                                                            <td colspan="7" class="text-center">Tidak Ada Data</td>
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

    <!-- Modal Informasi Atlet-->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Informasi Atlet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered" id="example5">
                                    <thead>
                                        <tr>
                                            <th>#Act</th>
                                            <th>#No</th>
                                            <th>No.NIA</th>
                                            <th>Nama Lengkap</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Asal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($atlet) > 0) {
                                            $no = 1; ?>
                                            <?php foreach ($atlet as $row) : ?>
                                                <tr>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="pilih_atlet_tes_teknik('<?= $row->no_atlet ?>','<?= $row->nama ?>','<?= $row->tempat_lahir ?>', '<?= $row->tanggal_lahir ?>')">
                                                            Pilih
                                                        </button>
                                                    </td>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row->no_atlet ?></td>
                                                    <td><?= $row->nama ?></td>
                                                    <td><?= $row->jenis_kelamin ?></td>
                                                    <td><?= $row->asal ?></td>
                                                <?php endforeach;  ?>
                                            <?php } else { ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">Tidak Ada Atlet</td>
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


    <!-- Modal Detail Show -->
    <div class="modal fade" id="detailshow" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h5 class="modal-title" id="title-modal">-</h5> -->
                    <h5 class="modal-title" id="title-pelatih">-</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-primary mt-0 mb-1">Personal Information</h4>
                            <div class="row mb-2 mt-4">
                                <div class="col-sm-5 col-6">
                                    <h5 class="f-w-500">Tanggal Kegiatan <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="7 col-6"><span id="tanggal_show">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-5 col-6">
                                    <h5 class="f-w-500">No.Induk Atlet <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="7 col-6"><span id="nia_show">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-5 col-6">
                                    <h5 class="f-w-500">Nama Lengkap <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="7 col-6"><span id="nama_show">-</span>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-5 col-6">
                                    <h5 class="f-w-500">No.Pertandingan <span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="7 col-6"><span id="tambahan_show">-</span>
                                </div>
                            </div>
                            <div class="row mb2">
                                <div class="col-md-12 col-12">
                                    <div class="table-responsive">
                                        <table id="example3" class="display min-w850">
                                            <thead>
                                                <tr>
                                                    <th>#No</th>
                                                    <th>Komponen</th>
                                                    <th>Benchmark</th>
                                                    <th>Nilai</th>
                                                    <th>Keterangan</th>
                                                    <th>%</th>
                                                </tr>
                                            </thead>
                                            <tbody id="list_hasil_teknis">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2 mt-1">
                                <div class="col-sm-4 col-6">
                                    <h5 class="f-w-500">Hasil Kumulasi Rata - Rata<span class="pull-right">:</span>
                                    </h5>
                                </div>
                                <div class="col-sm-8 col-6"><span id="rata_rata">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Print</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->EndSection() ?>