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
    <span class="copyright ml-auto my-auto mr-2">Copyright © 2019 DesignRevision</span>
</footer>
</main>
</div>
</div>
<script type="text/javascript" src="<?= base_url() ?>assets/js/loader.js"></script>
<script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/shards.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sharrre.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/extras.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/shards-dashboards.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/app/app-analytics-overview.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/app/app-transaction-history.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/script.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<?php if ($this->router->fetch_class() == 'allauthor') : ?>
    <script>
        ambilData();

        function htmlspecialchars(str) {
            return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
        }
        //Tampil Data
        function ambilData() {
            $.ajax({
                url: '<?= base_url(); ?>AllAuthor/ambilData',
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
                            '<td>' + response[i].nama_user + '</td>' +
                            '<td>' + response[i].email_user + '</td>' +
                            '<td>' + response[i].telepon_user + '</td>' +
                            '<td>' + '-' + '</td>' +
                            '<td>' + response[i].id_author + '</td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-info mr-2" data-toggle="modal" data-target="#modalDetail" onclick="detailAuthor(' + response[i].id_user + ')"><i class="fa-solid fa-eye"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalAuthor" onclick="submit(' + response[i].id_user + ')" name="id"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusData(' + response[i].id_user + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
                    }
                    $("#tbl_data").html(html);
                }
            });
        }

        function detailAuthor(id) {
            $.ajax({
                url: '<?= base_url(); ?>AllAuthor/ambilDataById',
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
                        '<td>' + response[0].kewarganegaraan + '</td>' +
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
                        '<td>' + response[0].negara + '</td>' +
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
                $('#modalAuthorLabel').text("Tambah Data Author");
            } else {
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#modalAuthorLabel').text("Ubah Data Author");

                $.ajax({
                    url: '<?= base_url(); ?>AllAuthor/ambilDataById',
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
        function tambahData() {
            let nama = htmlspecialchars($('[name="nama"]').val());
            let email = htmlspecialchars($('[name="email"]').val());
            let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
            let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
            let alamat = htmlspecialchars($('[name="alamat"]').val());
            let kota = htmlspecialchars($('[name="kota"]').val());
            let negara = htmlspecialchars($('[name="negara"]').val());
            let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

            $.ajax({
                url: '<?= base_url(); ?>AllAuthor/tambahData',
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
                        $("#modalAuthor").modal('hide');
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
        function ubahData() {
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
                url: '<?= base_url(); ?>AllAuthor/ubahData',
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
                        $("#modalAuthor").modal('hide');

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
                        url: '<?= base_url(); ?>AllAuthor/hapusData',
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
                        html = html + '<tr>' +
                            '<td style="width: 1%;"><span><a href="http://localhost/haki-uniku/author/detail/' + response[i].id_user + '" class="text-dark">' + no + '</a></span></td>' +
                            '<td><span><a href="http://localhost/haki-uniku/author/detail/' + response[i].id_user + '" class="text-dark">' + response[i].nama_user + '</a></span></td>' +
                            '<td style="width: 1%;"><span><a href="http://localhost/haki-uniku/author/detail/' + response[i].id_user + '" class="text-dark">0</a></span></td>' +
                            '<td style="width: 20%;"><span><a href="http://localhost/haki-uniku/author/detail/' + response[i].id_user + '" class="text-dark">0</a></span></td>' +
                            '<td><span><a href="http://localhost/haki-uniku/author/detail/' + response[i].id_user + '" class="text-dark">' + response[i].id_author + '</a></span></td>' +
                            '<td style="width: 25%;">' + '<button class="btn btn-info mr-2" data-toggle="modal" data-target="#modalDetail" onclick="detailAuthor(' + response[i].id_user + ')"><i class="fa-solid fa-eye"></i></button><button class="btn btn-primary mr-2" onclick="submit(' + response[i].id_user + ')" name="id"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusData(' + response[i].id_user + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
                            '</tr>';
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
            } else if (type == 'tutup') {
                $('#formData').hide();
                $('[name="nama"]').val("");
                $('[name="email"]').val("");
                $('[name="no_telepon"]').val("");
                $('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
                $('[name="alamat"]').val("");
                $('[name="kota"]').val("").trigger('change');
                $('[name="negara"]').val("Indonesia").trigger('change');
                $('[name="kode_pos"]').val("");
            } else {
                $('#formData').show();
                $('#btn-tambah').hide();
                $('#btn-ubah').show();
                $('#formLabel').text("Ubah Data Author");

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

        // Tambah Data
        function tambahDataAuthor() {
            let nama = $('[name="nama"]').val();
            let email = $('[name="email"]').val();
            let no_telepon = $('[name="no_telepon"]').val();
            let kewarganegaraan = $('[name="kewarganegaraan"]').val();
            let alamat = $('[name="alamat"]').val();
            let kota = $('[name="kota"]').val();
            let negara = $('[name="negara"]').val();
            let kode_pos = $('[name="kode_pos"]').val();

            $.ajax({
                url: '<?= base_url(); ?>author/tambahData',
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
                            'Data berhasil ditambahkan!',
                            'success'
                        )
                        ambilData();
                    }
                }
            })
        }

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
                        '<td>' + response[0].kewarganegaraan + '</td>' +
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
                        '<td>' + response[0].negara + '</td>' +
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
</body>

</html>