<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">author</span>
            <h3 class="page-title">Data Author</h3>
        </div>
    </div>
    <!-- End Page Header -->
    <!-- Default Light Table -->
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0">Data Author</h6>
                    <button type="button" style="float: right;" class="btn btn-warning" onclick="submit('tambah')">
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
                                    <th scope="col" class="border-0">Jumlah Permohonan</th>
                                    <th scope="col" class="border-0">Total HAKI</th>
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

<!-- Tambah & Edit -->
<div class="main-content-container container-fluid px-4" id="formData" style="display: none;">
    <div class="row">
        <div class="col">
            <div class="card card-small mb-4">
                <div class="card-header border-bottom">
                    <h6 class="m-0" id="formLabel"></h6>
                </div>
                <div class="card-body">
                    <form id="submit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nidn">NIDN</label>
                                    <input type="text" class="form-control" id="nidn" name="nidn" placeholder="1872xxx">
                                    <small class="text-danger nidn-error"></small>
                                </div>
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
                                        <option value="">-- Kewarganegaraan --</option>
                                        <?php foreach ($negara as $row) { ?>
                                            <option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger kewarganegaraan-error"></small>
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
                            </div>
                            <div class="col-md-6">
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
                                    <input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                                    <small class="text-danger kode_pos-error"></small>
                                </div>

                                <div class="form-group">
                                    <label for="kewarganegaraan">Kewarganegaraan</label>
                                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
                                        <option value="">-- Kewarganegaraan --</option>
                                        <?php foreach ($negara as $row) { ?>
                                            <option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger kewarganegaraan-error"></small>
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <select name="fakultas" id="fakultas" class="form-control select2">
                                        <option value="">-- Fakultas --</option>
                                        <?php foreach ($fakultas as $row) { ?>
                                            <option value="<?= $row->fakultas_nama ?>"><?= ucwords($row->fakultas_nama) ?></option>
                                        <?php } ?>
                                    </select>
                                    <small class="text-danger fakultas-error"></small>
                                </div>

                                <div class="form-group">
                                    <label for="prodi">Program Studi</label>
                                    <select name="prodi" id="prodi" class="form-control select2">
                                        <option value="">-- Program Studi --</option>
                                    </select>
                                    <small class="text-danger prodi-error"></small>
                                </div>

                                <div class="form-group">
                                    <label for="scan_ktp">Scan KTP</label>
                                    <input type="file" class="form-control" id="scan_ktp" name="scan_ktp">
                                    <small class="text-danger scan_ktp-error"></small>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-warning" id="btn-tambah" style="float: right;">Tambah</button>
                                    <button type="button" class="btn btn-warning" id="btn-ubah" style="float: right;" onclick="ubahDataAuthor()">Ubah</button>
                                    <button type="button" class="btn btn-secondary mr-2" onclick="tutup(event)" style="float: right;">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
            <div class="modal-body table-responsive" id="modalUserDetail" style="width: 100%;">
                <table class="table" id="tblDetail" style="font-size: 12px;">
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.select2').select2({
        dropdownCssClass: "myFont",
        selectionCssClass: "myFont"
    });

    $('#fakultas').change(function() {
        $.ajax({
            url: '<?= base_url() ?>author/ambilDataProdi',
            type: 'POST',
            data: 'fakultas_nama=' + $(this).val(),
            success: function(response) {
                response = JSON.parse(response);
                let html = '';
                if (response.length > 0) {
                    // swal.fire("Yeayyyy!", response.msg, "success");
                    for (i = 0; i < response.length; i++){
                        html += `<option value="${response[i].prodi_id}">${ucwords(response[i].prodi_nama)}</option>`;
                    }
                    $('#prodi').html(html);
                } else {
                    html = '<option value="">---</option>';
                    $('#prodi').html(html);
                    // swal.fire("Ooppsss!", response.msg, "error");
                }
            },
            error: function(err) {
                swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
            }
        });
    });

    function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}
</script>