<?php


class Data_sap_model extends MY_Model
{

    // dosen_data_rincian_materi_kuliah_
    public function rincianMateriKuliah_($data)
    {
        $_POST = $data;
        $kd_mata_kuliah = $_POST['kd_mata_kuliah'];
        $topik1 = $_POST['topik1'];
        $topik2 = $_POST['topik2'];
        $topik3 = $_POST['topik3'];
        $topik4 = $_POST['topik4'];
        $topik5 = $_POST['topik5'];
        $topik6 = $_POST['topik6'];
        $topik7 = $_POST['topik7'];
        $topik8 = $_POST['topik8'];
        $topik9 = $_POST['topik9'];
        $topik10 = $_POST['topik10'];
        $topik11 = $_POST['topik11'];
        $topik12 = $_POST['topik12'];
        $topik13 = $_POST['topik13'];
        $topik14 = $_POST['topik14'];
        $topik15 = $_POST['topik15'];
        $topik16 = $_POST['topik16'];

        if (isset($_POST['sub_topik1_1'])) {
            $sub_topik1_1 = $_POST['sub_topik1_1'];
        } else {
            $sub_topik1_1 = "";
        }

        if (isset($_POST['sub_topik1_2'])) {
            $sub_topik1_2 = $_POST['sub_topik1_2'];
        } else {
            $sub_topik1_2 = "";
        }

        if (isset($_POST['sub_topik1_3'])) {
            $sub_topik1_3 = $_POST['sub_topik1_3'];
        } else {
            $sub_topik1_3 = "";
        }

        if (isset($_POST['sub_topik1_4'])) {
            $sub_topik1_4 = $_POST['sub_topik1_4'];
        } else {
            $sub_topik1_4 = "";
        }

        if (isset($_POST['sub_topik1_5'])) {
            $sub_topik1_5 = $_POST['sub_topik1_5'];
        } else {
            $sub_topik1_5 = "";
        }

        if (isset($_POST['sub_topik1_6'])) {
            $sub_topik1_6 = $_POST['sub_topik1_6'];
        } else {
            $sub_topik1_6 = "";
        }

        if (isset($_POST['sub_topik1_7'])) {
            $sub_topik1_7 = $_POST['sub_topik1_7'];
        } else {
            $sub_topik1_7 = "";
        }

        if (isset($_POST['sub_topik1_8'])) {
            $sub_topik1_8 = $_POST['sub_topik1_8'];
        } else {
            $sub_topik1_8 = "";
        }

        if (isset($_POST['sub_topik1_9'])) {
            $sub_topik1_9 = $_POST['sub_topik1_9'];
        } else {
            $sub_topik1_9 = "";
        }

        if (isset($_POST['sub_topik1_10'])) {
            $sub_topik1_10 = $_POST['sub_topik1_10'];
        } else {
            $sub_topik1_10 = "";
        }


        if (isset($_POST['sub_topik2_1'])) {
            $sub_topik2_1 = $_POST['sub_topik2_1'];
        } else {
            $sub_topik2_1 = "";
        }

        if (isset($_POST['sub_topik2_2'])) {
            $sub_topik2_2 = $_POST['sub_topik2_2'];
        } else {
            $sub_topik2_2 = "";
        }

        if (isset($_POST['sub_topik2_3'])) {
            $sub_topik2_3 = $_POST['sub_topik2_3'];
        } else {
            $sub_topik2_3 = "";
        }

        if (isset($_POST['sub_topik2_4'])) {
            $sub_topik2_4 = $_POST['sub_topik2_4'];
        } else {
            $sub_topik2_4 = "";
        }

        if (isset($_POST['sub_topik2_5'])) {
            $sub_topik2_5 = $_POST['sub_topik2_5'];
        } else {
            $sub_topik2_5 = "";
        }

        if (isset($_POST['sub_topik2_6'])) {
            $sub_topik2_6 = $_POST['sub_topik2_6'];
        } else {
            $sub_topik2_6 = "";
        }

        if (isset($_POST['sub_topik2_7'])) {
            $sub_topik2_7 = $_POST['sub_topik2_7'];
        } else {
            $sub_topik2_7 = "";
        }

        if (isset($_POST['sub_topik2_8'])) {
            $sub_topik2_8 = $_POST['sub_topik2_8'];
        } else {
            $sub_topik2_8 = "";
        }

        if (isset($_POST['sub_topik2_9'])) {
            $sub_topik2_9 = $_POST['sub_topik2_9'];
        } else {
            $sub_topik2_9 = "";
        }

        if (isset($_POST['sub_topik2_10'])) {
            $sub_topik2_10 = $_POST['sub_topik2_10'];
        } else {
            $sub_topik2_10 = "";
        }


        if (isset($_POST['sub_topik3_1'])) {
            $sub_topik3_1 = $_POST['sub_topik3_1'];
        } else {
            $sub_topik3_1 = "";
        }

        if (isset($_POST['sub_topik3_2'])) {
            $sub_topik3_2 = $_POST['sub_topik3_2'];
        } else {
            $sub_topik3_2 = "";
        }

        if (isset($_POST['sub_topik3_3'])) {
            $sub_topik3_3 = $_POST['sub_topik3_3'];
        } else {
            $sub_topik3_3 = "";
        }

        if (isset($_POST['sub_topik3_4'])) {
            $sub_topik3_4 = $_POST['sub_topik3_4'];
        } else {
            $sub_topik3_4 = "";
        }

        if (isset($_POST['sub_topik3_5'])) {
            $sub_topik3_5 = $_POST['sub_topik3_5'];
        } else {
            $sub_topik3_5 = "";
        }

        if (isset($_POST['sub_topik3_6'])) {
            $sub_topik3_6 = $_POST['sub_topik3_6'];
        } else {
            $sub_topik3_6 = "";
        }

        if (isset($_POST['sub_topik3_7'])) {
            $sub_topik3_7 = $_POST['sub_topik3_7'];
        } else {
            $sub_topik3_7 = "";
        }

        if (isset($_POST['sub_topik3_8'])) {
            $sub_topik3_8 = $_POST['sub_topik3_8'];
        } else {
            $sub_topik3_8 = "";
        }

        if (isset($_POST['sub_topik3_9'])) {
            $sub_topik3_9 = $_POST['sub_topik3_9'];
        } else {
            $sub_topik3_9 = "";
        }

        if (isset($_POST['sub_topik3_10'])) {
            $sub_topik3_10 = $_POST['sub_topik3_10'];
        } else {
            $sub_topik3_10 = "";
        }


        if (isset($_POST['sub_topik4_1'])) {
            $sub_topik4_1 = $_POST['sub_topik4_1'];
        } else {
            $sub_topik4_1 = "";
        }

        if (isset($_POST['sub_topik4_2'])) {
            $sub_topik4_2 = $_POST['sub_topik4_2'];
        } else {
            $sub_topik4_2 = "";
        }

        if (isset($_POST['sub_topik4_3'])) {
            $sub_topik4_3 = $_POST['sub_topik4_3'];
        } else {
            $sub_topik4_3 = "";
        }

        if (isset($_POST['sub_topik4_4'])) {
            $sub_topik4_4 = $_POST['sub_topik4_4'];
        } else {
            $sub_topik4_4 = "";
        }

        if (isset($_POST['sub_topik4_5'])) {
            $sub_topik4_5 = $_POST['sub_topik4_5'];
        } else {
            $sub_topik4_5 = "";
        }

        if (isset($_POST['sub_topik4_6'])) {
            $sub_topik4_6 = $_POST['sub_topik4_6'];
        } else {
            $sub_topik4_6 = "";
        }

        if (isset($_POST['sub_topik4_7'])) {
            $sub_topik4_7 = $_POST['sub_topik4_7'];
        } else {
            $sub_topik4_7 = "";
        }

        if (isset($_POST['sub_topik4_8'])) {
            $sub_topik4_8 = $_POST['sub_topik4_8'];
        } else {
            $sub_topik4_8 = "";
        }

        if (isset($_POST['sub_topik4_9'])) {
            $sub_topik4_9 = $_POST['sub_topik4_9'];
        } else {
            $sub_topik4_9 = "";
        }

        if (isset($_POST['sub_topik4_10'])) {
            $sub_topik4_10 = $_POST['sub_topik4_10'];
        } else {
            $sub_topik4_10 = "";
        }


        if (isset($_POST['sub_topik5_1'])) {
            $sub_topik5_1 = $_POST['sub_topik5_1'];
        } else {
            $sub_topik5_1 = "";
        }

        if (isset($_POST['sub_topik5_2'])) {
            $sub_topik5_2 = $_POST['sub_topik5_2'];
        } else {
            $sub_topik5_2 = "";
        }

        if (isset($_POST['sub_topik5_3'])) {
            $sub_topik5_3 = $_POST['sub_topik5_3'];
        } else {
            $sub_topik5_3 = "";
        }

        if (isset($_POST['sub_topik5_4'])) {
            $sub_topik5_4 = $_POST['sub_topik5_4'];
        } else {
            $sub_topik5_4 = "";
        }

        if (isset($_POST['sub_topik5_5'])) {
            $sub_topik5_5 = $_POST['sub_topik5_5'];
        } else {
            $sub_topik5_5 = "";
        }

        if (isset($_POST['sub_topik5_6'])) {
            $sub_topik5_6 = $_POST['sub_topik5_6'];
        } else {
            $sub_topik5_6 = "";
        }

        if (isset($_POST['sub_topik5_7'])) {
            $sub_topik5_7 = $_POST['sub_topik5_7'];
        } else {
            $sub_topik5_7 = "";
        }

        if (isset($_POST['sub_topik5_8'])) {
            $sub_topik5_8 = $_POST['sub_topik5_8'];
        } else {
            $sub_topik5_8 = "";
        }

        if (isset($_POST['sub_topik5_9'])) {
            $sub_topik5_9 = $_POST['sub_topik5_9'];
        } else {
            $sub_topik5_9 = "";
        }

        if (isset($_POST['sub_topik5_10'])) {
            $sub_topik5_10 = $_POST['sub_topik5_10'];
        } else {
            $sub_topik5_10 = "";
        }


        if (isset($_POST['sub_topik6_1'])) {
            $sub_topik6_1 = $_POST['sub_topik6_1'];
        } else {
            $sub_topik6_1 = "";
        }

        if (isset($_POST['sub_topik6_2'])) {
            $sub_topik6_2 = $_POST['sub_topik6_2'];
        } else {
            $sub_topik6_2 = "";
        }

        if (isset($_POST['sub_topik6_3'])) {
            $sub_topik6_3 = $_POST['sub_topik6_3'];
        } else {
            $sub_topik6_3 = "";
        }

        if (isset($_POST['sub_topik6_4'])) {
            $sub_topik6_4 = $_POST['sub_topik6_4'];
        } else {
            $sub_topik6_4 = "";
        }

        if (isset($_POST['sub_topik6_5'])) {
            $sub_topik6_5 = $_POST['sub_topik6_5'];
        } else {
            $sub_topik6_5 = "";
        }

        if (isset($_POST['sub_topik6_6'])) {
            $sub_topik6_6 = $_POST['sub_topik6_6'];
        } else {
            $sub_topik6_6 = "";
        }

        if (isset($_POST['sub_topik6_7'])) {
            $sub_topik6_7 = $_POST['sub_topik6_7'];
        } else {
            $sub_topik6_7 = "";
        }

        if (isset($_POST['sub_topik6_8'])) {
            $sub_topik6_8 = $_POST['sub_topik6_8'];
        } else {
            $sub_topik6_8 = "";
        }

        if (isset($_POST['sub_topik6_9'])) {
            $sub_topik6_9 = $_POST['sub_topik6_9'];
        } else {
            $sub_topik6_9 = "";
        }

        if (isset($_POST['sub_topik6_10'])) {
            $sub_topik6_10 = $_POST['sub_topik6_10'];
        } else {
            $sub_topik6_10 = "";
        }


        if (isset($_POST['sub_topik7_1'])) {
            $sub_topik7_1 = $_POST['sub_topik7_1'];
        } else {
            $sub_topik7_1 = "";
        }

        if (isset($_POST['sub_topik7_2'])) {
            $sub_topik7_2 = $_POST['sub_topik7_2'];
        } else {
            $sub_topik7_2 = "";
        }

        if (isset($_POST['sub_topik7_3'])) {
            $sub_topik7_3 = $_POST['sub_topik7_3'];
        } else {
            $sub_topik7_3 = "";
        }

        if (isset($_POST['sub_topik7_4'])) {
            $sub_topik7_4 = $_POST['sub_topik7_4'];
        } else {
            $sub_topik7_4 = "";
        }

        if (isset($_POST['sub_topik7_5'])) {
            $sub_topik7_5 = $_POST['sub_topik7_5'];
        } else {
            $sub_topik7_5 = "";
        }

        if (isset($_POST['sub_topik7_6'])) {
            $sub_topik7_6 = $_POST['sub_topik7_6'];
        } else {
            $sub_topik7_6 = "";
        }

        if (isset($_POST['sub_topik7_7'])) {
            $sub_topik7_7 = $_POST['sub_topik7_7'];
        } else {
            $sub_topik7_7 = "";
        }

        if (isset($_POST['sub_topik7_8'])) {
            $sub_topik7_8 = $_POST['sub_topik7_8'];
        } else {
            $sub_topik7_8 = "";
        }

        if (isset($_POST['sub_topik7_9'])) {
            $sub_topik7_9 = $_POST['sub_topik7_9'];
        } else {
            $sub_topik7_9 = "";
        }

        if (isset($_POST['sub_topik7_10'])) {
            $sub_topik7_10 = $_POST['sub_topik7_10'];
        } else {
            $sub_topik7_10 = "";
        }


        if (isset($_POST['sub_topik8_1'])) {
            $sub_topik8_1 = $_POST['sub_topik8_1'];
        } else {
            $sub_topik8_1 = "";
        }

        if (isset($_POST['sub_topik8_2'])) {
            $sub_topik8_2 = $_POST['sub_topik8_2'];
        } else {
            $sub_topik8_2 = "";
        }

        if (isset($_POST['sub_topik8_3'])) {
            $sub_topik8_3 = $_POST['sub_topik8_3'];
        } else {
            $sub_topik8_3 = "";
        }

        if (isset($_POST['sub_topik8_4'])) {
            $sub_topik8_4 = $_POST['sub_topik8_4'];
        } else {
            $sub_topik8_4 = "";
        }

        if (isset($_POST['sub_topik8_5'])) {
            $sub_topik8_5 = $_POST['sub_topik8_5'];
        } else {
            $sub_topik8_5 = "";
        }

        if (isset($_POST['sub_topik8_6'])) {
            $sub_topik8_6 = $_POST['sub_topik8_6'];
        } else {
            $sub_topik8_6 = "";
        }

        if (isset($_POST['sub_topik8_7'])) {
            $sub_topik8_7 = $_POST['sub_topik8_7'];
        } else {
            $sub_topik8_7 = "";
        }

        if (isset($_POST['sub_topik8_8'])) {
            $sub_topik8_8 = $_POST['sub_topik8_8'];
        } else {
            $sub_topik8_8 = "";
        }

        if (isset($_POST['sub_topik8_9'])) {
            $sub_topik8_9 = $_POST['sub_topik8_9'];
        } else {
            $sub_topik8_9 = "";
        }

        if (isset($_POST['sub_topik8_10'])) {
            $sub_topik8_10 = $_POST['sub_topik8_10'];
        } else {
            $sub_topik8_10 = "";
        }


        if (isset($_POST['sub_topik9_1'])) {
            $sub_topik9_1 = $_POST['sub_topik9_1'];
        } else {
            $sub_topik9_1 = "";
        }

        if (isset($_POST['sub_topik9_2'])) {
            $sub_topik9_2 = $_POST['sub_topik9_2'];
        } else {
            $sub_topik9_2 = "";
        }

        if (isset($_POST['sub_topik9_3'])) {
            $sub_topik9_3 = $_POST['sub_topik9_3'];
        } else {
            $sub_topik9_3 = "";
        }

        if (isset($_POST['sub_topik9_4'])) {
            $sub_topik9_4 = $_POST['sub_topik9_4'];
        } else {
            $sub_topik9_4 = "";
        }

        if (isset($_POST['sub_topik9_5'])) {
            $sub_topik9_5 = $_POST['sub_topik9_5'];
        } else {
            $sub_topik9_5 = "";
        }

        if (isset($_POST['sub_topik9_6'])) {
            $sub_topik9_6 = $_POST['sub_topik9_6'];
        } else {
            $sub_topik9_6 = "";
        }

        if (isset($_POST['sub_topik9_7'])) {
            $sub_topik9_7 = $_POST['sub_topik9_7'];
        } else {
            $sub_topik9_7 = "";
        }

        if (isset($_POST['sub_topik9_8'])) {
            $sub_topik9_8 = $_POST['sub_topik9_8'];
        } else {
            $sub_topik9_8 = "";
        }

        if (isset($_POST['sub_topik9_9'])) {
            $sub_topik9_9 = $_POST['sub_topik9_9'];
        } else {
            $sub_topik9_9 = "";
        }

        if (isset($_POST['sub_topik9_10'])) {
            $sub_topik9_10 = $_POST['sub_topik9_10'];
        } else {
            $sub_topik9_10 = "";
        }


        if (isset($_POST['sub_topik10_1'])) {
            $sub_topik10_1 = $_POST['sub_topik10_1'];
        } else {
            $sub_topik10_1 = "";
        }

        if (isset($_POST['sub_topik10_2'])) {
            $sub_topik10_2 = $_POST['sub_topik10_2'];
        } else {
            $sub_topik10_2 = "";
        }

        if (isset($_POST['sub_topik10_3'])) {
            $sub_topik10_3 = $_POST['sub_topik10_3'];
        } else {
            $sub_topik10_3 = "";
        }

        if (isset($_POST['sub_topik10_4'])) {
            $sub_topik10_4 = $_POST['sub_topik10_4'];
        } else {
            $sub_topik10_4 = "";
        }

        if (isset($_POST['sub_topik10_5'])) {
            $sub_topik10_5 = $_POST['sub_topik10_5'];
        } else {
            $sub_topik10_5 = "";
        }

        if (isset($_POST['sub_topik10_6'])) {
            $sub_topik10_6 = $_POST['sub_topik10_6'];
        } else {
            $sub_topik10_6 = "";
        }

        if (isset($_POST['sub_topik10_7'])) {
            $sub_topik10_7 = $_POST['sub_topik10_7'];
        } else {
            $sub_topik10_7 = "";
        }

        if (isset($_POST['sub_topik10_8'])) {
            $sub_topik10_8 = $_POST['sub_topik10_8'];
        } else {
            $sub_topik10_8 = "";
        }

        if (isset($_POST['sub_topik10_9'])) {
            $sub_topik10_9 = $_POST['sub_topik10_9'];
        } else {
            $sub_topik10_9 = "";
        }

        if (isset($_POST['sub_topik10_10'])) {
            $sub_topik10_10 = $_POST['sub_topik10_10'];
        } else {
            $sub_topik10_10 = "";
        }


        if (isset($_POST['sub_topik11_1'])) {
            $sub_topik11_1 = $_POST['sub_topik11_1'];
        } else {
            $sub_topik11_1 = "";
        }

        if (isset($_POST['sub_topik11_2'])) {
            $sub_topik11_2 = $_POST['sub_topik11_2'];
        } else {
            $sub_topik11_2 = "";
        }

        if (isset($_POST['sub_topik11_3'])) {
            $sub_topik11_3 = $_POST['sub_topik11_3'];
        } else {
            $sub_topik11_3 = "";
        }

        if (isset($_POST['sub_topik11_4'])) {
            $sub_topik11_4 = $_POST['sub_topik11_4'];
        } else {
            $sub_topik11_4 = "";
        }

        if (isset($_POST['sub_topik11_5'])) {
            $sub_topik11_5 = $_POST['sub_topik11_5'];
        } else {
            $sub_topik11_5 = "";
        }

        if (isset($_POST['sub_topik11_6'])) {
            $sub_topik11_6 = $_POST['sub_topik11_6'];
        } else {
            $sub_topik11_6 = "";
        }

        if (isset($_POST['sub_topik11_7'])) {
            $sub_topik11_7 = $_POST['sub_topik11_7'];
        } else {
            $sub_topik11_7 = "";
        }

        if (isset($_POST['sub_topik11_8'])) {
            $sub_topik11_8 = $_POST['sub_topik11_8'];
        } else {
            $sub_topik11_8 = "";
        }

        if (isset($_POST['sub_topik11_9'])) {
            $sub_topik11_9 = $_POST['sub_topik11_9'];
        } else {
            $sub_topik11_9 = "";
        }

        if (isset($_POST['sub_topik11_10'])) {
            $sub_topik11_10 = $_POST['sub_topik11_10'];
        } else {
            $sub_topik11_10 = "";
        }


        if (isset($_POST['sub_topik12_1'])) {
            $sub_topik12_1 = $_POST['sub_topik12_1'];
        } else {
            $sub_topik12_1 = "";
        }

        if (isset($_POST['sub_topik12_2'])) {
            $sub_topik12_2 = $_POST['sub_topik12_2'];
        } else {
            $sub_topik12_2 = "";
        }

        if (isset($_POST['sub_topik12_3'])) {
            $sub_topik12_3 = $_POST['sub_topik12_3'];
        } else {
            $sub_topik12_3 = "";
        }

        if (isset($_POST['sub_topik12_4'])) {
            $sub_topik12_4 = $_POST['sub_topik12_4'];
        } else {
            $sub_topik12_4 = "";
        }

        if (isset($_POST['sub_topik12_5'])) {
            $sub_topik12_5 = $_POST['sub_topik12_5'];
        } else {
            $sub_topik12_5 = "";
        }

        if (isset($_POST['sub_topik12_6'])) {
            $sub_topik12_6 = $_POST['sub_topik12_6'];
        } else {
            $sub_topik12_6 = "";
        }

        if (isset($_POST['sub_topik12_7'])) {
            $sub_topik12_7 = $_POST['sub_topik12_7'];
        } else {
            $sub_topik12_7 = "";
        }

        if (isset($_POST['sub_topik12_8'])) {
            $sub_topik12_8 = $_POST['sub_topik12_8'];
        } else {
            $sub_topik12_8 = "";
        }

        if (isset($_POST['sub_topik12_9'])) {
            $sub_topik12_9 = $_POST['sub_topik12_9'];
        } else {
            $sub_topik12_9 = "";
        }

        if (isset($_POST['sub_topik12_10'])) {
            $sub_topik12_10 = $_POST['sub_topik12_10'];
        } else {
            $sub_topik12_10 = "";
        }


        if (isset($_POST['sub_topik13_1'])) {
            $sub_topik13_1 = $_POST['sub_topik13_1'];
        } else {
            $sub_topik13_1 = "";
        }

        if (isset($_POST['sub_topik13_2'])) {
            $sub_topik13_2 = $_POST['sub_topik13_2'];
        } else {
            $sub_topik13_2 = "";
        }

        if (isset($_POST['sub_topik13_3'])) {
            $sub_topik13_3 = $_POST['sub_topik13_3'];
        } else {
            $sub_topik13_3 = "";
        }

        if (isset($_POST['sub_topik13_4'])) {
            $sub_topik13_4 = $_POST['sub_topik13_4'];
        } else {
            $sub_topik13_4 = "";
        }

        if (isset($_POST['sub_topik13_5'])) {
            $sub_topik13_5 = $_POST['sub_topik13_5'];
        } else {
            $sub_topik13_5 = "";
        }

        if (isset($_POST['sub_topik13_6'])) {
            $sub_topik13_6 = $_POST['sub_topik13_6'];
        } else {
            $sub_topik13_6 = "";
        }

        if (isset($_POST['sub_topik13_7'])) {
            $sub_topik13_7 = $_POST['sub_topik13_7'];
        } else {
            $sub_topik13_7 = "";
        }

        if (isset($_POST['sub_topik13_8'])) {
            $sub_topik13_8 = $_POST['sub_topik13_8'];
        } else {
            $sub_topik13_8 = "";
        }

        if (isset($_POST['sub_topik13_9'])) {
            $sub_topik13_9 = $_POST['sub_topik13_9'];
        } else {
            $sub_topik13_9 = "";
        }

        if (isset($_POST['sub_topik13_10'])) {
            $sub_topik13_10 = $_POST['sub_topik13_10'];
        } else {
            $sub_topik13_10 = "";
        }


        if (isset($_POST['sub_topik14_1'])) {
            $sub_topik14_1 = $_POST['sub_topik14_1'];
        } else {
            $sub_topik14_1 = "";
        }

        if (isset($_POST['sub_topik14_2'])) {
            $sub_topik14_2 = $_POST['sub_topik14_2'];
        } else {
            $sub_topik14_2 = "";
        }

        if (isset($_POST['sub_topik14_3'])) {
            $sub_topik14_3 = $_POST['sub_topik14_3'];
        } else {
            $sub_topik14_3 = "";
        }

        if (isset($_POST['sub_topik14_4'])) {
            $sub_topik14_4 = $_POST['sub_topik14_4'];
        } else {
            $sub_topik14_4 = "";
        }

        if (isset($_POST['sub_topik14_5'])) {
            $sub_topik14_5 = $_POST['sub_topik14_5'];
        } else {
            $sub_topik14_5 = "";
        }

        if (isset($_POST['sub_topik14_6'])) {
            $sub_topik14_6 = $_POST['sub_topik14_6'];
        } else {
            $sub_topik14_6 = "";
        }

        if (isset($_POST['sub_topik14_7'])) {
            $sub_topik14_7 = $_POST['sub_topik14_7'];
        } else {
            $sub_topik14_7 = "";
        }

        if (isset($_POST['sub_topik14_8'])) {
            $sub_topik14_8 = $_POST['sub_topik14_8'];
        } else {
            $sub_topik14_8 = "";
        }

        if (isset($_POST['sub_topik14_9'])) {
            $sub_topik14_9 = $_POST['sub_topik14_9'];
        } else {
            $sub_topik14_9 = "";
        }

        if (isset($_POST['sub_topik14_10'])) {
            $sub_topik14_10 = $_POST['sub_topik14_10'];
        } else {
            $sub_topik14_10 = "";
        }


        if (isset($_POST['sub_topik15_1'])) {
            $sub_topik15_1 = $_POST['sub_topik15_1'];
        } else {
            $sub_topik15_1 = "";
        }

        if (isset($_POST['sub_topik15_2'])) {
            $sub_topik15_2 = $_POST['sub_topik15_2'];
        } else {
            $sub_topik15_2 = "";
        }

        if (isset($_POST['sub_topik15_3'])) {
            $sub_topik15_3 = $_POST['sub_topik15_3'];
        } else {
            $sub_topik15_3 = "";
        }

        if (isset($_POST['sub_topik15_4'])) {
            $sub_topik15_4 = $_POST['sub_topik15_4'];
        } else {
            $sub_topik15_4 = "";
        }

        if (isset($_POST['sub_topik15_5'])) {
            $sub_topik15_5 = $_POST['sub_topik15_5'];
        } else {
            $sub_topik15_5 = "";
        }

        if (isset($_POST['sub_topik15_6'])) {
            $sub_topik15_6 = $_POST['sub_topik15_6'];
        } else {
            $sub_topik15_6 = "";
        }

        if (isset($_POST['sub_topik15_7'])) {
            $sub_topik15_7 = $_POST['sub_topik15_7'];
        } else {
            $sub_topik15_7 = "";
        }

        if (isset($_POST['sub_topik15_8'])) {
            $sub_topik15_8 = $_POST['sub_topik15_8'];
        } else {
            $sub_topik15_8 = "";
        }

        if (isset($_POST['sub_topik15_9'])) {
            $sub_topik15_9 = $_POST['sub_topik15_9'];
        } else {
            $sub_topik15_9 = "";
        }

        if (isset($_POST['sub_topik15_10'])) {
            $sub_topik15_10 = $_POST['sub_topik15_10'];
        } else {
            $sub_topik15_10 = "";
        }


        if (isset($_POST['sub_topik16_1'])) {
            $sub_topik16_1 = $_POST['sub_topik16_1'];
        } else {
            $sub_topik16_1 = "";
        }

        if (isset($_POST['sub_topik16_2'])) {
            $sub_topik16_2 = $_POST['sub_topik16_2'];
        } else {
            $sub_topik16_2 = "";
        }

        if (isset($_POST['sub_topik16_3'])) {
            $sub_topik16_3 = $_POST['sub_topik16_3'];
        } else {
            $sub_topik16_3 = "";
        }

        if (isset($_POST['sub_topik16_4'])) {
            $sub_topik16_4 = $_POST['sub_topik16_4'];
        } else {
            $sub_topik16_4 = "";
        }

        if (isset($_POST['sub_topik16_5'])) {
            $sub_topik16_5 = $_POST['sub_topik16_5'];
        } else {
            $sub_topik16_5 = "";
        }

        if (isset($_POST['sub_topik16_6'])) {
            $sub_topik16_6 = $_POST['sub_topik16_6'];
        } else {
            $sub_topik16_6 = "";
        }

        if (isset($_POST['sub_topik16_7'])) {
            $sub_topik16_7 = $_POST['sub_topik16_7'];
        } else {
            $sub_topik16_7 = "";
        }

        if (isset($_POST['sub_topik16_8'])) {
            $sub_topik16_8 = $_POST['sub_topik16_8'];
        } else {
            $sub_topik16_8 = "";
        }

        if (isset($_POST['sub_topik16_9'])) {
            $sub_topik16_9 = $_POST['sub_topik16_9'];
        } else {
            $sub_topik16_9 = "";
        }

        if (isset($_POST['sub_topik16_10'])) {
            $sub_topik16_10 = $_POST['sub_topik16_10'];
        } else {
            $sub_topik16_10 = "";
        }

        $sub_topik1 = $sub_topik1_1 . ", " . $sub_topik1_2 . ", " . $sub_topik1_3 . ", " . $sub_topik1_4 . ", " . $sub_topik1_5 . ", " . $sub_topik1_6 . ", " . $sub_topik1_7 . ", " . $sub_topik1_8 . ", " . $sub_topik1_9 . ", " . $sub_topik1_10;
        $sub_topik2 = $sub_topik2_1 . ", " . $sub_topik2_2 . ", " . $sub_topik2_3 . ", " . $sub_topik2_4 . ", " . $sub_topik2_5 . ", " . $sub_topik2_6 . ", " . $sub_topik2_7 . ", " . $sub_topik2_8 . ", " . $sub_topik2_9 . ", " . $sub_topik2_10;
        $sub_topik3 = $sub_topik3_1 . ", " . $sub_topik3_2 . ", " . $sub_topik3_3 . ", " . $sub_topik3_4 . ", " . $sub_topik3_5 . ", " . $sub_topik3_6 . ", " . $sub_topik3_7 . ", " . $sub_topik3_8 . ", " . $sub_topik3_9 . ", " . $sub_topik3_10;
        $sub_topik4 = $sub_topik4_1 . ", " . $sub_topik4_2 . ", " . $sub_topik4_3 . ", " . $sub_topik4_4 . ", " . $sub_topik4_5 . ", " . $sub_topik4_6 . ", " . $sub_topik4_7 . ", " . $sub_topik4_8 . ", " . $sub_topik4_9 . ", " . $sub_topik4_10;
        $sub_topik5 = $sub_topik5_1 . ", " . $sub_topik5_2 . ", " . $sub_topik5_3 . ", " . $sub_topik5_4 . ", " . $sub_topik5_5 . ", " . $sub_topik5_6 . ", " . $sub_topik5_7 . ", " . $sub_topik5_8 . ", " . $sub_topik5_9 . ", " . $sub_topik5_10;
        $sub_topik6 = $sub_topik6_1 . ", " . $sub_topik6_2 . ", " . $sub_topik6_3 . ", " . $sub_topik6_4 . ", " . $sub_topik6_5 . ", " . $sub_topik6_6 . ", " . $sub_topik6_7 . ", " . $sub_topik6_8 . ", " . $sub_topik6_9 . ", " . $sub_topik6_10;
        $sub_topik7 = $sub_topik7_1 . ", " . $sub_topik7_2 . ", " . $sub_topik7_3 . ", " . $sub_topik7_4 . ", " . $sub_topik7_5 . ", " . $sub_topik7_6 . ", " . $sub_topik7_7 . ", " . $sub_topik7_8 . ", " . $sub_topik7_9 . ", " . $sub_topik7_10;
        $sub_topik8 = $sub_topik8_1 . ", " . $sub_topik8_2 . ", " . $sub_topik8_3 . ", " . $sub_topik8_4 . ", " . $sub_topik8_5 . ", " . $sub_topik8_6 . ", " . $sub_topik8_7 . ", " . $sub_topik8_8 . ", " . $sub_topik8_9 . ", " . $sub_topik8_10;
        $sub_topik9 = $sub_topik9_1 . ", " . $sub_topik9_2 . ", " . $sub_topik9_3 . ", " . $sub_topik9_4 . ", " . $sub_topik9_5 . ", " . $sub_topik9_6 . ", " . $sub_topik9_7 . ", " . $sub_topik9_8 . ", " . $sub_topik9_9 . ", " . $sub_topik9_10;
        $sub_topik10 = $sub_topik10_1 . ", " . $sub_topik10_2 . ", " . $sub_topik10_3 . ", " . $sub_topik10_4 . ", " . $sub_topik10_5 . ", " . $sub_topik10_6 . ", " . $sub_topik10_7 . ", " . $sub_topik10_8 . ", " . $sub_topik10_9 . ", " . $sub_topik10_10;
        $sub_topik11 = $sub_topik11_1 . ", " . $sub_topik11_2 . ", " . $sub_topik11_3 . ", " . $sub_topik11_4 . ", " . $sub_topik11_5 . ", " . $sub_topik11_6 . ", " . $sub_topik11_7 . ", " . $sub_topik11_8 . ", " . $sub_topik11_9 . ", " . $sub_topik11_10;
        $sub_topik12 = $sub_topik12_1 . ", " . $sub_topik12_2 . ", " . $sub_topik12_3 . ", " . $sub_topik12_4 . ", " . $sub_topik12_5 . ", " . $sub_topik12_6 . ", " . $sub_topik12_7 . ", " . $sub_topik12_8 . ", " . $sub_topik12_9 . ", " . $sub_topik12_10;
        $sub_topik13 = $sub_topik13_1 . ", " . $sub_topik13_2 . ", " . $sub_topik13_3 . ", " . $sub_topik13_4 . ", " . $sub_topik13_5 . ", " . $sub_topik13_6 . ", " . $sub_topik13_7 . ", " . $sub_topik13_8 . ", " . $sub_topik13_9 . ", " . $sub_topik13_10;
        $sub_topik14 = $sub_topik14_1 . ", " . $sub_topik14_2 . ", " . $sub_topik14_3 . ", " . $sub_topik14_4 . ", " . $sub_topik14_5 . ", " . $sub_topik14_6 . ", " . $sub_topik14_7 . ", " . $sub_topik14_8 . ", " . $sub_topik14_9 . ", " . $sub_topik14_10;
        $sub_topik15 = $sub_topik15_1 . ", " . $sub_topik15_2 . ", " . $sub_topik15_3 . ", " . $sub_topik15_4 . ", " . $sub_topik15_5 . ", " . $sub_topik15_6 . ", " . $sub_topik15_7 . ", " . $sub_topik15_8 . ", " . $sub_topik15_9 . ", " . $sub_topik15_10;
        $sub_topik16 = $sub_topik16_1 . ", " . $sub_topik16_2 . ", " . $sub_topik16_3 . ", " . $sub_topik16_4 . ", " . $sub_topik16_5 . ", " . $sub_topik16_6 . ", " . $sub_topik16_7 . ", " . $sub_topik16_8 . ", " . $sub_topik16_9 . ", " . $sub_topik16_10;
        $tik1 = $_POST['tik1'];
        $tik2 = $_POST['tik2'];
        $tik3 = $_POST['tik3'];
        $tik4 = $_POST['tik4'];
        $tik5 = $_POST['tik5'];
        $tik6 = $_POST['tik6'];
        $tik7 = $_POST['tik7'];
        $tik8 = $_POST['tik8'];
        $tik9 = $_POST['tik9'];
        $tik10 = $_POST['tik10'];
        $tik11 = $_POST['tik11'];
        $tik12 = $_POST['tik12'];
        $tik13 = $_POST['tik13'];
        $tik14 = $_POST['tik14'];
        $tik15 = $_POST['tik15'];
        $tik16 = $_POST['tik16'];

        if (isset($_POST['1K'])) {
            $_1K = $_POST['1K'];
        } else {
            $_1K = "";
        }

        if (isset($_POST['1D'])) {
            $_1D = $_POST['1D'];
        } else {
            $_1D = "";
        }

        if (isset($_POST['1R'])) {
            $_1R = $_POST['1R'];
        } else {
            $_1R = "";
        }

        if (isset($_POST['1S'])) {
            $_1S = $_POST['1S'];
        } else {
            $_1S = "";
        }


        if (isset($_POST['2K'])) {
            $_2K = $_POST['2K'];
        } else {
            $_2K = "";
        }

        if (isset($_POST['2D'])) {
            $_2D = $_POST['2D'];
        } else {
            $_2D = "";
        }

        if (isset($_POST['2R'])) {
            $_2R = $_POST['2R'];
        } else {
            $_2R = "";
        }

        if (isset($_POST['2S'])) {
            $_2S = $_POST['2S'];
        } else {
            $_2S = "";
        }


        if (isset($_POST['3K'])) {
            $_3K = $_POST['3K'];
        } else {
            $_3K = "";
        }

        if (isset($_POST['3D'])) {
            $_3D = $_POST['3D'];
        } else {
            $_3D = "";
        }

        if (isset($_POST['3R'])) {
            $_3R = $_POST['3R'];
        } else {
            $_3R = "";
        }

        if (isset($_POST['3S'])) {
            $_3S = $_POST['3S'];
        } else {
            $_3S = "";
        }


        if (isset($_POST['4K'])) {
            $_4K = $_POST['4K'];
        } else {
            $_4K = "";
        }

        if (isset($_POST['4D'])) {
            $_4D = $_POST['4D'];
        } else {
            $_4D = "";
        }

        if (isset($_POST['4R'])) {
            $_4R = $_POST['4R'];
        } else {
            $_4R = "";
        }

        if (isset($_POST['4S'])) {
            $_4S = $_POST['4S'];
        } else {
            $_4S = "";
        }


        if (isset($_POST['5K'])) {
            $_5K = $_POST['5K'];
        } else {
            $_5K = "";
        }

        if (isset($_POST['5D'])) {
            $_5D = $_POST['5D'];
        } else {
            $_5D = "";
        }

        if (isset($_POST['5R'])) {
            $_5R = $_POST['5R'];
        } else {
            $_5R = "";
        }

        if (isset($_POST['5S'])) {
            $_5S = $_POST['5S'];
        } else {
            $_5S = "";
        }


        if (isset($_POST['6K'])) {
            $_6K = $_POST['6K'];
        } else {
            $_6K = "";
        }

        if (isset($_POST['6D'])) {
            $_6D = $_POST['6D'];
        } else {
            $_6D = "";
        }

        if (isset($_POST['6R'])) {
            $_6R = $_POST['6R'];
        } else {
            $_6R = "";
        }

        if (isset($_POST['6S'])) {
            $_6S = $_POST['6S'];
        } else {
            $_6S = "";
        }


        if (isset($_POST['7K'])) {
            $_7K = $_POST['7K'];
        } else {
            $_7K = "";
        }

        if (isset($_POST['7D'])) {
            $_7D = $_POST['7D'];
        } else {
            $_7D = "";
        }

        if (isset($_POST['7R'])) {
            $_7R = $_POST['7R'];
        } else {
            $_7R = "";
        }

        if (isset($_POST['7S'])) {
            $_7S = $_POST['7S'];
        } else {
            $_7S = "";
        }


        if (isset($_POST['8K'])) {
            $_8K = $_POST['8K'];
        } else {
            $_8K = "";
        }

        if (isset($_POST['8D'])) {
            $_8D = $_POST['8D'];
        } else {
            $_8D = "";
        }

        if (isset($_POST['8R'])) {
            $_8R = $_POST['8R'];
        } else {
            $_8R = "";
        }

        if (isset($_POST['8S'])) {
            $_8S = $_POST['8S'];
        } else {
            $_8S = "";
        }


        if (isset($_POST['9K'])) {
            $_9K = $_POST['9K'];
        } else {
            $_9K = "";
        }

        if (isset($_POST['9D'])) {
            $_9D = $_POST['9D'];
        } else {
            $_9D = "";
        }

        if (isset($_POST['9R'])) {
            $_9R = $_POST['9R'];
        } else {
            $_9R = "";
        }

        if (isset($_POST['9S'])) {
            $_9S = $_POST['9S'];
        } else {
            $_9S = "";
        }


        if (isset($_POST['10K'])) {
            $_10K = $_POST['10K'];
        } else {
            $_10K = "";
        }

        if (isset($_POST['10D'])) {
            $_10D = $_POST['10D'];
        } else {
            $_10D = "";
        }

        if (isset($_POST['10R'])) {
            $_10R = $_POST['10R'];
        } else {
            $_10R = "";
        }

        if (isset($_POST['10S'])) {
            $_10S = $_POST['10S'];
        } else {
            $_10S = "";
        }


        if (isset($_POST['11K'])) {
            $_11K = $_POST['11K'];
        } else {
            $_11K = "";
        }

        if (isset($_POST['11D'])) {
            $_11D = $_POST['11D'];
        } else {
            $_11D = "";
        }

        if (isset($_POST['11R'])) {
            $_11R = $_POST['11R'];
        } else {
            $_11R = "";
        }

        if (isset($_POST['11S'])) {
            $_11S = $_POST['11S'];
        } else {
            $_11S = "";
        }


        if (isset($_POST['12K'])) {
            $_12K = $_POST['12K'];
        } else {
            $_12K = "";
        }

        if (isset($_POST['12D'])) {
            $_12D = $_POST['12D'];
        } else {
            $_12D = "";
        }

        if (isset($_POST['12R'])) {
            $_12R = $_POST['12R'];
        } else {
            $_12R = "";
        }

        if (isset($_POST['12S'])) {
            $_12S = $_POST['12S'];
        } else {
            $_12S = "";
        }


        if (isset($_POST['13K'])) {
            $_13K = $_POST['13K'];
        } else {
            $_13K = "";
        }

        if (isset($_POST['13D'])) {
            $_13D = $_POST['13D'];
        } else {
            $_13D = "";
        }

        if (isset($_POST['13R'])) {
            $_13R = $_POST['13R'];
        } else {
            $_13R = "";
        }

        if (isset($_POST['13S'])) {
            $_13S = $_POST['13S'];
        } else {
            $_13S = "";
        }


        if (isset($_POST['14K'])) {
            $_14K = $_POST['14K'];
        } else {
            $_14K = "";
        }

        if (isset($_POST['14D'])) {
            $_14D = $_POST['14D'];
        } else {
            $_14D = "";
        }

        if (isset($_POST['14R'])) {
            $_14R = $_POST['14R'];
        } else {
            $_14R = "";
        }

        if (isset($_POST['14S'])) {
            $_14S = $_POST['14S'];
        } else {
            $_14S = "";
        }


        if (isset($_POST['15K'])) {
            $_15K = $_POST['15K'];
        } else {
            $_15K = "";
        }

        if (isset($_POST['15D'])) {
            $_15D = $_POST['15D'];
        } else {
            $_15D = "";
        }

        if (isset($_POST['15R'])) {
            $_15R = $_POST['15R'];
        } else {
            $_15R = "";
        }

        if (isset($_POST['15S'])) {
            $_15S = $_POST['15S'];
        } else {
            $_15S = "";
        }


        if (isset($_POST['16K'])) {
            $_16K = $_POST['16K'];
        } else {
            $_16K = "";
        }

        if (isset($_POST['16D'])) {
            $_16D = $_POST['16D'];
        } else {
            $_16D = "";
        }

        if (isset($_POST['16R'])) {
            $_16R = $_POST['16R'];
        } else {
            $_16R = "";
        }

        if (isset($_POST['16S'])) {
            $_16S = $_POST['16S'];
        } else {
            $_16S = "";
        }

        $kegiatan_belajar1 = $_1K . ", " . $_1D . ", " . $_1R . ", " . $_1S;
        $kegiatan_belajar2 = $_2K . ", " . $_2D . ", " . $_2R . ", " . $_2S;
        $kegiatan_belajar3 = $_3K . ", " . $_3D . ", " . $_3R . ", " . $_3S;
        $kegiatan_belajar4 = $_4K . ", " . $_4D . ", " . $_4R . ", " . $_4S;
        $kegiatan_belajar5 = $_5K . ", " . $_5D . ", " . $_5R . ", " . $_5S;
        $kegiatan_belajar6 = $_6K . ", " . $_6D . ", " . $_6R . ", " . $_6S;
        $kegiatan_belajar7 = $_7K . ", " . $_7D . ", " . $_7R . ", " . $_7S;
        $kegiatan_belajar8 = $_8K . ", " . $_8D . ", " . $_8R . ", " . $_8S;
        $kegiatan_belajar9 = $_9K . ", " . $_9D . ", " . $_9R . ", " . $_9S;
        $kegiatan_belajar10 = $_10K . ", " . $_10D . ", " . $_10R . ", " . $_10S;
        $kegiatan_belajar11 = $_11K . ", " . $_11D . ", " . $_11R . ", " . $_11S;
        $kegiatan_belajar12 = $_12K . ", " . $_12D . ", " . $_12R . ", " . $_12S;
        $kegiatan_belajar13 = $_13K . ", " . $_13D . ", " . $_13R . ", " . $_13S;
        $kegiatan_belajar14 = $_14K . ", " . $_14D . ", " . $_14R . ", " . $_14S;
        $kegiatan_belajar15 = $_15K . ", " . $_15D . ", " . $_15R . ", " . $_15S;
        $kegiatan_belajar16 = $_16K . ", " . $_16D . ", " . $_16R . ", " . $_16S;
        $sign_koordinator_mata_kuliah = $_POST['sign_koordinator_mata_kuliah'];
        $sign_koordinator_program_studi = $_POST['sign_koordinator_program_studi'];
        $tanggal = $_POST['tanggal'];

        // Perform an SQL query
        $sql = "INSERT INTO rincian_materi_kuliah(kd_mata_kuliah, topik1, topik2, topik3, topik4, topik5, topik6, topik7, topik8, topik9, topik10, topik11, topik12, topik13, topik14, topik15, topik16, sub_topik1, sub_topik2, sub_topik3, sub_topik4, sub_topik5, sub_topik6, sub_topik7, sub_topik8, sub_topik9, sub_topik10, sub_topik11, sub_topik12, sub_topik13, sub_topik14, sub_topik15, sub_topik16, tik1, tik2, tik3, tik4, tik5, tik6, tik7, tik8, tik9, tik10, tik11, tik12, tik13, tik14, tik15, tik16, kegiatan_belajar1, kegiatan_belajar2, kegiatan_belajar3, kegiatan_belajar4, kegiatan_belajar5, kegiatan_belajar6, kegiatan_belajar7, kegiatan_belajar8, kegiatan_belajar9, kegiatan_belajar10, kegiatan_belajar11, kegiatan_belajar12, kegiatan_belajar13, kegiatan_belajar14, kegiatan_belajar15, kegiatan_belajar16, sign_koordinator_mata_kuliah, sign_koordinator_program_studi, tanggal)
			values('$kd_mata_kuliah', '$topik1', '$topik2', '$topik3', '$topik4', '$topik5', '$topik6', '$topik7', '$topik8', '$topik9', '$topik10', '$topik11', '$topik12', '$topik13', '$topik14', '$topik15', '$topik16', '$sub_topik1', '$sub_topik2', '$sub_topik3', '$sub_topik4', '$sub_topik5', '$sub_topik6', '$sub_topik7', '$sub_topik8', '$sub_topik9', '$sub_topik10', '$sub_topik11', '$sub_topik12', '$sub_topik13', '$sub_topik14', '$sub_topik15', '$sub_topik16', '$tik1', '$tik2', '$tik3', '$tik4', '$tik5', '$tik6', '$tik7', '$tik8', '$tik9', '$tik10', '$tik11', '$tik12', '$tik13', '$tik14', '$tik15', '$tik16', '$kegiatan_belajar1', '$kegiatan_belajar2', '$kegiatan_belajar3', '$kegiatan_belajar4', '$kegiatan_belajar5', '$kegiatan_belajar6', '$kegiatan_belajar7', '$kegiatan_belajar8', '$kegiatan_belajar9', '$kegiatan_belajar10', '$kegiatan_belajar11', '$kegiatan_belajar12', '$kegiatan_belajar13', '$kegiatan_belajar14', '$kegiatan_belajar15', '$kegiatan_belajar16', '$sign_koordinator_mata_kuliah', '$sign_koordinator_program_studi', '$tanggal')
			ON DUPLICATE KEY UPDATE 
			topik1 = '$topik1',
			topik2 = '$topik2',
			topik3 = '$topik3',
			topik4 = '$topik4',
			topik5 = '$topik5',
			topik6 = '$topik6',
			topik7 = '$topik7',
			topik8 = '$topik8',
			topik9 = '$topik9',
			topik10 = '$topik10',
			topik11 = '$topik11',
			topik12 = '$topik12',
			topik13 = '$topik13',
			topik14 = '$topik14',
			topik15 = '$topik15',
			topik16 = '$topik16',
			sub_topik1 = '$sub_topik1',
			sub_topik2 = '$sub_topik2',
			sub_topik3 = '$sub_topik3',
			sub_topik4 = '$sub_topik4',
			sub_topik5 = '$sub_topik5',
			sub_topik6 = '$sub_topik6',
			sub_topik7 = '$sub_topik7',
			sub_topik8 = '$sub_topik8',
			sub_topik9 = '$sub_topik9',
			sub_topik10 = '$sub_topik10',
			sub_topik11 = '$sub_topik11',
			sub_topik12 = '$sub_topik12',
			sub_topik13 = '$sub_topik13',
			sub_topik14 = '$sub_topik14',
			sub_topik15 = '$sub_topik15',
			sub_topik16 = '$sub_topik16',
			tik1 = '$tik1',
			tik2 = '$tik2',
			tik3 = '$tik3',
			tik4 = '$tik4',
			tik5 = '$tik5',
			tik6 = '$tik6',
			tik7 = '$tik7',
			tik8 = '$tik8',
			tik9 = '$tik9',
			tik10 = '$tik10',
			tik11 = '$tik11',
			tik12 = '$tik12',
			tik13 = '$tik13',
			tik14 = '$tik14',
			tik15 = '$tik15',
			tik16 = '$tik16',
			kegiatan_belajar1 = '$kegiatan_belajar1',
			kegiatan_belajar2 = '$kegiatan_belajar2',
			kegiatan_belajar3 = '$kegiatan_belajar3',
			kegiatan_belajar4 = '$kegiatan_belajar4',
			kegiatan_belajar5 = '$kegiatan_belajar5',
			kegiatan_belajar6 = '$kegiatan_belajar6',
			kegiatan_belajar7 = '$kegiatan_belajar7',
			kegiatan_belajar8 = '$kegiatan_belajar8',
			kegiatan_belajar9 = '$kegiatan_belajar9',
			kegiatan_belajar10 = '$kegiatan_belajar10',
			kegiatan_belajar11 = '$kegiatan_belajar11',
			kegiatan_belajar12 = '$kegiatan_belajar12',
			kegiatan_belajar13 = '$kegiatan_belajar13',
			kegiatan_belajar14 = '$kegiatan_belajar14',
			kegiatan_belajar15 = '$kegiatan_belajar15',
			kegiatan_belajar16 = '$kegiatan_belajar16',
			sign_koordinator_mata_kuliah = '$sign_koordinator_mata_kuliah',
			sign_koordinator_program_studi = '$sign_koordinator_program_studi',
			tanggal = '$tanggal'";

        $this->db->trans_begin();
        $this->db->query($sql);

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            $_SESSION['state_status'] = true;
        } else {
            $this->db->trans_rollback();
            $_SESSION['state_status'] = false;
        }

        redirect('data_perkuliahan/mata_kuliah/index');
        return;
    }

}