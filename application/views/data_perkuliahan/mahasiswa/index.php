<section class="services">
    <div class="container" style="color:black;">
        <div class="panel panel-default">

            <!--<div align="right">-->
            <!--    <a href="--><?//= base_url() ?><!--data_pengguna/mahasiswa?state=add&state_fakultas=--><?//= $state_fakultas ?><!--">-->
            <!--        <img src="--><?//= base_url() ?><!--assets/images/add_green.png" width="80px" height="90px" style="margin-right:120px; margin-top:10px;">-->
            <!--    </a>-->
            <!--</div>-->

            <?php
            if (isset($_SESSION['state_status']) && $_SESSION['state_status'] === true) {
                echo '<div id="message-alert" class="alert alert-success text-center" role="alert">Data berhasil di simpan</div>';
                unset($_SESSION['state_status']);
            } else if (isset($_SESSION['state_status_delete']) && $_SESSION['state_status_delete'] === true) {
                echo '<div id="message-alert" class="alert alert-success text-center" role="alert">Data berhasil di hapus</div>';
                unset($_SESSION['state_status_delete']);
            }
            ?>

            <div class="panel-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>NPM</th>
                        <th>Program Studi</th>
                        <th>Fakultas</th>
                        <th>Nama</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data

                             AS $no => $val) {
                        ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $val->kd_user ?></td>
                            <td><?= $val->nama_prodi ?></td>
                            <td><?= $val->nama_fakultas ?></td>
                            <td><?= $val->nama_mahasiswa ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#example1').DataTable({
            responsive: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: true,
        });

        setTimeout(function () {
            $("#message-alert").remove();
        }, 3000);
    });

    function deleteConfirmation() {
        const job = confirm("Apakah Anda yakin akan menghapus data?");
        if (job !== true) {
            return false;
        }
    }
</script>
