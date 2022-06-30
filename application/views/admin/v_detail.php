<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 text-center mb-0">
            <!-- <span class="text-uppercase page-subtitle">Blog Posts</span> -->
            <h5 class="text-uppercase">permohonan pencatatan ciptaan secara elektronik</h5>
        </div>
    </div>
    <!-- End Page Header -->
    <form method="POST" action="<?= base_url() ?>permohonan/tambahDataDetail">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                    <div class="card-body">
                        <span class="text-uppercase page-subtitle p-2">Detail</span>
                        <hr>
                        <div class="form-group row mt-3">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Permohonan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="jenis_permohonan" id="jenis_permohonan" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($jenis_permohonan as $row) { ?>
                                        <option value="<?= $row->id_jenis_permohonan ?>" <?= $row->id_jenis_permohonan == $this->session->userdata('jenis_permohonan') ? 'selected' : '' ?>><?= $row->nama_jenis_permohonan ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('jenis_permohonan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="jenis_ciptaan" id="jenis_ciptaan" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($jenis as $row) { ?>
                                        <option value="<?= $row->id_jenis ?>" <?= $row->id_jenis == $this->session->userdata('jenis_ciptaan') ? 'selected' : '' ?>><?= $row->nama_jenis ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('jenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Sub-Jenis Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="subjenis_ciptaan" id="subjenis_ciptaan" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($subjenis as $row) { ?>
                                        <option value="<?= $row->id_subjenis ?>" <?= $row->id_subjenis == $this->session->userdata('subjenis_ciptaan') ? 'selected' : '' ?>><?= $row->nama_subjenis ?></option>
                                    <?php } ?>
                                </select>
                                <?= form_error('subjenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?= $this->session->userdata('judul') != '' ? $this->session->userdata('judul') : set_value('judul') ?>">
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="uraian" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="uraian" id="uraian" rows="3" na class="form-control"><?= $this->session->userdata('uraian') != '' ? $this->session->userdata('uraian') : set_value('uraian') ?></textarea>
                                <?= form_error('uraian', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_pertama" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="tgl_pertama" id="tgl_pertama" class="form-control selector" value="<?= $this->session->userdata('tgl_pertama') != '' ? $this->session->userdata('tgl_pertama') : date("Y-m-d") ?>">
                                <?= form_error('tgl_pertama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- / Add New Post Form -->
            </div>
            <div class="col-lg-12 col-md-12">
                <!-- Add New Post Form -->
                <div class="card card-small mb-3">
                    <div class="card-body">
                        <span class="text-uppercase page-subtitle p-2">Data Kuasa</span>
                        <hr>
                        <form>
                            <div class="form-group row mt-3">
                                <label for="kuasa" class="col-sm-2 col-form-label">Melalui Kuasa</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="kuasa" name="kuasa" value="1" <?= $this->session->userdata('kuasa') == 1 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="kuasa">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="kuasa" name="kuasa" value="2" <?= $this->session->userdata('kuasa') == 2 ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="kuasa">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- / Add New Post Form -->
                <div>
                    <!-- <a href="<?= base_url('permohonan/pencipta') ?>" class="btn btn-warning mb-3 ml-2" style="float: right;">Berikutnya</a> -->
                    <!-- <a href="#" class="btn btn-warning mb-3 ml-2" style="float: right;" onclick="tambahDataJenisPermohonan()">Berikutnya</a> -->
                    <button type="submit" class="btn btn-warning mb-3 ml-2" style="float: right;">Berikutnya</button>
                </div>
            </div>
        </div>
    </form>
</div>