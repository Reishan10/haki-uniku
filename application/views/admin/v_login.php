<!doctype html>
<html class="no-js h-100" lang="en">

<!-- Mirrored from designrevision.com/demo/shards-dashboards/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 11:13:12 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $title ?></title>
    <meta name="description" content="A premium collection of beautiful hand-crafted Bootstrap 4 admin dashboard templates and dozens of custom components built for data-driven applications.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles/extras.1.3.1.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/styles/accents/warning.1.3.1.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/loading.css">
    <script async defer src="<?= base_url() ?>assets/js/buttons.js"></script>
</head>

<body class="h-100">
    <div class="loading overlay">
        <div class="lds-dual-ring"></div>
    </div>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <main class="main-content col">
                <div class="main-content-container container-fluid px-4 my-auto h-100">
                    <div class="row no-gutters h-100">
                        <div class="col-lg-3 col-md-5 mx-auto my-auto">
                            <div class="card">
                                <div class="card-header bg bg-info text-white">
                                    <b>Selamat Datang di Aplikasi PUSHAKI</b>
                                    <p style="font-size: 10px">Pusat Layanan Hak Kekayaan Intelektual Universitas Kuningan</p>
                                </div>
                                <div class="card-body">
                                    <img class="auth-form__logo d-table mx-auto mb-3" src="<?= base_url() ?>assets/images/shards-dashboards-logo-warning.svg" alt="" style="float: left; margin-top: -50px; position: absolute;">
                                    <form action="<?= site_url('login/post_login') ?>" method="POST">
                                        <div class="form-group">
                                            <label for="email">NIDN</label>
                                            <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>" placeholder=" NIDN">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Login</button>
                                        <i class="fas fa"></i>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="auth-form__meta d-flex mt-4">
                                <a href="#" class="d-table mx-auto">Lupa kata sandi Anda?</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/shards.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.sharrre.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/extras.1.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/shards-dashboards.1.3.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.loading').fadeOut(300);
        })

        <?php if ($this->session->flashdata('error')) { ?>
            let pesan = <?= json_encode($this->session->flashdata('error')) ?>;
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: pesan
            });
        <?php } ?>
    </script>
</body>

<!-- Mirrored from designrevision.com/demo/shards-dashboards/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 11 May 2022 11:13:12 GMT -->

</html>