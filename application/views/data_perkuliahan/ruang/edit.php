<section class="services">
    <div class="container">
        <div class="center">
            <h2><?= $title ?></h2>
        </div>
        <div class="row contact-wrap">

            <div class="col-md-6 col-md-offset-3">
                <form method="post" role="form">
                    <input type="hidden" class="form-control" name="kd_ruang_old" id="kd_ruang_old" value="<?= $data->kd_ruang ?>">
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
                            <option value="">Pilih Program Studi</option>
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
                        <input value="<?= $data->kd_ruang ?>" type="text" class="form-control" name="kd_ruang" id="kd_ruang" minlength="1" placeholder="Kode Ruang" onblur="checkAvailability()" required>
                        <span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_ruang" id="nama_ruang" placeholder="Nama Ruang" minlength="1" required value="<?= $data->nama_ruang ?>">
                    </div>

                    <div class="form-group">
                        <div id="mata_kuliah_list"></div>
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
        if ($("#kd_ruang").val() && ($("#kd_ruang").val() != $("#kd_ruang_old").val())) {
            $.ajax({
                url: "api/check_availability_kd_ruang",
                data: {
                    kd_ruang: $("#kd_ruang").val(),
                    kd_ruang_old: $("#kd_ruang_old").val()
                },
                type: "POST",
                success: function (res) {
                    const data = JSON.parse(res);

                    if (data.status === 'error') {
                        $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;NPM Tidak Tersedia</span>');
                        $("#btn-simpan").attr('disabled', true);
                    } else {
                        $("#user-availability-status").html('<span style="color:green; font-weight:bold">&nbsp;&nbsp;NPM Tersedia</span>');
                        $("#btn-simpan").removeAttr('disabled');
                    }
                },
                error: function (error) {
                    $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Terjadi kesalahan, silahkan hubungi Admin.</span>');
                }
            });
        } else {
            $("#user-availability-status").html('');
            $("#btn-simpan").removeAttr('disabled');
        }
    }

    function getListMataKuliah(kd_fakultas) {
        $.ajax({
            url: "api/get_list_mata_kuliah",
            data: {
                kd_fakultas: kd_fakultas,
            },
            type: "GET",
            success: function (res) {
                const data = JSON.parse(res);

                // $("#kd_prodi").html('');
                $("#mata_kuliah_list").html('');

                if (data.list && data.list.length > 0) {
                    try {
                        const checkedValue = JSON.parse('<?= $data->mata_kuliah ?>');

                        $.each(data.list, function (i, item) {
                            const check = $.inArray(item.mata_kuliah, checkedValue);

                            if (check >= 0) {
                                $("#mata_kuliah_list").append('<input checked type="checkbox" name="mata_kuliah[]" value="' + item.mata_kuliah + '"><span style="color: #0c0c0c">' + item.mata_kuliah + '</span><br>');
                            } else {
                                $("#mata_kuliah_list").append('<input type="checkbox" name="mata_kuliah[]" value="' + item.mata_kuliah + '"><span style="color: #0c0c0c">' + item.mata_kuliah + '</span><br>');
                            }
                        });
                    } catch (e) {
                        $.each(data.list, function (i, item) {
                            $("#mata_kuliah_list").append('<input type="checkbox" name="mata_kuliah[]" value="' + item.mata_kuliah + '"><span style="color: #0c0c0c">' + item.mata_kuliah + '</span><br>');
                        });
                    }
                }
            },
            error: function (error) {

            }
        });
    }

    function getListProdi(kd_fakultas, kd_prodi = null) {
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
    }

    $("#btn-simpan").attr('disabled', true);

    $('#nama_fakultas').on('change', function () {
        const kd_fakultas = this.value;
        $("#kd_prodi").val('');

        getListMataKuliah(kd_fakultas);

        getListProdi(kd_fakultas, kd_prodi);
    });

    $('#nama_prodi').on('change', function () {
        if (this.value) {
            $("#kd_prodi").val(this.value);
        } else {
            $("#kd_prodi").val('');
        }
    });

    const nama_fakultas = $("#nama_fakultas").val();
    if (nama_fakultas != null || nama_fakultas != undefined) {
        getListMataKuliah(nama_fakultas);
        $("#btn-simpan").removeAttr('disabled');
    }
</script>