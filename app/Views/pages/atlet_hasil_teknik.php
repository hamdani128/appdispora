<?=$this->Extend('template/index')?>
<?=$this->Section('content')?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Atlet</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Hasil Tes Teknik</a></li>
    </ol>
</div>

<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-white">
                <h4 class="card-title mb-0">Hasil Tes Teknik</h4>
            </div>
            <div class="card-body p-0">
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
                            <?php if(count($perfom) > 0) { $no=1; ?>
                            <?php foreach($perfom as $row): ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row->tanggal?></td>
                                <td><?=$row->atlet_id?></td>
                                <td><?=$row->nama?></td>
                                <td><?=$row->no_pertandingan?></td>
                                <td><?=$row->hasil?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#detailshow"
                                        onclick="show_detail_teknik('<?=$row->id?>', '<?=$row->tanggal?>', '<?=$row->atlet_id?>')">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                <?php endforeach; ?>
                                <?php }else { ?>
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
                        <h5 class="text-primary mt-0 mb-1">Personal Information</h4>
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
<?=$this->EndSection()?>