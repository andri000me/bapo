<section class="services">
    <div class="container">
        <div class="center">
            <h2><?= $title ?></h2>
        </div>
        <div class="row contact-wrap">

            <div class="col-md-6 col-md-offset-3">
                <form method="post" role="form">
                    <input type="hidden" class="form-control" name="kd_ruang_old" id="kd_ruang_old">
                    <div class="form-group">
                        <select class="form-control" name="nama_fakultas" id="nama_fakultas">
                            <option value="">Pilih Fakultas</option>
                            <?php foreach ($list_fakultas AS $list) {
                                echo '<option value="' . $list->kd_fakultas . '">' . $list->nama_fakultas . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="nama_prodi" id="nama_prodi">
                            <option value="">Pilih Program Studi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kd_prodi" id="kd_prodi" placeholder="Kode Program Studi" style="pointer-events:none; background:#F0F0F0;" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kd_ruang" id="kd_ruang" minlength="1" placeholder="Kode Mata Kuliah" onblur="checkAvailability()" required>
                        <span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_lab" id="nama_lab" placeholder="Nama Mata Kuliah" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="dosen_list" id="dosen_list">
                            <option value="">Pilih Dosen Panunggung Jawab</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nik_dosen_pj" id="nik_dosen_pj" placeholder="Dosen Panunggung Jawab" style="pointer-events:none; background:#F0F0F0;" required/>
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
                url: "api/check_availability_kd_ruang_lab",
                data: {
                    kd_ruang: $("#kd_ruang").val(),
                    kd_ruang_old: $("#kd_ruang_old").val()
                },
                type: "POST",
                success: function (res) {
                    const data = JSON.parse(res);

                    if (data.status === 'error') {
                        $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Kode Lab Tidak Tersedia</span>');
                        $("#btn-simpan").attr('disabled', true);
                    } else {
                        $("#user-availability-status").html('<span style="color:green; font-weight:bold">&nbsp;&nbsp;Kode Lab Tersedia</span>');
                        $("#btn-simpan").removeAttr('disabled');
                    }
                },
                error: function (error) {
                    $("#user-availability-status").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Terjadi kesalahan, silahkan hubungi Admin.</span>');
                }
            });
        } else {
            if (!$("#kd_ruang").val() || $("#kd_ruang").val() == undefined) {
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
        $('#nik_dosen_pj').val('');

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
            $("#nik_dosen_pj").val(this.value);
            $("#btn-simpan").removeAttr('disabled');
        } else {
            $("#nik_dosen_pj").val('');
            $("#btn-simpan").attr('disabled', true);
        }
    });
</script>