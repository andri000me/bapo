<div class="services">
    <div class="container">
        <h3><?= $title ?></h3>
        <hr>
        <div class="row ">
            <div class="col-md-6 text-center">
                <center>
                    <h4>Teori</h4>
                    <a href="data_absensi/teori?state_kd_mk=<?= $_GET['state_kd_mk'] ?>"><img src="<?= base_url() ?>assets/images/student.png" class="img-responsive" width="100"></a>
                </center>
            </div>
            <div class="col-md-6 text-center">
                <center>
                    <h4>Praktikum</h4>
                    <a href="data_absensi/praktikum?state_kd_mk=<?= $_GET['state_kd_mk'] ?>"><img src="<?= base_url() ?>assets/images/student.png" class="img-responsive" width="100"></a>
                </center>
            </div>
        </div>
    </div>
</div>