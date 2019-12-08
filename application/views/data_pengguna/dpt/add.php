<section class="services">
    <div class="container">
        <div class="center">
            <h2><?= $title ?></h2>
        </div>
        <div class="row contact-wrap">

            <div class="col-md-6 col-md-offset-3">
                <form method="post" role="form">
                    <input type="hidden" class="form-control" name="nik_old" id="nik_old">
                    <div class="form-group">
                        <input type="number" class="form-control" name="nik" id="nik" minlength="1" placeholder="NIK" onblur="checkAvailability()" required>
                        <span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_dpt" id="nama_dpt" placeholder="Nama" minlength="1" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nama Pengguna" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Kata Sandi" onblur="checkRePassword()" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="re_password" id="re_password" placeholder="Ulangi Kata Sandi" onblur="checkRePassword()" required>
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
    $("#btn-simpan").attr('disabled', true);

    function checkAvailability() {
        if ($("#nik").val()) {
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
        }
    }

    function checkRePassword() {
        const pass = $("#password").val();
        const re_pass = $("#re_password").val();

        if (pass !== re_pass) {
            $("#user-re-password").html('<span style="color:red; font-weight:bold">&nbsp;&nbsp;Kata Sandi Tidak Sama.</span>');
        } else {
            $("#user-re-password").html('');
        }
    }
</script>