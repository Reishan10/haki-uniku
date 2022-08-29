
<!-- Modal Lampiran -->
<div class="modal fade" id="pertinjauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLongTitle">Pratinjau Permohonan Hak Cipta</h6>
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
                                    <td><?=@$this->db->get_where('tbl_jenis_permohonan', ['id_jenis_permohonan' => @$jenis_permohonan])->row()->nama_jenis_permohonan?></td>
                                </tr>
                                <tr>
                                    <th>Sub Jenis Ciptaan</th>
                                    <td><?=@$this->db->get_where('tbl_subjenis', ['id_subjenis' => @$subjenis_ciptaan])->row()->nama_subjenis?></td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td><?=@$judul?></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?=@$uraian?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pertama Kali Diumumkan</th>
                                    <td><?= @$tgl_pertama ?></td>
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
                                    <?php
                                    for ($i = 0; $i < count($pencipta); $i++){
                                    ?>
                                    <tr>
                                        <td><?=$pencipta[$i][0]?> - <?=$pencipta[$i][1]?></td>
                                        <td><?=$pencipta[$i][2]?></td>
                                        <td><?=$pencipta[$i][3]?></td>
                                        <td><?=$pencipta[$i][4]?></td>
                                        <td><?=$pencipta[$i][5]?></td>
                                        <td><?=$pencipta[$i][6]?></td>
                                    </tr>
                                    <?php } ?>
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
                                        <td><?=@$pemegangHAKI->nama?></td>
                                        <td><?=@$pemegangHAKI->kewarganegaraan?></td>
                                        <td><?=@$pemegangHAKI->alamat?></td>
                                        <td><?=@$pemegangHAKI->kode_pos?></td>
                                        <td><?=@$pemegangHAKI->kota?></td>
                                        <td><?=@$pemegangHAKI->provinsi?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
                            <table class="table mb-0 table-responsive table-bordered" width="100%" style="font-size: 12px;">
                                <!-- <tr>
                                    <td width="40%">Contoh Ciptaan</td>
                                    <td width="100%"><?=@$contoh_ciptaan?></td>
                                </tr> -->
                                <tr>
                                    <td>Contoh Ciptaan (LINK)</td>
                                    <td><?=@$contoh_ciptaan_url?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </form>
                <hr>
                <p class="m-0">Apakah data diatas sesuai ?</p>
                <button type="button" class="btn btn-secondary mt-1" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning mt-1" id="btnSave">Save</button>
            </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>

<script>
    
    $('#btnSave').click(function(){
        let table = $('table tr.data');
        
		let form = document.getElementById('form-add-permohonan');
		let formData = new FormData(form);
        let i = 0;

        if (table.length > 0){
			table.each(function() {
				formData.append('pencipta['+i+'][]',	this.cells[0].innerHTML);
				formData.append('pencipta['+i+'][]', 	this.cells[1].innerHTML);
				formData.append('pencipta['+i+'][]',    this.cells[2].innerHTML);
				formData.append('pencipta['+i+'][]', 	this.cells[3].innerHTML);
				formData.append('pencipta['+i+'][]', 	this.cells[4].innerHTML);
				formData.append('pencipta['+i+'][]', 	this.cells[5].innerHTML);
				formData.append('pencipta['+i+'][]', 	this.cells[6].innerHTML);
				i++;
			})
		}

        // formData.append('contoh_ciptaan',       $('#contoh_ciptaan').val());
        formData.append('contoh_ciptaan_url',   $('#contoh_ciptaan_url').val());
        try {
            $.ajax({
			url: '<?=site_url()?>permohonan/prosesadd',
			type: 'POST',
			cache: false,
			contentType: false,
			processData: false,	
			data: formData,
			success: function(response) {
                // alert(response);
            	data = JSON.parse(response);
					if (data.succ) {
                        swal.fire("Yeay", data.message, "success");
                        $('#pertinjauModal').modal('hide');
                        $('#form-add-permohonan').trigger("reset");
                        location.replace("daftarpermohonan");
					}else{
                        swal.fire("Oh no", data.message, "error");
                    }
			},
			error: function(error) {
				console.log(error);
			}
		});
            
        } catch (error) {
            console.log(error);
        }
    })
</script>