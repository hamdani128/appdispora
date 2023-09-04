<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?= $title; ?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/images/favicon.png">
    <link href="<?=base_url()?>/assets/css/style.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-5">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <div class="col-md-12">
                                            <img src="<?= base_url() ?>/assets/images/logo-sumut.svg"
                                                style="height: 100px;width: 100px;" alt="">
                                            <h2 class="" style="color:white;font-weight: bold;">SIPLAH ATLET PPLP
                                                </h1>
                                        </div>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sistem Informasi Perkembangan Latihan Atlet
                                        PPLP</h4>
                                    <div class="row justify-content-center pt-1">
                                        <!-- Alert -->
                                        <?php if (!empty(session()->getFlashdata('fail'))): ?>
                                        <div class="alert alert-danger left-icon-big alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-alert"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-2">Loading failed!</h5>
                                                    <p class="mb-0"><?=session()->getFlashdata('fail')?>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif?>

                                        <?php if (!empty(session()->getFlashdata('logout'))): ?>
                                        <div class="alert alert-success left-icon-big alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-check-circle-outline"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-2">Notification !</h5>
                                                    <p class="mb-0"><?=session()->getFlashdata('logout')?>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif?>

                                        <?php if (!empty(session()->getFlashdata('warning'))): ?>
                                        <div class="alert alert-warning left-icon-big alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <div class="media">
                                                <div class="alert-left-icon-big">
                                                    <span><i class="mdi mdi-help-circle-outline"></i></span>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mt-1 mb-2">Pending!</h5>
                                                    <p class="mb-0"><?=session()->getFlashdata('warning')?>.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif?>
                                        <!-- End Alert -->
                                    </div>
                                    <form action="/auth/check" method="POST" id="login" enctype="multipart/form-data">
                                        <?=csrf_field()?>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Username</strong></label>
                                            <input type="text" class="form-control" name="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <a class="text-white" href="page-forgot-password.html">Forgot
                                                    Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">
                                                Sign In
                                            </button>
                                        </div>
                                        <div class="text-center pt-3">
                                            <button type="button" class="btn bg-info text-white btn-block"
                                                onclick="open_register();">
                                                Register Atlet
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


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?=base_url()?>/assets/vendor/global/global.min.js"></script>
    <script src="<?=base_url()?>/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?=base_url()?>/assets/js/custom.min.js"></script>
    <script src="<?=base_url()?>/assets/js/deznav-init.js"></script>
    <script src="<?=base_url()?>/assets/script2.js"></script>
</body>

</html>