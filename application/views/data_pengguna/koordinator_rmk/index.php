<section class="services">
    <div class="container" style="color:black;">
        <div class="panel panel-default">

            <div align="right">
                <a href="<?= base_url() ?>data_pengguna/koordinator_rmk?state=add">
                    <img src="<?= base_url() ?>assets/images/add_green.png" width="80px" height="90px" style="margin-right:120px; margin-top:10px;">
                </a>
            </div>

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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Nama Pengguna</th>
                        <th>Opsi</th>
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
                            <td><?= $val->nama_koordinator_rmk ?></td>
                            <td><?= $val->username ?></td>
                            <td>
                                <a href="<?= base_url() ?>data_pengguna/koordinator_rmk?state=edit&id=<?= $val->kd_user ?>">
                                    <img src="<?= base_url() ?>assets/images/edit_green.png" style="margin-left:10px;" width="30" height="30">
                                </a>

                                <a id="delete-row" href="<?= base_url() ?>data_pengguna/koordinator_rmk?state=delete&id=<?= $val->kd_user ?>" onclick="return deleteConfirmation()">
                                    <img src="<?= base_url() ?>assets/images/delete_green.png" style="margin-left:10px;" width="30" height="30">
                                </a>
                            </td>
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
