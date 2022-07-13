<div class="main-content-container container-fluid px-4">
    <div class="row mt-4">
        <div class="col-sm-12 col-lg-5">
            <!-- User Details Card -->
            <div class="card card-small user-details mb-4">
                <div class="card-header p-0">
                    <div class="user-details__bg">
                        <img src="<?= base_url() ?>assets/images/user-profile/up-user-details-background.jpg" alt="User Details Background Image">
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="user-details__avatar mx-auto">
                        <img src="<?= base_url() ?>assets/images/user-profile/<?= $user->foto_user ?>" alt="User Avatar">
                    </div>
                    <h4 class="text-center m-0 mt-2 mb-2"><?= $user->nama_user ?></h4>
                    <h4 class="text-center m-0 mt-2 mb-2"><?= $user->nidn ?></h4>
                    <div class="user-details__user-data border-top border-bottom p-4">
                        <div class="row mb-3">
                            <div class="col w-50">
                                <span class="mb-1">Email</span>
                                <span><?= $user->email_user ?></span>
                            </div>
                            <div class="col w-50">
                                <span class="mb-1">No Telepon</span>
                                <span><?= $user->telepon_user ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col w-50">
                                <span class="mb-1">Alamat</span>
                                <span><?= $user->alamat_user ?></span>
                            </div>
                            <div class="col w-50">
                                <span class="mb-1">Kota</span>
                                <span><?= $user->nama_kota ?></span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col w-50">
                                <span class="mb-1">Negara</span>
                                <span><?= $user->nama_negara ?></span>
                            </div>
                            <div class="col w-50">
                                <span class="mb-1">Kode POS</span>
                                <span><?= $user->kode_pos ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End User Details Card -->
        </div>
        <div class="col-sm-12 col-lg-7">
            <div class="card card-small user-details mb-4">
                <div class="card-header">
                    <h5><span class="text-uppercase">Edit Profile</span></h5>
                    <hr>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                        <small class="text-danger nama-error"></small>
                        <input type="hidden" name="id" value="<?= $this->session->userdata('id_user') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <small class="text-danger email-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
                        <small class="text-danger no_telepon-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="1" placeholder="Alamat"></textarea>
                        <small class="text-danger alamat-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <select name="kota" id="kota" class="form-control select2">
                            <option value="">-- Kota --</option>
                            <?php foreach ($kota as $row) { ?>
                                <option value="<?= $row->id_kota ?>"><?= $row->type ?>. <?= $row->nama_kota ?></option>
                            <?php } ?>
                        </select>
                        <small class="text-danger kota-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <select name="negara" id="negara" class="form-control select2">
                            <option value="">-- Negara --</option>
                            <?php foreach ($negara as $row) { ?>
                                <option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
                            <?php } ?>
                        </select>
                        <small class="text-danger negara-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                        <small class="text-danger kode_pos-error"></small>
                    </div>
                    <div class="form-group">
                        <label for="image">Image Profile</label>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Kode Pos">
                        <small class="text-danger image-error"></small>
                    </div>
                    <button type="button" class="btn btn-warning" id="btn-ubah" style="float: right;" onclick="ubahDataProfile()">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>