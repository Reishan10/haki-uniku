<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Kota</span>
            <h3 class="page-title">Data Kota</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Kota</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalKota" onclick="submit('tambah')">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0" id="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0" style="width: 1%;">#</th>
                                    <th scope="col" class="border-0">Kota</th>
                                    <th scope="col" class="border-0">Type</th>
                                    <th scope="col" class="border-0">Provinsi</th>
                                    <th scope="col" class="border-0">Kode Pos</th>
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
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalKota" role="dialog" aria-labelledby="modalKotaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalKotaLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                    <small class="text-danger kota-error"></small>
                    <input type="hidden" name="id" value="">
                </div>
                <div class="form-group">
                    <label for="type">Type</label>
                    <select name="type" id="type" class="form-control select2">
                        <option value="">-- Type --</option>
                        <option value="Kota">Kota</option>
                        <option value="Kabupaten">Kabupaten</option>
                    </select>
                    <small class="text-danger type-error"></small>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select name="provinsi" id="provinsi" class="form-control select2">
                        <option value="">-- Provinsi --</option>
                        <?php foreach ($provinsi as $row) { ?>
                            <option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
                        <?php } ?>
                    </select>
                    <small class="text-danger provinsi-error"></small>
                </div>
                <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                    <small class="text-danger kode_pos-error"></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                    <button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataKota()">Tambah</button>
                    <button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataKota()">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>