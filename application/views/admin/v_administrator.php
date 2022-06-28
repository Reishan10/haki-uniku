<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Administrator</span>
            <h3 class="page-title">Data Administrator</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Administrator</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalAdministrator" onclick="submit('tambah')">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0" id="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Nama</th>
                                    <th scope="col" class="border-0">Email</th>
                                    <th scope="col" class="border-0">No Telepon</th>
                                    <th scope="col" class="border-0">ID Author</th>
                                    <th scope="col" class="border-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Default Light Table -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalAdministrator" role="dialog" aria-labelledby="modalAdministratorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAdministratorLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="submit('tutup')">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                            <small class="text-danger nama-error"></small>
                            <input type="hidden" name="id" value="">
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
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapura">Singapura</option>
                                <option value="Filipina">Filipina</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                            <small class="text-danger kewarganegaraan-error"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                                <option value="Indonesia">Indonesia</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Singapura">Singapura</option>
                                <option value="Filipina">Filipina</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Vietnam">Vietnam</option>
                            </select>
                            <small class="text-danger negara-error"></small>
                        </div>
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                            <small class="text-danger kode_pos-error"></small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataAdministrator()">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataAdministrator()">Ubah</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel">Detail Author</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive" id="modalUserDetail">
                <table class="table" id="tblDetail" style="font-size: 12px;">
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>