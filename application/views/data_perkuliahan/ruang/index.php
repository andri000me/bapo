<section class="services">
    <div class="container" style="color:black;">
        <div class="panel panel-default">

            <?php if ($_SESSION['status'] === 'Tata Usaha') { ?>
                <div align="right">
                    <a href="<?= base_url() ?>data_perkuliahan/ruang?state=add&state_fakultas=<?= $state_fakultas ?>">
                        <img src="<?= base_url() ?>assets/images/add_green.png" width="80px" height="90px" style="margin-right:120px; margin-top:10px;">
                    </a>
                </div>
            <?php } ?>

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
                        <th>Kode Ruang</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Nama Ruang</th>
                        <th>Mata Kuliah</th>
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
                            <td><?= $val->kd_ruang ?></td>
                            <td><?= $val->nama_prodi ?></td>
                            <td><?= $val->nama_fakultas ?></td>
                            <td><?= $val->nama_ruang ?></td>
                            <td><?= $val->mata_kuliah ?></td>
                            <td>
                                <?php if ($_SESSION['status'] === 'Tata Usaha') { ?>
                                    <a href="<?= base_url() ?>data_perkuliahan/ruang?state=edit&id=<?= $val->kd_ruang ?>">
                                        <img src="<?= base_url() ?>assets/images/edit_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>

                                    <a id="delete-row" href="<?= base_url() ?>data_perkuliahan/ruang?state=delete&id=<?= $val->kd_ruang ?>" onclick="return deleteConfirmation()">
                                        <img src="<?= base_url() ?>assets/images/delete_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>
                                <?php } ?>
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
