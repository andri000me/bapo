<div class="services">
    <div class="container text-center">
        <h3><?= $title ?></h3>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <center>
                    <h4>Mahasiswa/i</h4>
                    <a href="data_laporan?state=mahasiswa"><img src="<?= base_url() ?>assets/images/student.png" class="img-responsive" width="100"></a>
                </center>
            </div>
        </div>
        <div id="laporan_chart" style="min-width: 400px; height: 400px; margin: 0 auto"></div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        $('#laporan_chart').highcharts({
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Jumlah Mahasiswa Tiap Fakultas di Universitas YARSI'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
            },
            xAxis: {
                categories: [
                    'Kedokteran Umum',
                    'Hukum',
                    'Ekonomi',
                    'Teknologi Informasi',
                    'Psikologi',
                    'Kedoketaran Gigi'
                ],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Total Mahasiswa/i'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' orang'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Universitas YARSI',
                data: [<?php echo $total_fk ?>, <?php echo $total_fh ?>, <?php echo $total_fe ?>, <?php echo $total_fti ?>, <?php echo $total_fpsi ?>, <?php echo $total_fkg ?>]
            }]
        });
    });
</script>
