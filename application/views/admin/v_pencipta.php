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
                    <span class="text-uppercase page-subtitle p-2">Data Pencipta</span>
                    <a href="" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#penciptaModal">Tambah</a>
                    <hr>
                    <form>
                        <table class="transaction-history d-none">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kewarganegaraan</th>
                                    <th>Alamat</th>
                                    <th>Kode Pos</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Email/No. Telp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <!-- <tbody>
                            </tbody> -->
                        </table>
                    </form>
                </div>
            </div>
            <!-- / Add New Post Form -->
            <div>
                <a href="<?= base_url('permohonan/pemegang') ?>" class="btn btn-warning mb-3 ml-2" style="float: right;">Next</a>
                <a href="<?= base_url('permohonan/detail') ?>" class="btn btn-secondary mb-3" style="float: right;">Prev</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="penciptaModal" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Tambah Pencipta</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h6>Data Pencipta</h6>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="" id="" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="" id="" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">No Telepon</label>
                        <div class="col-sm-8">
                            <input type="number" name="" id="" class="form-control" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                        <div class="col-sm-8">
                            <select name="" id="" class="form-control select2">
                                <option value="">Indonesia</option>
                                <option value="">Malaysia</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h6>Alamat Pencipta</h6>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select name="" id="" class="form-control select2">
                                <option value="">---</option>
                                <option value="">Jawa Barat</option>
                                <option value="">Jawa Timur</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kota</label>
                        <div class="col-sm-8">
                            <input type="text" name="" id="" class="form-control" placeholder="Kota">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Negara</label>
                        <div class="col-sm-8">
                            <select name="" id="" class="form-control select2">
                                <option value="">Indonesia</option>
                                <option value="">Malaysia</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Kode Pos</label>
                        <div class="col-sm-8">
                            <input type="text" name="" id="" class="form-control" placeholder="Kode Pos">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning">Save</button>
            </div>
        </div>
    </div>
</div>