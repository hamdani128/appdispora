<?=$this->Extend('template/index') ?>
<?=$this->Section('content') ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Cabang Olahraga</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Cabang Olahraga</a></li>
    </ol>
</div>

<!-- Row -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row pb-2">
                    <button class="btn btn-info btn-md" data-toggle="modal" data-target="#modelId">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <button class="btn btn-success btn-md">
                        <i class='fa fa-file-excel-o'></i> Import Excel
                    </button>
                </div>
                <div class="row pt-2">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table id="example3" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>#No</th>
                                        <th>Nama Cabang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($cabor) > 0) {$no = 1; ?>
                                    <?php foreach ($cabor as $row): ?>
                                    <tr>
                                        <td><?=$no++; ?></td>
                                        <td><?=$row->nama_cabang; ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#" class="btn btn-warning shadow btn-xs sharp mr-1"
                                                    onclick="update_show_cabor('<?=$row->id; ?>')" data-toggle="modal"
                                                    data-target="#updateData"><i class="fa fa-pencil"></i></a>
                                                <a href="#" class="btn btn-danger shadow btn-xs sharp"
                                                    onclick="delete_cabor('<?=$row->id; ?>', '<?=$row->nama_cabang; ?>')">
                                                    <i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                    <?php } else { ?>
                                    <tr>
                                        <td colspan="3">
                                            <div class="alert alert-info">
                                                <i class="fa fa-info-circle"></i>
                                                Data tidak ditemukan
                                            </div>
                                        </td>
                                    </tr>l;
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

<!-- Modal Tambah -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" id="tambah_cabang">
                            <div class="form-group">
                                <label for="">Nama Cabang Olahraga</label>
                                <textarea class="form-control" name="cabang" id="cabang" cols="30" rows="2"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="simpan_cabor()" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
    </div>
</div>

<!--Modal update Dataa-->
<div class="modal fade" id="updateData" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="update_cabang">
                    <input type="hidden" name="id_update" id="id_update">
                    <div class="form-group">
                        <label for="">Nama Cabang Olahraga</label>
                        <textarea class="form-control" name="cabang_update" id="cabang_update" cols="30"
                            rows="2"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning" onclick="update_data_cabor()">Update</button>
            </div>
        </div>
    </div>
</div>


<?=$this->EndSection() ?>