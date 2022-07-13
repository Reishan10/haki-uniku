<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Fakultas</span>
            <h3 class="page-title">Data Fakultas</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Fakultas</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalFakultas" onclick="submit('tambah')">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0 table-responsive" id="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0" style="width: 1%;">#</th>
                                    <th scope="col" class="border-0">Fakultas</th>
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

<div class="main-content-container container-fluid px-4" id="formDataProdi" style="display: none;">
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Program Studi</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalProdi" onclick="submitProdi('tambah',id)">
                        Tambah Data
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0 table-responsive dataTablesJenis">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0" style="width: 1%;">#</th>
                                    <th scope="col" class="border-0">Program Studi</th>
                                    <th scope="col" class="border-0">Fakultas</th>
                                    <th scope="col" class="border-0">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_prodi">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Fakultas -->
<div class="modal fade" id="modalFakultas" role="dialog" aria-labelledby="modalFakultasLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFakultasLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas">
                    <small class="text-danger fakultas-error"></small>
                    <input type="hidden" name="id" value="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataFakultas()">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataFakultas()">Ubah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProdi" role="dialog" aria-labelledby="modalProdiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalProdiLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="fakultas">Fakultas</label>
                    <input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" disabled>
                    <small class="text-danger fakultas-error"></small>
                    <input type="hidden" name="id" value="">
                </div>
                <div class="form-group">
                    <label for="prodi">Program Studi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi">
                    <small class="text-danger prodi-error"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn-tambahProdi" onclick="tambahDataProdi()">Tambah</button>
                <button type="button" class="btn btn-primary" id="btn-ubahProdi" onclick="ubahDataProdi()">Ubah</button>
            </div>
        </div>
    </div>
</div>