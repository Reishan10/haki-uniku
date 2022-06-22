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
                    <span class="text-uppercase page-subtitle p-2">Lampiran</span>
                    <hr>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Salinan Resmi Akta Pendirian Badan Hukum</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Contoh Ciptaan</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Contoh Ciptaan (Link)</label>
                                    <textarea name="" id="" rows="1" class="form-control" placeholder="URL"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Scan KTP Pemohon Dan Pencipta</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Surat Pernyataan</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti Pengalihan Hak Cipta</label>
                                    <input type="file" name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="" class="btn btn-warning mb-2 ml-2" style="float: right;" data-toggle="modal" data-target="#pertinjauModal">Submit</a>
            <a href="<?= base_url('permohonan/pemegang') ?>" class="btn btn-secondary mb-3" style="float: right;">Prev</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="pertinjauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Pertinjau Permohonan Hak Cipta</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="dataPencipta-tab" data-toggle="tab" href="#dataPencipta" role="tab" aria-controls="dataPencipta" aria-selected="false">Pencipta Dan Pemegang Hak Cipta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="lampiran-tab" data-toggle="tab" href="#lampiran" role="tab" aria-controls="lampiran" aria-selected="false">Lampiran</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                            <table class="table mb-0 table-responsive table-bordered" style="font-size: 12px;">
                                <tr>
                                    <th>Jenis Permohonan</th>
                                    <td>UMK, Lembaga Pendidikan, Lembabaga Litbang Pemerintah</td>
                                </tr>
                                <tr>
                                    <th>Jenis Ciptaan</th>
                                    <td>Karya Tulis</td>
                                </tr>
                                <tr>
                                    <th>Sub Jenis Ciptaan</th>
                                    <td>Buku</td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td>Buku Pembelajaran</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>Sumber Belajar</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pertama Kali Diumumkan</th>
                                    <td><?= date("Y-m-d") ?></td>
                                </tr>
                                <tr>
                                    <th>Negara Pertama Kali Diumumkan</th>
                                    <td>Indonesia</td>
                                </tr>
                                <tr>
                                    <th>Kota Pertama Kali Diumumkan</th>
                                    <td>Kuningan</td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="dataPencipta" role="tabpanel" aria-labelledby="dataPencipta-tab">
                            <table class="table mb-0 table-responsive table-bordered" style="font-size: 10px;">
                                <p class="mb-2">Data Pencipta</p>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kewarganegaraan</th>
                                        <th>Alamat</th>
                                        <th>Kode Pos</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                    </tr>
                                    <tr>
                                        <td>Nunu Nugraha</td>
                                        <td>Indonesia</td>
                                        <td>Jln. cut nya dien No.36</td>
                                        <td>45511</td>
                                        <td>Kab. Kuningan</td>
                                        <td>Jawa Barat</td>
                                    </tr>
                                </thead>
                            </table>
                            <hr>
                            <table class="table mb-0 table-responsive table-bordered" style="font-size: 10px;">
                                <p class="mb-2">Data Pemegang Hak Cipta</p>
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Kewarganegaraan</th>
                                        <th>Alamat</th>
                                        <th>Kode Pos</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                    </tr>
                                    <tr>
                                        <td>PUSHAKI Univesitas Kuningan</td>
                                        <td>Indonesia</td>
                                        <td>Jln. cut nya dien No.36</td>
                                        <td>45511</td>
                                        <td>Kab. Kuningan</td>
                                        <td>Jawa Barat</td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                            <table class="table mb-0 table-responsive table-bordered" style="font-size: 12px;">
                                <tr>
                                    <th>Salinan Resmi Akta Pendirian Badan Hukum</th>
                                    <td>Salinan Resmi.pdf</td>
                                </tr>
                                <tr>
                                    <th>Scan KTP Pemohon Dan Pencipta</th>
                                    <td>Ktp.pdf</td>
                                </tr>
                                <tr>
                                    <th>Surat Pernyataan</th>
                                    <td>Pernyataan.pdf</td>
                                </tr>
                                <tr>
                                    <th>Contoh Ciptaan</th>
                                    <td>Ciptaan.pdf</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <hr>
                <p class="m-0">Apakah data diatas sesuai ?</p>
                <button type="button" class="btn btn-secondary mt-1" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning mt-1">Save</button>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>