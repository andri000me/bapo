<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Data Absensi page
 */
class Data_absensi extends MY_Controller
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

        $this->checkRole();
        $this->load->library('user_agent');
        $this->load->model('Data_absensi_model');
    }

    public function index()
    {
        $title = 'Data Absensi';
        $this->mPageTitle = $title;
        $this->mViewData['title'] = $title;
        $this->render('data_absensi/index', 'with_breadcrumb');
    }

    public function teori()
    {
        $state_kd_mk = isset($_GET['state_kd_mk']) ? $_GET['state_kd_mk'] : null;

        if ($_POST) {
            if ($_POST['submit'] == 'dosen_data_absensi_teori') {
                $this->Data_absensi_model->teori($_POST);
            } else if ($_POST['submit'] == 'dosen_data_absensi_praktikum') {
                $this->Data_absensi_model->praktikum($_POST);
            }
        }

        // Data Mata Kuliah
        $this->db->select('*')->from('mata_kuliah');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $mk = $this->db->get();
        $this->mViewData['data_mk'] = $mk->row();
        $semester = $mk->row()->semester;
        $nik_koordinator_mata_kuliah = $mk->row()->nik;

        // Data SAP
        $this->db->select('*')->from('sap');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $sap = $this->db->get();
        $this->mViewData['data_sap'] = $sap->row();

        // Data Program Studi
        $this->db->select('*')->from('mst_program_studi');;
        $this->db->where('kd_prodi', $this->mViewData['data_mk']->kd_prodi);
        $prodi = $this->db->get();
        $this->mViewData['data_prodi'] = $prodi->row();

        // Data Perkuliahan
        $id_pelaksanaan_perkuliahan = $mk->row()->kd_mata_kuliah . "-" . $semester . "-TEORI-1";
        $this->db->select('*')->from('pelaksanaan_perkuliahan');;
        $this->db->where('id_pelaksanaan_perkuliahan', $id_pelaksanaan_perkuliahan);
        $data_perkuliahan = $this->db->get();
        $this->mViewData['data_perkuliahan'] = $data_perkuliahan->row();
        $kd_ruang = $data_perkuliahan->row()->kd_ruang;

        // Count Total KRS Mata Kuliah
        $this->db->select('count(*) as total')->from('krs');;
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $data_perkuliahan = $this->db->get();
        $this->mViewData['data_total_krs'] = $data_perkuliahan->row();

        // Data Absensi
        $id_absensi = $state_kd_mk . "-" . $semester . "-TEORI-1";
        $this->db->select('*')->from('absensi');;
        $this->db->where('id_absensi', $id_absensi);
        $data_absensi = $this->db->get();
        $this->mViewData['data_absensi'] = $data_absensi->row();

        // Data Ruang
        $this->db->select('*')->from('ruang');;
        $this->db->where('kd_ruang', $kd_ruang);
        $data_ruang = $this->db->get();
        $this->mViewData['data_ruang'] = $data_ruang->row();

        // Data Dosen
        $this->db->select('*')->from('mst_dosen');
        $this->db->where('nik', $nik_koordinator_mata_kuliah);
        $data_dosen = $this->db->get();
        $this->mViewData['data_ruang'] = $data_dosen->row();

        // Data Rincian Mata Kuliah
        $this->db->select('*')->from('rincian_materi_kuliah');
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $data_rincian_mk = $this->db->get();
        $this->mViewData['data_rincian_mk'] = $data_rincian_mk->row();

        // Data Ruang By kd_prodi dan kd_ruang
        $this->db->select('*')->from('ruang');
        $this->db->where('kd_prodi', $_SESSION['kd_prodi']);
        $this->db->where('kd_ruang', $data_ruang->row()->kd_ruang);
        $data_rincian_mk = $this->db->get();
        $this->mViewData['data_ruang_prodi'] = $data_rincian_mk->row();

        // Data KRS
        $this->db->select('*')->from('krs');
        $this->db->where('kd_mata_kuliah', $state_kd_mk);
        $this->db->order_by('npm ASC');
        $data_rincian_mk = $this->db->get();
        $this->mViewData['data_krs'] = $data_rincian_mk->result();

        $title = 'Data Absensi - Teori';
        $this->mPageTitle = $title;
        $this->mViewData['title'] = $title;
        $cssFile = [
            'assets/dist/frontend/css/sap.css',
            'assets/dist/frontend/css/style.css'
        ];
        $this->add_stylesheet($cssFile, true);
        $this->render('data_absensi/teori', 'with_breadcrumb');
    }

}
