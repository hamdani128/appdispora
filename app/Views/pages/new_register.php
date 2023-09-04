<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>

    <!-- Font Icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/images/favicon.png">
    <link rel="stylesheet" href="<?=base_url()?>/landing/fonts/material-icon/css/material-design-iconic-font.min.css">
    <!--  -->



    <!-- Main css -->
    <link rel="stylesheet" href="<?=base_url()?>/landing/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>/landing/css/style2.css">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/sweetalert/sweetalert2.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/sweetalert/sweetalert2.min.css">

</head>

<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="<?=base_url()?>/landing/images/siplah2.jpeg" alt="">
                </div>
                <div class="signup-form">
                    <!--  -->

                    <!--  -->
                    <form method="POST" action="/register/save" class="register-form" id="register" name="register"
                        enctype="multipart/form-data">
                        <h2>student registration form</h2>
                        <div class="form-row pb-2" style="padding-top: 25px;">
                            <?php if (!empty(session()->getFlashdata('success'))): ?>
                            <div class="alert alert-primary"
                                style="width: 100%;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;"
                                role="alert">
                                <label for=""><?=session()->getFlashdata('success')?></label><br>
                                <p>Selanjutnya Harap Menunggu Informasi Lebih Lanjut, Atau Mengkonfimasi
                                    Admin User Untuk Bisa Mendapatkan Akun Anda. </p>
                            </div>
                            <?php endif?>
                        </div>
                        <?=csrf_field()?>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="" class="text-white">NIK KTP</label>
                                <input type="text" class="form-control" name="ktp" id="ktp" placeholder="isi KTP Anda">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="isi Nama Lengkap">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="" class="text-white">Sekolah</label>
                                <input type="text" class="form-control" name="sekolah" id="sekolah"
                                    placeholder="isi Nama Sekolah">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white">Kelas</label>
                                <input type="text" class="form-control" name="kelas" id="kelas"
                                    placeholder="isi lengkap Kelas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="" class="text-white">Asal Daerah</label>
                                <input type="text" class="form-control" name="asal" id="asal"
                                    placeholder="isi lengkap Asal Daerah">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white">Jenis Kelamin</label>
                                <select name="jk" id="jk" class="form-control">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="" class="text-white">Agama</label>
                                <select name="agama" id="agama" class="form-control">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    placeholder="isi tempat Lahir">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="" class="text-white">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    placeholder="isi Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label for="" class="text-white">Golongan Darah</label>
                                <input type="text" class="form-control" name="golongan" id="golongan"
                                    placeholder="isi Golongan Darah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">No.Telepon</label>
                            <input type="text" class="form-control" name="hp" id="hp" placeholder="isi No Telepon">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Identitas Orang Tua</label>
                            <select name="identitas_orangtua" id="identitas_orangtua" class="form-control">
                                <option value="">Pilih Identitas Orang Tua</option>
                                <option value="Ibu">Ibu</option>
                                <option value="Ayah">Ayah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Nama Orang Tua</label>
                            <input type="text" class="form-control" name="nama_orang_tua" id="nama_orang_tua"
                                placeholder="isi nama orang tua">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Pekerjaan Orang Tua</label>
                            <input type="text" class="form-control" name="pekerjaan_orang_tua" id="pekerjaan_orang_tua"
                                placeholder="isi pekerjaan tua">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Cabang Olahraga</label>
                            <select name="cabor" id="cabor" class="form-control">
                                <option value="">Pilih Cabang Olahraga</option>
                                <?php if (count($cabor) > 0) {?>
                                <?php foreach ($cabor as $row): ?>
                                <option value="<?=$row->nama_cabang?>"><?=$row->nama_cabang;?></option>
                                <?php endforeach;?>
                                <?php } else {?>

                                <?php }?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Kartu Tanda Penduduk</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="ktp_berkas" id="ktp_berkas"
                                    class="custom-file-input form-control">

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Kartu Identitas Pelajar</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="id_pelajar_berkas" id="id_pelajar_berkas"
                                    class="custom-file-input ktp_file">

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Pas Photo</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="pas_photo" id="pas_photo" class="custom-file-input">

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Ijazah Terakahir</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="izajah_berkas" id="izajah_berkas" class="custom-file-input">

                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text">Surat Kesehatan </label>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="surat_kesehatan_berkas" id="surat_kesehatan_berkas"
                                    class="custom-file-input">

                            </div>
                        </div>
                        <div class="form-group" style="padding-top: 20px;">
                            <!-- <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
                            <input type="hidden" name="action" value="validate_captcha"> -->
                            <div class="g-recaptcha" data-sitekey="6Ld9d-QfAAAAAIHz_Haf0Q_stZeGJAvROHZQGf97"></div>
                        </div>
                        <div class="form-row" style="padding-top: 25px;">
                            <button onclick="insert_register()" class="submit" type="button"
                                style="color:white;background-color: blue;width: 100%;">
                                Submit Form
                            </button>
                        </div>
                        <div class="form-row" style="padding-top: 10px;">
                            <button onclick="back_to_login()" class="submit" type="button"
                                style="color:white;background-color: black;width: 100%;">
                                Back to login
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="<?=base_url()?>/landing/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/landing/js/main.js"></script>
    <!--  -->
    <script src="<?=base_url()?>/landing/bootstrap/bootstrap.js"></script>
    <script src="<?=base_url()?>/landing/bootstrap/bootstrap.min.js"></script>

    <!-- Script -->
    <script src="<?=base_url()?>/assets/script.js"></script>
    <script src="<?=base_url()?>/assets/script2.js"></script>
    <!-- Script -->
    <script src="<?=base_url()?>/assets/sweetalert/sweetalert2.js"></script>
    <script src="<?=base_url()?>/assets/sweetalert/sweetalert2.all.js"></script>
    <script src="<?=base_url()?>/assets/sweetalert/sweetalert2.min.js"></script>
    <script src="<?=base_url()?>/assets/sweetalert/sweetalert2.all.min.js"></script>
    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Script -->
    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6LfBYuQfAAAAAG-6jcTlI6R4v_TfItSDHFCmnGHB"></script>
    <script>
    grecaptcha.ready(function() {
        // do request for recaptcha token
        // response is promise with passed token
        grecaptcha.execute('6LfBYuQfAAAAAG-6jcTlI6R4v_TfItSDHFCmnGHB', {
                action: 'validate_captcha'
            })
            .then(function(token) {
                // add token value to form
                document.getElementById('g-recaptcha-response').value = token;
            });
    });
    </script> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>