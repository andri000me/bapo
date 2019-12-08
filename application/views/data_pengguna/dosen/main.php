<div class="services">
    <div class="container">
        <h3>Data Daftar Dosen</h3>
        <hr>
        <div>
            <center>
                <a href="data_pengguna/dosen?state=add">
                    <img src="<?= base_url() ?>assets/images/add_green.png" width="80px" height="90px">
                </a>
            </center>
        </div>
        <hr>
        <div class="row">
            <?php foreach ($list_fakultas AS $val) { ?>
                <div class="col-md-4">
                    <center>
                        <h4><?= $val->nama_fakultas ?></h4>
                        <a href="data_pengguna/dosen?state_fakultas=<?= $val->kd_fakultas ?>"><img src="<?= base_url() ?>assets/images/student.png" class="img-responsive" width="100"></a>
                    </center>
                </div>
            <?php } ?>
        </div>
    </div>
</div>