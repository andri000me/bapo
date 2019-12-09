<section class="services">
    <div class="container">
        <div class="center">
            <h2><?= $title ?></h2>
        </div>
        <div class="row contact-wrap">

            <div class="col-md-6 col-md-offset-3">
                <form method="post" role="form">
                    <input type="hidden" class="form-control" name="kd_mata_kuliah_old" id="kd_mata_kuliah_old" value="<?= $data->kd_mata_kuliah ?>">
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
                        <input value="<?= $data->kd_mata_kuliah ?>" type="text" class="form-control" name="kd_mata_kuliah" id="kd_mata_kuliah" minlength="1" placeholder="Kode Mata Kuliah" onblur="checkAvailability()" required>
                        <span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->nama_mata_kuliah ?>" type="text" class="form-control" name="nama_mata_kuliah" id="nama_mata_kuliah" placeholder="Nama Mata Kuliah" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="dosen_list" id="dosen_list">
                            <option value="">Pilih Dosen Panunggung Jawab</option>
                            <?php foreach ($list_dosen AS $list) {
                                if ($list->nik == $data->nik) {
                                    echo '<option selected value="' . $list->nik . '">' . $list->nama_dosen . '</option>';
                                } else {
                                    echo '<option value="' . $list->nik . '">' . $list->nama_dosen . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->nik ?>" type="text" class="form-control" name="nik" id="nik" placeholder="Dosen Panunggung Jawab" style="pointer-events:none; background:#F0F0F0;" required/>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->semester ?>" type="number" class="form-control" name="semester" id="semester" placeholder="Semester" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->tahun_ajaran ?>" type="text" class="form-control" name="tahun_ajaran" id="tahun_ajaran" placeholder="Tahun Ajaran" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->sks_teori ?>" type="number" class="form-control" name="sks_teori" id="sks_teori" placeholder="SKS Teori" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <input value="<?= $data->sks_praktikum ?>" type="number" class="form-control" name="sks_praktikum" id="sks_praktikum" placeholder="SKS Praktikum" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="sifat" id="sifat">
                            <option value="">Pilih Sifat Mata Kuliah</option>
                            <?php foreach ($list_sifat AS $list) {
                                if ($list == $data->sifat) {
                                    echo '<option selected value="' . $list . '">' . $list . '</option>';
                                } else {
                                    echo '<option value="' . $list . '">' . $list . '</option>';
                                }
                            }
                            ?>
                        </select>
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
        if ($("#kd_mata_kuliah").val() && ($("#kd_mata_kuliah").val() != $("#kd_mata_kuliah_old").val())) {
            $.ajax({
                url: "api/check_availability_kd_mata_kuliah",
                data: {
                    kd_mata_kuliah: $("#kd_mata_kuliah").val(),
                    kd_mata_kuliah_old: $("#kd_mata_kuliah_old").val()
                },
                type: "POST",
                success: function (res) {
                    const data = JSON.parse(res);

                    if (data.status === 'error') {
                        $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Kode Mata Kuliah Tidak Tersedia</span>');
                        $("#btn-simpan").attr('disabled', true);
                    } else {
                        $("#user-availability-status").html('<span style="color:green; font-weight:bold">&nbsp;&nbsp;Kode Mata Kuliah Tersedia</span>');
                        $("#btn-simpan").removeAttr('disabled');
                    }
                },
                error: function (error) {
                    $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Terjadi kesalahan, silahkan hubungi Admin.</span>');
                }
            });
        } else {
            if (!$("#kd_mata_kuliah").val() || $("#kd_mata_kuliah").val() == undefined) {
                $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Kode Harus Diisi</span>');
                $("#btn-simpan").attr('disabled', true);
            } else {
                $("#user-availability-status").html('');
                $("#btn-simpan").removeAttr('disabled');
            }
        }
    }

    function getListDosen(kd_fakultas) {
        $.ajax({
            url: "api/get_list_dosen",
            data: {
                kd_fakultas: kd_fakultas,
            },
            type: "GET",
            success: function (res) {
                const data = JSON.parse(res);

                console.log(data);

                $("#dosen_list").html('');
                $("#dosen_list").append('<option value="">Pilih Dosen Panunggung Jawab</option>');
                if (data.list && data.list.length > 0) {
                    $.each(data.list, function (index, item) {
                        $("#dosen_list").append('<option value="' + item.nik + '">' + item.nama_dosen + '</option>');
                    })
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
        $('#nik').val('');

        getListDosen(kd_fakultas);

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

    $('#dosen_list').on('change', function () {
        if (this.value) {
            $("#nik").val(this.value);
            $("#btn-simpan").removeAttr('disabled');
        } else {
            $("#nik").val('');
            $("#btn-simpan").attr('disabled', true);
        }
    });
</script>