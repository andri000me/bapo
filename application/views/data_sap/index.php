<div class="services">
    <div class="container" align="right" class="print-screen">
        <button onClick="print()" class="btn btn-primary btn-lg print-screen">Cetak</button>
    </div>
    <div class="container" style="color:black">
        <div class="panel panel-default">
            <?php
            // DATA MATA KULIAH
            $kd_mata_kuliah = isset($data_mk->kd_mata_kuliah) ? $data_mk->kd_mata_kuliah : '';
            $nik_koordinator_mata_kuliah = isset($data_mk->nik) ? $data_mk->nik : '';
            $nama_mata_kuliah = isset($data_mk->nama_mata_kuliah) ? $data_mk->nama_mata_kuliah : '';
            $kd_prodi = isset($data_mk->kd_prodi) ? $data_mk->kd_prodi : '';
            $semester = isset($data_mk->semester) ? $data_mk->semester : '';
            $tahun_ajaran = isset($data_mk->tahun_ajaran) ? $data_mk->tahun_ajaran : '';
            $sks_teori = isset($data_mk->sks_teori) ? $data_mk->sks_teori : '';
            $sks_praktikum = isset($data_mk->sks_praktikum) ? $data_mk->sks_praktikum : '';
            $sifat = isset($data_mk->sifat) ? $data_mk->sifat : '';

            // DATA SAP
            $silabus_ringkas = isset($data_sap->silabus_ringkas) ? $data_sap->silabus_ringkas : '';
            $tiu = isset($data_sap->tiu) ? $data_sap->tiu : '';
            $mk_prasyarat = isset($data_sap->mk_prasyarat) ? $data_sap->mk_prasyarat : '';
            $media = isset($data_sap->media) ? $data_sap->media : '';
            $waktu_kuliah = isset($data_sap->waktu_kuliah) ? $data_sap->waktu_kuliah : '';
            $waktu_pr = isset($data_sap->waktu_pr) ? $data_sap->waktu_pr : '';
            $waktu_diskusi_kelompok = isset($data_sap->waktu_diskusi_kelompok) ? $data_sap->waktu_diskusi_kelompok : '';
            $lain_lain1 = isset($data_sap->lain_lain1) ? $data_sap->lain_lain1 : '';
            $waktu_lain_lain1 = isset($data_sap->waktu_lain_lain1) ? $data_sap->waktu_lain_lain1 : '';
            $bobot_UTS = isset($data_sap->bobot_UTS) ? $data_sap->bobot_UTS : '';
            $bobot_UAS = isset($data_sap->bobot_UAS) ? $data_sap->bobot_UAS : '';
            $bobot_quiz = isset($data_sap->bobot_quiz) ? $data_sap->bobot_quiz : '';
            $bobot_tugas = isset($data_sap->bobot_tugas) ? $data_sap->bobot_tugas : '';
            $bobot_praktikum = isset($data_sap->bobot_praktikum) ? $data_sap->bobot_praktikum : '';
            $bobot_keaktifan = isset($data_sap->bobot_keaktifan) ? $data_sap->bobot_keaktifan : '';
            $lain_lain2 = isset($data_sap->lain_lain2) ? $data_sap->lain_lain2 : '';
            $bobot_lain_lain2 = isset($data_sap->bobot_lain_lain2) ? $data_sap->bobot_lain_lain2 : '';
            $rujukan = isset($data_sap->rujukan) ? $data_sap->rujukan : '';
            ?>
            <div>
                <img src="<?= base_url() ?>assets/images/FTI.png" width="300" style="margin-left:15px; margin-top:15px;"/>
            </div>
            <div align="center">
                <h3 style="text-transform: uppercase;"><b>SATUAN ACARA PERKULIAHAN<br><u><?= $data_mk->nama_mata_kuliah; ?></u></b></h3>
                <form method="post" role="form">
                    <table class="sap">
                        <tr>
                            <th>Bentuk Kuliah</th>
                            <td colspan="2">
                                <input type="hidden" id="kd_mata_kuliah" name="kd_mata_kuliah" value="<?php echo $kd_mata_kuliah; ?>"/>
                                <input type="hidden" id="nik_koordinator_mata_kuliah" name="nik_koordinator_mata_kuliah" value="<?php echo $_SESSION['nik']; ?>"/>
                                <input type="checkbox" id="sks_teori" name="sks_teori" value="<?php echo $sks_teori; ?>"
                                    <?php
                                    if ($sks_teori != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;<b><?php echo $sks_teori; ?></b> sks Kuliah&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="sks_praktikum" name="sks_praktikum" value="<?php echo $sks_praktikum; ?>"
                                    <?php
                                    if ($sks_praktikum != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;<b><?php echo $sks_praktikum; ?></b> sks Praktikum
                            </td>
                            <td><b>
                                    Semester
                                    <?php
                                    if ($semester == 1) {
                                        echo ' I';
                                    } else if ($semester == 2) {
                                        echo ' II';
                                    } else if ($semester == 3) {
                                        echo ' III';
                                    } else if ($semester == 4) {
                                        echo ' IV';
                                    } else if ($semester == 5) {
                                        echo ' V';
                                    } else if ($semester == 6) {
                                        echo ' VI';
                                    } else if ($semester == 7) {
                                        echo ' VII';
                                    } else if ($semester == 8) {
                                        echo ' VIII';
                                    }
                                    ?>
                                </b></td>
                            <td><b>Sifat</b>&nbsp;&nbsp;
                                <input type="radio" id="sifat" name="sifat" value="<?php echo $sifat; ?>"
                                    <?php
                                    if ($sifat == "Wajib") {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp; Wajib&nbsp;&nbsp;
                                <input type="radio" id="sifat" name="sifat" value="<?php echo $sifat; ?>"
                                    <?php
                                    if ($sifat == "Pilihan") {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp; Pilihan
                            </td>
                        </tr>
                        <tr>
                            <th>Silabus Ringkas</th>
                            <td colspan="4">
                                <textarea class="form-control" name="silabus_ringkas" id="silabus_ringkas" rows="8" required><?php echo $silabus_ringkas; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Tujuan Instruksional Umum (TIU)</th>
                            <td colspan="4">
                                <textarea class="form-control" name="tiu" id="tiu" rows="8" required><?php echo $tiu; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>Mata Kuliah Prasyarat</th>
                            <td colspan="4">
                                <select class="form-control" name="mk_prasyarat" id="mk_prasyarat">
                                    <option value="">Pilih Mata Kuliah Prasyarat</option>
                                    <?php
                                    foreach ($data_pra_mk AS $val) {
                                        ?>
                                        <option value="<?php echo $val->nama_mata_kuliah; ?>"
                                            <?php
                                            if ($mk_prasyarat == $val->nama_mata_kuliah) {
                                                echo ' selected="selected"';
                                            }
                                            ?>
                                        >
                                            <?php
                                            echo $val->nama_mata_kuliah;
                                            ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Media</th>
                            <td colspan="4">
                                <input type="checkbox" id="media1" name="media1" value="Whiteboard"
                                    <?php
                                    if (strpos($media, 'Whiteboard') !== false) {
                                        echo ' checked';
                                    }
                                    ?>
                                />&nbsp;&nbsp;<i>Whiteboard</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="media2" name="media2" value="E-Learning"
                                    <?php
                                    if (strpos($media, 'E-Learning') !== false) {
                                        echo ' checked';
                                    }
                                    ?>
                                />&nbsp;&nbsp;<i>E-Learning</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" id="media3" name="media3" value="LCD"
                                    <?php
                                    if (strpos($media, 'LCD') !== false) {
                                        echo ' checked';
                                    }
                                    ?>
                                />&nbsp;&nbsp;<i>LCD</i>&nbsp;&nbsp;&nbsp;
                            </td>
                        <tr>
                            <th>Lama Kegiatan Belajar Per Pekan</th>
                            <td>
                                <input type="checkbox"
                                    <?php
                                    if ($waktu_kuliah != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Kuliah (K)
                                <br>
                                <input type="checkbox"
                                    <?php
                                    if ($waktu_pr != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Pekerjaan Rumah (R)
                            </td>
                            <td>
                                : <input type="number" id="waktu_kuliah" name="waktu_kuliah" style="width:50px; margin-bottom:3px;" value="<?php echo $waktu_kuliah; ?>"/>&nbsp;menit
                                <br>
                                : <input type="number" id="waktu_pr" name="waktu_pr" style="width:50px; margin-bottom:3px;" value="<?php echo $waktu_pr; ?>"/>&nbsp;menit
                            </td>
                            <td>
                                <input type="checkbox"
                                    <?php
                                    if ($waktu_diskusi_kelompok != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Diskusi Kelompok (D)
                                <br>
                                <input type="text" id="lain_lain1" name="lain_lain1" value="<?php echo $lain_lain1; ?>" placeholder="Lain-Lain"/>
                            </td>
                            <td>
                                : <input type="number" id="waktu_diskusi_kelompok" name="waktu_diskusi_kelompok" style="width:50px; margin-bottom:3px;" value="<?php echo $waktu_diskusi_kelompok; ?>"/>&nbsp;menit
                                <br>
                                : <input type="number" id="waktu_lain_lain1" name="waktu_lain_lain1" style="width:50px; margin-bottom:3px;" value="<?php echo $waktu_lain_lain1; ?>"/>&nbsp;menit
                            </td>
                        </tr>
                        <tr>
                            <th>Bobot Unsur Penilaian</th>
                            <td>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_UTS != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Ujian Tengah Semester (T)
                                <br>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_UAS != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Ujian Akhir Semester (A)
                                <br>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_quiz != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Quiz (Q)
                            </td>
                            <td>
                                : <input type="number" id="bobot_UTS" name="bobot_UTS" style="width:50px; margin-bottom:3px;" value="<?php echo $bobot_UTS; ?>"/>&nbsp;%
                                <br>
                                : <input type="number" id="bobot_UAS" name="bobot_UAS" style="width:50px; margin-bottom:3px;" value="<?php echo $bobot_UAS; ?>"/>&nbsp;%
                                <br>
                                : <input type="number" id="bobot_quiz" name="bobot_quiz" style="width:50px;" value="<?php echo $bobot_quiz; ?>"/>&nbsp;%
                            </td>
                            <td>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_tugas != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Tugas (G)
                                <br>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_praktikum != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Praktikum (P)
                                <br>
                                <input type="checkbox"
                                    <?php
                                    if ($bobot_keaktifan != 0) {
                                        echo ' checked';
                                    }
                                    ?>
                                       onclick="return false" disabled/>&nbsp;&nbsp;Keaktifan (F)
                                <br>
                                <input type="text" id="lain_lain2" name="lain_lain2" value="<?php echo $lain_lain2; ?>" placeholder="Lain-Lain"/>
                            </td>
                            <td>
                                : <input type="number" id="bobot_tugas" name="bobot_tugas" style="width:50px; margin-bottom:3px;" value="<?php echo $bobot_tugas; ?>"/>&nbsp;%
                                <br>
                                : <input type="number" id="bobot_praktikum" name="bobot_praktikum" style="width:50px; margin-bottom:3px;" value="<?php echo $bobot_praktikum; ?>"/>&nbsp;%
                                <br>
                                : <input type="number" id="bobot_keaktifan" name="bobot_keaktifan" style="width:50px; margin-bottom:3px;" value="<?php echo $bobot_keaktifan; ?>"/>&nbsp;%
                                <br>
                                : <input type="number" id="bobot_lain_lain2" name="bobot_lain_lain2" style="width:50px;" value="<?php echo $bobot_lain_lain2; ?>"/>&nbsp;%
                            </td>
                        </tr>
                        <tr>
                            <th>Rujukan</th>
                            <td colspan="4">
                                <textarea class="form-control" name="rujukan" id="rujukan" rows="8"><?php echo $rujukan; ?></textarea>
                            </td>
                        </tr>
                    </table>
                    <div class="text-center" class="print-screen">
                        <button type="submit" value="dosen_data_sap" name="submit" class="btn btn-primary btn-lg print-screen" required="required">Simpan</button>
                    </div>
                </form>

                </br>
                </br>

                <?php
                $topik1 = "";
                $topik2 = "";
                $topik3 = "";
                $topik4 = "";
                $topik5 = "";
                $topik6 = "";
                $topik7 = "";
                $topik8 = "";
                $topik9 = "";
                $topik10 = "";
                $topik11 = "";
                $topik12 = "";
                $topik13 = "";
                $topik14 = "";
                $topik15 = "";
                $topik16 = "";
                $sub_topik1 = "";
                $sub_topik2 = "";
                $sub_topik3 = "";
                $sub_topik4 = "";
                $sub_topik5 = "";
                $sub_topik6 = "";
                $sub_topik7 = "";
                $sub_topik8 = "";
                $sub_topik9 = "";
                $sub_topik10 = "";
                $sub_topik11 = "";
                $sub_topik12 = "";
                $sub_topik13 = "";
                $sub_topik14 = "";
                $sub_topik15 = "";
                $sub_topik16 = "";

                $sub_topik1_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik2_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik3_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik4_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik5_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik6_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik7_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik8_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik9_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik10_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik11_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik12_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik13_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik14_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik15_ = array("", "", "", "", "", "", "", "", "", "");
                $sub_topik16_ = array("", "", "", "", "", "", "", "", "", "");

                $tik1 = "";
                $tik2 = "";
                $tik3 = "";
                $tik4 = "";
                $tik5 = "";
                $tik6 = "";
                $tik7 = "";
                $tik8 = "";
                $tik9 = "";
                $tik10 = "";
                $tik11 = "";
                $tik12 = "";
                $tik13 = "";
                $tik14 = "";
                $tik15 = "";
                $tik16 = "";
                $kegiatan_belajar1 = "";
                $kegiatan_belajar2 = "";
                $kegiatan_belajar3 = "";
                $kegiatan_belajar4 = "";
                $kegiatan_belajar5 = "";
                $kegiatan_belajar6 = "";
                $kegiatan_belajar7 = "";
                $kegiatan_belajar8 = "";
                $kegiatan_belajar9 = "";
                $kegiatan_belajar10 = "";
                $kegiatan_belajar11 = "";
                $kegiatan_belajar12 = "";
                $kegiatan_belajar13 = "";
                $kegiatan_belajar14 = "";
                $kegiatan_belajar15 = "";
                $kegiatan_belajar16 = "";
                $sign_koordinator_mata_kuliah = "";
                $sign_koordinator_program_studi = "";
                $tanggal = "";

                foreach ($data_rincian_mk AS $data4) {
                    $topik1 = $data4['topik1'];
                    $topik2 = $data4['topik2'];
                    $topik3 = $data4['topik3'];
                    $topik4 = $data4['topik4'];
                    $topik5 = $data4['topik5'];
                    $topik6 = $data4['topik6'];
                    $topik7 = $data4['topik7'];
                    $topik8 = $data4['topik8'];
                    $topik9 = $data4['topik9'];
                    $topik10 = $data4['topik10'];
                    $topik11 = $data4['topik11'];
                    $topik12 = $data4['topik12'];
                    $topik13 = $data4['topik13'];
                    $topik14 = $data4['topik14'];
                    $topik15 = $data4['topik15'];
                    $topik16 = $data4['topik16'];
                    $sub_topik1 = $data4['sub_topik1'];
                    $sub_topik2 = $data4['sub_topik2'];
                    $sub_topik3 = $data4['sub_topik3'];
                    $sub_topik4 = $data4['sub_topik4'];
                    $sub_topik5 = $data4['sub_topik5'];
                    $sub_topik6 = $data4['sub_topik6'];
                    $sub_topik7 = $data4['sub_topik7'];
                    $sub_topik8 = $data4['sub_topik8'];
                    $sub_topik9 = $data4['sub_topik9'];
                    $sub_topik10 = $data4['sub_topik10'];
                    $sub_topik11 = $data4['sub_topik11'];
                    $sub_topik12 = $data4['sub_topik12'];
                    $sub_topik13 = $data4['sub_topik13'];
                    $sub_topik14 = $data4['sub_topik14'];
                    $sub_topik15 = $data4['sub_topik15'];
                    $sub_topik16 = $data4['sub_topik16'];

                    $sub_topik1__ = explode(", ", $sub_topik1);
                    $sub_topik2__ = explode(", ", $sub_topik2);
                    $sub_topik3__ = explode(", ", $sub_topik3);
                    $sub_topik4__ = explode(", ", $sub_topik4);
                    $sub_topik5__ = explode(", ", $sub_topik5);
                    $sub_topik6__ = explode(", ", $sub_topik6);
                    $sub_topik7__ = explode(", ", $sub_topik7);
                    $sub_topik8__ = explode(", ", $sub_topik8);
                    $sub_topik9__ = explode(", ", $sub_topik9);
                    $sub_topik10__ = explode(", ", $sub_topik10);
                    $sub_topik11__ = explode(", ", $sub_topik11);
                    $sub_topik12__ = explode(", ", $sub_topik12);
                    $sub_topik13__ = explode(", ", $sub_topik13);
                    $sub_topik14__ = explode(", ", $sub_topik14);
                    $sub_topik15__ = explode(", ", $sub_topik15);
                    $sub_topik16__ = explode(", ", $sub_topik16);

                    $sub_topik1_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik1__[$i])) {
                            $sub_topik1_[$i] = $sub_topik1__[$i];
                        } else {
                            $sub_topik1_[$i] = "";
                        }
                    }

                    $sub_topik2_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik2__[$i])) {
                            $sub_topik2_[$i] = $sub_topik2__[$i];
                        } else {
                            $sub_topik2_[$i] = "";
                        }
                    }

                    $sub_topik3_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik3__[$i])) {
                            $sub_topik3_[$i] = $sub_topik3__[$i];
                        } else {
                            $sub_topik3_[$i] = "";
                        }
                    }

                    $sub_topik4_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik4__[$i])) {
                            $sub_topik4_[$i] = $sub_topik4__[$i];
                        } else {
                            $sub_topik4_[$i] = "";
                        }
                    }

                    $sub_topik5_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik5__[$i])) {
                            $sub_topik5_[$i] = $sub_topik5__[$i];
                        } else {
                            $sub_topik5_[$i] = "";
                        }
                    }

                    $sub_topik6_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik6__[$i])) {
                            $sub_topik6_[$i] = $sub_topik6__[$i];
                        } else {
                            $sub_topik6_[$i] = "";
                        }
                    }

                    $sub_topik7_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik7__[$i])) {
                            $sub_topik7_[$i] = $sub_topik7__[$i];
                        } else {
                            $sub_topik7_[$i] = "";
                        }
                    }

                    $sub_topik8_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik8__[$i])) {
                            $sub_topik8_[$i] = $sub_topik8__[$i];
                        } else {
                            $sub_topik8_[$i] = "";
                        }
                    }

                    $sub_topik9_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik9__[$i])) {
                            $sub_topik9_[$i] = $sub_topik9__[$i];
                        } else {
                            $sub_topik9_[$i] = "";
                        }
                    }

                    $sub_topik10_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik10__[$i])) {
                            $sub_topik10_[$i] = $sub_topik10__[$i];
                        } else {
                            $sub_topik10_[$i] = "";
                        }
                    }

                    $sub_topik11_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik11__[$i])) {
                            $sub_topik11_[$i] = $sub_topik11__[$i];
                        } else {
                            $sub_topik11_[$i] = "";
                        }
                    }

                    $sub_topik12_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik12__[$i])) {
                            $sub_topik12_[$i] = $sub_topik12__[$i];
                        } else {
                            $sub_topik12_[$i] = "";
                        }
                    }

                    $sub_topik13_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik13__[$i])) {
                            $sub_topik13_[$i] = $sub_topik13__[$i];
                        } else {
                            $sub_topik13_[$i] = "";
                        }
                    }

                    $sub_topik14_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik14__[$i])) {
                            $sub_topik14_[$i] = $sub_topik14__[$i];
                        } else {
                            $sub_topik14_[$i] = "";
                        }
                    }

                    $sub_topik15_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik15__[$i])) {
                            $sub_topik15_[$i] = $sub_topik15__[$i];
                        } else {
                            $sub_topik15_[$i] = "";
                        }
                    }

                    $sub_topik16_ = array("", "", "", "", "", "", "", "", "", "");

                    for ($i = 0; $i <= 9; $i++) {
                        if (isset($sub_topik16__[$i])) {
                            $sub_topik16_[$i] = $sub_topik16__[$i];
                        } else {
                            $sub_topik16_[$i] = "";
                        }
                    }

                    $tik1 = $data4['tik1'];
                    $tik2 = $data4['tik2'];
                    $tik3 = $data4['tik3'];
                    $tik4 = $data4['tik4'];
                    $tik5 = $data4['tik5'];
                    $tik6 = $data4['tik6'];
                    $tik7 = $data4['tik7'];
                    $tik8 = $data4['tik8'];
                    $tik9 = $data4['tik9'];
                    $tik10 = $data4['tik10'];
                    $tik11 = $data4['tik11'];
                    $tik12 = $data4['tik12'];
                    $tik13 = $data4['tik13'];
                    $tik14 = $data4['tik14'];
                    $tik15 = $data4['tik15'];
                    $tik16 = $data4['tik16'];
                    $kegiatan_belajar1 = $data4['kegiatan_belajar1'];
                    $kegiatan_belajar2 = $data4['kegiatan_belajar2'];
                    $kegiatan_belajar3 = $data4['kegiatan_belajar3'];
                    $kegiatan_belajar4 = $data4['kegiatan_belajar4'];
                    $kegiatan_belajar5 = $data4['kegiatan_belajar5'];
                    $kegiatan_belajar6 = $data4['kegiatan_belajar6'];
                    $kegiatan_belajar7 = $data4['kegiatan_belajar7'];
                    $kegiatan_belajar8 = $data4['kegiatan_belajar8'];
                    $kegiatan_belajar9 = $data4['kegiatan_belajar9'];
                    $kegiatan_belajar10 = $data4['kegiatan_belajar10'];
                    $kegiatan_belajar11 = $data4['kegiatan_belajar11'];
                    $kegiatan_belajar12 = $data4['kegiatan_belajar12'];
                    $kegiatan_belajar13 = $data4['kegiatan_belajar13'];
                    $kegiatan_belajar14 = $data4['kegiatan_belajar14'];
                    $kegiatan_belajar15 = $data4['kegiatan_belajar15'];
                    $kegiatan_belajar16 = $data4['kegiatan_belajar16'];
                    $sign_koordinator_mata_kuliah = $data4['sign_koordinator_mata_kuliah'];
                    $sign_koordinator_program_studi = $data4['sign_koordinator_program_studi'];
                    $tanggal = $data4['tanggal'];
                }
                ?>
                <script>
                    var sub_topik1_ = new Array(10);
                    sub_topik1_[1] = "<?php echo $sub_topik1_[0]; ?>";
                    sub_topik1_[2] = "<?php echo $sub_topik1_[1]; ?>";
                    sub_topik1_[3] = "<?php echo $sub_topik1_[2]; ?>";
                    sub_topik1_[4] = "<?php echo $sub_topik1_[3]; ?>";
                    sub_topik1_[5] = "<?php echo $sub_topik1_[4]; ?>";
                    sub_topik1_[6] = "<?php echo $sub_topik1_[5]; ?>";
                    sub_topik1_[7] = "<?php echo $sub_topik1_[6]; ?>";
                    sub_topik1_[8] = "<?php echo $sub_topik1_[7]; ?>";
                    sub_topik1_[9] = "<?php echo $sub_topik1_[8]; ?>";
                    sub_topik1_[10] = "<?php echo $sub_topik1_[9]; ?>";

                    var sub_topik2_ = new Array(10);
                    sub_topik2_[1] = "<?php echo $sub_topik2_[0]; ?>";
                    sub_topik2_[2] = "<?php echo $sub_topik2_[1]; ?>";
                    sub_topik2_[3] = "<?php echo $sub_topik2_[2]; ?>";
                    sub_topik2_[4] = "<?php echo $sub_topik2_[3]; ?>";
                    sub_topik2_[5] = "<?php echo $sub_topik2_[4]; ?>";
                    sub_topik2_[6] = "<?php echo $sub_topik2_[5]; ?>";
                    sub_topik2_[7] = "<?php echo $sub_topik2_[6]; ?>";
                    sub_topik2_[8] = "<?php echo $sub_topik2_[7]; ?>";
                    sub_topik2_[9] = "<?php echo $sub_topik2_[8]; ?>";
                    sub_topik2_[10] = "<?php echo $sub_topik2_[9]; ?>";

                    var sub_topik3_ = new Array(10);
                    sub_topik3_[1] = "<?php echo $sub_topik3_[0]; ?>";
                    sub_topik3_[2] = "<?php echo $sub_topik3_[1]; ?>";
                    sub_topik3_[3] = "<?php echo $sub_topik3_[2]; ?>";
                    sub_topik3_[4] = "<?php echo $sub_topik3_[3]; ?>";
                    sub_topik3_[5] = "<?php echo $sub_topik3_[4]; ?>";
                    sub_topik3_[6] = "<?php echo $sub_topik3_[5]; ?>";
                    sub_topik3_[7] = "<?php echo $sub_topik3_[6]; ?>";
                    sub_topik3_[8] = "<?php echo $sub_topik3_[7]; ?>";
                    sub_topik3_[9] = "<?php echo $sub_topik3_[8]; ?>";
                    sub_topik3_[10] = "<?php echo $sub_topik3_[9]; ?>";

                    var sub_topik4_ = new Array(10);
                    sub_topik4_[1] = "<?php echo $sub_topik4_[0]; ?>";
                    sub_topik4_[2] = "<?php echo $sub_topik4_[1]; ?>";
                    sub_topik4_[3] = "<?php echo $sub_topik4_[2]; ?>";
                    sub_topik4_[4] = "<?php echo $sub_topik4_[3]; ?>";
                    sub_topik4_[5] = "<?php echo $sub_topik4_[4]; ?>";
                    sub_topik4_[6] = "<?php echo $sub_topik4_[5]; ?>";
                    sub_topik4_[7] = "<?php echo $sub_topik4_[6]; ?>";
                    sub_topik4_[8] = "<?php echo $sub_topik4_[7]; ?>";
                    sub_topik4_[9] = "<?php echo $sub_topik4_[8]; ?>";
                    sub_topik4_[10] = "<?php echo $sub_topik4_[9]; ?>";

                    var sub_topik5_ = new Array(10);
                    sub_topik5_[1] = "<?php echo $sub_topik5_[0]; ?>";
                    sub_topik5_[2] = "<?php echo $sub_topik5_[1]; ?>";
                    sub_topik5_[3] = "<?php echo $sub_topik5_[2]; ?>";
                    sub_topik5_[4] = "<?php echo $sub_topik5_[3]; ?>";
                    sub_topik5_[5] = "<?php echo $sub_topik5_[4]; ?>";
                    sub_topik5_[6] = "<?php echo $sub_topik5_[5]; ?>";
                    sub_topik5_[7] = "<?php echo $sub_topik5_[6]; ?>";
                    sub_topik5_[8] = "<?php echo $sub_topik5_[7]; ?>";
                    sub_topik5_[9] = "<?php echo $sub_topik5_[8]; ?>";
                    sub_topik5_[10] = "<?php echo $sub_topik5_[9]; ?>";

                    var sub_topik6_ = new Array(10);
                    sub_topik6_[1] = "<?php echo $sub_topik6_[0]; ?>";
                    sub_topik6_[2] = "<?php echo $sub_topik6_[1]; ?>";
                    sub_topik6_[3] = "<?php echo $sub_topik6_[2]; ?>";
                    sub_topik6_[4] = "<?php echo $sub_topik6_[3]; ?>";
                    sub_topik6_[5] = "<?php echo $sub_topik6_[4]; ?>";
                    sub_topik6_[6] = "<?php echo $sub_topik6_[5]; ?>";
                    sub_topik6_[7] = "<?php echo $sub_topik6_[6]; ?>";
                    sub_topik6_[8] = "<?php echo $sub_topik6_[7]; ?>";
                    sub_topik6_[9] = "<?php echo $sub_topik6_[8]; ?>";
                    sub_topik6_[10] = "<?php echo $sub_topik6_[9]; ?>";

                    var sub_topik7_ = new Array(10);
                    sub_topik7_[1] = "<?php echo $sub_topik7_[0]; ?>";
                    sub_topik7_[2] = "<?php echo $sub_topik7_[1]; ?>";
                    sub_topik7_[3] = "<?php echo $sub_topik7_[2]; ?>";
                    sub_topik7_[4] = "<?php echo $sub_topik7_[3]; ?>";
                    sub_topik7_[5] = "<?php echo $sub_topik7_[4]; ?>";
                    sub_topik7_[6] = "<?php echo $sub_topik7_[5]; ?>";
                    sub_topik7_[7] = "<?php echo $sub_topik7_[6]; ?>";
                    sub_topik7_[8] = "<?php echo $sub_topik7_[7]; ?>";
                    sub_topik7_[9] = "<?php echo $sub_topik7_[8]; ?>";
                    sub_topik7_[10] = "<?php echo $sub_topik7_[9]; ?>";

                    var sub_topik8_ = new Array(10);
                    sub_topik8_[1] = "<?php echo $sub_topik8_[0]; ?>";
                    sub_topik8_[2] = "<?php echo $sub_topik8_[1]; ?>";
                    sub_topik8_[3] = "<?php echo $sub_topik8_[2]; ?>";
                    sub_topik8_[4] = "<?php echo $sub_topik8_[3]; ?>";
                    sub_topik8_[5] = "<?php echo $sub_topik8_[4]; ?>";
                    sub_topik8_[6] = "<?php echo $sub_topik8_[5]; ?>";
                    sub_topik8_[7] = "<?php echo $sub_topik8_[6]; ?>";
                    sub_topik8_[8] = "<?php echo $sub_topik8_[7]; ?>";
                    sub_topik8_[9] = "<?php echo $sub_topik8_[8]; ?>";
                    sub_topik8_[10] = "<?php echo $sub_topik8_[9]; ?>";

                    var sub_topik9_ = new Array(10);
                    sub_topik9_[1] = "<?php echo $sub_topik9_[0]; ?>";
                    sub_topik9_[2] = "<?php echo $sub_topik9_[1]; ?>";
                    sub_topik9_[3] = "<?php echo $sub_topik9_[2]; ?>";
                    sub_topik9_[4] = "<?php echo $sub_topik9_[3]; ?>";
                    sub_topik9_[5] = "<?php echo $sub_topik9_[4]; ?>";
                    sub_topik9_[6] = "<?php echo $sub_topik9_[5]; ?>";
                    sub_topik9_[7] = "<?php echo $sub_topik9_[6]; ?>";
                    sub_topik9_[8] = "<?php echo $sub_topik9_[7]; ?>";
                    sub_topik9_[9] = "<?php echo $sub_topik9_[8]; ?>";
                    sub_topik9_[10] = "<?php echo $sub_topik9_[9]; ?>";

                    var sub_topik10_ = new Array(10);
                    sub_topik10_[1] = "<?php echo $sub_topik10_[0]; ?>";
                    sub_topik10_[2] = "<?php echo $sub_topik10_[1]; ?>";
                    sub_topik10_[3] = "<?php echo $sub_topik10_[2]; ?>";
                    sub_topik10_[4] = "<?php echo $sub_topik10_[3]; ?>";
                    sub_topik10_[5] = "<?php echo $sub_topik10_[4]; ?>";
                    sub_topik10_[6] = "<?php echo $sub_topik10_[5]; ?>";
                    sub_topik10_[7] = "<?php echo $sub_topik10_[6]; ?>";
                    sub_topik10_[8] = "<?php echo $sub_topik10_[7]; ?>";
                    sub_topik10_[9] = "<?php echo $sub_topik10_[8]; ?>";
                    sub_topik10_[10] = "<?php echo $sub_topik10_[9]; ?>";

                    var sub_topik11_ = new Array(10);
                    sub_topik11_[1] = "<?php echo $sub_topik11_[0]; ?>";
                    sub_topik11_[2] = "<?php echo $sub_topik11_[1]; ?>";
                    sub_topik11_[3] = "<?php echo $sub_topik11_[2]; ?>";
                    sub_topik11_[4] = "<?php echo $sub_topik11_[3]; ?>";
                    sub_topik11_[5] = "<?php echo $sub_topik11_[4]; ?>";
                    sub_topik11_[6] = "<?php echo $sub_topik11_[5]; ?>";
                    sub_topik11_[7] = "<?php echo $sub_topik11_[6]; ?>";
                    sub_topik11_[8] = "<?php echo $sub_topik11_[7]; ?>";
                    sub_topik11_[9] = "<?php echo $sub_topik11_[8]; ?>";
                    sub_topik11_[10] = "<?php echo $sub_topik11_[9]; ?>";

                    var sub_topik12_ = new Array(10);
                    sub_topik12_[1] = "<?php echo $sub_topik12_[0]; ?>";
                    sub_topik12_[2] = "<?php echo $sub_topik12_[1]; ?>";
                    sub_topik12_[3] = "<?php echo $sub_topik12_[2]; ?>";
                    sub_topik12_[4] = "<?php echo $sub_topik12_[3]; ?>";
                    sub_topik12_[5] = "<?php echo $sub_topik12_[4]; ?>";
                    sub_topik12_[6] = "<?php echo $sub_topik12_[5]; ?>";
                    sub_topik12_[7] = "<?php echo $sub_topik12_[6]; ?>";
                    sub_topik12_[8] = "<?php echo $sub_topik12_[7]; ?>";
                    sub_topik12_[9] = "<?php echo $sub_topik12_[8]; ?>";
                    sub_topik12_[10] = "<?php echo $sub_topik12_[9]; ?>";

                    var sub_topik13_ = new Array(10);
                    sub_topik13_[1] = "<?php echo $sub_topik13_[0]; ?>";
                    sub_topik13_[2] = "<?php echo $sub_topik13_[1]; ?>";
                    sub_topik13_[3] = "<?php echo $sub_topik13_[2]; ?>";
                    sub_topik13_[4] = "<?php echo $sub_topik13_[3]; ?>";
                    sub_topik13_[5] = "<?php echo $sub_topik13_[4]; ?>";
                    sub_topik13_[6] = "<?php echo $sub_topik13_[5]; ?>";
                    sub_topik13_[7] = "<?php echo $sub_topik13_[6]; ?>";
                    sub_topik13_[8] = "<?php echo $sub_topik13_[7]; ?>";
                    sub_topik13_[9] = "<?php echo $sub_topik13_[8]; ?>";
                    sub_topik13_[10] = "<?php echo $sub_topik13_[9]; ?>";

                    var sub_topik14_ = new Array(10);
                    sub_topik14_[1] = "<?php echo $sub_topik14_[0]; ?>";
                    sub_topik14_[2] = "<?php echo $sub_topik14_[1]; ?>";
                    sub_topik14_[3] = "<?php echo $sub_topik14_[2]; ?>";
                    sub_topik14_[4] = "<?php echo $sub_topik14_[3]; ?>";
                    sub_topik14_[5] = "<?php echo $sub_topik14_[4]; ?>";
                    sub_topik14_[6] = "<?php echo $sub_topik14_[5]; ?>";
                    sub_topik14_[7] = "<?php echo $sub_topik14_[6]; ?>";
                    sub_topik14_[8] = "<?php echo $sub_topik14_[7]; ?>";
                    sub_topik14_[9] = "<?php echo $sub_topik14_[8]; ?>";
                    sub_topik14_[10] = "<?php echo $sub_topik14_[9]; ?>";

                    var sub_topik15_ = new Array(10);
                    sub_topik15_[1] = "<?php echo $sub_topik15_[0]; ?>";
                    sub_topik15_[2] = "<?php echo $sub_topik15_[1]; ?>";
                    sub_topik15_[3] = "<?php echo $sub_topik15_[2]; ?>";
                    sub_topik15_[4] = "<?php echo $sub_topik15_[3]; ?>";
                    sub_topik15_[5] = "<?php echo $sub_topik15_[4]; ?>";
                    sub_topik15_[6] = "<?php echo $sub_topik15_[5]; ?>";
                    sub_topik15_[7] = "<?php echo $sub_topik15_[6]; ?>";
                    sub_topik15_[8] = "<?php echo $sub_topik15_[7]; ?>";
                    sub_topik15_[9] = "<?php echo $sub_topik15_[8]; ?>";
                    sub_topik15_[10] = "<?php echo $sub_topik15_[9]; ?>";

                    var sub_topik16_ = new Array(10);
                    sub_topik16_[1] = "<?php echo $sub_topik16_[0]; ?>";
                    sub_topik16_[2] = "<?php echo $sub_topik16_[1]; ?>";
                    sub_topik16_[3] = "<?php echo $sub_topik16_[2]; ?>";
                    sub_topik16_[4] = "<?php echo $sub_topik16_[3]; ?>";
                    sub_topik16_[5] = "<?php echo $sub_topik16_[4]; ?>";
                    sub_topik16_[6] = "<?php echo $sub_topik16_[5]; ?>";
                    sub_topik16_[7] = "<?php echo $sub_topik16_[6]; ?>";
                    sub_topik16_[8] = "<?php echo $sub_topik16_[7]; ?>";
                    sub_topik16_[9] = "<?php echo $sub_topik16_[8]; ?>";
                    sub_topik16_[10] = "<?php echo $sub_topik16_[9]; ?>";
                </script>
                <h5 style="text-align:left; padding-left:20px;"><b>Uraian Rinci Materi Kuliah</b></h5>
                <form method="post" role="form" >
                    <input type="hidden" id="kd_mata_kuliah" name="kd_mata_kuliah" value="<?php echo $kd_mata_kuliah; ?>"/>
                    <table class="sap">
                        <tr>
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Topik</th>
                            <th style="text-align:center">Sub-Topik</th>
                            <th style="text-align:center">Tujuan Instruksional Khusus<br>(TIK)</th>
                            <th style="text-align:center">Kegiatan Belajar<br>K/D/R/Lain-Lain</th>
                        </tr>
                        <tr>
                            <th style="text-align:center">1.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik1" id="topik1" rows="3"><?php echo $topik1; ?></textarea></th>
                            <td id="sub_topik1">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows1(this.form);"/>
                                    <input style="" class="form-control" type="text" id="sub_topik1_1" name="sub_topik1_1" placeholder="Sub Topik 1.1" value="<?php echo $sub_topik1_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik1" id="tik1" rows="5"><?php echo $tik1; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="1K" value="K" <?php if (strpos($kegiatan_belajar1, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="1D" value="D" <?php if (strpos($kegiatan_belajar1, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="1R" value="R" <?php if (strpos($kegiatan_belajar1, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="1S" value="S" <?php if (strpos($kegiatan_belajar1, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">2.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik2" id="topik2" rows="3"><?php echo $topik2; ?></textarea></th>
                            <td id="sub_topik2">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows2(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik2_1" name="sub_topik2_1" placeholder="Sub Topik 2.1" value="<?php echo $sub_topik2_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik2" id="tik2" rows="5"><?php echo $tik2; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="2K" value="K" <?php if (strpos($kegiatan_belajar2, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="2D" value="D" <?php if (strpos($kegiatan_belajar2, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="2R" value="R" <?php if (strpos($kegiatan_belajar2, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="2S" value="S" <?php if (strpos($kegiatan_belajar2, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">3.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik3" id="topik3" rows="3"><?php echo $topik3; ?></textarea></th>
                            <td id="sub_topik3">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows3(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik3_1" name="sub_topik3_1" placeholder="Sub Topik 3.1" value="<?php echo $sub_topik3_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik3" id="tik3" rows="5"><?php echo $tik3; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="3K" value="K" <?php if (strpos($kegiatan_belajar3, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="3D" value="D" <?php if (strpos($kegiatan_belajar3, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="3R" value="R" <?php if (strpos($kegiatan_belajar3, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="3S" value="S" <?php if (strpos($kegiatan_belajar3, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">4.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik4" id="topik4" rows="3"><?php echo $topik4; ?></textarea></th>
                            <td id="sub_topik4">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows4(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik4_1" name="sub_topik4_1" placeholder="Sub Topik 4.1" value="<?php echo $sub_topik4_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik4" id="tik4" rows="5"><?php echo $tik4; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="4K" value="K" <?php if (strpos($kegiatan_belajar4, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="4D" value="D" <?php if (strpos($kegiatan_belajar4, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="4R" value="R" <?php if (strpos($kegiatan_belajar4, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="4S" value="S" <?php if (strpos($kegiatan_belajar4, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">5.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik5" id="topik5" rows="3"><?php echo $topik5; ?></textarea></th>
                            <td id="sub_topik5">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows5(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik5_1" name="sub_topik5_1" placeholder="Sub Topik 5.1" value="<?php echo $sub_topik5_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik5" id="tik5" rows="5"><?php echo $tik5; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="5K" value="K" <?php if (strpos($kegiatan_belajar5, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="5D" value="D" <?php if (strpos($kegiatan_belajar5, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="5R" value="R" <?php if (strpos($kegiatan_belajar5, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="5S" value="S" <?php if (strpos($kegiatan_belajar5, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">6.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik6" id="topik6" rows="3"><?php echo $topik6; ?></textarea></th>
                            <td id="sub_topik6">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows6(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik6_1" name="sub_topik6_1" placeholder="Sub Topik 6.1" value="<?php echo $sub_topik6_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik6" id="tik6" rows="5"><?php echo $tik6; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="6K" value="K" <?php if (strpos($kegiatan_belajar6, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="6D" value="D" <?php if (strpos($kegiatan_belajar6, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="6R" value="R" <?php if (strpos($kegiatan_belajar6, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="6S" value="S" <?php if (strpos($kegiatan_belajar6, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">7.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik7" id="topik7" rows="3"><?php echo $topik7; ?></textarea></th>
                            <td id="sub_topik7">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows7(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik7_1" name="sub_topik7_1" placeholder="Sub Topik 7.1" value="<?php echo $sub_topik7_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik7" id="tik7" rows="5"><?php echo $tik7; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="7K" value="K" <?php if (strpos($kegiatan_belajar7, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="7D" value="D" <?php if (strpos($kegiatan_belajar7, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="7R" value="R" <?php if (strpos($kegiatan_belajar7, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="7S" value="S" <?php if (strpos($kegiatan_belajar7, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">8.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik8" id="topik8" rows="3"><?php echo $topik8; ?></textarea></th>
                            <td id="sub_topik8">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows8(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik8_1" name="sub_topik8_1" placeholder="Sub Topik 8.1" value="<?php echo $sub_topik8_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik8" id="tik8" rows="5"><?php echo $tik8; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="8K" value="K" <?php if (strpos($kegiatan_belajar8, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="8D" value="D" <?php if (strpos($kegiatan_belajar8, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="8R" value="R" <?php if (strpos($kegiatan_belajar8, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="8S" value="S" <?php if (strpos($kegiatan_belajar8, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">9.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik9" id="topik9" rows="3"><?php echo $topik9; ?></textarea></th>
                            <td id="sub_topik9">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows9(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik9_1" name="sub_topik9_1" placeholder="Sub Topik 9.1" value="<?php echo $sub_topik9_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik9" id="tik9" rows="5"><?php echo $tik9; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="9K" value="K" <?php if (strpos($kegiatan_belajar9, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="9D" value="D" <?php if (strpos($kegiatan_belajar9, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="9R" value="R" <?php if (strpos($kegiatan_belajar9, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="9S" value="S" <?php if (strpos($kegiatan_belajar9, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">10.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik10" id="topik10" rows="3"><?php echo $topik10; ?></textarea></th>
                            <td id="sub_topik10">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows10(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik10_1" name="sub_topik10_1" placeholder="Sub Topik 10.1" value="<?php echo $sub_topik10_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik10" id="tik10" rows="5"><?php echo $tik10; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="10K" value="K" <?php if (strpos($kegiatan_belajar10, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="10D" value="D" <?php if (strpos($kegiatan_belajar10, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="10R" value="R" <?php if (strpos($kegiatan_belajar10, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="10S" value="S" <?php if (strpos($kegiatan_belajar10, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">11.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik11" id="topik11" rows="3"><?php echo $topik11; ?></textarea></th>
                            <td id="sub_topik11">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows11(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik11_1" name="sub_topik11_1" placeholder="Sub Topik 11.1" value="<?php echo $sub_topik11_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik11" id="tik11" rows="5"><?php echo $tik11; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="11K" value="K" <?php if (strpos($kegiatan_belajar11, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="11D" value="D" <?php if (strpos($kegiatan_belajar11, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="11R" value="R" <?php if (strpos($kegiatan_belajar11, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="11S" value="S" <?php if (strpos($kegiatan_belajar11, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">12.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik12" id="topik12" rows="3"><?php echo $topik12; ?></textarea></th>
                            <td id="sub_topik12">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows12(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik12_1" name="sub_topik12_1" placeholder="Sub Topik 12.1" value="<?php echo $sub_topik12_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik12" id="tik12" rows="5"><?php echo $tik12; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="12K" value="K" <?php if (strpos($kegiatan_belajar12, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="12D" value="D" <?php if (strpos($kegiatan_belajar12, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="12R" value="R" <?php if (strpos($kegiatan_belajar12, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="12S" value="S" <?php if (strpos($kegiatan_belajar12, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">13.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik13" id="topik13" rows="3"><?php echo $topik13; ?></textarea></th>
                            <td id="sub_topik13">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows13(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik13_1" name="sub_topik13_1" placeholder="Sub Topik 13.1" value="<?php echo $sub_topik13_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik13" id="tik13" rows="5"><?php echo $tik13; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="13K" value="K" <?php if (strpos($kegiatan_belajar13, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="13D" value="D" <?php if (strpos($kegiatan_belajar13, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="13R" value="R" <?php if (strpos($kegiatan_belajar13, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="13S" value="S" <?php if (strpos($kegiatan_belajar13, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">14.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik14" id="topik14" rows="3"><?php echo $topik14; ?></textarea></th>
                            <td id="sub_topik14">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows14(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik14_1" name="sub_topik14_1" placeholder="Sub Topik 14.1" value="<?php echo $sub_topik14_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik14" id="tik14" rows="5"><?php echo $tik14; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="14K" value="K" <?php if (strpos($kegiatan_belajar14, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="14D" value="D" <?php if (strpos($kegiatan_belajar14, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="14R" value="R" <?php if (strpos($kegiatan_belajar14, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="14S" value="S" <?php if (strpos($kegiatan_belajar14, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">15.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik15" id="topik15" rows="3"><?php echo $topik15; ?></textarea></th>
                            <td id="sub_topik15">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows15(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik15_1" name="sub_topik15_1" placeholder="Sub Topik 15.1" value="<?php echo $sub_topik15_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik15" id="tik15" rows="5"><?php echo $tik15; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="15K" value="K" <?php if (strpos($kegiatan_belajar15, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="15D" value="D" <?php if (strpos($kegiatan_belajar15, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="15R" value="R" <?php if (strpos($kegiatan_belajar15, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="15S" value="S" <?php if (strpos($kegiatan_belajar15, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:center">16.</th>
                            <th><textarea style="resize: none;" class="form-control" name="topik16" id="topik16" rows="3"><?php echo $topik16; ?></textarea></th>
                            <td id="sub_topik16">
                                <div>
                                    <img src="<?= base_url() ?>assets/images/icon_plus.gif" style="cursor:pointer; margin-bottom:2px;" onclick="addMoreRows16(this.form);">
                                    <input style="" class="form-control" type="text" id="sub_topik16_1" name="sub_topik16_1" placeholder="Sub Topik 16.1" value="<?php echo $sub_topik16_[0]; ?>"/>
                                </div>
                            </td>
                            <td><textarea class="form-control" name="tik16" id="tik16" rows="5"><?php echo $tik16; ?></textarea></td>
                            <td style="text-align:center">
                                <input <?php if ($waktu_kuliah == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="16K" value="K" <?php if (strpos($kegiatan_belajar16, 'K') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_kuliah != "") {
                                    echo 'K';
                                } ?>&nbsp;
                                <input <?php if ($waktu_diskusi_kelompok == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="16D" value="D" <?php if (strpos($kegiatan_belajar16, 'D') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_diskusi_kelompok != "") {
                                    echo 'D';
                                } ?>&nbsp;
                                <input <?php if ($waktu_pr == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="16R" value="R" <?php if (strpos($kegiatan_belajar16, 'R') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_pr != "") {
                                    echo 'R';
                                } ?>&nbsp;
                                <input <?php if ($waktu_lain_lain1 == "") {
                                    echo 'type="hidden"';
                                } else {
                                    echo 'type="checkbox"';
                                } ?> name="16S" value="S" <?php if (strpos($kegiatan_belajar16, 'S') !== false) {
                                    echo ' checked';
                                } ?>/> <?php if ($waktu_lain_lain1 != "") {
                                    echo 'Lain-Lain';
                                } ?>
                            </td>
                        </tr>
                    </table>

                    <table class="sap" style="border:none;">
                        <tr style="border:none;">
                            <th colspan="2" style="border:none;"><h4 align="right">Jakarta, <?php echo date("d M Y"); ?></h4></th>
                            <input type="hidden" id="tanggal" name="tanggal" value="<?php echo date("d M Y"); ?>"/>
                        </tr>
                        <tr style="border:none;">
                            <th style="border:none;"><h4>Koordinator Mata Kuliah Program</h4></th>
                            <th style="border:none;"><h4 align="right">Program Studi Teknik Informatika</h4></th>
                        </tr>
                        <tr style="border:none;">
                            <th style="height:100px; border:none;"></th>
                            <th style="border:none;"></th>
                        </tr>
                        <tr style="border:none;">
                            <th style="border:none;"><h4>
                                    <?php echo $data_dosen->nama_dosen ?>
                                </h4></th>

                            <th style="border:none;"><h4 align="right">
                                    <?php echo $data_dosen_jabatan->nama_dosen ?>
                                </h4></th>
                        </tr>
                    </table>
                    <div class="text-center" class="print-screen">
                        <button value="dosen_data_rincian_materi_kuliah" type="submit" name="submit" class="btn btn-primary btn-lg print-screen" required="required">Simpan</button>
                    </div>
                    </br>

                    <script type="text/javascript">
                        var rowCount1 = 1;

                        function addMoreRows1(frm) {
                            if (rowCount1 <= 9) {
                                rowCount1++;
                                var recRow =
                                    '<div id="rowCount1' + rowCount1 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow1(' + rowCount1 + ');"/>' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik1_' + rowCount1 + '" name="sub_topik1_' + rowCount1 + '" placeholder="Sub Topik 1.' + rowCount1 + '" value="' + sub_topik1_[rowCount1] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik1').append(recRow);
                            }
                        }

                        function removeRow1(removeNum) {
                            jQuery('#rowCount1' + rowCount1).remove();
                            rowCount1--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount2 = 1;

                        function addMoreRows2(frm) {
                            if (rowCount2 <= 9) {
                                rowCount2++;
                                var recRow =
                                    '<div id="rowCount2' + rowCount2 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow2(' + rowCount2 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik2_' + rowCount2 + '" name="sub_topik2_' + rowCount2 + '" placeholder="Sub Topik 2.' + rowCount2 + '" value="' + sub_topik2_[rowCount2] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik2').append(recRow);
                            }
                        }

                        function removeRow2(removeNum) {
                            jQuery('#rowCount2' + rowCount2).remove();
                            rowCount2--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount3 = 1;

                        function addMoreRows3(frm) {
                            if (rowCount3 <= 9) {
                                rowCount3++;
                                var recRow =
                                    '<div id="rowCount3' + rowCount3 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow3(' + rowCount3 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik3_' + rowCount3 + '" name="sub_topik3_' + rowCount3 + '" placeholder="Sub Topik 3.' + rowCount3 + '" value="' + sub_topik3_[rowCount3] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik3').append(recRow);
                            }
                        }

                        function removeRow3(removeNum) {
                            jQuery('#rowCount3' + rowCount3).remove();
                            rowCount3--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount4 = 1;

                        function addMoreRows4(frm) {
                            if (rowCount4 <= 9) {
                                rowCount4++;
                                var recRow =
                                    '<div id="rowCount4' + rowCount4 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow4(' + rowCount4 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik4_' + rowCount4 + '" name="sub_topik4_' + rowCount4 + '" placeholder="Sub Topik 4.' + rowCount4 + '" value="' + sub_topik4_[rowCount4] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik4').append(recRow);
                            }
                        }

                        function removeRow4(removeNum) {
                            jQuery('#rowCount4' + rowCount4).remove();
                            rowCount4--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount5 = 1;

                        function addMoreRows5(frm) {
                            if (rowCount5 <= 9) {
                                rowCount5++;
                                var recRow =
                                    '<div id="rowCount5' + rowCount5 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow5(' + rowCount5 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik5_' + rowCount5 + '" name="sub_topik5_' + rowCount5 + '" placeholder="Sub Topik 5.' + rowCount5 + '" value="' + sub_topik5_[rowCount5] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik5').append(recRow);
                            }
                        }

                        function removeRow5(removeNum) {
                            jQuery('#rowCount5' + rowCount5).remove();
                            rowCount5--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount6 = 1;

                        function addMoreRows6(frm) {
                            if (rowCount6 <= 9) {
                                rowCount6++;
                                var recRow =
                                    '<div id="rowCount6' + rowCount6 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow6(' + rowCount6 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik6_' + rowCount6 + '" name="sub_topik6_' + rowCount6 + '" placeholder="Sub Topik 6.' + rowCount6 + '" value="' + sub_topik6_[rowCount6] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik6').append(recRow);
                            }
                        }

                        function removeRow6(removeNum) {
                            jQuery('#rowCount6' + rowCount6).remove();
                            rowCount6--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount7 = 1;

                        function addMoreRows7(frm) {
                            if (rowCount7 <= 9) {
                                rowCount7++;
                                var recRow =
                                    '<div id="rowCount7' + rowCount7 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow7(' + rowCount7 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik7_' + rowCount7 + '" name="sub_topik7_' + rowCount7 + '" placeholder="Sub Topik 7.' + rowCount7 + '" value="' + sub_topik7_[rowCount7] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik7').append(recRow);
                            }
                        }

                        function removeRow7(removeNum) {
                            jQuery('#rowCount7' + rowCount7).remove();
                            rowCount7--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount8 = 1;

                        function addMoreRows8(frm) {
                            if (rowCount8 <= 9) {
                                rowCount8++;
                                var recRow =
                                    '<div id="rowCount8' + rowCount8 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow8(' + rowCount8 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik8_' + rowCount8 + '" name="sub_topik8_' + rowCount8 + '" placeholder="Sub Topik 8.' + rowCount8 + '" value="' + sub_topik8_[rowCount8] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik8').append(recRow);
                            }
                        }

                        function removeRow8(removeNum) {
                            jQuery('#rowCount8' + rowCount8).remove();
                            rowCount8--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount9 = 1;

                        function addMoreRows9(frm) {
                            if (rowCount9 <= 9) {
                                rowCount9++;
                                var recRow =
                                    '<div id="rowCount9' + rowCount9 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow9(' + rowCount9 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik9_' + rowCount9 + '" name="sub_topik9_' + rowCount9 + '" placeholder="Sub Topik 9.' + rowCount9 + '" value="' + sub_topik9_[rowCount9] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik9').append(recRow);
                            }
                        }

                        function removeRow9(removeNum) {
                            jQuery('#rowCount9' + rowCount9).remove();
                            rowCount9--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount10 = 1;

                        function addMoreRows10(frm) {
                            if (rowCount10 <= 9) {
                                rowCount10++;
                                var recRow =
                                    '<div id="rowCount10' + rowCount10 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow10(' + rowCount10 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik10_' + rowCount10 + '" name="sub_topik10_' + rowCount10 + '" placeholder="Sub Topik 10.' + rowCount10 + '" value="' + sub_topik10_[rowCount10] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik10').append(recRow);
                            }
                        }

                        function removeRow10(removeNum) {
                            jQuery('#rowCount10' + rowCount10).remove();
                            rowCount10--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount11 = 1;

                        function addMoreRows11(frm) {
                            if (rowCount11 <= 9) {
                                rowCount11++;
                                var recRow =
                                    '<div id="rowCount11' + rowCount11 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow11(' + rowCount11 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik11_' + rowCount11 + '" name="sub_topik11_' + rowCount11 + '" placeholder="Sub Topik 11.' + rowCount11 + '" value="' + sub_topik11_[rowCount11] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik11').append(recRow);
                            }
                        }

                        function removeRow11(removeNum) {
                            jQuery('#rowCount11' + rowCount11).remove();
                            rowCount11--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount12 = 1;

                        function addMoreRows12(frm) {
                            if (rowCount12 <= 9) {
                                rowCount12++;
                                var recRow =
                                    '<div id="rowCount12' + rowCount12 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow12(' + rowCount12 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik12_' + rowCount12 + '" name="sub_topik12_' + rowCount12 + '" placeholder="Sub Topik 12.' + rowCount12 + '" value="' + sub_topik12_[rowCount12] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik12').append(recRow);
                            }
                        }

                        function removeRow12(removeNum) {
                            jQuery('#rowCount12' + rowCount12).remove();
                            rowCount12--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount13 = 1;

                        function addMoreRows13(frm) {
                            if (rowCount13 <= 9) {
                                rowCount13++;
                                var recRow =
                                    '<div id="rowCount13' + rowCount13 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow13(' + rowCount13 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik13_' + rowCount13 + '" name="sub_topik13_' + rowCount13 + '" placeholder="Sub Topik 13.' + rowCount13 + '" value="' + sub_topik13_[rowCount13] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik13').append(recRow);
                            }
                        }

                        function removeRow13(removeNum) {
                            jQuery('#rowCount13' + rowCount13).remove();
                            rowCount13--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount14 = 1;

                        function addMoreRows14(frm) {
                            if (rowCount14 <= 9) {
                                rowCount14++;
                                var recRow =
                                    '<div id="rowCount14' + rowCount14 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow14(' + rowCount14 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik14_' + rowCount14 + '" name="sub_topik14_' + rowCount14 + '" placeholder="Sub Topik 14.' + rowCount14 + '" value="' + sub_topik14_[rowCount14] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik14').append(recRow);
                            }
                        }

                        function removeRow14(removeNum) {
                            jQuery('#rowCount14' + rowCount14).remove();
                            rowCount14--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount15 = 1;

                        function addMoreRows15(frm) {
                            if (rowCount15 <= 9) {
                                rowCount15++;
                                var recRow =
                                    '<div id="rowCount15' + rowCount15 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow15(' + rowCount15 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik15_' + rowCount15 + '" name="sub_topik15_' + rowCount15 + '" placeholder="Sub Topik 15.' + rowCount15 + '" value="' + sub_topik15_[rowCount15] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik15').append(recRow);
                            }
                        }

                        function removeRow15(removeNum) {
                            jQuery('#rowCount15' + rowCount15).remove();
                            rowCount15--;
                        }
                    </script>

                    <script type="text/javascript">
                        var rowCount16 = 1;

                        function addMoreRows16(frm) {
                            if (rowCount16 <= 9) {
                                rowCount16++;
                                var recRow =
                                    '<div id="rowCount16' + rowCount16 + '">' +
                                    '<img width="21" src="<?= base_url() ?>assets/images/delete-icon-md.png" align="right" style="cursor:pointer; margin-bottom:2px; margin-top:2px;" onclick="removeRow16(' + rowCount16 + ');">' +
                                    '<input style="width:170px;" class="form-control" type="text" id="sub_topik16_' + rowCount16 + '" name="sub_topik16_' + rowCount16 + '" placeholder="Sub Topik 16.' + rowCount16 + '" value="' + sub_topik16_[rowCount16] + '"/>' +
                                    '</div>';
                                jQuery('#sub_topik16').append(recRow);
                            }
                        }

                        function removeRow16(removeNum) {
                            jQuery('#rowCount16' + rowCount16).remove();
                            rowCount16--;
                        }
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>