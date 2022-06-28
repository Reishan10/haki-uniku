<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 text-center mb-0">
            <!-- <span class="text-uppercase page-subtitle">Blog Posts</span> -->
            <h5 class="text-uppercase">permohonan pencatatan ciptaan secara elektronik</h5>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <span class="text-uppercase page-subtitle p-2">Detail</span>
                    <hr>
                    <form>
                        <div class="form-group row mt-3">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Permohonan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="" id="" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($jenis_permohonan as $row) { ?>
                                        <option value="<?= $row->id_jenis_permohonan ?>"><?= $row->nama_jenis_permohonan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="" id="" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($jenis as $row) { ?>
                                        <option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Sub-Jenis Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="" id="" class="form-control select2">
                                    <option value="">---</option>
                                    <?php foreach ($subjenis as $row) { ?>
                                        <option value="<?= $row->id_subjenis ?>"><?= $row->nama_subjenis ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword" placeholder="Judul">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="" id="" class="form-control selector" value="<?= date("Y-m-d") ?>">
                            </div>
                        </div>
                    </form>
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
                            <label for="inputPassword" class="col-sm-2 col-form-label">Melalui Kuasa</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="a" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="b">
                                <label class="form-check-label" for="exampleRadios2">
                                    No
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
            <div>
                <a href="<?= base_url('permohonan/pencipta') ?>" class="btn btn-warning mb-3 ml-2" style="float: right;">Next</a>
            </div>
        </div>
    </div>
</div>