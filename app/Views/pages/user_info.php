<?= $this->Extend('template/index'); ?>
<?= $this->Section('content'); ?>
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Users Info</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users Info</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="nav nav-pills mb-4 light">
                            <li class=" nav-item">
                                <a href="#navpills-1" class="nav-link active" data-toggle="tab"
                                    aria-expanded="false">Atlet</a>
                            </li>
                            <li class="nav-item">
                                <a href="#navpills-2" class="nav-link" data-toggle="tab" aria-expanded="false">
                                    Pelatih</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="navpills-1" class="tab-pane active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#No</th>
                                                        <th>Username</th>
                                                        <th>Fullname</th>
                                                        <th>Cabor</th>
                                                        <th>Identity Users</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Status</th>
                                                        <th>Creted at</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($atlet) > 0) {$no = 1;?>
                                                    <?php foreach ($atlet as $row): ?>
                                                    <tr>
                                                        <td><?=$no++;?></td>
                                                        <td><?=$row->username;?></td>
                                                        <td><?=$row->fullname;?></td>
                                                        <td><?=$row->departemen;?></td>
                                                        <td><?=$row->sub;?></td>
                                                        <td><?=$row->jk;?></td>
                                                        <td><?=$row->status;?></td>
                                                        <td><?=$row->created_at;?></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php } else {?>
                                                    <tr>
                                                        <td colspan="8">
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
                            <div id="navpills-2" class="tab-pane">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="example3" class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#No</th>
                                                        <th>Username</th>
                                                        <th>Nama Lengkap</th>
                                                        <th>Cabor</th>
                                                        <th>Identity Users</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Status</th>
                                                        <th>Creted at</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (count($pelatih) > 0) {$no = 1;?>
                                                    <?php foreach ($pelatih as $row): ?>
                                                    <tr>
                                                        <td><?=$no++;?></td>
                                                        <td><?=$row->username;?></td>
                                                        <td><?=$row->fullname;?></td>
                                                        <td><?=$row->departemen;?></td>
                                                        <td><?=$row->sub;?></td>
                                                        <td><?=$row->jk;?></td>
                                                        <td><?=$row->status;?></td>
                                                        <td><?=$row->created_at;?></td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                    <?php } else {?>
                                                    <tr>
                                                        <td colspan="8">
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
            </div>
        </div>
    </div>
</div>

<?= $this->EndSection(); ?>