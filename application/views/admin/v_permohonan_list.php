<style>
.tbl table>tr>td{
    margin-top: 0px;
    margin-bottom: 0px;
}
</style>
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
                    <a href="<?=base_url()?>permohonan">
                        <button type="button" style="float: right;" class="btn btn-warning">
                            Daftar HKI
                        </button>
                    </a>
                </div>
                <div class="table-responsive">
                    <div class="card-body">
                        <table class="table mb-0 table-responsive" id="table">
                            <thead class="bg-light">
                                <tr>
                                    <th scope="col" class="border-0" style="width: 1%;">#</th>
                                    <th scope="col" class="border-0">Permohonan</th>
                                    <th scope="col" class="border-0" style="width: 15%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($data as $key) { ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td align="left" width="100px">
                                        <div class="row">
                                            <div class="col-md-12 text-left">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h5>
                                                            <b><?=$key->permohonan_judul?></b>
                                                        </h5>
                                                    </div>
                                                    <div class="col-md-4 text-right">
                                                        <a href="<?=(@$key->file_haki == "")?'#"':base_url()."assets/files/".$key->file_haki."\"  target=\"_BLANK\""?>" class="btn btn-<?=($key->permohonan_status == "0")?'danger':'primary'?>">
                                                            <i class="fa fa-download"></i>
                                                            Unduh Sertifikat
                                                        </a>
                                                    </div>
                                                </div>

                                                <p align="justify" style="font-size: 14px"><?=$key->permohonan_uraian?> <?php 
                                                    if ($key->permohonan_status == "0"){
                                                        $badgeColor = "warning";
                                                        $badgeText  = "Proses Pendaftaran";
                                                        $badgeIcon  = "clock";
                                                    }else if ($key->permohonan_status == "1"){
                                                        $badgeColor = "success";
                                                        $badgeText  = "Approved";
                                                        $badgeIcon  = "check";
                                                    }
                                                ?>
                                                <br/><br/>
                                                <span class="badge badge-info">
                                                    <i class="fa fa-tags"></i>
                                                    <?=$key->nama_jenis_permohonan?>, <?=$key->nama_subjenis?>
                                                </span>
                                                
                                                <span class="badge badge-success">
                                                    <i class="fa fa-clock"></i>
                                                    Tanggal Pengajuan <?=date_format(date_create($key->permohonan_tanggal), "d-m-Y")?>
                                                </span>

                                                <span class="badge badge-<?=$badgeColor?>">
                                                    <i class="fa fa-<?=$badgeIcon?>"></i>
                                                    <?=$badgeText?>
                                                </span></p>
                                                

                                                <table width="100%" border="0" style="margin-left: -10px" class="tbl">
                                                    <tr>
                                                        <td colspan="4"><h6 style="text-align: left" ><b>DATA PENCIPTA</b></h6></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p style="text-align: left">Nama</p></td>
                                                        <td><p style="text-align: left">Alamat</p></td>
                                                        <td><p style="text-align: left">No. Handphone</p></td>
                                                    </tr>
                                                    
                                                    <?php
                                                        $dataPencipta = $this->m_permohonan->selectPemohon('', $key->permohonan_id)->result();
                                                        foreach ($dataPencipta as $value) {
                                                            if ($value->jenis_pemohon == "dosen"){
                                                                $dataUser = $this->db->get_where('tbl_user', ['nidn' => $value->unique_id])->row();

                                                                $nama   = @$dataUser->nama_user;
                                                                $alamat = @$dataUser->alamat_user;
                                                                $telepon= @$dataUser->telepon_user;
                                                            }else{
                                                                $result = $this->api->CallAPI('POST', base_api('/api/v1/_getAdministratif') , ['nim' => $value->unique_id]);

                                                                $result = json_decode($result);

                                                                $nama   = @$result->nama;
                                                                $alamat = @$result->alamat;
                                                                $telepon= "0".@$result->hp;
                                                            }
                                                    ?>  
                                                    <tr>
                                                        <td><p style="text-align: left"><?=@$nama?></p></td>
                                                        <td><p style="text-align: left"><?=@$alamat?></p></td>
                                                        <td><p style="text-align: left"><?=@$telepon?></p></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>

                                                <?php
                                                    $dataLampiran = $this->m_permohonan->selectLampiran('', $key->permohonan_id)->row();
                                                ?>
                                                        
                                                <table width="100%" style="margin-left: -10px" class="tbl">
                                                    <tr>
                                                        <td colspan="5"><h6 style="text-align: left"><b>LAMPIRAN</b></h6></td>
                                                    </tr>
                                                    <tr>
                                                        <td><p style="text-align: left">Surat Pengalihan Hak Cipta <a href="#" target="_BLANK">( Unduh Surat Pengalihan Hak Cipta )</a></p></td>
                                                        <td><p style="text-align: left">Surat Pernyataan <?=($this->session->userdata('role') == "admin")?'<a href="#" target="_BLANK">( Unduh Surat Pernyataan )</a>':''?></p></td>
                                                        <td><p style="text-align: left">KTP Pemohon dan Pencipta</p></td>
                                                        <td><p style="text-align: left">Contoh Ciptaan</p></td>
                                                        <td><p style="text-align: left">Contoh Ciptaan URL</p></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <p style="text-align: left">
                                                                <?php if (@$dataLampiran->surat_pengalihan_hak_cipta == ""){ ?>
                                                                    <span claas="text-danger">Tidak ada.</span>
                                                                <?php } else { ?>
                                                                    <a href="<?=base_url()?>assets/files/<?=@$dataLampiran->surat_pengalihan_hak_cipta?>" target="_BLANK">
                                                                        Unduh Surat Pengalihan Hak Cipta
                                                                    </a>
                                                                <?php } ?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <p style="text-align: left">
                                                                <?php if (@$dataLampiran->template_surat_pernyataan == ""){ ?>
                                                                    <span claas="text-danger">Tidak ada.</span>
                                                                <?php } else { ?>
                                                                    <a href="<?=base_url()?>assets/files/<?=@$dataLampiran->template_surat_pernyataan?>" target="_BLANK">
                                                                        Unduh Surat Pernyataan
                                                                    </a>
                                                                <?php } ?>
                                                            </p>
                                                        </td>
                                                        <td>
                                                            <a href="<?=base_url()?>daftarpermohonan/ktppemohon/<?=$key->permohonan_id?>" target="_BLANK">Unduh KTP</a>
                                                        </td>
                                                        <td>
                                                            <p style="text-align: left">
                                                                <?php if (@$dataLampiran->contoh_ciptaan == ""){ ?>
                                                                    <span claas="text-danger">Tidak ada.</span>
                                                                <?php }else{ ?>
                                                                    <a href="<?=base_url()?>assets/files/<?=@$dataLampiran->contoh_ciptaan?>" target="_BLANK">
                                                                        Unduh Contoh Ciptaan
                                                                    </a>
                                                                <?php } ?>
                                                            </p>
                                                            
                                                        </td>
                                                        <td>
                                                            <p style="text-align: left">
                                                                <?php if (@$dataLampiran->contoh_ciptaan_url == ""){ ?>
                                                                    <span claas="text-danger">Tidak ada.</span>
                                                                <?php } else { ?>
                                                                    <a href="<?=@$dataLampiran->contoh_ciptaan_url?>" target="_BLANK">
                                                                        <?=@$dataLampiran->contoh_ciptaan_url?>
                                                                    </a>
                                                                <?php } ?>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td>

                                    <?php if ($this->session->userdata('role') == "admin"){ ?>
                                        
                                        <a href="" class="btn btn-<?=($key->permohonan_status == "0")?'info':'danger'?>" data-toggle="modal" data-target="#modalUploadHaki<?=$key->permohonan_id?>" onclick="submit('tambah')">
                                            <i class="fa fa-cloud"></i>
                                            Unggah Berkas
                                        </a>

                                        <br/><br/>
                                        
                                        <a href="<?=base_url()?>daftarpermohonan/delete/<?=$key->permohonan_id?>" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                            Hapus permohonan
                                        </a>
                                    <?php }else{ ?>
                                        
                                        <a href="" class="btn btn-<?=($key->permohonan_status == "0")?'info':'danger'?>" data-toggle="modal" data-target="#modalUploadHaki<?=$key->permohonan_id?>" onclick="submit('tambah')">
                                            <i class="fa fa-cloud"></i>
                                            Upload Berkas Persyaratan
                                        </a>
                                    
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php if ($this->session->userdata('role') == "admin"){ ?>
    
<?php $no = 1; foreach ($data as $key) { ?>
<!-- Modal Tambah -->
<div class="modal fade" id="modalUploadHaki<?=$key->permohonan_id?>" role="dialog" aria-labelledby="modalJenisPermohonanLabel" aria-hidden="true">
<form action="<?=base_url()?>daftarpermohonan/uploadberkas/<?=$key->permohonan_id?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJenisPermohonanLabel">Upload Berkas HAKI</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="permohonan_judul">Judul</label>
                    <input type="text" class="form-control" id="permohonan_judul" name="permohonan_judul" placeholder="Jenis Permohonan" value="<?=$key->permohonan_judul?>" disabled>
                    <small class="text-danger permohonan_judul-error"></small>
                </div>
                <div class="form-group">
                    <label for="surat_pengalihan_hak_cipta<?=$key->permohonan_id?>">Surat Pengalihan Hak Cipta</label>
                    <input type="file" class="form-control" id="surat_pengalihan_hak_cipta<?=$key->permohonan_id?>" name="surat_pengalihan_hak_cipta" placeholder="Jenis Permohonan">
                    <!-- <small class="text-danger surat_pengalihan_hak_cipta-error"></small> -->
                </div>
                <div class="form-group">
                    <label for="template_surat_pernyataan<?=$key->permohonan_id?>">Surat Pernyataan</label>
                    <input type="file" class="form-control" id="template_surat_pernyataan<?=$key->permohonan_id?>" name="template_surat_pernyataan" placeholder="Jenis Permohonan">
                    <!-- <small class="text-danger template_surat_pernyataan-error"></small> -->
                </div>
                <div class="form-group">
                    <label for="file_haki<?=$key->permohonan_id?>">Sertifikat</label>
                    <input type="file" class="form-control" id="file_haki<?=$key->permohonan_id?>" name="file_haki">
                    <!-- <small class="text-danger file_haki-error"></small> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn-tambah">Simpan</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php }
}else{ ?>
  
  <?php $no = 1; foreach ($data as $key) { ?>
<!-- Modal Tambah -->
<div class="modal fade" id="modalUploadHaki<?=$key->permohonan_id?>" role="dialog" aria-labelledby="modalJenisPermohonanLabel" aria-hidden="true">
<form action="<?=base_url()?>daftarpermohonan/useruploadberkas/<?=$key->permohonan_id?>" method="post" enctype="multipart/form-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalJenisPermohonanLabel">Upload Berkas HAKI</h5>
                <button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="permohonan_judul">Judul</label>
                    <input type="text" class="form-control" id="permohonan_judul" name="permohonan_judul" placeholder="Jenis Permohonan" value="<?=$key->permohonan_judul?>" disabled>
                    <small class="text-danger permohonan_judul-error"></small>
                </div>
                <div class="form-group">
                    <label for="contoh_ciptaan<?=$key->permohonan_id?>">Contoh Ciptaan</label>
                    <input type="file" class="form-control" id="contoh_ciptaan<?=$key->permohonan_id?>" name="contoh_ciptaan">
                    <!-- <small class="text-danger contoh_ciptaan-error"></small> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn-tambah">Simpan</button>
            </div>
        </div>
    </div>
</form>
</div>
<?php }
} ?>