<?= $this->Extend('template/index'); ?>
<?= $this->Section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Data Alumni</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Alumni Atlet</a></li>
    </ol>
</div>

<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header bg-white">
                <h4 class="card-title mb-0">Informasi Data Alumni Atlet</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="example5" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
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
                            <?php if (count($alumni) > 0) {$no = 1;?>
                            <?php foreach ($alumni as $row): ?>
                            <tr>
                                <td><?=$no++;?></td>
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
                                <td colspan="9">
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
<?= $this->endSection(); ?>