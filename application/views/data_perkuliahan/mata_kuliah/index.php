<section class="services">
    <div class="container" style="color:black;">
        <div class="panel panel-default">

            <?php if ($_SESSION['status'] === 'Tata Usaha') { ?>
                <div align="right">
                    <a href="<?= base_url() ?>data_perkuliahan/mata_kuliah?state=add&state_fakultas=<?= $state_fakultas ?>">
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
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>NIK Dosen</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>SKS</th>
                        <th>Sifat</th>
                        <th>SAP</th>
                        <th>Perkuliahan</th>
                        <th>Absensi</th>
                        <th>Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($data AS $no => $val) { ?>
                        <tr>
                            <td><?= ++$no ?></td>
                            <td><?= $val->kd_mata_kuliah ?></td>
                            <td><?= $val->nama_mata_kuliah ?></td>
                            <td><?= $val->nik ?></td>
                            <td><?= $val->semester ?></td>
                            <td><?= $val->tahun_ajaran ?></td>
                            <td><?= $val->total_sks ?></td>
                            <td><?= $val->sifat ?></td>
                            <td>
                                <center>
                                    <a href="<?= base_url() ?>data_sap?state_kd_mk=<?= $val->kd_mata_kuliah ?>">
                                        <img src="<?= base_url() ?>assets/images/view_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="<?= base_url() ?>data_sap?state_kd_mk=">
                                        <img src="<?= base_url() ?>assets/images/view_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="<?= base_url() ?>data_absensi/mata_kuliah_sap">
                                        <img src="<?= base_url() ?>assets/images/view_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>
                                </center>
                            </td>
                            <td style="width: 92px">
                                <?php if ($_SESSION['status'] === 'Tata Usaha') { ?>
                                    <a title="Edit" href="<?= base_url() ?>data_perkuliahan/mata_kuliah?state=edit&id=<?= $val->kd_mata_kuliah ?>">
                                        <img src="<?= base_url() ?>assets/images/edit_green.png" style="margin-left:10px;" width="30" height="30">
                                    </a>

                                    <a title="Hapus" id="delete-row" href="<?= base_url() ?>data_perkuliahan/mata_kuliah?state=delete&id=<?= $val->kd_mata_kuliah ?>" onclick="return deleteConfirmation()">
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
