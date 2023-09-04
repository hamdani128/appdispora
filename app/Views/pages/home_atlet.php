<?=$this->extend('template/index');?>
<?=$this->Section('content')?>
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                </div>
                <div class="profile-info">
                    <div class="profile-photo">
                        <img src="<?= base_url() ?>/assets/images/profile/profile.png" class="img-fluid rounded-circle"
                            alt="">
                    </div>
                    <div class="profile-details">
                        <div class="profile-name px-3 pt-2">
                            <h4 class="text-primary mb-0"><?= $profile->nama; ?></h4>
                            <p>Atlet Cabang Olahraga <?= $profile->cabor; ?></p>
                        </div>
                        <div class="profile-email px-2 pt-2">
                            <h4 class="text-muted mb-0"><?= $profile->no_atlet; ?></h4>
                            <p>No.Atlet</p>
                        </div>
                        <div class="dropdown ml-auto">
                            <a href="#" class="btn btn-primary light sharp">
                                <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z"
                                        fill="currentColor"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                    class="nav-link active show">About Me</a>
                            </li>
                            <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                    class="nav-link">Setting</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane fade active show">
                                <div class="profile-about-me">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                        <h4 class="text-primary">About Me</h4>
                                        <p class="mb-2">-</p>
                                    </div>
                                </div>
                                <div class="profile-personal-info">
                                    <h4 class="text-primary mb-4">Personal Information</h4>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->nama; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">NIK <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->nik; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Sekolah <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->sekolah; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Kelas <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->kelas; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Asal Daerah<span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->asal; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Jenis Kelamin <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->jenis_kelamin; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">TTL <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->tempat_lahir; ?>,
                                                <?= $profile->tanggal_lahir; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">No.Telepon <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->hp; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Golongan Darah <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->golongan; ?></span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Tahun Golongan Atlet <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $profile->tahun; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="profile-settings" class="tab-pane fade">
                                <div class="pt-3">
                                    <div class="settings-form">
                                        <h4 class="text-primary">Account Setting</h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Username</label>
                                                    <input type="text" placeholder="Username" class="form-control"
                                                        readonly value="<?= $profile->no_atlet; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="text" placeholder="New Password" class="form-control"
                                                    name="new_password" id="new_password">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="text" placeholder="Confirm New Password"
                                                    class="form-control" name="confirm_new_password"
                                                    id="confirm_new_password">
                                            </div>
                                            <button class="btn btn-info" type="button">
                                                <i class="fa fa-edit"></i>
                                                Update Password
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="replyModal">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Post Reply</h5>
                                    <button type="button" class="close"
                                        data-dismiss="modal"><span>&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <textarea class="form-control" rows="4">Message</textarea>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger light"
                                        data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->EndSection()?>