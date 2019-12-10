<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data SAP page
 */
class Data_sap extends MY_Controller
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->checkRole();
        $this->load->library('user_agent');
        $this->load->model('Data_sap_model');
    }

    public function index()
    {
        $state_kd_mk = isset($_GET['state_kd_mk']) ? $_GET['state_kd_mk'] : null;

        if ($_POST) {

            if ($_POST['submit'] == 'dosen_data_sap') {
                $kd_mata_kuliah = $_POST['kd_mata_kuliah'];
                $nik_koordinator_mata_kuliah = $_POST['nik_koordinator_mata_kuliah'];
                $silabus_ringkas = $_POST['silabus_ringkas'];
                $tiu = $_POST['tiu'];
                $mk_prasyarat = $_POST['mk_prasyarat'];
                $media1 = $_POST['media1'];
                $media2 = $_POST['media2'];
                $media3 = $_POST['media3'];
                $media = $media1 . ", " . $media2 . ", " . $media3;
                $waktu_kuliah = $_POST['waktu_kuliah'];
                $waktu_pr = $_POST['waktu_pr'];
                $waktu_diskusi_kelompok = $_POST['waktu_diskusi_kelompok'];
                $lain_lain1 = $_POST['lain_lain1'];
                $waktu_lain_lain1 = $_POST['waktu_lain_lain1'];
                $bobot_UTS = $_POST['bobot_UTS'];
                $bobot_UAS = $_POST['bobot_UAS'];
                $bobot_quiz = $_POST['bobot_quiz'];
                $bobot_tugas = $_POST['bobot_tugas'];
                $bobot_praktikum = $_POST['bobot_praktikum'];
                $bobot_keaktifan = $_POST['bobot_keaktifan'];
                $lain_lain2 = $_POST['lain_lain2'];
                $bobot_lain_lain2 = $_POST['bobot_lain_lain2'];
                $rujukan = $_POST['rujukan'];

                // Perform an SQL query

                $sql = "INSERT INTO sap(kd_mata_kuliah, nik_koordinator_mata_kuliah, silabus_ringkas, tiu, mk_prasyarat, media, waktu_kuliah, waktu_pr, waktu_diskusi_kelompok, lain_lain1, waktu_lain_lain1, bobot_UTS, bobot_UAS, bobot_quiz, bobot_tugas, bobot_praktikum, bobot_keaktifan, lain_lain2, bobot_lain_lain2, rujukan)
			values('$kd_mata_kuliah', '$nik_koordinator_mata_kuliah', '$silabus_ringkas', '$tiu', '$mk_prasyarat', '$media', '$waktu_kuliah', '$waktu_pr', '$waktu_diskusi_kelompok', '$lain_lain1', '$waktu_lain_lain1', '$bobot_UTS', '$bobot_UAS', '$bobot_quiz', '$bobot_tugas', '$bobot_praktikum', '$bobot_keaktifan', '$lain_lain2', '$bobot_lain_lain2', '$rujukan')
			ON DUPLICATE KEY UPDATE 
			nik_koordinator_mata_kuliah = '$nik_koordinator_mata_kuliah',
			silabus_ringkas = '$silabus_ringkas',
			tiu = '$tiu',
			mk_prasyarat = '$mk_prasyarat',
			media = '$media',
			waktu_kuliah = '$waktu_kuliah',
			waktu_pr = '$waktu_pr',
			waktu_diskusi_kelompok = '$waktu_diskusi_kelompok',
			lain_lain1 = '$lain_lain1',
			waktu_lain_lain1 = '$waktu_lain_lain1',
			bobot_UTS = '$bobot_UTS',
			bobot_UAS = '$bobot_UAS',
			bobot_quiz = '$bobot_quiz',
			bobot_tugas = '$bobot_tugas',
			bobot_praktikum = '$bobot_praktikum',
			bobot_keaktifan = '$bobot_keaktifan',
			lain_lain2 = '$lain_lain2',
			bobot_lain_lain2 = '$bobot_lain_lain2',
			rujukan = '$rujukan'";

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
            } else if ($_POST['submit'] == 'dosen_data_rincian_materi_kuliah') {
                $this->Data_sap_model->rincianMateriKuliah_($_POST);
            }
        }

        // Data Mata Kuliah
        $this->db->select('*')->from('mata_kuliah');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $mk = $this->db->get();
        $this->mViewData['data_mk'] = $mk->row();
        $nama_mk = $mk->row()->nama_mata_kuliah;

        // Data SAP
        $this->db->select('*')->from('sap');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $sap = $this->db->get();
        $this->mViewData['data_sap'] = $sap->row();

        // Data Prasyarat Mata Kuliah
        $this->db->select('*')->from('mata_kuliah');;
        $this->db->where('kd_prodi', $_SESSION['kd_prodi']);
        $this->db->where('nama_mata_kuliah', $nama_mk);
        $praMk = $this->db->get();
        $this->mViewData['data_pra_mk'] = $praMk->result();

        // Data Rincian Mata Kuliah
        $this->db->select('*')->from('rincian_materi_kuliah');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $rincian_mk = $this->db->get();
        $this->mViewData['data_rincian_mk'] = $rincian_mk->result_array();

        // Data Dosen
        $this->db->select('*')->from('mst_dosen');;
        $this->db->where('nik', $_SESSION['nik']);
        $dosen = $this->db->get();
        $this->mViewData['data_dosen'] = $dosen->row();

        // Data Dosen Jabatan
        $this->db->select('*')->from('mst_dosen');;
        $this->db->where('jabatan', 'KPS');
        $dosenJabatan = $this->db->get();
        $this->mViewData['data_dosen_jabatan'] = $dosenJabatan->row();

        $this->mPageTitle = 'Data SAP Mata Kuliah';
        $cssFile = [
            'assets/dist/frontend/css/sap.css',
            'assets/dist/frontend/css/style.css'
        ];
        $this->add_stylesheet($cssFile, true);
        $this->render('data_sap/index', 'with_breadcrumb');
    }

}
