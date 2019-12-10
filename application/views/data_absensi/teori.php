<div class="services">
    <?php
    if (isset($_SESSION['state_status']) && $_SESSION['state_status'] === true) {
        echo '<div id="message-alert" class="alert alert-success text-center" role="alert">Data berhasil di simpan</div>';
        unset($_SESSION['state_status']);
    } else if (isset($_SESSION['state_status_delete']) && $_SESSION['state_status_delete'] === true) {
        echo '<div id="message-alert" class="alert alert-success text-center" role="alert">Data berhasil di hapus</div>';
        unset($_SESSION['state_status_delete']);
    }
    ?>

    <div class="container" align="right" class="print-screen">
        <button onClick="print()" class="btn btn-primary btn-lg print-screen">Cetak</button>
    </div>

    <br>

    <div class="container" style="color:black;">
        <div class="panel panel-default">
            <?php
            // Data Mata Kuliah
            $kd_mata_kuliah = $data_mk->kd_mata_kuliah;
            $nik_koordinator_mata_kuliah = $data_mk->nik;
            $nama_mata_kuliah = $data_mk->nama_mata_kuliah;
            $kd_prodi = $data_mk->kd_prodi;
            $semester = $data_mk->semester;
            $tahun_ajaran = $data_mk->tahun_ajaran;
            $sks_teori = $data_mk->sks_teori;
            $sks_praktikum = $data_mk->sks_praktikum;
            $sifat = $data_mk->sifat;

            // Silabus
            $silabus_ringkas = isset($data_sap->silabus_ringkas) ? $data_sap->silabus_ringkas : '';
            $tiu = isset($data_sap->tiu) ? $data_sap->tiu : '';
            $mk_prasyarat = isset($data_sap->mk_prasyarat) ? $data_sap->mk_prasyarat : '';
            $media = isset($data_sap->media) ? $data_sap->media : '';
            $waktu_kuliah = isset($data_sap->waktu_kuliah) ? $data_sap->waktu_kuliah : '';
            $waktu_pr = isset($data_sap->waktu_pr) ? $data_sap->waktu_pr : '';
            $waktu_diskusi_kelompok = isset($data_sap->waktu_diskusi_kelompok) ? $data_sap->waktu_diskusi_kelompok : '';
            $bobot_UTS = isset($data_sap->bobot_UTS) ? $data_sap->bobot_UTS : '';
            $bobot_UAS = isset($data_sap->bobot_UAS) ? $data_sap->bobot_UAS : '';
            $bobot_quiz = isset($data_sap->bobot_quiz) ? $data_sap->bobot_quiz : '';
            $bobot_tugas = isset($data_sap->bobot_tugas) ? $data_sap->bobot_tugas : '';
            $bobot_praktikum_dan_keaktifan = isset($data_sap->bobot_praktikum_dan_keaktifan) ? $data_sap->bobot_praktikum_dan_keaktifan : '';
            $rujukan = isset($data_sap->rujukan) ? $data_sap->rujukan : '';

            $id_pelaksanaan_perkuliahan = $kd_mata_kuliah . "-" . $semester . "-TEORI-1";
            $nama_prodi = isset($data_prodi->nama_prodi) ? $data_prodi->nama_prodi : '';
            $kd_ruang = isset($data_perkuliahan->kd_ruang) ? $data_perkuliahan->kd_ruang : '';
            $nik_tata_usaha = isset($data_perkuliahan->nik_tata_usaha) ? $data_perkuliahan->nik_tata_usaha : '';
            $hari_perkuliahan = isset($data_perkuliahan->hari_perkuliahan) ? $data_perkuliahan->hari_perkuliahan : '';
            $jam_perkuliahan = isset($data_perkuliahan->jam_perkuliahan) ? $data_perkuliahan->jam_perkuliahan : '';

            $total = isset($data_total_krs->total) ? $data_total_krs->total : 0;

            $id_absensi = $kd_mata_kuliah . "-" . $semester . "-TEORI-1";;

            $npm = $data_absensi->npm;
            $w1 = $data_absensi->w1;
            $w2 = $data_absensi->w2;
            $w3 = $data_absensi->w3;
            $w4 = $data_absensi->w4;
            $w5 = $data_absensi->w5;
            $w6 = $data_absensi->w6;
            $w7 = $data_absensi->w7;
            $w8 = $data_absensi->w8;
            $w9 = $data_absensi->w9;
            $w10 = $data_absensi->w10;
            $w11 = $data_absensi->w11;
            $w12 = $data_absensi->w12;
            $w13 = $data_absensi->w13;
            $w14 = $data_absensi->w14;
            $w15 = $data_absensi->w15;
            $w16 = $data_absensi->w16;

            $w1__ = explode(", ", $w1);
            $w2__ = explode(", ", $w2);
            $w3__ = explode(", ", $w3);
            $w4__ = explode(", ", $w4);
            $w5__ = explode(", ", $w5);
            $w6__ = explode(", ", $w6);
            $w7__ = explode(", ", $w7);
            $w8__ = explode(", ", $w8);
            $w9__ = explode(", ", $w9);
            $w10__ = explode(", ", $w10);
            $w11__ = explode(", ", $w11);
            $w12__ = explode(", ", $w12);
            $w13__ = explode(", ", $w13);
            $w14__ = explode(", ", $w14);
            $w15__ = explode(", ", $w15);
            $w16__ = explode(", ", $w16);

            for ($i = 0; $i < $total; $i++) {
                if (isset($w1__[$i])) {
                    $w1_[$i] = $w1__[$i];
                } else {
                    $w1_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w2__[$i])) {
                    $w2_[$i] = $w2__[$i];
                } else {
                    $w2_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w3__[$i])) {
                    $w3_[$i] = $w3__[$i];
                } else {
                    $w3_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w4__[$i])) {
                    $w4_[$i] = $w4__[$i];
                } else {
                    $w4_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w5__[$i])) {
                    $w5_[$i] = $w5__[$i];
                } else {
                    $w5_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w6__[$i])) {
                    $w6_[$i] = $w6__[$i];
                } else {
                    $w6_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w7__[$i])) {
                    $w7_[$i] = $w7__[$i];
                } else {
                    $w7_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w8__[$i])) {
                    $w8_[$i] = $w8__[$i];
                } else {
                    $w8_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w9__[$i])) {
                    $w9_[$i] = $w9__[$i];
                } else {
                    $w9_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w10__[$i])) {
                    $w10_[$i] = $w10__[$i];
                } else {
                    $w10_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w11__[$i])) {
                    $w11_[$i] = $w11__[$i];
                } else {
                    $w11_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w12__[$i])) {
                    $w12_[$i] = $w12__[$i];
                } else {
                    $w12_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w13__[$i])) {
                    $w13_[$i] = $w13__[$i];
                } else {
                    $w13_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w14__[$i])) {
                    $w14_[$i] = $w14__[$i];
                } else {
                    $w14_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w15__[$i])) {
                    $w15_[$i] = $w15__[$i];
                } else {
                    $w15_[$i] = "0";
                }
            }

            for ($i = 0; $i < $total; $i++) {
                if (isset($w16__[$i])) {
                    $w16_[$i] = $w16__[$i];
                } else {
                    $w16_[$i] = "0";
                }
            }

            $nama_ruang = isset($data_ruang->nama_ruang) ? $data_ruang->nama_ruang : '';
            $nik_tata_usaha = !empty($_SESSION['nik']) ? $_SESSION['nik'] : '';

            $data6 = $data_sap;

            $nama_dosen = isset($data_dosen) ? $data_dosen->nama_dosen : '';

            $jam = explode("-", $jam_perkuliahan);

            // $sql4 = "SELECT * FROM rincian_materi_kuliah WHERE kd_mata_kuliah='$kd_mata_kuliah'";
            // if (!$result4 = $mysqli->query($sql4)) {
            //     $message4 = "Sorry, the website is experiencing problems.";
            //     echo "<script type='text/javascript'>alert('$message4');</script>";
            //     exit;
            // }
            //

            ?>
            <div>
                <h3 style="margin-left:15px; margin-top:15px;"><b>UNIVERSITAS YARSI<br>FAKULTAS TEKNOLOGI INFORMASI</b></h3>
            </div>
            <br>
            <div align="center">
                <h3 style="text-transform: uppercase;"><b>DAFTAR ABSENSI<br>
                        <?php
                        if ($semester % 2 != 0)
                            echo "Semester Ganjil ";
                        else
                            echo "Semester Genap ";
                        ?>
                        Tahun Akademik <?php echo $tahun_ajaran; ?></b></h3>

                <form method="post" role="form">
                    <input type="hidden" value="<?php echo $id_absensi; ?>" name="id_absensi"/>
                    <input type="hidden" value="<?php echo $kd_mata_kuliah; ?>" name="kd_mata_kuliah"/>
                    <table class="pel_per">
                        <tr>
                            <th><h4><b>Nama Mata Kuliah</b></h4></th>
                            <th><h4><b>&nbsp;:&nbsp;</b></h4></th>
                            <th><h4><b><?php echo $nama_mata_kuliah; ?></b></h4></th>
                        </tr>
                        <tr>
                            <th><h4><b>Program Studi / SKS</b></h4></th>
                            <th><h4><b>&nbsp;:&nbsp;</b></h4></th>
                            <th><h4><b><?php echo $nama_prodi . " / " . $sks_teori; ?></b></h4></th>
                        </tr>
                        <tr>
                            <th><h4><b>Hari / Jam</b></h4></th>
                            <th><h4><b>&nbsp;:&nbsp;</b></h4></th>
                            <th><h5><b><input type="text" value="<?php echo $hari_perkuliahan; ?>" placeholder="Hari" readonly disabled/>
                                        <input type="text" name="jam_mulai" id="jam_mulai" style="width:150px;" placeholder="Jam Mulai" value="<?php echo $jam[0]; ?>" readonly disabled>
                                        <input type="text" name="jam_selesai" id="jam_selesai" style="width:150px;" placeholder="Jam Selesai" value="<?php if (isset($jam[1])) echo $jam[1]; ?>" readonly disabled>
                                    </b></h5></th>
                        </tr>
                        <tr>
                            <th><h4><b>Nama Dosen</b></h4></th>
                            <th><h4><b>&nbsp;:&nbsp;</b></h4></th>
                            <th><h4><b><?php echo $nama_dosen; ?></b></h4></th>
                        </tr>
                        <tr>
                            <th><h4><b>Ruang</b></h4></th>
                            <th><h4><b>&nbsp;:&nbsp;</b></h4></th>
                            <th><h5><b>
                                        <input type="text" value="<?php echo $data_ruang_prodi->nama_ruang; ?>" placeholder="Ruang" readonly disabled/>
                                    </b></h5></th>
                        </tr>
                    </table>
                    <br>

                    <table class="sap">
                        <tr>
                            <th rowspan="2">
                                <center>No.</center>
                            </th>
                            <th rowspan="2">
                                <center>NPM</center>
                            </th>
                            <th rowspan="2">
                                <center>Nama</center>
                            </th>
                            <th width="50">
                                <center>W1</center>
                            </th>
                            <th width="50">
                                <center>W2</center>
                            </th>
                            <th width="50">
                                <center>W3</center>
                            </th>
                            <th width="50">
                                <center>W4</center>
                            </th>
                            <th width="50">
                                <center>W5</center>
                            </th>
                            <th width="50">
                                <center>W6</center>
                            </th>
                            <th width="50">
                                <center>W7</center>
                            </th>
                            <th width="50">
                                <center>W8</center>
                            </th>
                            <th width="50">
                                <center>W9</center>
                            </th>
                            <th width="50">
                                <center>W10</center>
                            </th>
                            <th width="50">
                                <center>W11</center>
                            </th>
                            <th width="50">
                                <center>W12</center>
                            </th>
                            <th width="50">
                                <center>W13</center>
                            </th>
                            <th width="50">
                                <center>W14</center>
                            </th>
                            <th width="50">
                                <center>W15</center>
                            </th>
                            <th width="50">
                                <center>W16</center>
                            </th>
                            <th rowspan="2">
                                <center>Total</center>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w1_all" style="outline: 1px solid black;" onClick="toggle1(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w2_all" style="outline: 1px solid black;" onClick="toggle2(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w3_all" style="outline: 1px solid black;" onClick="toggle3(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w4_all" style="outline: 1px solid black;" onClick="toggle4(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w5_all" style="outline: 1px solid black;" onClick="toggle5(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w6_all" style="outline: 1px solid black;" onClick="toggle6(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w7_all" style="outline: 1px solid black;" onClick="toggle7(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w8_all" style="outline: 1px solid black;" onClick="toggle8(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w9_all" style="outline: 1px solid black;" onClick="toggle9(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w10_all" style="outline: 1px solid black;" onClick="toggle10(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w11_all" style="outline: 1px solid black;" onClick="toggle11(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w12_all" style="outline: 1px solid black;" onClick="toggle12(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w13_all" style="outline: 1px solid black;" onClick="toggle13(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w14_all" style="outline: 1px solid black;" onClick="toggle14(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w15_all" style="outline: 1px solid black;" onClick="toggle15(this)"/></center>
                            </th>
                            <th>
                                <center><input class="form-control" type="checkbox" id="w16_all" style="outline: 1px solid black;" onClick="toggle16(this)"/></center>
                            </th>
                        </tr>

                        <script language="JavaScript">
                            function toggle1(source) {
                                checkboxes = document.getElementsByName('w1_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle2(source) {
                                checkboxes = document.getElementsByName('w2_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle3(source) {
                                checkboxes = document.getElementsByName('w3_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle4(source) {
                                checkboxes = document.getElementsByName('w4_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle5(source) {
                                checkboxes = document.getElementsByName('w5_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle6(source) {
                                checkboxes = document.getElementsByName('w6_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle7(source) {
                                checkboxes = document.getElementsByName('w7_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle8(source) {
                                checkboxes = document.getElementsByName('w8_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle9(source) {
                                checkboxes = document.getElementsByName('w9_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle10(source) {
                                checkboxes = document.getElementsByName('w10_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle11(source) {
                                checkboxes = document.getElementsByName('w11_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle12(source) {
                                checkboxes = document.getElementsByName('w12_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle13(source) {
                                checkboxes = document.getElementsByName('w13_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle14(source) {
                                checkboxes = document.getElementsByName('w14_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle15(source) {
                                checkboxes = document.getElementsByName('w15_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>
                        <script language="JavaScript">
                            function toggle16(source) {
                                checkboxes = document.getElementsByName('w16_[]');

                                for (var i = 0, n = checkboxes.length; i < n; i++) {
                                    checkboxes[i].checked = source.checked;
                                }
                            }
                        </script>

                        <?php
                        // $sql4 = "SELECT * FROM krs WHERE kd_mata_kuliah='$kd_mata_kuliah' ORDER BY npm ASC";
                        // if (!$result4 = $mysqli->query($sql4)) {
                        //     $message4 = "Sorry, the website is experiencing problems.";
                        //     echo "<script type='text/javascript'>alert('$message4');</script>";
                        //     exit;
                        // }
                        $no = 1;
                        $week = 0;
                        foreach ($data_krs AS $data4) {
                            $npm = $data4->npm;
                            ?>
                            <tr>
                                <td>
                                    <center><?php echo $no++; ?></center>
                                </td>
                                <td>
                                    <center><input class="form-control" type="text" id="npm" name="npm_[]" value="<?php echo $npm; ?>" style="width:110px;" readonly/></center>
                                </td>
                                <td>
                                    <center>
                                        <?php
                                        $this->db->select('*');
                                        $this->db->from('mst_mahasiswa');
                                        $this->db->where('npm', $npm);
                                        $mst_mhs = $this->db->get();
                                        $mst_mhs = $mst_mhs->row();

                                        echo isset($mst_mhs->nama_mahasiswa) ? $mst_mhs->nama_mahasiswa : '';
                                        ?>
                                    </center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w1_" name="w1_[]"
                                            <?php
                                            for ($i = 0; $i < count($w1_); $i++) {
                                                if ($w1_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w2_" name="w2_[]"
                                            <?php
                                            for ($i = 0; $i < count($w2_); $i++) {
                                                if ($w2_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w3_" name="w3_[]"
                                            <?php
                                            for ($i = 0; $i < count($w3_); $i++) {
                                                if ($w3_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w4_" name="w4_[]"
                                            <?php
                                            for ($i = 0; $i < count($w4_); $i++) {
                                                if ($w4_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w5_" name="w5_[]"
                                            <?php
                                            for ($i = 0; $i < count($w5_); $i++) {
                                                if ($w5_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w6_" name="w6_[]"
                                            <?php
                                            for ($i = 0; $i < count($w6_); $i++) {
                                                if ($w6_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w7_" name="w7_[]"
                                            <?php
                                            for ($i = 0; $i < count($w7_); $i++) {
                                                if ($w7_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w8_" name="w8_[]"
                                            <?php
                                            for ($i = 0; $i < count($w8_); $i++) {
                                                if ($w8_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w9_" name="w9_[]"
                                            <?php
                                            for ($i = 0; $i < count($w9_); $i++) {
                                                if ($w9_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w10_" name="w10_[]"
                                            <?php
                                            for ($i = 0; $i < count($w10_); $i++) {
                                                if ($w10_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w11_" name="w11_[]"
                                            <?php
                                            for ($i = 0; $i < count($w11_); $i++) {
                                                if ($w11_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w12_" name="w12_[]"
                                            <?php
                                            for ($i = 0; $i < count($w12_); $i++) {
                                                if ($w12_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w13_" name="w13_[]"
                                            <?php
                                            for ($i = 0; $i < count($w13_); $i++) {
                                                if ($w13_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w14_" name="w14_[]"
                                            <?php
                                            for ($i = 0; $i < count($w14_); $i++) {
                                                if ($w14_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w15_" name="w15_[]"
                                            <?php
                                            for ($i = 0; $i < count($w15_); $i++) {
                                                if ($w15_[$i] == $npm . "-1") echo " checked";
                                            }
                                            ?>
                                                   value="<?php echo $npm; ?>-1"/></center>
                                </td>
                                <td>
                                    <center><input type="checkbox" id="w16_" name="w16_[]" <
                                        <?php
                                        for ($i = 0; $i < count($w16_); $i++) {
                                            if ($w16_[$i] == $npm . "-1") echo " checked";
                                        }
                                        ?>
                                        value="<?php echo $npm; ?>-1" />
                                    </center>
                                </td>
                                <td>
                                    <center><input type="text" id="total_hadir_" name="total_hadir_[]" style="width:50px;" <
                                        <?php
                                        $total = 0;
                                        for ($i = 0; $i < count($w1_); $i++) {
                                            if ($w1_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w2_); $i++) {
                                            if ($w2_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w3_); $i++) {
                                            if ($w3_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w4_); $i++) {
                                            if ($w4_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w5_); $i++) {
                                            if ($w5_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w6_); $i++) {
                                            if ($w6_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w7_); $i++) {
                                            if ($w7_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w8_); $i++) {
                                            if ($w8_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w9_); $i++) {
                                            if ($w9_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w10_); $i++) {
                                            if ($w10_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w11_); $i++) {
                                            if ($w11_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w12_); $i++) {
                                            if ($w12_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w13_); $i++) {
                                            if ($w13_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w14_); $i++) {
                                            if ($w14_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w15_); $i++) {
                                            if ($w15_[$i] == $npm . "-1") $total++;
                                        }
                                        for ($i = 0; $i < count($w16_); $i++) {
                                            if ($w16_[$i] == $npm . "-1") $total++;
                                        }
                                        ?>
                                        value="<?php echo $total; ?>" readonly />
                                    </center>
                                </td>

                                <input type="hidden" id="total_mhs" name="total_mhs" value="<?php echo $no; ?>"/>

                                <input type="hidden" id="week_" name="week_[]" <
                                <?php
                                for ($i = 0; $i < count($w1_); $i++) {
                                    if ($w1_[$i] == $npm . "-1") $week = 1;
                                }
                                for ($i = 0; $i < count($w2_); $i++) {
                                    if ($w2_[$i] == $npm . "-1") $week = 2;
                                }
                                for ($i = 0; $i < count($w3_); $i++) {
                                    if ($w3_[$i] == $npm . "-1") $week = 3;
                                }
                                for ($i = 0; $i < count($w4_); $i++) {
                                    if ($w4_[$i] == $npm . "-1") $week = 4;
                                }
                                for ($i = 0; $i < count($w5_); $i++) {
                                    if ($w5_[$i] == $npm . "-1") $week = 5;
                                }
                                for ($i = 0; $i < count($w6_); $i++) {
                                    if ($w6_[$i] == $npm . "-1") $week = 6;
                                }
                                for ($i = 0; $i < count($w7_); $i++) {
                                    if ($w7_[$i] == $npm . "-1") $week = 7;
                                }
                                for ($i = 0; $i < count($w8_); $i++) {
                                    if ($w8_[$i] == $npm . "-1") $week = 8;
                                }
                                for ($i = 0; $i < count($w9_); $i++) {
                                    if ($w9_[$i] == $npm . "-1") $week = 9;
                                }
                                for ($i = 0; $i < count($w10_); $i++) {
                                    if ($w10_[$i] == $npm . "-1") $week = 10;
                                }
                                for ($i = 0; $i < count($w11_); $i++) {
                                    if ($w11_[$i] == $npm . "-1") $week = 11;
                                }
                                for ($i = 0; $i < count($w12_); $i++) {
                                    if ($w12_[$i] == $npm . "-1") $week = 12;
                                }
                                for ($i = 0; $i < count($w13_); $i++) {
                                    if ($w13_[$i] == $npm . "-1") $week = 13;
                                }
                                for ($i = 0; $i < count($w14_); $i++) {
                                    if ($w14_[$i] == $npm . "-1") $week = 14;
                                }
                                for ($i = 0; $i < count($w15_); $i++) {
                                    if ($w15_[$i] == $npm . "-1") $week = 15;
                                }
                                for ($i = 0; $i < count($w16_); $i++) {
                                    if ($w16_[$i] == $npm . "-1") $week = 16;
                                }
                                ?>
                                value="<?php echo $week; ?>" />
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="text-center" class="print-screen">
                        <button value="dosen_data_absensi_teori" type="submit" name="submit" class="btn btn-primary btn-lg print-screen" required="required">Simpan</button>
                    </div>
                    </br>
                </form>
            </div>
        </div>
    </div>
</div>