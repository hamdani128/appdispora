<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <?php if ($userinfo['level'] == 'Super Admin' || $userinfo['level'] == 'Root'): ?>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-networking"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/">Dashboard</a></li>
                </ul>
            </li>
            <?php endif;?>

            <?php if ($userinfo['level'] == 'Super Admin' || $userinfo['level'] == 'Root'): ?>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Cabang Olahraga</span>
                </a>

                <ul aria-expanded="false">
                    <li><a href="/cabor">List Cabang Olahraga</a></li>
                    <?php if(count($list_cabor)>0) { ?>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Performansi / Statistik</a>
                        <ul aria-expanded="false">
                            <?php foreach ($list_cabor as $cabor): ?>
                            <li><a href="/performansi/<?= $cabor->id; ?>"><?= $cabor->nama_cabang; ?></a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <?php } ?>
                </ul>

            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Database</span>
                </a>
                <ul aria-expanded="false">
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Atlet</a>
                        <ul aria-expanded="false">
                            <li><a href="/atlet">Atlet</a></li>
                            <li><a href="/alumni_atlet">Alumni</a></li>
                        </ul>
                    </li>
                    <li><a href="/pelatih">Pelatih</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Registasi</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/data_register">Data Registrasi</a></li>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Users Info</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/users/info">Data User Active</a></li>
                </ul>
            </li>
            <?php elseif ($userinfo['level'] == 'atlet' || $userinfo['level'] == 'Root'): ?>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Hasil Tes</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="/hasil_tes_teknik">Hasil Tes Teknik</a></li>
                    <li><a href="/hasil_tes_fisik">Hasil Tes Fisik</a></li>
                </ul>
            </li>
            <?php elseif ($userinfo['level'] == 'pelatih' || $userinfo['level'] == 'Root'): ?>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Performansi</span>
                </a>
                <ul aria-expanded="false">
                    <?php if($userinfo['level'] == 'pelatih' && $userinfo['sub'] == 'Teknik') : ?>
                    <li><a href="/tes_teknik">Tes Teknik</a></li>
                    <?php elseif($userinfo['level'] == 'pelatih' && $userinfo['sub'] == 'Fisik') : ?>
                    <li><a href="/tes_fisik">Tes Fisik</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-layer-1"></i>
                    <span class="nav-text">Master Pelatih</span>
                </a>
                <ul aria-expanded="false">
                    <?php if($userinfo['level'] == 'pelatih' && $userinfo['sub'] == 'Teknik') : ?>
                    <li><a href="/indikator_teknik">Indikator Teknik</a></li>
                    <?php elseif($userinfo['level'] == 'pelatih' && $userinfo['sub'] == 'Fisik') : ?>
                    <li><a href="/indikator_fisik">Indikator Fisik</a></li>
                    <?php endif; ?>
                </ul>
            </li>
            <?php endif;?>
        </ul>
    </div>
</div>