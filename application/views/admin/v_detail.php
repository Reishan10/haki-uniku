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
                <div>
                    <!-- <a href="<?= base_url('permohonan/pencipta') ?>" class="btn btn-warning mb-3 ml-2" style="float: right;">Berikutnya</a> -->
                    <!-- <a href="#" class="btn btn-warning mb-3 ml-2" style="float: right;" onclick="tambahDataJenisPermohonan()">Berikutnya</a> -->
                    <button type="submit" class="btn btn-warning mb-3 ml-2" style="float: right;">Berikutnya</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('#jenis_ciptaan').change(function(){
        $.ajax({
            url     : '<?=base_url()?>permohonan/ambilDataSubjenis', 
            type    : 'POST',
            data    : 'jenis_id='+$(this).val(), 
            success : function(response)
            {
                response = JSON.parse(response);
                let html = '';
                if (response.length > 0){
                    // swal.fire("Yeayyyy!", response.msg, "success");
                    for (i = 0; i < response.length; i++){
                        html += `<option value="${response[i].id_subjenis}">${response[i].nama_subjenis}</option>`;
                    }
                    $('#subjenis_ciptaan').html(html);
                }else{
                    html = '<option value="">---</option>';
                    $('#subjenis_ciptaan').html(html);
                    swal.fire("Ooppsss!", response.msg, "error");
                }
            },
            error   : function(err)
            {
                swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
            }
        });
    })
</script>