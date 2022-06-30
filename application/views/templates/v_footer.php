<footer class="main-footer d-flex p-2 px-3 bg-white border-top">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
        </li>
    </ul>
    <span class="copyright ml-auto my-auto mr-2">Copyright © 2022 - <?=date('Y')?> PusHaki Universitas Kuningan</span>
</footer>
</main>
</div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/loader.js"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<?php if ($this->router->fetch_class() == 'dashboard') : ?>
    <script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
    <script src="<?= base_url() ?>assets/js/shards.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.sharrre.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/extras.1.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/shards-dashboards.1.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/app/app-analytics-overview.1.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/scripts/app/app-transaction-history.1.3.1.min.js"></script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'administrator') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }
        //Tampil Data
        function ambilData() {
            $.ajax({
                url: '<?= base_url(); ?>administrator/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td class="text-left">' + response[i].nama_user + '</td>' +
                            '<td>' + response[i].email_user + '</td>' +
                            '<td>' + response[i].telepon_user + '</td>' +
                            '<td>' + response[i].id_author + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-info mr-2" data-toggle="modal" data-target="#modalDetail" onclick="detailAdministrator(' + response[i].id_user + ')"><i class="fa-solid fa-eye"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalAdministrator" onclick="submit(' + response[i].id_user + ')" name="id"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataAdministrator(' + response[i].id_user + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function detailAdministrator(id) {
            $.ajax({
                url: '<?= base_url(); ?>administrator/ambilDataById',
                type: 'POST',
                dataType: 'json',
                data: 'id=' + id,
                success: function(response) {
                    let html = "";
                    html = html +
                        '<tr>' +
                        '<td>Nama</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Email</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].email_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>No Telepon</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].telepon_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kewarganegaraan</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_negara + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Alamat</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].alamat_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kota</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].type + '. ' + response[0].nama_kota + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Negara</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_negara + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kode pos</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].kode_pos + '</td>' +
                        +'</tr>';

                    $("#tblDetail").html(html);
                }
            })
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalAdministratorLabel').text("Tambah Data Administrator");
            } else if (type == 'tutup') {
                $('.nama-error').hide();
                $('.email-error').hide();
                $('.no_telepon-error').hide();
                $('.kewarganegaraan-error').hide();
                $('.alamat-error').hide();
                $('.kota-error').hide();
                $('.negara-error').hide();
                $('.kode_pos-error').hide();

                $('[name="nama"]').val("");
                $('[name="email"]').val("");
                $('[name="no_telepon"]').val("");
                $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                $('[name="alamat"]').val("");
                $('[name="kota"]').val("").trigger('change');
                $('[name="negara"]').val("Indonesia").trigger('change');
                $('[name="kode_pos"]').val("");
                $("#modalAdministrator").modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalAdministratorLabel').text("Ubah Data Administrator");

                $.ajax({
                    url: '<?= base_url(); ?>administrator/ambilDataById',
                    type: 'POST',
                    dataType: 'json',
                    data: 'id=' + type,
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_user);
                        $('[name="nama"]').val(response[0].nama_user);
                        $('[name="email"]').val(response[0].email_user);
                        $('[name="no_telepon"]').val(response[0].telepon_user);
                        $('[name="kewarganegaraan"]').val(response[0].kewarganegaraan).trigger('change');
                        $('[name="alamat"]').val(response[0].alamat_user);
                        $('[name="kota"]').val(response[0].kota).trigger('change');
                        $('[name="negara"]').val(response[0].negara).trigger('change');
                        $('[name="kode_pos"]').val(response[0].kode_pos);
                    }
                })
            }
        }

        //Tambah Data
        function tambahDataAdministrator() {
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>administrator/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    nama: nama,
                    email: email,
                    no_telepon: no_telepon,
                    kewarganegaraan: kewarganegaraan,
                    alamat: alamat,
                    kota: kota,
                    negara: negara,
                    kode_pos: kode_pos
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.nama-error').html(data.nama);
                        $('.email-error').html(data.email);
                        $('.no_telepon-error').html(data.no_telepon);
                        $('.kewarganegaraan-error').html(data.kewarganegaraan);
                        $('.alamat-error').html(data.alamat);
                        $('.kota-error').html(data.kota);
                        $('.negara-error').html(data.negara);
                        $('.kode_pos-error').html(data.kode_pos);

                        $('.nama-error').show();
                        $('.email-error').show();
                        $('.no_telepon-error').show();
                        $('.kewarganegaraan-error').show();
                        $('.alamat-error').show();
                        $('.kota-error').show();
                        $('.negara-error').show();
                        $('.kode_pos-error').show();
                    } else {
                        $('.nama-error').hide();
                        $('.email-error').hide();
                        $('.no_telepon-error').hide();
                        $('.kewarganegaraan-error').hide();
                        $('.alamat-error').hide();
                        $('.kota-error').hide();
                        $('.negara-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="nama"]').val("");
                        $('[name="email"]').val("");
                        $('[name="no_telepon"]').val("");
                        $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                        $('[name="alamat"]').val("");
                        $('[name="kota"]').val("").trigger('change');
                        $('[name="negara"]').val("Indonesia").trigger('change');
                        $('[name="kode_pos"]').val("");
                        $("#modalAdministrator").modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        //Ubah Data
        function ubahDataAdministrator() {
            let id = htmlspecialchars($('[name="id"]').val());
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>administrator/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    email: email,
                    no_telepon: no_telepon,
                    kewarganegaraan: kewarganegaraan,
                    alamat: alamat,
                    kota: kota,
                    negara: negara,
                    kode_pos: kode_pos
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.nama-error').html(data.nama);
                        $('.email-error').html(data.email);
                        $('.no_telepon-error').html(data.no_telepon);
                        $('.kewarganegaraan-error').html(data.kewarganegaraan);
                        $('.alamat-error').html(data.alamat);
                        $('.kota-error').html(data.kota);
                        $('.negara-error').html(data.negara);
                        $('.kode_pos-error').html(data.kode_pos);

                        $('.nama-error').show();
                        $('.email-error').show();
                        $('.no_telepon-error').show();
                        $('.kewarganegaraan-error').show();
                        $('.alamat-error').show();
                        $('.kota-error').show();
                        $('.negara-error').show();
                        $('.kode_pos-error').show();
                    } else {
                        $('.nama-error').hide();
                        $('.email-error').hide();
                        $('.no_telepon-error').hide();
                        $('.kewarganegaraan-error').hide();
                        $('.alamat-error').hide();
                        $('.kota-error').hide();
                        $('.negara-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="nama"]').val("");
                        $('[name="email"]').val("");
                        $('[name="no_telepon"]').val("");
                        $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                        $('[name="alamat"]').val("");
                        $('[name="kota"]').val("").trigger('change');
                        $('[name="negara"]').val("Indonesia").trigger('change');
                        $('[name="kode_pos"]').val("");
                        $("#modalAdministrator").modal('hide');

                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }

                }
            })
        }

        function hapusDataAdministrator(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>administrator/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'author') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        //Tampil Data
        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>author/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html += `<tr>
                                    <td style="width: 1%;">
                                        <span>
                                            <a href="http://localhost/haki-uniku/author/detail/${response[i].id_user}" class="text-dark">
                                                ${no}
                                            </a>
                                        </span>
                                    </td>
                                    <td class="text-left">
                                        <span>
                                            <a href="http://localhost/haki-uniku/author/detail/${response[i].id_user}" class="text-dark">
                                                ${response[i].nama_user}
                                            </a>
                                        </span>
                                        <br/>
                                        <span>
                                            <a href="http://localhost/haki-uniku/author/detail/${response[i].id_user}" class="text-dark">
                                                NIDN.${response[i].id_author}
                                            </a>
                                        </span>
                                    </td>
                                    <td style="width: 1%;">
                                        <span>
                                            <a href="http://localhost/haki-uniku/author/detail/${response[i].id_user}" class="text-dark">
                                                0
                                            </a>
                                        </span>
                                    </td>
                                    <td style="width: 15%;">
                                        <span>
                                            <a href="http://localhost/haki-uniku/author/detail/${response[i].id_user}" class="text-dark">
                                                0
                                            </a>
                                        </span>
                                    </td>
                                    <td style="width: 25%;">
                                        <button class="btn btn-info mr-2" data-toggle="modal" data-target="#modalDetail" onclick="detailAuthor(${response[i].id_user})">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        
                                        <button class="btn btn-primary mr-2" onclick="submit(${response[i].id_user})" name="id">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        
                                        <button class="btn btn-danger" onclick="hapusData(${response[i].id_user})">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>`;
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#formData').show();
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#formLabel').text("Tambah Data Author");
                $('[name="nidn"]').focus();

                $('#submit').trigger('reset');
                $('[name="kewarganegaraan"]').val("").trigger('change');
                $('[name="kota"]').val("").trigger('change');
                $('[name="negara"]').val("").trigger('change');
            } else {
                $('#formData').show();
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#formLabel').text("Ubah Data Author");
                $('[name="nama"]').focus();

                $.ajax({
                    url: '<?= base_url(); ?>author/ambilDataById',
                    type: 'POST',
                    dataType: 'json',
                    data: 'id=' + type,
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_user);
                        $('[name="nama"]').val(response[0].nama_user);
                        $('[name="email"]').val(response[0].email_user);
                        $('[name="no_telepon"]').val(response[0].telepon_user);
                        $('[name="kewarganegaraan"]').val(response[0].kewarganegaraan).trigger('change');
                        $('[name="alamat"]').val(response[0].alamat_user);
                        $('[name="kota"]').val(response[0].kota).trigger('change');
                        $('[name="negara"]').val(response[0].negara).trigger('change');
                        $('[name="kode_pos"]').val(response[0].kode_pos);
                    }
                })
            }
        }

        function tutup(e) {
            e.preventDefault();
            $('#submit').trigger('reset');
            $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
            $('[name="kota"]').val("").trigger('change');
            $('[name="negara"]').val("Indonesia").trigger('change');
            $('#formData').hide();

            $('.nama-error').hide();
            $('.email-error').hide();
            $('.no_telepon-error').hide();
            $('.kewarganegaraan-error').hide();
            $('.alamat-error').hide();
            $('.kota-error').hide();
            $('.negara-error').hide();
            $('.kode_pos-error').hide();
        }

        $('#submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url(); ?>author/tambahData',
                type: "post",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#submit').trigger('reset');
                    $('[name="kewarganegaraan"]').val("").trigger('change');
                    $('[name="kota"]').val("").trigger('change');
                    $('[name="negara"]').val("").trigger('change');
                    $('#formData').hide();
                    Swal.fire(
                        'Good job!',
                        'Data berhasil ditambahkan!',
                        'success'
                    )
                    ambilData();
                }
            });
        });

        // Tambah Data
        // function tambahDataAuthor() {
        //     let nama = htmlspecialchars($('[name="nama"]').val());
        //     let email = htmlspecialchars($('[name="email"]').val());
        //     let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
        //     let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
        //     let alamat = htmlspecialchars($('[name="alamat"]').val());
        //     let kota = htmlspecialchars($('[name="kota"]').val());
        //     let negara = htmlspecialchars($('[name="negara"]').val());
        //     let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

        //     $.ajax({
        //         url: '<?= base_url(); ?>author/tambahData',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {
        //             nama: nama,
        //             email: email,
        //             no_telepon: no_telepon,
        //             kewarganegaraan: kewarganegaraan,
        //             alamat: alamat,
        //             kota: kota,
        //             negara: negara,
        //             kode_pos: kode_pos
        //         },
        //         success: function(data) {
        //             if (data !== 'success') {
        //                 $('.nama-error').html(data.nama);
        //                 $('.email-error').html(data.email);
        //                 $('.no_telepon-error').html(data.no_telepon);
        //                 $('.kewarganegaraan-error').html(data.kewarganegaraan);
        //                 $('.alamat-error').html(data.alamat);
        //                 $('.kota-error').html(data.kota);
        //                 $('.negara-error').html(data.negara);
        //                 $('.kode_pos-error').html(data.kode_pos);

        //                 $('.nama-error').show();
        //                 $('.email-error').show();
        //                 $('.no_telepon-error').show();
        //                 $('.kewarganegaraan-error').show();
        //                 $('.alamat-error').show();
        //                 $('.kota-error').show();
        //                 $('.negara-error').show();
        //                 $('.kode_pos-error').show();
        //             } else {
        //                 $('.nama-error').hide();
        //                 $('.email-error').hide();
        //                 $('.no_telepon-error').hide();
        //                 $('.kewarganegaraan-error').hide();
        //                 $('.alamat-error').hide();
        //                 $('.kota-error').hide();
        //                 $('.negara-error').hide();
        //                 $('.kode_pos-error').hide();

        //                 $('[name="nama"]').val("");
        //                 $('[name="email"]').val("");
        //                 $('[name="no_telepon"]').val("");
        //                 $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
        //                 $('[name="alamat"]').val("");
        //                 $('[name="kota"]').val("").trigger('change');
        //                 $('[name="negara"]').val("Indonesia").trigger('change');
        //                 $('[name="kode_pos"]').val("");
        //                 $('#formData').hide();
        //                 Swal.fire(
        //                     'Good job!',
        //                     'Data berhasil ditambahkan!',
        //                     'success'
        //                 )
        //                 ambilData();
        //             }
        //         }
        //     })
        // }

        //Ubah Data
        function ubahDataAuthor() {
            let id = htmlspecialchars($('[name="id"]').val());
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>author/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    email: email,
                    no_telepon: no_telepon,
                    kewarganegaraan: kewarganegaraan,
                    alamat: alamat,
                    kota: kota,
                    negara: negara,
                    kode_pos: kode_pos
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.nama-error').html(data.nama);
                        $('.email-error').html(data.email);
                        $('.no_telepon-error').html(data.no_telepon);
                        $('.kewarganegaraan-error').html(data.kewarganegaraan);
                        $('.alamat-error').html(data.alamat);
                        $('.kota-error').html(data.kota);
                        $('.negara-error').html(data.negara);
                        $('.kode_pos-error').html(data.kode_pos);
                    } else {
                        $('.nama-error').hide();
                        $('.email-error').hide();
                        $('.no_telepon-error').hide();
                        $('.kewarganegaraan-error').hide();
                        $('.alamat-error').hide();
                        $('.kota-error').hide();
                        $('.negara-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="nama"]').val("");
                        $('[name="email"]').val("");
                        $('[name="no_telepon"]').val("");
                        $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                        $('[name="alamat"]').val("");
                        $('[name="kota"]').val("").trigger('change');
                        $('[name="negara"]').val("Indonesia").trigger('change');
                        $('[name="kode_pos"]').val("");
                        $('#formData').hide();

                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }

                }
            })
        }

        function hapusData(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>author/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.nama-error').hide();
                            $('.email-error').hide();
                            $('.no_telepon-error').hide();
                            $('.kewarganegaraan-error').hide();
                            $('.alamat-error').hide();
                            $('.kota-error').hide();
                            $('.negara-error').hide();
                            $('.kode_pos-error').hide();

                            $('[name="nama"]').val("");
                            $('[name="email"]').val("");
                            $('[name="no_telepon"]').val("");
                            $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                            $('[name="alamat"]').val("");
                            $('[name="kota"]').val("").trigger('change');
                            $('[name="negara"]').val("Indonesia").trigger('change');
                            $('[name="kode_pos"]').val("");
                            $('#formData').hide();
                            Swal.fire(
                                'Deleted!',
                                'Data berhasil dihapus.',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }

        function detailAuthor(id) {
            $.ajax({
                url: '<?= base_url(); ?>Author/ambilDataById',
                type: 'POST',
                dataType: 'json',
                data: 'id=' + id,
                success: function(response) {
                    let html = "";

                    html = html +
                        '<tr>' +
                        '<td>Nama</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Email</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].email_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>No Telepon</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].telepon_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kewarganegaraan</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_negara + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Alamat</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].alamat_user + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kota</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].type + '. ' + response[0].nama_kota + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Negara</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].nama_negara + '</td>' +
                        +'</tr>' +
                        '<tr>' +
                        '<td>Kode pos</td>' +
                        '<td>:</td>' +
                        '<td>' + response[0].kode_pos + '</td>' +
                        +'</tr>';

                    $("#tblDetail").html(html);
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'provinsi') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>provinsi/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td>' + response[i].nama_provinsi + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalProvinsi" onclick="submit(' + response[i].id_provinsi + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataProvinsi(' + response[i].id_provinsi + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalProvinsiLabel').text("Tambah Data Provinsi");
            } else if (type == 'tutup') {
                $('.provinsi-error').hide();
                $('[name="provinsi"]').val("");
                $('#modalProvinsi').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalProvinsiLabel').text("Ubah Data Provinsi");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>provinsi/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_provinsi);
                        $('[name="provinsi"]').val(response[0].nama_provinsi);
                    }
                })
            }
        }

        // Tambah Data
        function tambahDataProvinsi() {
            let provinsi = htmlspecialchars($('[name="provinsi"]').val());

            $.ajax({
                url: '<?= base_url(); ?>provinsi/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    provinsi: provinsi,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.provinsi-error').html(data.provinsi);

                        $('.provinsi-error').show();
                    } else {
                        $('.provinsi-error').hide();

                        $('[name="provinsi"]').val("");
                        $('#modalProvinsi').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataProvinsi() {
            let id = htmlspecialchars($('[name="id"]').val());
            let provinsi = htmlspecialchars($('[name="provinsi"]').val());

            $.ajax({
                url: '<?= base_url(); ?>provinsi/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    provinsi: provinsi,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.provinsi-error').html(data.provinsi);

                        $('.provinsi-error').show();
                    } else {
                        $('.provinsi-error').hide();

                        $('[name="provinsi"]').val("");
                        $('#modalProvinsi').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataProvinsi(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>provinsi/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.provinsi-error').hide();

                            $('[name="provinsi"]').val("");
                            $('#modalProvinsi').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'negara') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>negara/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td>' + response[i].nama_negara + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalNegara" onclick="submit(' + response[i].id_negara + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataNegara(' + response[i].id_negara + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalNegaraLabel').text("Tambah Data Negara");
            } else if (type == 'tutup') {
                $('.negara-error').hide();
                $('[name="negara"]').val("");
                $('#modalNegara').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalNegaraLabel').text("Ubah Data Negara");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>negara/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_negara);
                        $('[name="negara"]').val(response[0].nama_negara);
                    }
                })
            }
        }

        function tambahDataNegara() {
            let negara = htmlspecialchars($('[name="negara"]').val());

            $.ajax({
                url: '<?= base_url(); ?>negara/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    negara: negara,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.negara-error').html(data.negara);
                        $('.negara-error').show();
                    } else {
                        $('.negara-error').hide();

                        $('[name="negara"]').val("");
                        $('#modalNegara').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataNegara() {
            let id = htmlspecialchars($('[name="id"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());

            $.ajax({
                url: '<?= base_url(); ?>negara/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    negara: negara,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.negara-error').html(data.negara);
                        $('.negara-error').show();
                    } else {
                        $('.negara-error').hide();

                        $('[name="negara"]').val("");
                        $('#modalNegara').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataNegara(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>negara/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.negara-error').hide();

                            $('[name="negara"]').val("");
                            $('#modalNegara').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'kota') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>kota/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td style="width: 20%;">' + response[i].nama_kota + '</td>' +
                            '<td>' + response[i].type + '</td>' +
                            '<td>' + response[i].nama_provinsi + '</td>' +
                            '<td>' + response[i].kode_pos + '</td>' +
                            '<td style="width: 15%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalKota" onclick="submit(' + response[i].id_kota + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataKota(' + response[i].id_kota + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalKotaLabel').text("Tambah Data Kota");
            } else if (type == 'tutup') {
                $('.kota-error').hide();
                $('.type-error').hide();
                $('.provinsi-error').hide();
                $('.kode_pos-error').hide();

                $('[name="kota"]').val("");
                $('[name="type"]').val("");
                $('[name="provinsi"]').val("").trigger('change');
                $('[name="kode_pos"]').val("");
                $('#modalKota').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalKotaLabel').text("Ubah Data Kota");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>kota/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_kota);
                        $('[name="kota"]').val(response[0].nama_kota);
                        $('[name="type"]').val(response[0].type).trigger('change');
                        $('[name="kode_pos"]').val(response[0].kode_pos);
                        $('[name="provinsi"]').val(response[0].id_provinsi).trigger('change');
                    }
                })
            }
        }

        function tambahDataKota() {
            let kota = htmlspecialchars($('[name="kota"]').val());
            let type = htmlspecialchars($('[name="type"]').val());
            let provinsi = htmlspecialchars($('[name="provinsi"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>kota/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    kota: kota,
                    type: type,
                    provinsi: provinsi,
                    kode_pos: kode_pos,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.kota-error').html(data.kota);
                        $('.type-error').html(data.type);
                        $('.provinsi-error').html(data.provinsi);
                        $('.kode_pos-error').html(data.kode_pos);

                        $('.kota-error').show();
                        $('.type-error').show();
                        $('.provinsi-error').show();
                        $('.kode_pos-error').show();
                    } else {
                        $('.kota-error').hide();
                        $('.type-error').hide();
                        $('.provinsi-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="kota"]').val("");
                        $('[name="type"]').val("");
                        $('[name="provinsi"]').val("").trigger('change');
                        $('[name="kode_pos"]').val("");
                        $('#modalKota').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataKota() {
            let id = htmlspecialchars($('[name="id"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let type = htmlspecialchars($('[name="type"]').val());
            let provinsi = htmlspecialchars($('[name="provinsi"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>kota/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    kota: kota,
                    type: type,
                    provinsi: provinsi,
                    kode_pos: kode_pos,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.kota-error').html(data.kota);
                        $('.type-error').html(data.type);
                        $('.provinsi-error').html(data.provinsi);
                        $('.kode_pos-error').html(data.kode_pos);

                        $('.kota-error').show();
                        $('.type-error').show();
                        $('.provinsi-error').show();
                        $('.kode_pos-error').show();
                    } else {
                        $('.kota-error').hide();
                        $('.type-error').hide();
                        $('.provinsi-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="kota"]').val("");
                        $('[name="type"]').val("");
                        $('[name="provinsi"]').val("").trigger('change');
                        $('[name="kode_pos"]').val("");
                        $('#modalKota').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataKota(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>kota/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.kota-error').hide();
                            $('.type-error').hide();
                            $('.provinsi-error').hide();
                            $('.kode_pos-error').hide();

                            $('[name="kota"]').val("");
                            $('[name="type"]').val("");
                            $('[name="provinsi"]').val("").trigger('change');
                            $('[name="kode_pos"]').val("");
                            $('#modalKota').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'jenis') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>jenis/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td>' + response[i].nama_jenis + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-warning mr-2" data-toggle="modal" data-target="#modalSubjenis" onclick="submit(' + response[i].id_jenis + ')"><i class="fa-solid fa-plus"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalJenis" onclick="submit(' + response[i].id_jenis + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataJenis(' + response[i].id_jenis + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalJenisLabel').text("Tambah Data Jenis");
            } else if (type == 'tutup') {
                $('.jenis-error').hide();
                $('[name="jenis"]').val("");
                $('#modalJenis').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalJenisLabel').text("Ubah Data Jenis");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>jenis/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_jenis);
                        $('[name="jenis"]').val(response[0].nama_jenis);
                    }
                })
            }
        }

        function tambahDataJenis() {
            let jenis = htmlspecialchars($('[name="jenis"]').val());

            $.ajax({
                url: '<?= base_url(); ?>jenis/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    jenis: jenis,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.jenis-error').html(data.jenis);
                        $('.jenis-error').show();
                    } else {
                        $('.jenis-error').hide();

                        $('[name="jenis"]').val("");
                        $('#modalJenis').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataJenis() {
            let id = htmlspecialchars($('[name="id"]').val());
            let jenis = htmlspecialchars($('[name="jenis"]').val());

            $.ajax({
                url: '<?= base_url(); ?>jenis/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    jenis: jenis,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.jenis-error').html(data.jenis);
                        $('.jenis-error').show();
                    } else {
                        $('.jenis-error').hide();

                        $('[name="jenis"]').val("");
                        $('#modalJenis').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataJenis(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>jenis/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.jenis-error').hide();

                            $('[name="jenis"]').val("");
                            $('#modalJenis').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'subjenis') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>subjenis/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td>' + response[i].nama_subjenis + '</td>' +
                            '<td>' + response[i].nama_jenis + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalSubjenis" onclick="submit(' + response[i].id_subjenis + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataSubjenis(' + response[i].id_subjenis + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalSubjenisLabel').text("Tambah Data Subjenis");
            } else if (type == 'tutup') {
                $('.subjenis-error').hide();
                $('.jenis-error').hide();
                $('[name="subjenis"]').val("");
                $('[name="jenis"]').val("").trigger('change');

                $('#modalSubjenis').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalSubjenisLabel').text("Ubah Data Subjenis");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>subjenis/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_subjenis);
                        $('[name="subjenis"]').val(response[0].nama_subjenis);
                        $('[name="jenis"]').val(response[0].id_jenis).trigger('change');
                    }
                })
            }
        }

        function tambahDataSubjenis() {
            let subjenis = htmlspecialchars($('[name="subjenis"]').val());
            let jenis = htmlspecialchars($('[name="jenis"]').val());

            $.ajax({
                url: '<?= base_url(); ?>subjenis/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    subjenis: subjenis,
                    jenis: jenis,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.subjenis-error').html(data.subjenis);
                        $('.jenis-error').html(data.jenis);
                        $('.subjenis-error').show();
                        $('.jenis-error').show();
                    } else {
                        $('.subjenis-error').hide();
                        $('.jenis-error').hide();
                        $('[name="subjenis"]').val("");
                        $('[name="jenis"]').val("").trigger('change');

                        $('#modalSubjenis').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataSubjenis() {
            let id = htmlspecialchars($('[name="id"]').val());
            let subjenis = htmlspecialchars($('[name="subjenis"]').val());
            let jenis = htmlspecialchars($('[name="jenis"]').val());

            $.ajax({
                url: '<?= base_url(); ?>subjenis/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    subjenis: subjenis,
                    jenis: jenis
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.subjenis-error').html(data.subjenis);
                        $('.jenis-error').html(data.jenis);
                        $('.subjenis-error').show();
                        $('.jenis-error').show();
                    } else {
                        $('.subjenis-error').hide();
                        $('.jenis-error').hide();
                        $('[name="subjenis"]').val("");
                        $('[name="jenis"]').val("").trigger('change');
                        $('#modalSubjenis').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataSubjenis(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>subjenis/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.subjenis-error').hide();
                            $('.jenis-error').hide();
                            $('[name="subjenis"]').val("");
                            $('[name="jenis"]').val("").trigger('change');
                            $('#modalSubjenis').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'JenisPermohonan') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function ambilData() {
            $.ajax({
                type: 'ajax',
                url: '<?= base_url(); ?>JenisPermohonan/ambilData',
                type: 'POST',
                async: false,
                dataType: 'json',
                success: function(response) {
                    let i;
                    let no = 0;
                    let html = "";
                    for (i = 0; i < response.length; i++) {
                        no++;
                        html = html + '<tr>' +
                            '<td style="width: 1%;">' + no + '</td>' +
                            '<td>' + response[i].nama_jenis_permohonan + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalJenisPermohonan" onclick="submit(' + response[i].id_jenis_permohonan + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataJenisPermohonan(' + response[i].id_jenis_permohonan + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#modalJenisPermohonanLabel').text("Tambah Data Jenis Permohonan");
            } else if (type == 'tutup') {
                $('.jenis_permohonan-error').hide();
                $('[name="jenis_permohonan"]').val("");
                $('#modalJenisPermohonan').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalJenisPermohonanLabel').text("Ubah Data Jenis Permohonan");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>JenisPermohonan/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_jenis_permohonan);
                        $('[name="jenis_permohonan"]').val(response[0].nama_jenis_permohonan);
                    }
                })
            }
        }

        function tambahDataJenisPermohonan() {
            let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());

            $.ajax({
                url: '<?= base_url(); ?>JenisPermohonan/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    jenis_permohonan: jenis_permohonan,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.jenis_permohonan-error').html(data.jenis_permohonan);
                        $('.jenis_permohonan-error').show();
                    } else {
                        $('.jenis_permohonan-error').hide();

                        $('[name="jenis_permohonan"]').val("");
                        $('#modalJenisPermohonan').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function ubahDataJenisPermohonan() {
            let id = htmlspecialchars($('[name="id"]').val());
            let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());

            $.ajax({
                url: '<?= base_url(); ?>JenisPermohonan/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    jenis_permohonan: jenis_permohonan,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.jenis_permohonan-error').html(data.jenis_permohonan);
                        $('.jenis_permohonan-error').show();
                    } else {
                        $('.jenis_permohonan-error').hide();

                        $('[name="jenis_permohonan"]').val("");
                        $('#modalJenisPermohonan').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

        function hapusDataJenisPermohonan(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url(); ?>JenisPermohonan/hapusData',
                        type: 'POST',
                        dataType: 'json',
                        data: 'id=' + id,
                        success: function(response) {
                            $('.jenis_permohonan-error').hide();

                            $('[name="jenis_permohonan"]').val("");
                            $('#modalJenisPermohonan').modal('hide');
                            Swal.fire(
                                'Good job!',
                                'Data berhasil dihapus!',
                                'success'
                            )
                            ambilData();
                        }
                    })
                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'profile') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        //Tampil Data
        function ambilData() {
            $.ajax({
                url: '<?= base_url(); ?>profile/ambilDataById',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    $('[name="id"]').val(response[0].id_user);
                    $('[name="nama"]').val(response[0].nama_user);
                    $('[name="email"]').val(response[0].email_user);
                    $('[name="no_telepon"]').val(response[0].telepon_user);
                    $('[name="kewarganegaraan"]').val(response[0].kewarganegaraan).trigger('change');
                    $('[name="alamat"]').val(response[0].alamat_user);
                    $('[name="kota"]').val(response[0].kota).trigger('change');
                    $('[name="negara"]').val(response[0].negara).trigger('change');
                    $('[name="kode_pos"]').val(response[0].kode_pos);
                }
            });
        }

        function ubahDataProfile() {
            let id = htmlspecialchars($('[name="id"]').val());
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>profile/ubahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    nama: nama,
                    email: email,
                    no_telepon: no_telepon,
                    kewarganegaraan: kewarganegaraan,
                    alamat: alamat,
                    kota: kota,
                    negara: negara,
                    kode_pos: kode_pos
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.nama-error').html(data.nama);
                        $('.email-error').html(data.email);
                        $('.no_telepon-error').html(data.no_telepon);
                        $('.kewarganegaraan-error').html(data.kewarganegaraan);
                        $('.alamat-error').html(data.alamat);
                        $('.kota-error').html(data.kota);
                        $('.negara-error').html(data.negara);
                        $('.kode_pos-error').html(data.kode_pos);
                    } else {
                        $('.nama-error').hide();
                        $('.email-error').hide();
                        $('.no_telepon-error').hide();
                        $('.kewarganegaraan-error').hide();
                        $('.alamat-error').hide();
                        $('.kota-error').hide();
                        $('.negara-error').hide();
                        $('.kode_pos-error').hide();

                        $('[name="nama"]').val("");
                        $('[name="email"]').val("");
                        $('[name="no_telepon"]').val("");
                        $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                        $('[name="alamat"]').val("");
                        $('[name="kota"]').val("").trigger('change');
                        $('[name="negara"]').val("Indonesia").trigger('change');
                        $('[name="kode_pos"]').val("");

                        Swal.fire(
                            'Good job!',
                            'Data berhasil diubah!',
                            'success'
                        )
                        setInterval('location.reload()', 1000);
                    }

                }
            })
        }
    </script>
<?php endif ?>

<?php if ($this->router->fetch_class() == 'permohonan') : ?>
    <script>
        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }

        function tambahDataJenisPermohonan() {
            let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());
            let jenis_ciptaan = htmlspecialchars($('[name="jenis_ciptaan"]').val());
            let subjenis_ciptaan = htmlspecialchars($('[name="subjenis_ciptaan"]').val());
            let judul = htmlspecialchars($('[name="judul"]').val());
            let uraian = htmlspecialchars($('[name="uraian"]').val());
            let tgl_pertama = htmlspecialchars($('[name="tgl_pertama"]').val());
            let kuasa = htmlspecialchars($('[name="kuasa"]:checked').val());

            $.ajax({
                url: '<?= base_url(); ?>permohonan/tambahDataDetail',
                type: 'POST',
                dataType: 'json',
                data: {
                    jenis_permohonan: jenis_permohonan,
                    jenis_ciptaan: jenis_ciptaan,
                    subjenis_ciptaan: subjenis_ciptaan,
                    judul: judul,
                    uraian: uraian,
                    tgl_pertama: tgl_pertama,
                    kuasa: kuasa,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.jenis_permohonan-error').html(data.jenis_permohonan);
                        $('.jenis_ciptaan-error').html(data.jenis_ciptaan);
                        $('.subjenis_ciptaan-error').html(data.subjenis_ciptaan);
                        $('.judul-error').html(data.judul);
                        $('.uraian-error').html(data.uraian);
                        $('.tgl_pertama-error').html(data.tgl_pertama);
                        $('.kuasa-error').html(data.kuasa);

                        $('.jenis_permohonan-error').show();
                        $('.jenis_ciptaan-error').show();
                        $('.subjenis_ciptaan-error').show();
                        $('.judul-error').show();
                        $('.uraian-error').show();
                        $('.tgl_pertama-error').show();
                        $('.kuasa-error').show();
                    } else {
                        $('.jenis_permohonan-error').hide();
                        $('.jenis_ciptaan-error').hide();
                        $('.subjenis_ciptaan-error').hide();
                        $('.judul-error').hide();
                        $('.uraian-error').hide();
                        $('.tgl_pertama-error').hide();
                        $('.kuasa-error').hide();

                        window.location.href = "<?= base_url('permohonan/pencipta') ?>";
                    }
                }
            })
        }

        function submit(type) {
            if (type == 'tambah') {
                $('#btn-tambah').show();
                $('#btn-ubah').hide();
                $('#penciptaModalLabel').text("Tambah Data Pencipta");
            } else if (type == 'tutup') {
                $('.jenis_permohonan-error').hide();
                $('[name="jenis_permohonan"]').val("");
                $('#modalJenisPermohonan').modal('hide');
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#penciptaModalLabel').text("Ubah Data Pencipta");

                $.ajax({
                    type: 'POST',
                    data: 'id=' + type,
                    url: '<?= base_url(); ?>JenisPermohonan/ambilDataById',
                    dataType: 'json',
                    success: function(response) {
                        $('[name="id"]').val(response[0].id_jenis_permohonan);
                        $('[name="jenis_permohonan"]').val(response[0].nama_jenis_permohonan);
                    }
                })
            }
        }

        function tambahDataPencipta() {
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let provinsi = htmlspecialchars($('[name="provinsi"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>JenisPermohonan/tambahData',
                type: 'POST',
                dataType: 'json',
                data: {
                    nama: nama,
                },
                success: function(data) {
                    if (data !== 'success') {
                        $('.nama-error').html(data.nama);
                        $('.nama-error').show();
                    } else {
                        $('.nama-error').hide();

                        $('[name="nama"]').val("");
                        $('#modalJenisPermohonan').modal('hide');
                        Swal.fire(
                            'Good job!',
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }
    </script>
<?php endif ?>

<script>
    <?php if ($this->session->flashdata('success')) { ?>
        let pesan = <?= json_encode($this->session->flashdata('success')) ?>;
        Swal.fire({
            icon: 'success',
            title: 'Good Job!',
            text: pesan
        });
    <?php } else if ($this->session->flashdata('error')) { ?>
        let pesan = <?= json_encode($this->session->flashdata('error')) ?>;
        Swal.fire({
            icon: 'error',
            title: 'Opss...!',
            text: pesan
        });
    <?php } ?>
</script>
</body>

</html>