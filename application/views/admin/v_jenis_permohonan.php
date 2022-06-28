<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <h5 class="text-uppercase m-0">Jenis Permohonan</h5>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Jenis Permohonan</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalJenisPermohonan" onclick="submit('tambah')">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0 table-responsive" id="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0" style="width: 1%;">#</th>
                                    <th scope="col" class="border-0">Jenis Permohonan</th>
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
<div class="modal fade" id="modalJenisPermohonan" role="dialog" aria-labelledby="modalJenisPermohonanLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJenisPermohonanLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="jenis_permohonan">Jenis Permohonan</label>
                    <input type="text" class="form-control" id="jenis_permohonan" name="jenis_permohonan" placeholder="Jenis Permohonan">
                    <small class="text-danger jenis_permohonan-error"></small>
                    <input type="hidden" name="id" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataJenisPermohonan()">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataJenisPermohonan()">Ubah</button>
            </div>
        </div>
    </div>
</div>