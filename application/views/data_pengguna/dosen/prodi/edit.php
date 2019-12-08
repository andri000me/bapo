<section class="services">
    <div class="container">
        <div class="center">
            <h2><?= $title ?></h2>
        </div>
        <div class="row contact-wrap">

            <div class="col-md-6 col-md-offset-3">
                <form method="post" role="form">
                    <input type="hidden" class="form-control" name="nik_old" id="nik_old" value="<?= $data->nik ?>">
                    <div class="form-group">
                        <select class="form-control" name="nama_fakultas" id="nama_fakultas">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($list_fakultas AS $list) {
                                if ($list->kd_fakultas == $data->kd_fakultas) {
                                    echo '<option selected value="' . $list->kd_fakultas . '">' . $list->nama_fakultas . '</option>';
                                } else {
                                    echo '<option value="' . $list->kd_fakultas . '">' . $list->nama_fakultas . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="nama_prodi" id="nama_prodi">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($list_prodi AS $list) {
                                if ($list->kd_prodi == $data->kd_prodi) {
                                    echo '<option selected value="' . $list->kd_prodi . '">' . $list->nama_prodi . '</option>';
                                } else {
                                    echo '<option value="' . $list->kd_prodi . '">' . $list->nama_prodi . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->kd_prodi ?>" type="text" class="form-control" name="kd_prodi" id="kd_prodi" placeholder="Kode Program Studi" style="pointer-events:none; background:#F0F0F0;" required/>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->nik ?>" type="number" class="form-control" name="nik" id="nik" minlength="1" placeholder="NIK" onblur="checkAvailability()" required>
                        <span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->nama_tata_usaha ?>" type="text" class="form-control" name="nama_tata_usaha" id="nama_tata_usaha" placeholder="Nama" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->username ?>" type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" onblur="checkRePassword()">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" onblur="checkRePassword()">
                        <span id="user-re-password"></span>
                    </div>
                    <div class="text-center">
                        <button onclick="window.history.back()" type="button" name="btn-back" class="btn btn-danger btn-lg">Batal</button>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button id="btn-simpan" type="submit" name="submit" class="btn btn-success btn-lg">Simpan</button>
                    </div>
                </form>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</section>

<script>
    function checkAvailability() {
        if ($("#nik").val()) {
            if ($("#nik").val() != '<?= $data->nik ?>') {
                $.ajax({
                    url: "api/check_availability_nik",
                    data: {
                        role: 'tu_univ',
                        nik: $("#nik").val(),
                        nik_old: $("#nik_old").val()
                    },
                    type: "POST",
                    success: function (res) {
                        const data = JSON.parse(res);

                        if (data.status === 'error') {
                            $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;' + data.message + '</span>');
                            $("#btn-simpan").attr('disabled', true);
                        } else {
                            $("#user-availability-status").html('<span style="color:green; font-weight:bold">&nbsp;&nbsp;' + data.message + '</span>');
                            $("#btn-simpan").removeAttr('disabled');
                        }
                    },
                    error: function (error) {
                        $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Terjadi kesalahan, silahkan hubungi Admin.</span>');
                    }
                });

                return;
            }
        }
        $("#user-availability-status").html('');
        $("#btn-simpan").removeAttr('disabled');
    }

    $('#nama_fakultas').on('change', function () {
        const kd_fakultas = this.value;
        $("#kd_prodi").val('');

        $.ajax({
            url: "api/get_list_prodi",
            data: {
                kd_fakultas: kd_fakultas,
            },
            type: "GET",
            success: function (res) {
                const data = JSON.parse(res);
                $("#nama_prodi").html('');

                if (data.list && data.list.length > 0) {
                    $("#nama_prodi").append('<option value="">Pilih Program Studi</option>');
                    $.each(data.list, function (index, item) {
                        $("#nama_prodi").append('<option value="' + item.kd_prodi + '">' + item.nama_prodi + '</option>');
                    })
                } else {
                    $("#nama_prodi").append('<option value="">Pilih Program Studi</option>');
                }
            },
            error: function (error) {

            }
        });
    });

    $('#nama_prodi').on('change', function () {
        if (this.value) {
            $("#kd_prodi").val(this.value);
        } else {
            $("#kd_prodi").val('');
        }
    });

    function checkRePassword() {
        const pass = $("#password").val();
        const re_pass = $("#re_password").val();

        $("#btn-simpan").attr('disabled', true);

        if (pass !== re_pass) {
            $("#user-re-password").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Kata Sandi Tidak Sama.</span>');
        } else {
            $("#user-re-password").html('');
            $("#btn-simpan").removeAttr('disabled');
        }
    }
</script>