<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Provinsi</span>
            <h3 class="page-title">Data Provinsi</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Provinsi</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalProvinsi" onclick="submit('tambah')">
                        Tambah Data
                    </button>
                </div>
                <div class="card-body">
                    <table class="table mb-0" id="table">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" class="border-0" style="width: 1%;">#</th>
                                <th scope="col" class="border-0">Provinsi</th>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalProvinsi" role="dialog" aria-labelledby="modalProvinsiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProvinsiLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi">
                    <small class="text-danger provinsi-error"></small>
                    <input type="hidden" name="id" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataProvinsi()">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataProvinsi()">Ubah</button>
            </div>
        </div>
    </div>
</div>