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
                    <a href="" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#penciptaModal" onclick="submit('tambah')">Tambah</a>
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
                <a href="<?= base_url('permohonan/pemegang') ?>" class="btn btn-warning mb-3 ml-2" style="float: right;">Berikutnya</a>
                <a href="<?= base_url('permohonan/detail') ?>" class="btn btn-secondary mb-3" style="float: left;">Sebelumnya</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="penciptaModal" role="dialog" aria-labelledby="penciptaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="penciptaModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <h6>Data Pencipta</h6>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="nama" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="email" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="no_telepon" class="col-sm-4 col-form-label">No Telepon</label>
                        <div class="col-sm-8">
                            <input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
                        <div class="col-sm-8">
                            <select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
                                <option value="">---</option>
                                <?php foreach ($negara as $row) { ?>
                                    <option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <h6>Alamat Pencipta</h6>
                    <hr>
                    <div class="form-group row mt-3">
                        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                        <div class="col-sm-8">
                            <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
                        <div class="col-sm-8">
                            <select name="provinsi" id="provinsi" class="form-control select2">
                                <option value="">---</option>
                                <?php foreach ($provinsi as $row) { ?>
                                    <option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="kota" class="col-sm-4 col-form-label">Kota</label>
                        <div class="col-sm-8">
                            <select name="kota" id="kota" class="form-control select2">
                                <option value="">---</option>
                                <?php foreach ($kota as $row) { ?>
                                    <option value="<?= $row->id_kota ?>"><?= $row->nama_kota ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="negara" class="col-sm-4 col-form-label">Negara</label>
                        <div class="col-sm-8">
                            <select name="negara" id="negara" class="form-control select2">
                                <option value="">---</option>
                                <?php foreach ($negara as $row) { ?>
                                    <option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label for="kode_pos" class="col-sm-4 col-form-label">Kode Pos</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning" id="btn-tambah" onclick="tambahDataPencipta()">Simpan</button>
                <button type="button" class="btn btn-warning" id="btn-ubah" onclick="ubahDataPencipta()">Ubah</button>
            </div>
        </div>
    </div>
</div>