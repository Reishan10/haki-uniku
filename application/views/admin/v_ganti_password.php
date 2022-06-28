<main class="main-content col">
    <div class="main-content-container container-fluid px-4 my-auto h-100">
        <div class="row no-gutters h-100">
            <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
                <div class="card mt-4 mb-4">
                    <div class="card-body">
                        <h5 class=" auth-form__title text-center mb-4">Ganti Password</h5>
                        <form action="<?= site_url('GantiPassword') ?>" method="post">
                            <div class="form-group mb-4">
                                <label for="old_password">Password Lama</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Password Lama">
                                <?= form_error('old_password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password2">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>